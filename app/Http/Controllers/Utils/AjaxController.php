<?php

namespace App\Http\Controllers\Utils;

use App\Domain\Config\ConfigRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function getInformations(
        Request $request,
        ConfigRepositoryInterface $config
        ) {
            $client_instances_id = 10;
            
            $informations = DB::select('select c.name as client_name, ci.server_name, ci.instance_name ,i.* from utils.informations i
            inner join dbo.client_instances ci on ci.id =i.client_instances_id
            inner join dbo.clients c on c.id =ci.client_id
            where i.client_instances_id ='.$client_instances_id.' order by i.created_at desc');
            
           /*  $data = [
                'informations'=>$informations
            ]; */
            
            return response()->json([
                'informations' => $informations,
            ]);
    }


}
