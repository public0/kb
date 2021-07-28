<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Execption;

class NewsletterController extends Controller
{
    public function index()
    {
        $this->authorize('viewPerms', 'AdminNewsletterSubscribers');

        $newsletter = Newsletter::all();

        return view('admin/newsletter', [
            'newsletter' => $newsletter
        ]);
    }

    public function status($id)
    {
        $this->authorize('viewPerms', 'AdminNewsletterSubscribers');

        try {
            $newsletter = Newsletter::where('id', $id);
            $data = $newsletter->first();
            $newsletter->update([
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
        $this->authorize('viewPerms', 'AdminNewsletterSubscribers');

        try {
            $newsletter = Newsletter::where('id', $id);
            $data = $newsletter->first();
            $newsletter->delete();

            return redirect()->back()
                ->with('message', 'Email address "' . $data->email . '" deleted!');
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }
}
