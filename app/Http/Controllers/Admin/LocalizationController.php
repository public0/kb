<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use App\Models\Localization;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class LocalizationController extends Controller
{
    public function index()
    {
        $localizations = Localization::all();
        $fields = Localization::tableFields();

        return view('admin/localization', compact('localizations', 'fields'));
    }

    public function generate(Request $request)
    {
        $languages = Language::all();

        if ($request->isMethod('post')) {
            $from = $request->input('from');
            $to = $request->input('to');
            $fields = Localization::tableFields();

            if (in_array($from, $fields) && in_array($to, $fields) && $from != $to) {
                Artisan::call('localization:generate', compact('from', 'to'));

                return redirect()->route('admin.localization')
                    ->with('message', trim(Artisan::output()));
            }
        }

        return view('admin/localization-generate', compact('languages'));
    }

    public function add(Request $request)
    {
        $localization = new Localization();
        $fields = Localization::tableFields();

        if ($request->isMethod('post')) {
            $validationFields = [];
            foreach ($fields as $field) {
                $validationFields[$field] = 'unique:' . Localization::class;
            }
            if ($validationFields) {
                $validated = $request->validate($validationFields);
            }

            try {
                $data = $request->all();
                foreach ($fields as $field) {
                    $localization->{$field} = $data[$field];
                }
                $localization->save();

                return redirect()->route('admin.localization')
                    ->with('message', 'Localization added successfully!');
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }
        }

        return view('admin/localization-form', [
            'localization' => null,
            'fields' => $fields
        ]);
    }

    public function edit(Request $request, $id)
    {
        $localization = Localization::where('id', $id);
        $fields = Localization::tableFields();

        if ($request->isMethod('post')) {
            $loc = $localization->first();
            $data = $request->only($fields);

            $validationFields = [];
            foreach ($fields as $field) {
                if (strtolower($loc->{$field}) != strtolower($data[$field])) {
                    $validationFields[$field] = 'unique:' . Localization::class;
                }
            }
            if ($validationFields) {
                $validated = $request->validate($validationFields);
            }

            try {
                $localization->update($data);

                return redirect()->route('admin.localization')
                    ->with('message', 'Localization updated successfully!');
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }
        }

        return view('admin/localization-form', [
            'localization' => $localization->first(),
            'fields' => $fields
        ]);
    }

    public function delete($id)
    {
        try {
            $localization = Localization::where('id', $id);
            $localization->delete();

            return redirect()->back()
                ->with('message', 'Localization was deleted!');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }
}
