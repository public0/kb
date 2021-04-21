<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TemplatePlaceholder;
use App\Models\TemplatePlaceholderCountry;
use App\Models\TemplatePlaceholderGroup;
use App\Models\TemplatePlaceholderGroupSubtype;
use App\Models\TemplateSubtype;
use App\Models\TemplateType;
use Exception;
use Illuminate\Http\Request;

class TemplatePlaceholdersController extends Controller
{
    public function index(Request $request)
    {
        $groups = TemplatePlaceholderGroup::all();
        $filters = ['type' => null];
        if ($request->isMethod('get')) {
            if ($request->filled('type')) {
                $filters['type'] = $request->input('type');
                $groups = TemplatePlaceholderGroup::where('type_id', $filters['type'])->get();
            }
        }

        return view('admin/templates-placeholders-groups', [
            'groups' => $groups,
            'filters' => $filters,
            'types' => TemplateType::active()->get()
        ]);
    }

    public function addGroup(Request $request)
    {
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'name' => 'required|max:255',
                'type_id' => 'required|integer',
                'status' => 'required|integer|max:1'
            ]);

            try {
                $fields = $request->only(['name', 'type_id', 'status']);
                $group = TemplatePlaceholderGroup::create($fields);

                $deletedRows = TemplatePlaceholderGroupSubtype::where('placeholder_group_id', $group->id);
                $deletedRows->delete();
                foreach ($request->input('subtypes_ids', []) as $subtype_id) {
                    TemplatePlaceholderGroupSubtype::create([
                        'placeholder_group_id' => $group->id,
                        'subtype_id' => $subtype_id
                    ]);
                }

                return redirect()->route('admin.tpl.place.group')
                    ->with('message', 'Placeholder group added successfully!');
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }
        }

        return view('admin/templates-placeholders-groups-form', [
            'group' => null,
            'types' => TemplateType::active()->get(),
            'subtypes' => []
        ]);
    }

    public function editGroup(Request $request, $id)
    {
        $group = TemplatePlaceholderGroup::where('id', $id);

        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'name' => 'required|max:255',
                'type_id' => 'required|integer',
                'status' => 'required|integer|max:1'
            ]);

            try {
                $fields = $request->only(['name', 'type_id', 'status']);
                $group->update($fields);

                $deletedRows = TemplatePlaceholderGroupSubtype::where('placeholder_group_id', $id);
                $deletedRows->delete();
                foreach ($request->input('subtypes_ids', []) as $subtype_id) {
                    TemplatePlaceholderGroupSubtype::create([
                        'placeholder_group_id' => $id,
                        'subtype_id' => $subtype_id
                    ]);
                }

                return redirect()->route('admin.tpl.place.group')
                    ->with('message', 'Placeholder group updated successfully!');
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }
        }

        $group = $group->first();
        $subtypes = TemplateSubtype::active()
            ->where('type_id', $group->type_id)
            ->whereHas('placeholderGroups', function ($query) use ($group) {
                $query->where('placeholder_group_id', $group->id);
            })
            ->get();

        return view('admin/templates-placeholders-groups-form', [
            'group' => $group,
            'types' => TemplateType::active()->get(),
            'subtypes' => $subtypes
        ]);
    }

    public function deleteGroup($id)
    {
        try {
            $group = TemplatePlaceholderGroup::where('id', $id);
            $data = $group->first();
            $group->delete();

            return redirect()->back()
                ->with('message', 'Template placeholder group "' . $data->name . '" deleted!');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    public function statusGroup($id)
    {
        try {
            $group = TemplatePlaceholderGroup::where('id', $id);
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

    public function placeholders($gid)
    {
        return view('admin/templates-placeholders', [
            'group' => TemplatePlaceholderGroup::where('id', $gid)->first(),
            'items' => TemplatePlaceholder::where('placeholder_group_id', $gid)->get()
        ]);
    }

    public function addPlaceholder(Request $request, $gid)
    {
        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'name' => 'required|max:255',
                'placeholder_group_id' => 'required|integer',
                'status' => 'required|integer|max:1'
            ]);

            try {
                $fields = $request->only(['name', 'placeholder_group_id', 'description', 'status']);
                $placeholder = TemplatePlaceholder::create($fields);

                $deletedRows = TemplatePlaceholderCountry::where('placeholder_id', $placeholder->id);
                $deletedRows->delete();
                foreach ($request->input('countries', []) as $country) {
                    TemplatePlaceholderCountry::create([
                        'placeholder_id' => $placeholder->id,
                        'country_code' => $country
                    ]);
                }

                return redirect()->route('admin.tpl.places', ['gid' => $fields['placeholder_group_id']])
                    ->with('message', 'Placeholder added successfully!');
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }
        }

        return view('admin/templates-placeholders-form', [
            'group' => TemplatePlaceholderGroup::where('id', $gid)->first(),
            'countries' => TemplatePlaceholderCountry::$countries,
            'placeholder' => null
        ]);
    }

    public function editPlaceholder(Request $request, $gid, $id)
    {
        $placeholder = TemplatePlaceholder::where('id', $id);

        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'name' => 'required|max:255',
                'placeholder_group_id' => 'required|integer',
                'status' => 'required|integer|max:1'
            ]);

            try {
                $fields = $request->only(['name', 'placeholder_group_id', 'description', 'status']);
                $placeholder->update($fields);

                $deletedRows = TemplatePlaceholderCountry::where('placeholder_id', $id);
                $deletedRows->delete();
                foreach ($request->input('countries', []) as $country) {
                    TemplatePlaceholderCountry::create([
                        'placeholder_id' => $id,
                        'country_code' => $country
                    ]);
                }

                return redirect()->route('admin.tpl.places', ['gid' => $fields['placeholder_group_id']])
                    ->with('message', 'Placeholder updated successfully!');
            } catch (Exception $e) {
                return redirect()->back()
                    ->with('error', $e->getMessage());
            }
        }

        return view('admin/templates-placeholders-form', [
            'group' => TemplatePlaceholderGroup::where('id', $gid)->first(),
            'countries' => TemplatePlaceholderCountry::$countries,
            'placeholder' => $placeholder->first()
        ]);
    }

    public function deletePlaceholder($gid, $id)
    {
        try {
            $placeholder = TemplatePlaceholder::where('id', $id);
            $data = $placeholder->first();
            $placeholder->delete();

            return redirect()->back()
                ->with('message', 'Template placeholder "' . $data->name . '" deleted!');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    public function statusPlaceholder($gid, $id)
    {
        try {
            $placeholder = TemplatePlaceholder::where('id', $id);
            $data = $placeholder->first();
            $placeholder->update([
                'status' => 1 - $data->status
            ]);

            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }
}
