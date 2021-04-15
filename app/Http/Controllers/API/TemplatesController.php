<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Template;
use App\Models\TemplatePlaceholderGroup;
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
     * @return JSON
     */
    public function getPlaceholders(Request $request, $type_id)
    {
        $placeholders = TemplatePlaceholderGroup::with([
            'placeholders' => function ($query) {
                $query->active()->with('placeholderCountries');
            }
        ])
            ->active()
            ->where('type_id', $type_id)
            ->get();

        return response()->json($placeholders);
    }
}
