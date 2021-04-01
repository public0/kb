<?php

namespace App\View\Components;

use App\MyClasses\ArticleFactoryClass;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class FrontSidebar extends Component
{
    public $newArticles;
    public $newsletterBox = false;
    public $rightColumnArticles;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $data = [];
        $req = Request::capture();
        if (!$req->segment(0) && !$req->segment(1)) {
            $this->newsletterBox = true;
        }
        if ($req->segment(1) == 'article') {
            $data['exclude_article_id'] = $req->segment(2);
        }
        $this->newArticles = ArticleFactoryClass::getArticleList('new', $data);
        $this->rightColumnArticles = ArticleFactoryClass::getArticleList('right_col');
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
