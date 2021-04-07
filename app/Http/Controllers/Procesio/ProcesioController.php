<?php

namespace App\Http\Controllers\Procesio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProcesioController extends Controller
{
    private function requester($method, $url, $data = null, $contentType = false)
    {
        $method = strtolower($method);
        $options = ['headers' => ['Accept' => '*/*']];
        if ($contentType) {
            $options['headers']['Content-Type'] = 'application/json';
        }
        if (session()->has('at')) {
            $options['headers']['Authorization'] = 'Bearer ' . session()->get('at');
        }
        switch ($method) {
            case 'get':
                if ($data) {
                    $options['body'] = $data;
                }
                break;
            case 'post':
                if ($data) {
                    if (is_array($data)) {
                        $options['form_params'] = $data;
                    } else {
                        $options['body'] = $data;
                    }
                }
                break;
        }
        $client = new \GuzzleHttp\Client();
        $response = $client->{$method}($url, $options);
        $result = $response->getBody()->getContents();

        return (object)[
            'status' => $response->getStatusCode(),
            'data' => $result ? json_decode($result) : null
        ];
    }

    private function refreshToken()
    {
        $data = $this->requester('post', 'https://api.procesio.app:4532/auth/refreshToken', [
            'client_id' => 'procesio-ui',
            'refresh_token' => session()->get('rt')
        ]);
        if ($data->status == 200) {
            session()->put('at', $data->data->access_token);
            session()->put('rt', $data->data->refresh_token);
        }
    }

    private function createRequest($processID, $data = null)
    {
        $run = $this->requester(
            'post',
            'https://api.procesio.app:4321/api/Projects/' . $processID . '/run',
            $data,
            true
        );
        if ($run->status == 200 && $run->data) {
            $result = null;
            while (true) {
                $instance = $this->requester(
                    'get',
                    'https://api.procesio.app:4321/api/Projects/instances/' . $run->data->instanceId . '/output',
                    null,
                    true
                );
                if ($instance->status == 200) {
                    if ($instance->data->instance->status == 40) {
                        $result = null;
                        break;
                    }
                    if ($instance->data->instance->status == 50) {
                        $result = $instance->data->instance->variable;
                        break;
                    }
                }
            }

            return $result;
        }
        if ($run->status >= 400) {
            $this->refreshToken();
        }

        return null;
    }

    private function makeAuth()
    {
        $token = $this->createRequest('a81e0c97-196b-43ed-a178-8d9f8bf2a551', '{}');
        if ($token !== null) {
            $token = $token->auth->Result->AuthenticationToken;
        }

        return $token;
    }

    public function index()
    {
        if (!session()->has('at')) {
            $data = $this->requester('post', 'https://api.procesio.app:4532/auth/authenticate', [
                'realm' => 'procesio01',
                'grant_type' => 'password',
                'username' => 'ciprian.duduiala@procesio.com',
                'password' => 'testpass',
                'client_id' => 'procesio-ui',
                'client_secret' => ''
            ]);
            if ($data->status == 200 && $data->data) {
                session()->put('at', $data->data->access_token);
                session()->put('rt', $data->data->refresh_token);
            }
        }

        return view('procesio.home');
    }

    public function search(Request $request)
    {
        if (!session()->has('at')) {
            return redirect()->route('procesio.home');
        }

        $results = [];
        $q = trim($request->input('q'));
        if ($q) {
            $qs = [
                'search_name' => $q,
                'session_token' => $this->makeAuth()
            ];
            $data = $this->createRequest('aeb2bb18-8c06-4dcd-8c78-dac727759b2b', json_encode($qs));
            $data = json_decode($data->PartnersResultArray);
            if ($data->StatusCode == 200 && $data->Result) {
                $results = $data->Result->Partners;
            }
        }

        return view('procesio.search', compact('results'));
    }

    public function partnersEdit(Request $request, $id)
    {
        if (!session()->has('at')) {
            return redirect()->route('procesio.home');
        }

        $qs = [
            'partner_id' => $id,
            'session_token' => $this->makeAuth()
        ];
        $data = $this->createRequest('75ec0c55-2ff8-444f-9fff-c1763a4b3c78', json_encode($qs));
        $data = json_decode($data->PartnerResult);
        if ($data->StatusCode == 200) {
            $data = $data->Result;
        }

        if ($request->isMethod('post')) {
            $fields = $request->all();
            $qs = [
                'partner_id' => $id,
                'email' => $fields['EmailAddress'],
                'mobile' => $fields['MobileNumber'],
                'session_token' => $this->makeAuth()
            ];
            $res = $this->createRequest('e59891cf-5817-4688-9093-36f7c014af17', json_encode($qs));
            $res = json_decode($res->PartnerResult);
            if ($res->StatusCode == 200) {
                $data = $res->Result;
            } else {
                $request->session()->flash('error', $res->Result->Message);
            }
        }

        $data = (array)$data;
        $data = ['MobileNumber' => $data['MobileNumber']] + $data;
        $data = ['EmailAddress' => $data['EmailAddress']] + $data;
        $data = (object)$data;

        return view('procesio.partners-form', compact('id', 'data'));
    }
}
