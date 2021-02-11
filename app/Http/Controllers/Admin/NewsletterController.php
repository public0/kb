<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Execption;

class NewsletterController extends Controller
{
    public function index()
    {
        $newsletter = Newsletter::all();

        return view('admin/newsletter', [
            'newsletter' => $newsletter
        ]);
    }

    public function status($id)
    {
        try {
            $newsletter = Newsletter::where('id', $id);
            $data = $newsletter->first();
            $newsletter->update([
                'Status' => 1 - $data->status
            ]);

            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()
                ->with('error', $e->getMessage());
        }
    }

    public function delete($id)
    {
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
