<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TemplateSubtype;
use App\Models\TemplateType;
use Exception;
use Illuminate\Http\Request;

class TemplatesTypesController extends Controller
{
    public function index()
    {
        return view('admin/templates-types', [
            'types' => TemplateType::all()
        ]);
    }

    public function addType(Request $request)
    {
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'name' => 'required|max:255',
                'status' => 'required|integer|max:1'
            ]);

            try {
                $type = TemplateType::create($request->only(['name', 'status']));

                return redirect()->route('admin.tpl.types')
                    ->with('message', 'Type added successfully!');
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }
        }

        return view('admin/templates-types-form', [
            'type' => null
        ]);
    }

    public function editType(Request $request, $id)
    {
        $type = TemplateType::where('id', $id);

        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'name' => 'required|max:255',
                'status' => 'required|integer|max:1'
            ]);

            try {
                $type->update($request->only(['name', 'status']));

                return redirect()->route('admin.tpl.types')
                    ->with('message', 'Type updated successfully!');
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }
        }

        return view('admin/templates-types-form', [
            'type' => $type->first()
        ]);
    }

    public function deleteType($id)
    {
        try {
            $type = TemplateType::where('id', $id);
            $data = $type->first();
            $type->delete();

            return redirect()->back()
                ->with('message', 'Template type "' . $data->name . '" deleted!');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    public function statusType($id)
    {
        try {
            $type = TemplateType::where('id', $id);
            $data = $type->first();
            $type->update([
                'status' => 1 - $data->status
            ]);

            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    public function subtypes($tid)
    {
        return view('admin/templates-subtypes', [
            'type' => TemplateType::where('id', $tid)->first(),
            'subtypes' => TemplateSubtype::where('type_id', $tid)->get()
        ]);
    }

    public function addSubtype(Request $request, $tid)
    {
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'name' => 'required|max:255',
                'type_id' => 'required|integer',
                'status' => 'required|integer|max:1'
            ]);

            try {
                $fields = $request->only(['name', 'type_id', 'status']);
                $subtype = TemplateSubtype::create($fields);

                return redirect()->route('admin.tpl.subtypes', ['tid' => $fields['type_id']])
                    ->with('message', 'Subtype added successfully!');
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }
        }

        return view('admin/templates-subtypes-form', [
            'type' => TemplateType::where('id', $tid)->first(),
            'subtype' => null
        ]);
    }

    public function editSubtype(Request $request, $tid, $id)
    {
        $subtype = TemplateSubtype::where('id', $id);

        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'name' => 'required|max:255',
                'type_id' => 'required|integer',
                'status' => 'required|integer|max:1'
            ]);

            try {
                $fields = $request->only(['name', 'type_id', 'status']);
                $subtype->update($fields);

                return redirect()->route('admin.tpl.subtypes', ['tid' => $fields['type_id']])
                    ->with('message', 'Subtype update successfully!');
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }
        }

        return view('admin/templates-subtypes-form', [
            'type' => TemplateType::where('id', $tid)->first(),
            'subtype' => $subtype->first()
        ]);
    }

    public function deleteSubtype($id)
    {
        try {
            $subtype = TemplateSubtype::where('id', $id);
            $data = $subtype->first();
            $subtype->delete();

            return redirect()->back()
                ->with('message', 'Template subtype "' . $data->name . '" deleted!');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    public function statusSubtype($id)
    {
        try {
            $subtype = TemplateSubtype::where('id', $id);
            $data = $subtype->first();
            $subtype->update([
                'status' => 1 - $data->status
            ]);

            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }
}
