<?php

namespace App\Http\Controllers\Utils;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\Models\User;
use App\Models\Newsletter;
use App\Models\Category;
use App\Models\Utils;
use Illuminate\Http\Request;

class UtilsController extends Controller
{
    public function index(Request $request)
    {
        

        $recent_articles = (new Article)->orderBy('created_at', 'desc')->take(5)->get();

        $where = "";
        $filters = ['client_id' => null];
        if ($request->isMethod('get')) {
            if ($request->filled('client_id')) {
                $filters['client_id'] = $request->input('client_id');
                //$informations->where('client_id', $filters['client_id']);
                $where .=" and ci.client_id=".intval($filters['client_id']);
            }
        }
        
        
        $informations = DB::select('select c.name as client_name, ci2.server_name, ci2.instance_name ,i2.* from (
                select i.client_instances_id, max(i.created_at) created_at from dbo.client_instances ci 
                inner join utils.informations i on i.client_instances_id =ci.id where ci.status =1 '.$where.'
                group by i.client_instances_id ) results
            inner join utils.informations i2 on i2.client_instances_id = results.client_instances_id and i2.created_at =results.created_at
            inner join dbo.client_instances ci2 on ci2.id =i2.client_instances_id 
            inner join dbo.clients c on c.id =ci2.client_id 
            order by c.name asc, ci2.server_name asc');
                                            
        //print_r($filters);
        //$informations = $informations->get();
        //print_r($request);
        //$users->where('status', $filters['status']);
        $data = [
            'recent_articles' => $recent_articles,
            'informations'=>$informations
        ];

        return view('utils/home', $data);
    }
    
    public function history(Request $request)
    {
        $client_instances_id = intval($request->client_instances_id);
        
        $informations = DB::select('select c.name as client_name, ci.server_name, ci.instance_name ,i.* from utils.informations i 
            inner join dbo.client_instances ci on ci.id =i.client_instances_id 
            inner join dbo.clients c on c.id =ci.client_id
            where i.client_instances_id ='.$client_instances_id.' order by i.created_at desc');
       
        $data = [
            'informations'=>$informations
        ];
        
        return view('utils/history', $data);
    }
}
