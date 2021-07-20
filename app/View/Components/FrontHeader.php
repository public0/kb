<?php

namespace App\View\Components;

use App\Actions\CategoriesTrait;
use App\Models\Language;
use Illuminate\View\Component;
use Illuminate\Support\Facades\App;

class FrontHeader extends Component
{
    use CategoriesTrait;

    public $headerCategories;
    public $languages;
    public $selectedLanguage;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->headerCategories = $this->getCategoriesTree(0);
        $this->languages = Language::all();
        $this->selectedLanguage = App::currentLocale();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.front-header');
    }
}
