<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;
use App\MyClasses\UtileClass;
use Illuminate\Support\Facades\Auth;

class Headmen extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $categ;
    public $lang;
    public $selLg;
    public $user;
    public $admin;
    public function __construct()
    {
        $this->admin = false;
        $arrayCategory = [];
        $arrayPrimarykeys = [];
        $catego = Categories::where('Status', 1)->orderBy('Name')->get();
        if(!empty($catego)){
            foreach($catego as $ctg){
                if($ctg['Parent_id'] == 0) {
                    $arrayCategory[$ctg['Id']]['name'] = $ctg['Name'];
                    $arrayPrimarykeys[] = $ctg['Id'];
                }
            }
            foreach($catego as $ctg){
                if($ctg['Parent_id'] != 0 && in_array($ctg['Parent_id'], $arrayPrimarykeys)){
                    $arrayCategory[$ctg['Parent_id']]['child'][] = ['id'=>$ctg['Id'],'name'=>$ctg['Name']];
                }
            }
        }
        $this->categ = $arrayCategory;
        $this->lang = DB::table('language')->get();

        $this->selLg = UtileClass::getLang();
        //echo '<pre>' ;print_r($this->lang); die();

        if(Auth::check()) {
            $this->user = Auth::user();


            $groupsArray = UtileClass::getUserGroups();
            if(!empty($groupsArray) && (in_array(1, $groupsArray) || in_array(6, $groupsArray) )){
                $this->admin = true;
            }


        } else {
            $this->user = null;
        }




    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.headmen');
    }
}
