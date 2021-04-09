<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    /**
     * @return JSON
     */
    public function list(Request $request)
    {
        $dirFiles = Storage::files('public/articles/files');

        $term = $request->query('term');
        if ($term) {
            $dirFiles = array_filter($dirFiles, function ($var) use ($term) {
                return stripos(basename($var), $term) !== false;
            });
        }

        $files = [];
        foreach ($dirFiles as $file) {
            $name = basename($file);
            $files[] = [
                'name' => $name,
                'path' => '/storage/articles/files/' . $name
            ];
        }

        return response()->json([
            'files' => $files
        ]);
    }
}
