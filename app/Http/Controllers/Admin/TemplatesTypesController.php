<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

    public function add(Request $request)
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

    public function edit(Request $request, $id)
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

    public function delete($id)
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

    public function status($id)
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
}
