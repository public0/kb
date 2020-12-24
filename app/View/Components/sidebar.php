<?php

namespace App\View\Components;

use App\MyClasses\ArticleFactoryClass;
use Illuminate\View\Component;

class sidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $new, $last;
    public function __construct()
    {
        $this->last = null;
        $this->new = ArticleFactoryClass::getArticleList('new');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.sidebar');
    }
}
