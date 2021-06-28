<?php

namespace App\Http\Controllers\Swag;

use App\Http\Controllers\Controller;
use App\Models\SwagDocument;

class DocumentsController extends Controller
{
    public function index()
    {
        $documents = SwagDocument::all();

        return view('swag.home', compact('documents'));
    }

    public function document($slug)
    {
        $document = SwagDocument::with([
            'groups' => function ($query) {
                $query->active()
                    ->orderBy('name', 'ASC')
                    ->with([
                        'methods' => function ($query) {
                            $query->active()
                                ->orderBy('type', 'ASC')
                                ->orderBy('url', 'ASC');
                        }
                    ]);
            }
        ])
            ->where('slug', $slug)
            ->first();

        return view('swag.document', compact('document'));
    }
}
