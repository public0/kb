<?php

namespace App\Http\Controllers\Swag;

use App\Http\Controllers\Controller;
use App\Models\SwagDocument;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    public function index()
    {
        $documents = SwagDocument::all();

        return view('swag.home', compact('documents'));
    }

    public function search(Request $request)
    {
        $documents = [];
        $q = trim($request->input('q'));
        if ($q && strlen($q) > 2) {
            $documents = SwagDocument::where('name', 'LIKE', $q . '%')->get();
        }

        return view('swag.search', compact('documents'));
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

        if (!$document) {
            return redirect()->route('swag.home')
                ->with('warning', __('Document ":slug" does not exists!', ['slug' => $slug]));
        }

        return view('swag.document', compact('document'));
    }
}
