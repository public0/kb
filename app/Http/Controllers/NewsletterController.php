<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->post(), [
                'email' => 'required|email|max:255|unique:' . Newsletter::class
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator, 'newsletter')
                    ->withInput();
            } else {
                $newsletter = new Newsletter();
                $newsletter->email = $request->post('email');
                $newsletter->status = 1;
                $newsletter->save();

                return redirect()->back()
                    ->with('msg', 'Multumim pentru ca te-ai abonat la newsletterul nostru!');
            }
        }
    }
}
