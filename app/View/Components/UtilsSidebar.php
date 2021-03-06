<?php

namespace App\View\Components;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Newsletter;
use App\Models\SwagDocument;
use App\Models\TemplatePlaceholderGroup;
use App\Models\TemplateType;
use App\Models\User;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Utils;
use App\Models\Client;

class UtilsSidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $data = [
            'current_user_name' => Auth::user() ? Auth::user()->full_name: '',
            'clients'=> DB::select('select c.id, c.name, count (cs.id) instances_number from dbo.clients c 
                                    inner join client_instances cs on cs.client_id =c.id group by c.id, c.name order by c.name asc')
        ];

        return view('components.utils-sidebar', $data);
    }
}
