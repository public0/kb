<?php

namespace App\Http\Controllers\Tpl;

use App\Http\Controllers\Controller;
use App\Models\Template;
use App\Models\TemplatePlaceholderGroup;
use App\Models\TemplatePlaceholder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TemplatesController extends Controller
{
    private function createRequest($url, $action, array $data)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->post(rtrim($url, '/') . '/' . $action, [
            'form_params' => $data,
            'headers' => ['Accept' => 'application/json']
        ]);

        return $response->getBody()->getContents();
    }

    public function open(Request $request, $uid)
    {
        $tpl = Template::with('type')->where('uid', $uid);
        $template = $tpl->first();
        if (!$template) {
            return redirect('/');
        }

        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'name' => 'required|max:255',
                'subject' => 'required|max:255',
                'content' => 'required'
            ]);

            $fields = $request->only(['name', 'subject', 'content']);

            $images = [];
            $headerPath = null;
            $headerImage = $request->file('header');
            if ($headerImage) {
                $header = $headerImage->getClientOriginalName();
                $fields['header_image'] = $header;
                $images['header'] = url('storage/' . $header);
                $headerPath = $headerImage->storeAs('public', $header);
            }
            $footerPath = null;
            $footerImage = $request->file('footer');
            if ($footerImage) {
                $footer = $footerImage->getClientOriginalName();
                $fields['footer_image'] = $footer;
                $images['footer'] = url('storage/' . $footer);
                $footerPath = $footerImage->storeAs('public', $footer);
            }

            $data = array_merge($fields, $images ? ['images' => json_encode($images)] : []);
            $response = $this->createRequest($template->app_endpoint, 'update?id=' . $template->app_id, $data);
            if ($response) {
                $responseData = json_decode($response, true);
                if (isset($responseData['error'])) {
                    $request->session()->flash('error', $responseData['error']['message']);
                }
                if (isset($responseData['success'])) {
                    $tpl->update([
                        'name' => $responseData['success']['name'],
                        'subject' => $responseData['success']['subject'],
                        'content' => $responseData['success']['content'],
                        'header_image' => $responseData['success']['header_image'],
                        'footer_image' => $responseData['success']['footer_image']
                    ]);
                    $template = $tpl->first();
                }
                if ($headerPath) {
                    Storage::delete($headerPath);
                }
                if ($footerPath) {
                    Storage::delete($footerPath);
                }
                if (preg_match_all(
                    '/<img[^>]+src=(?:\"|\')\K(.[^">]+?)(?=\"|\')/',
                    $fields['content'],
                    $matches,
                    PREG_SET_ORDER
                )) {
                    foreach ($matches as $values) {
                        Storage::delete('public/' . basename($values[0]));
                    }
                }
            }
        }

        $placeholdersGroups = TemplatePlaceholderGroup::whereHas('placeholders', function ($query) {
            $query->where('status', 1);
        })
            ->where('type_id', $template->type_id)
            ->where('status', 1)
            ->get();

        return view('tpl/open', [
            'pageTitle' => sprintf('Edit %s Template', $template->type->name),
            'template' => $template,
            'placeholdersGroups' => $placeholdersGroups
        ]);
    }

    public function uploadImage(Request $request)
    {
        $file = $request->file('file');
        if ($file) {
            $name = $file->getClientOriginalName();
            $file->storeAs('public', $name);

            return response()->json([
                'location' => url('storage/' . $name)
            ]);
        }
    }

    public function deleteImage(Request $request, $uid, $field, $image)
    {
        $tpl = Template::where('uid', $uid);
        $template = $tpl->first();
        if (!$template) {
            return redirect('/');
        }

        $response = $this->createRequest($template->app_endpoint, 'deleteImage?id=' . $template->app_id, [
            'field' => $field,
            'image' => $image
        ]);
        if ($response) {
            $responseData = json_decode($response, true);
            if (isset($responseData['error'])) {
                $request->session()->flash('error', $responseData['error']['message']);
            }
            if (isset($responseData['success'])) {
                $tpl->update([
                    'header_image' => $responseData['success']['header_image'],
                    'footer_image' => $responseData['success']['footer_image']
                ]);
            }
        }

        return redirect()->back();
    }
}