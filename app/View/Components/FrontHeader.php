<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Support\Facades\App;

class FrontHeader extends Component
{
    public $headerCategories;
    public $languages;
    public $selectedLanguage;

    private function getTree($parentID)
    {
        $result = [];
        $categories = Category::active()
            ->select('id', 'name')
            ->where('parent_id', $parentID)
            ->orderBy('name', 'asc')
            ->get();
        foreach ($categories as $category) {
            $result[$category->id] = [
                'id' => $category->id,
                'name' => $category->name,
                'child' => $this->getTree($category->id)
            ];
        }

        return $result;
    }

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->headerCategories = $this->getTree(0);
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
