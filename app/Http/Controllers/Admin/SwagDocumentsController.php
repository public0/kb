<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SwagDocument;
use App\Models\SwagGroup;
use App\Models\SwagMethod;
use Exception;
use Illuminate\Http\Request;

class SwagDocumentsController extends Controller
{
    private function createSlug($text)
    {
        $result = trim($text);
        $result = str_replace('`', '', $result);
        $result = str_replace('~', '', $result);
        $result = str_replace('!', '', $result);
        $result = str_replace('@', '', $result);
        $result = str_replace('#', '', $result);
        $result = str_replace('$', '', $result);
        $result = str_replace('%', '', $result);
        $result = str_replace('^', '', $result);
        $result = str_replace('&', '', $result);
        $result = str_replace('*', '', $result);
        $result = str_replace('(', '', $result);
        $result = str_replace(')', '', $result);
        $result = str_replace('_', '', $result);
        $result = str_replace('+', '', $result);
        $result = str_replace('=', '', $result);
        $result = str_replace('|', '', $result);
        $result = str_replace('[', '', $result);
        $result = str_replace(']', '', $result);
        $result = str_replace('{', '', $result);
        $result = str_replace('}', '', $result);
        $result = str_replace(',', '', $result);
        $result = str_replace('.', '', $result);
        $result = str_replace('<', '', $result);
        $result = str_replace('>', '', $result);
        $result = str_replace('?', '', $result);
        $result = str_replace('/', '', $result);
        $result = str_replace(';', '', $result);
        $result = str_replace(':', '', $result);
        $result = str_replace('\\', '', $result);
        $result = str_replace('"', '', $result);
        $result = str_replace(' ', '-', $result);
        $result = str_replace('--', '-', $result);

        return strtolower(trim($result));
    }

    public function index()
    {
        return view('admin/swag-documents', [
            'documents' => SwagDocument::all()
        ]);
    }

