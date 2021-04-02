<?php

namespace App\Http\Controllers\IBD;

use App\Domain\Config\ConfigRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller
{
    public function index(ConfigRepositoryInterface $config){
        $data = [];
        $data['user'] = Auth::user();
        $data['types'] = $config->getTypes();
        $data['typesCount'] = count($data['types']);
        $data['triggers'] = $config->getTriggers();
        $data['triggersCount'] = count($data['triggers']);
        $data['params'] = $config->getParameters();
        $data['distinctTypes'] = $config->getDistinctCalcTypes();

        return view('ibd/index', $data);
    }

    public function triggers(ConfigRepositoryInterface $config){
        $data = [];
        $data['calculations'] = $config->GetCalculations();
        $data['user'] = Auth::user();
        $data['types'] = $config->getTypes();//dd($data['types']);
//        dd($data['types']);
        $data['typesCount'] = count($data['types']);
        $data['triggers'] = $config->getTriggers();
//        dd($data['triggers']);
        $data['triggersCount'] = count($data['triggers']);
        return view('ibd/triggers', $data);
    }
}
