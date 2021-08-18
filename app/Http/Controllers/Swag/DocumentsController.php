<?php

namespace App\Http\Controllers\Swag;

use App\Http\Controllers\Controller;
use App\Models\SwagClient;
use App\Models\SwagDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentsController extends Controller
{
    public function index()
    {
        $this->authorize('viewPerms', 'FrontSwagDocuments');

        $documents = SwagDocument::select();
        $authUser = Auth::user();
        if ($authUser->client_id) {
            $swagDocuments = SwagClient::where('client_id', $authUser->client_id)->pluck('document_id')->toArray();
            $documents = $documents->whereIn('id', $swagDocuments);
        }
        $documents = $documents->get();

        return view('swag.home', compact('documents'));
    }

    public function search(Request $request)
    {
        $this->authorize('viewPerms', 'FrontSwagDocuments');

        $documents = [];
        $q = trim($request->input('q'));
        if ($q && strlen($q) > 2) {
            $documents = SwagDocument::where('name', 'LIKE', $q . '%');
            $authUser = Auth::user();
            if ($authUser->client_id) {
                $swagDocuments = SwagClient::where('client_id', $authUser->client_id)->pluck('document_id')->toArray();
                $documents->whereIn('id', $swagDocuments);
            }
            $documents = $documents->get();
        }

        return view('swag.search', compact('documents'));
    }

    public function document($slug)
    {
        $this->authorize('viewPerms', 'FrontSwagDocuments');

        $clientMethods = [];
        $authUser = Auth::user();
        if ($authUser->client_id) {
            $doc = SwagDocument::where('slug', $slug)->first();
            $client = SwagClient::where('client_id', $authUser->client_id)->where('document_id', $doc->id)->first();
            if (!$client) {
                return redirect()->route('swag.home')
                    ->with('warning', __('Document ":slug" does not exists!', ['slug' => $slug]));
            }
            $clientMethods = array_merge([0], (array)json_decode($client->methods, true));
        }

        $document = SwagDocument::with([
            'groups' => function ($query) use ($clientMethods) {
                $query->active()
                    ->orderBy('name', 'ASC')
                    ->with([
                        'methods' => function ($query) use ($clientMethods) {
                            $query->active()
                                ->orderBy('type', 'ASC')
                                ->orderBy('url', 'ASC');
                            if ($clientMethods) {
                                $query->whereIn('id', $clientMethods);
                            }
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
