<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\ClientInstance;
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

    public function statusClient($id)
    {
        $this->authorize('viewAdmin', 'AdminClients');

        try {
            $client = Client::find($id);
            $client->status = 1 - $client->status;
            $client->save();

            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    public function addClient(Request $request)
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

    public function editClient(Request $request, $id)
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

    public function deleteClient($id)
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

    private function generateApiKey($serverName)
    {
        return hash('sha256', time() . $serverName);
    }

    public function instances($id)
    {
        $this->authorize('viewAdmin', 'AdminClients');

        return view('admin/clients-instances', [
            'client' => Client::where('id', $id)->first(),
            'instances' => ClientInstance::where('client_id', $id)->orderBy('instance_name', 'ASC')->get()
        ]);
    }

    public function statusInstance(Request $request)
    {
        $this->authorize('viewAdmin', 'AdminClients');

        try {
            $instance = ClientInstance::find($request->id);
            $instance->status = 1 - $instance->status;
            $instance->save();

            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    public function addInstance(Request $request, $cid)
    {
        $this->authorize('viewAdmin', 'AdminClients');

        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'client_id' => 'required|integer',
                'instance_name' => 'required|max:255',
                'server_name' => 'required|max:255',
                'status' => 'required|integer|max:1'
            ]);

            try {
                $fields = $request->only([
                    'client_id',
                    'instance_name',
                    'server_name',
                    'ip',
                    'status'
                ]);
                $fields['api_key'] = $this->generateApiKey($fields['server_name']);
                $instance = ClientInstance::create($fields);

                return redirect()->route('admin.clients.instances', ['cid' => $cid])
                    ->with('message', 'Instance added successfully!');
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }
        }

        return view('admin/clients-instances-form', [
            'client' => Client::where('id', $cid)->first(),
            'instance' => null
        ]);
    }

    public function editInstance(Request $request, $cid, $id)
    {
        $this->authorize('viewAdmin', 'AdminClients');

        $instance = ClientInstance::where('id', $id);

        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'client_id' => 'required|integer',
                'instance_name' => 'required|max:255',
                'server_name' => 'required|max:255',
                'status' => 'required|integer|max:1'
            ]);

            try {
                $fields = $request->only([
                    'client_id',
                    'instance_name',
                    'server_name',
                    'ip',
                    'status'
                ]);
                $instance->update($fields);

                return redirect()->route('admin.clients.instances', ['cid' => $cid])
                    ->with('message', 'Instance saved successfully!');
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }
        }

        return view('admin/clients-instances-form', [
            'client' => Client::where('id', $cid)->first(),
            'instance' => $instance->first()
        ]);
    }

    public function deleteInstance(Request $request)
    {
        $this->authorize('viewAdmin', 'AdminClients');

        try {
            $instance = ClientInstance::find($request->id);
            $name = $instance->instance_name;
            $instance->delete();

            return redirect()->back()
                ->with('message', 'Instance "' . $name . '" deleted!');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    public function updateApiKeyInstance(Request $request, $id)
    {
        $this->authorize('viewAdmin', 'AdminClients');

        if ($request->isMethod('post')) {
            $instance = ClientInstance::find($id);
            if ($instance) {
                $apiKey = $this->generateApiKey($instance->server_name);
                $instance->api_key = $apiKey;
                $instance->save();

                echo $apiKey;
            }
        }
    }
}
