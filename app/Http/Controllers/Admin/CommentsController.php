<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use Execption;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewPerms', 'AdminKBComments');

        $comments = Comment::all();
        $filters = ['article' => null];
        if ($request->isMethod('get')) {
            if ($request->filled('article')) {
                $filters['article'] = $request->input('article');
                $comments = Comment::where('article_id', $filters['article'])->get();
            }
        }

        return view('admin/comments', [
            'comments' => $comments,
            'filters' => $filters,
            'articles' => Article::select('id', 'title')->get()
        ]);
    }

    public function status($id)
    {
        $this->authorize('viewPerms', 'AdminKBComments');

        try {
            $comment = Comment::where('id', $id);
            $data = $comment->first();
            $comment->update([
                'status' => 1 - $data->status
            ]);

            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    public function delete($id)
    {
        $this->authorize('viewPerms', 'AdminKBComments');

        try {
            $comment = Comment::where('id', $id);
            $data = $comment->first();
            $comment->delete();

            return redirect()->back()
                ->with('message', 'Comment from "' . $data->name . '" was deleted!');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }
}
