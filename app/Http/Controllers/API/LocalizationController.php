<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Localization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LocalizationController extends Controller
{
    /**
     * @return JSON
     */
    public function translation(Request $request)
    {
        $term = $request->query('term');
        $term = urldecode($term);
        $result = null;
        if ($term) {
            $fields = Localization::tableFields();
            $table = Localization::select('*');
            foreach ($fields as $k => $field) {
                if ($k) {
                    $table->orWhere($field, $term);
                } else {
                    $table->where($field, $term);
                }
            }
            $result = $table->first();
        }

        return response()->json($result);
    }
}
