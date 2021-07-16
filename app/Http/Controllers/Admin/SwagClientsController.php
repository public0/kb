<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
            'clients' => SwagClient::orderBy('name', 'ASC')->get()
        ]);
    }

    public function add(Request $request)
    {
        $this->authorize('viewPerms', 'AdminSwagClients');

        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'document_id' => 'required|integer',
                'name' => 'required|max:255'
            ]);

            try {
                $fields = $request->only([
                    'document_id',
                    'name',
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
            'documents' => SwagDocument::all()
        ]);
    }

    public function edit(Request $request, $id)
    {
        $this->authorize('viewPerms', 'AdminSwagClients');

        $client = SwagClient::where('id', $id);

        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'document_id' => 'required|integer',
                'name' => 'required|max:255'
            ]);

            try {
                $fields = $request->only([
                    'document_id',
                    'name',
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
            'documents' => SwagDocument::all()
        ]);
    }

    public function delete($id)
    {
        $this->authorize('viewPerms', 'AdminSwagClients');

        try {
            $client = SwagClient::where('id', $id);
            $data = $client->first();
            $client->delete();

            return redirect()->back()
                ->with('message', 'Client "' . $data->name . '" deleted!');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }
}