    public function addDocument(Request $request)
    {
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'name' => 'required|max:255',
                'url' => 'required|max:255',
                'version' => 'required|max:10',
                'version_in_url' => 'required|integer|max:1'
            ]);

            try {
                $fields = $request->only([
                    'name',
                    'url',
                    'version',
                    'version_in_url',
                    'description'
                ]);
                $fields['slug'] = $this->createSlug($fields['name']);
                $doc = SwagDocument::create($fields);

                return redirect()->route('admin.swag.documents')
                    ->with('message', 'Document added successfully!');
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }
        }

        return view('admin/swag-documents-form', [
            'document' => null
        ]);
    }

    public function editDocument(Request $request, $id)
    {
        $document = SwagDocument::where('id', $id);

        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'name' => 'required|max:255',
                'url' => 'required|max:255',
                'version' => 'required|max:10',
                'version_in_url' => 'required|integer|max:1'
            ]);

            try {
                $fields = $request->only([
                    'name',
                    'slug',
                    'url',
                    'version',
                    'version_in_url',
                    'description'
                ]);
                if (empty($fields['slug'])) {
                    $fields['slug'] = $this->createSlug($fields['name']);
                }
                $document->update($fields);

                return redirect()->route('admin.swag.documents')
                    ->with('message', 'Document updated successfully!');
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }
        }

        return view('admin/swag-documents-form', [
            'document' => $document->first()
        ]);
    }

    public function deleteDocument($id)
    {
        try {
            $doc = SwagDocument::where('id', $id);
            $data = $doc->first();
            $doc->delete();

            return redirect()->back()
                ->with('message', 'Document "' . $data->name . '" deleted!');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    public function uploadImage(Request $request)
    {
        $file = $request->file('file');
        if ($file) {
            $name = $file->getClientOriginalName();
            $file->storeAs('public/swagdocs', $name);

            return response()->json([
                'location' => url('storage/swagdocs/' . $name)
            ]);
        }
    }

    public function groups($docid)
    {
        return view('admin/swag-groups', [
            'document' => SwagDocument::where('id', $docid)->first(),
            'groups' => SwagGroup::where('document_id', $docid)->get()
        ]);
    }

    public function addGroup(Request $request, $docid)
    {
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'document_id' => 'required|integer',
                'name' => 'required|max:255',
                'status' => 'required|integer|max:1'
            ]);

            try {
                $fields = $request->only([
                    'document_id',
                    'name',
                    'status'
                ]);
                $meth = SwagGroup::create($fields);

                return redirect()->route('admin.swag.groups', ['docid' => $docid])
                    ->with('message', 'Group added successfully!');
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }
        }

        return view('admin/swag-groups-form', [
            'document' => SwagDocument::where('id', $docid)->first(),
            'group' => null
        ]);
    }

    public function editGroup(Request $request, $docid, $id)
    {
        $group = SwagGroup::where('id', $id);

        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'document_id' => 'required|integer',
                'name' => 'required|max:255',
                'status' => 'required|integer|max:1'
            ]);

            try {
                $fields = $request->only([
                    'document_id',
                    'name',
                    'status'
                ]);
                $group->update($fields);

                return redirect()->route('admin.swag.groups', ['docid' => $docid])
                    ->with('message', 'Group saved successfully!');
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }
        }

        return view('admin/swag-groups-form', [
            'document' => SwagDocument::where('id', $docid)->first(),
            'group' => $group->first()
        ]);
    }

    public function deleteGroup(Request $request)
    {
        try {
            $group = SwagGroup::where('id', $request->id);
            $data = $group->first();
            $group->delete();

            return redirect()->back()
                ->with('message', 'Group "' . $data->name . '" deleted!');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    public function statusGroup(Request $request)
    {
        try {
            $group = SwagGroup::where('id', $request->id);
            $data = $group->first();
            $group->update([
                'status' => 1 - $data->status
            ]);

            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    private $methodTypes = ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'OPTIONS'];
    private $paramsLocations = ['header', 'body', 'query', 'path'];
    private $paramsTypes = ['string', 'integer', 'float', 'double', 'object', 'base64'];

    public function methods($docid, $gid)
    {
        return view('admin/swag-methods', [
            'document' => SwagDocument::where('id', $docid)->first(),
            'group' => SwagGroup::where('id', $gid)->first(),
            'methods' => SwagMethod::where('group_id', $gid)->get()
        ]);
    }

    public function addMethod(Request $request, $docid, $gid)
    {
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'group_id' => 'required|integer',
                'type' => 'required|max:255',
                'url' => 'required|max:255'
            ]);

            try {
                $fields = $request->only([
                    'group_id',
                    'type',
                    'description',
                    'url',
                    'notes',
                    'status',
                    'stage'
                ]);
                $parameters = $request->input('parameters');
                $fields['parameters'] = serialize($parameters);
                $outputSuccess = $request->input('output_success');
                $fields['output_success'] = serialize($outputSuccess);
                $outputError = $request->input('output_error');
                $fields['output_error'] = serialize($outputError);
                $meth = SwagMethod::create($fields);

                return redirect()->route('admin.swag.methods', ['docid' => $docid, 'gid' => $gid])
                    ->with('message', 'Method added successfully!');
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }
        }

        return view('admin/swag-methods-form', [
            'document' => SwagDocument::where('id', $docid)->first(),
            'group' => SwagGroup::where('id', $gid)->first(),
            'types' => $this->methodTypes,
            'stages' => (new SwagMethod)->stages,
            'paramsLocations' => $this->paramsLocations,
            'paramsTypes' => $this->paramsTypes,
            'method' => null
        ]);
    }

    public function editMethod(Request $request, $docid, $gid, $id)
    {
        $method = SwagMethod::where('id', $id);

        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'group_id' => 'required|integer',
                'type' => 'required|max:255',
                'url' => 'required|max:255'
            ]);

            try {
                $fields = $request->only([
                    'group_id',
                    'type',
                    'description',
                    'url',
                    'notes',
                    'status',
                    'stage'
                ]);
                $parameters = $request->input('parameters');
                $fields['parameters'] = serialize($parameters);
                $outputSuccess = $request->input('output_success');
                $fields['output_success'] = serialize($outputSuccess);
                $outputError = $request->input('output_error');
                $fields['output_error'] = serialize($outputError);
                $method->update($fields);

                return redirect()->route('admin.swag.methods', ['docid' => $docid, 'gid' => $gid])
                    ->with('message', 'Method saved successfully!');
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }
        }

        return view('admin/swag-methods-form', [
            'document' => SwagDocument::where('id', $docid)->first(),
            'group' => SwagGroup::where('id', $gid)->first(),
            'types' => $this->methodTypes,
            'stages' => (new SwagMethod)->stages,
            'paramsLocations' => $this->paramsLocations,
            'paramsTypes' => $this->paramsTypes,
            'method' => $method->first()
        ]);
    }

    public function deleteMethod(Request $request)
    {
        try {
            $method = SwagMethod::where('id', $request->id);
            $data = $method->first();
            $method->delete();

            return redirect()->back()
                ->with('message', 'Swag method "' . $data->name . '" deleted!');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    public function statusMethod(Request $request)
    {
        try {
            $method = SwagMethod::where('id', $request->id);
            $data = $method->first();
            $method->update([
                'status' => 1 - $data->status
            ]);

            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    public function moveMethod(Request $request, $docid, $gid, $id)
    {
        $method = SwagMethod::where('id', $id);

        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'group_id' => 'required|integer'
            ]);

            try {
                $fields = $request->only(['group_id']);
                $method->update($fields);

                return redirect()->route('admin.swag.methods', ['docid' => $docid, 'gid' => $fields['group_id']])
                    ->with('message', 'Method moved successfully!');
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }
        }

        return view('admin/swag-methods-move-form', [
            'groups' => SwagGroup::where('document_id', $docid)->get(),
            'document' => SwagDocument::where('id', $docid)->first(),
            'group' => SwagGroup::where('id', $gid)->first(),
            'method' => $method->first()
        ]);
    }
}
