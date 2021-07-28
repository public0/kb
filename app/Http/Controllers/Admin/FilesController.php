<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    private $filesDirectory = 'public/articles/files';

    public function index()
    {
        $this->authorize('viewPerms', 'AdminKBFiles');

        $files = [];
        $dirFiles = Storage::files($this->filesDirectory);
        foreach ($dirFiles as $file) {
            $info = pathinfo($file);
            $files[] = (object)[
                'basename' => $info['basename'],
                'filename' => $info['filename'],
                'extension' => $info['extension'],
                'url' => url('storage/articles/files/' . $info['basename'])
            ];
        }

        return view('admin.files', compact('files'));
    }

    public function add(Request $request)
    {
        $this->authorize('viewPerms', 'AdminKBFiles');

        if ($request->isMethod('post')) {
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $file->storeAs($this->filesDirectory, $name);

            return redirect('/admin/files')->with('message', 'File "' . $name . '" added!');
        }

        return view('admin.files-add');
    }

    public function delete($file)
    {
        $this->authorize('viewPerms', 'AdminKBFiles');

        $file = base64_decode($file);

        Storage::delete($this->filesDirectory . '/' . $file);

        return redirect()->back()
            ->with('message', 'File "' . $file . '" was deleted!');
    }

    /**
     * AJAX
     *
     * @param Request $request
     * @return JSON
     */
    public function ajaxList(Request $request)
    {
        $this->authorize('viewPerms', 'AdminKBFiles');

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
