<?php

namespace App\Http\Controllers\Procesio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProcesioController extends Controller
{
    private function createRequest($method, $action, $data)
    {
        $method = strtolower($method);
        $url = 'http://apidev.ringhel.com/api/' . $method . $action;
        $url .= '?App_Key=' . config('procesio.app_key');
        $url .= '&session_token=' . config('procesio.session_token');
        if ($method == 'get' && $data) {
            $url .= '&' . $data;
        }
        $client = new \GuzzleHttp\Client();
        $response = $client->{$method}($url, [
            'http_errors' => false,
            'headers' => [
                'Content-Type' => 'application/json;charset=UTF-8',
                'Accept' => 'application/json'
            ]
        ]);

        $result = $response->getBody()->getContents();
        if ($result) {
            $data = json_decode($result);
            if (is_string($data)) {
                $data = json_decode($data);
            }

            return $data;
        }

        return null;
    }

    public function index()
    {
        return view('procesio.home');
    }

    public function search(Request $request)
    {
        $results = [];
        $q = trim($request->input('q'));
        if ($q) {
            $data = $this->createRequest('get', '/procesio_get_partners_by_name', 'search_name=' . $q);
            if ($data->StatusCode == 200 && $data->Result) {
                $results = $data->Result->Partners;
            }
        }

        return view('procesio.search', compact('results'));
    }

    public function partnersEdit(Request $request, $id)
    {
        $data = $this->createRequest('get', '/procesio_get_partner_by_id', 'partner_id=' . $id);
        if ($data->StatusCode == 200) {
            $data = $data->Result;
        }

        if ($request->isMethod('post')) {
            $fields = $request->all();
            $qs = [
                'partner_id=' . $id,
                'email=' . $fields['EmailAddress'],
                'mobile=' . $fields['MobileNumber']
            ];
            $res = $this->createRequest('get', '/procesio_set_partner_email_and_mobile_by_id', implode('&', $qs));
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
