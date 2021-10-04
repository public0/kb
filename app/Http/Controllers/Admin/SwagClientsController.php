<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\SwagClient;
use App\Models\SwagDocument;
use Exception;
use Illuminate\Http\Request;

class SwagClientsController extends Controller
{
    public function index()
    {
        $this->authorize('viewPerms', 'AdminSwagClients');

        return view('admin/swag-clients', [
            'clients' => SwagClient::with('client')->get()
        ]);
    }

    public function add(Request $request)
    {
        $this->authorize('viewPerms', 'AdminSwagClients');

        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'client_id' => 'required|integer',
                'document_id' => 'required|integer'
            ]);

            try {
                $fields = $request->only([
                    'client_id',
                    'document_id',
                    'url'
                ]);
                $methods = $request->input('methods');
                if ($methods) {
                    $fields['methods'] = json_encode(array_keys($methods));
                }
                $client = SwagClient::create($fields);

                return redirect()->route('admin.swag.clients')
                    ->with('message', 'Client added successfully!');
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }
        }

        return view('admin/swag-clients-form', [
            'client' => null,
            'clients' => Client::all(),
            'documents' => SwagDocument::all()
        ]);
    }

    public function edit(Request $request, $id)
    {
        $this->authorize('viewPerms', 'AdminSwagClients');

        $client = SwagClient::where('id', $id);

        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'client_id' => 'required|integer',
                'document_id' => 'required|integer'
            ]);

            try {
                $fields = $request->only([
                    'client_id',
                    'document_id',
                    'url'
                ]);
                $methods = $request->input('methods');
                if ($methods) {
                    $fields['methods'] = json_encode(array_keys($methods));
                }
                $client->update($fields);

                return redirect()->route('admin.swag.clients')
                    ->with('message', 'Client updated successfully!');
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }
        }

        return view('admin/swag-clients-form', [
            'client' => $client->first(),
            'clients' => Client::all(),
            'documents' => SwagDocument::all()
        ]);
    }

    public function delete($id)
    {
        $this->authorize('viewPerms', 'AdminSwagClients');

        try {
            $client = SwagClient::find($id);
            $name = $client->name;
            $client->delete();

            return redirect()->back()
                ->with('message', 'Client "' . $name . '" deleted!');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }
}
