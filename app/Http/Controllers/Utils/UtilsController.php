<?php

namespace App\Http\Controllers\Utils;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Article;
use App\Models\User;
use App\Models\Client;
use App\Models\Newsletter;
use App\Models\Category;
use App\Models\Utils;
use Illuminate\Http\Request;

class UtilsController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('viewPerms', 'FrontUtils');
        
        $where = "";
        $client_name="";
        $filters = ['client_id' => null];
        if ($request->isMethod('get')) {
            if ($request->filled('client_id')) {
                $filters['client_id'] = $request->input('client_id');
                $where .=" and ci.client_id=".intval($filters['client_id']);
                $client_name = Client::find(intval($filters['client_id']))->name;
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
            'client_name'=>$client_name,
            'informations'=>$informations
        ];

        return view('utils/home', $data);
    }
    
    public function history(Request $request)
    {
        $this->authorize('viewPerms', 'FrontUtils');
        
        $client_instances_id = intval($request->client_instances_id);
        $filters = ['start_date' => null, 'end_date' => null];
        
        $informations = DB::table('utils.informations')
        ->select('informations.*', 'clients.name as client_name', 'client_instances.server_name', 'client_instances.instance_name')
        ->join('dbo.client_instances', 'client_instances.id', '=', 'informations.client_instances_id')
        ->join('dbo.clients', 'clients.id', '=', 'client_instances.client_id')
        ->where('informations.client_instances_id', '=', $client_instances_id)
        ->orderByDesc('informations.created_at');
        
        
        if ($request->isMethod('get')) {
            if ($request->filled('start_date')) {
                $filters['start_date'] = $request->input('start_date');
                $informations->whereDate('informations.created_at','>=', date('Y-m-d',strtotime($filters['start_date'])).' 00:00:00');
            }
            if ($request->filled('end_date')) {
                $filters['end_date'] = $request->input('end_date');
                $informations->whereDate('informations.created_at','<=', date('Y-m-d',strtotime($filters['end_date'])).' 23:59:59');
            }
        }
        
        $instance_data = DB::selectOne('select c.name as client_name, ci.server_name, ci.instance_name 
                                        from dbo.client_instances ci 
                                        inner join dbo.clients c  on ci.client_id =c.id 
                                        where ci.id= :client_instances_id', ['client_instances_id'=>$client_instances_id]);
      
        return view('utils/history', [
            'client_name'=>$instance_data->client_name,
            'server_name'=>$instance_data->server_name,
            'instance_name'=>$instance_data->instance_name,
            'filters'=>$filters,
            'informations' => $informations->paginate(10)
        ]);
    }
    
    public function legend()
    {
       $this->authorize('viewPerms', 'FrontUtils');
       
       return view('utils/legend'); 
    }
    
    
    /**
     * AJAX
     *
     * @param Request $request
     * @return JSON
     */
    public function ping(Request $request)
    {
        $this->authorize('viewPerms', 'FrontUtils');
        
        if (! isset( $request->url)) {
            die();
        }
        $url =  $request->url;
        if (strncasecmp($url, 'http', 4)) {
            die();
        }
        
        $result = file_get_contents($url);
       
        return response()->json([
            'result' => $result
        ]);
    }
}
