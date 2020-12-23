<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Categories;

class Headmen extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $categ;
    public function __construct()
    {
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
        //echo '<pre>' ;print_r($arrayCategory); die();
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
