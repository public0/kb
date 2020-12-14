<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\Models\Newsletter;
use App\MyClasses\ArticleFactoryClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    public function index(Request $request){
        if(!empty($_POST)){
            $validator = Validator::make($request->post(), [
                'Email' => 'required|unique:Newsletter|email|max:100',
            ]);

            if ($validator->fails()) {

                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            } else {

                $coment = new Newsletter();
                $coment->Email = $request->post('Email');
                $coment->Status = 1;
                $coment->save();
                return Redirect::back()->with('msg','Operation Successful !');

            }
        }

    }
}




