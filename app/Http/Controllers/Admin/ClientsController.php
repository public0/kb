<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()
    {
        $this->authorize('viewAdmin', 'AdminClients');

        return view('admin/clients', [
            'clients' => Client::orderBy('name', 'ASC')->get()
        ]);
    }

    public function status($id)
    {
        $this->authorize('viewAdmin', 'AdminClients');

        try {
            $client = Client::where('id', $id);
            $data = $client->first();
            $client->update([
                'status' => 1 - $data->status
            ]);

            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    public function add(Request $request)
    {
        $this->authorize('viewAdmin', 'AdminClients');

        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'name' => 'required|max:255'
            ]);

            try {
                $fields = $request->only([
                    'name',
                    'url',
                    'status'
                ]);
                $client = Client::create($fields);

                return redirect()->route('admin.clients')
                    ->with('message', 'Client added successfully!');
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }
        }

        return view('admin/clients-form', [
            'client' => null
        ]);
    }

    public function edit(Request $request, $id)
    {
        $this->authorize('viewAdmin', 'AdminClients');

        $client = Client::where('id', $id);

        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'name' => 'required|max:255'
            ]);

            try {
                $fields = $request->only([
                    'name',
                    'url',
                    'status'
                ]);
                $client->update($fields);

                return redirect()->route('admin.clients')
                    ->with('message', 'Client updated successfully!');
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }
        }

        return view('admin/clients-form', [
            'client' => $client->first()
        ]);
    }

    public function delete($id)
    {
        $this->authorize('viewAdmin', 'AdminClients');

        try {
            $client = Client::where('id', $id);
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
