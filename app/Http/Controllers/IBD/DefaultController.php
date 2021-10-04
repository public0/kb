<?php

namespace App\Http\Controllers\IBD;

use App\Domain\Config\ConfigRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DefaultController extends Controller
{
    protected $data = [];

    public function __construct(ConfigRepositoryInterface $config)
    {
        parent::__construct();
        $this->data['types'] = $config->getTypes();
        $this->data['typesCount'] = count($this->data['types']);
        $this->data['triggers'] = $config->getTriggers();
        $this->data['triggersCount'] = count($this->data['triggers']);
        $this->data['calculations'] = $config->GetCalculations();
        $this->data['calculationsCount'] = count($this->data['calculations']);
    }

    public function index(ConfigRepositoryInterface $config){
        $this->data['user'] = Auth::user();
        $this->data['calcTypes'] = $config->getCalculationTypes();
        $this->data['params'] = $config->getParameters();
        $this->data['distinctTypes'] = $config->getDistinctCalcTypes();

        return view('ibd/index', $this->data);
    }

    public function triggers(ConfigRepositoryInterface $config){
        $this->data['user'] = Auth::user();
        return view('ibd/triggers', $this->data);
    }

    public function calculations(ConfigRepositoryInterface $config){
        $this->data['user'] = Auth::user();
        $this->data['params'] = $config->getParameters();
        $this->data['calccustomparams'] = $config->getDistinctCalcTypes();
//        dd($this->data['calccustomparams']);

//        $c = $config->GetCalculationInputTypes(6);
//        dd($c);
        return view('ibd/calculations', $this->data);
    }
}
