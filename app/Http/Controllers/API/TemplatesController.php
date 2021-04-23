<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Template;
use App\Models\TemplatePlaceholderGroup;
use App\Models\TemplateSubtype;
use Illuminate\Http\Request;

class TemplatesController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!config('app.debug')) {
            // Check client domain
        }
    }

    /**
     * @param Request $request
     * @return JSON
     */
    public function open(Request $request)
    {
        $fields = $request->all();
        $uid = $fields['uid'] ?? null;

        $tpl = Template::where('uid', $uid);
        if ($tpl->first()) {
            $tpl->update($fields);
        } else {
            $tpl->create($fields);
        }

        return response()->json([
            'uid' => $uid,
            'url' => route('tpl.open', ['uid' => $uid])
        ]);
    }

    /**
     * @param Request $request
     * @param int $type_id Template type ID
     * @param int|null $subtype_id Template subtype ID
     * @return JSON
     */
    public function getPlaceholders(Request $request, $type_id, $subtype_id = null)
    {
        $countryCode = $request->query('country_code');

        if ($subtype_id) {
            $placeholdersGroupsWithoutSubtypes = TemplatePlaceholderGroup::with([
                'placeholders' => function ($query) use ($countryCode) {
                    if ($countryCode) {
                        $query->whereHas('placeholderCountries', function ($query) use ($countryCode) {
                            $query->where('country_code', $countryCode);
                        });
                    } else {
                        $query->with('placeholderCountries');
                    }
                    $query->active()->orderBy('id', 'ASC');
                }
            ])
                ->active()
                ->where('type_id', $type_id)
                ->whereDoesntHave('subtypes')
                ->get();

            $placeholdersGroupsWithSubtypes = TemplatePlaceholderGroup::with([
                'placeholders' => function ($query) use ($countryCode) {
                    if ($countryCode) {
                        $query->whereHas('placeholderCountries', function ($query) use ($countryCode) {
                            $query->where('country_code', $countryCode);
                        });
                    } else {
                        $query->with('placeholderCountries');
                    }
                    $query->active()->orderBy('id', 'ASC');
                }
            ])
                ->active()
                ->where('type_id', $type_id)
                ->whereHas('subtypes', function ($query) use ($subtype_id) {
                    $query->where('subtype_id', $subtype_id);
                })
                ->get();

            $placeholdersGroups = $placeholdersGroupsWithoutSubtypes->merge($placeholdersGroupsWithSubtypes)
                ->sortBy('id');
        } else {
            $placeholdersGroups = TemplatePlaceholderGroup::with([
                'placeholders' => function ($query) use ($countryCode) {
                    if ($countryCode) {
                        $query->whereHas('placeholderCountries', function ($query) use ($countryCode) {
                            $query->where('country_code', $countryCode);
                        });
                    } else {
                        $query->with('placeholderCountries');
                    }
                    $query->active()->orderBy('id', 'ASC');
                }
            ])
                ->active()
                ->where('type_id', $type_id)
                ->orderBy('id', 'ASC')
                ->get();
        }

        return response()->json($placeholdersGroups);
    }

    public function getSubtypes(Request $request, $type_id = null)
    {
        $subtypes = TemplateSubtype::active();
        if ($type_id) {
            $subtypes->where('type_id', $type_id);
        }

        $select = $request->query('select');
        if ($select) {
            $subtypes->select(array_map('trim', explode(',', $select)));
        }

        $term = $request->query('term');
        if ($term) {
            $subtypes->whereRaw("[name] LIKE '%{$term}%'");
        }

        return response()->json([
            'subtypes' => $subtypes->get()
        ]);
    }
}
