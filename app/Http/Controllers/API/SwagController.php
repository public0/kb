<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\SwagGroup;
use Illuminate\Http\Request;

class SwagController extends Controller
{
    /**
     * @param Request $request
     * @param int $id Document ID
     * @return JSON
     */
    public function methods(Request $request, $id)
    {
        $result = SwagGroup::with([
            'document',
            'methods' => function ($query) {
                $query->active()
                    ->orderBy('type', 'ASC')
                    ->orderBy('url', 'ASC');
            }
        ])
            ->active()
            ->where('document_id', $id)
            ->orderBy('name', 'ASC')
            ->get();

        return response()->json($result);
    }
}
