<?php

namespace App\View\Components;

use App\MyClasses\ArticleFactoryClass;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class FrontSidebar extends Component
{
    public $new;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $data = [];
        $req = Request::capture();
        if ($req->segment(1) == 'article') {
            $data['exclude_article_id'] = $req->segment(2);
        }
        $this->new = ArticleFactoryClass::getArticleList('new', $data);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.front-sidebar');
    }
}
