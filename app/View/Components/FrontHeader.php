<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class FrontHeader extends Component
{
    public $headerCategories;
    public $languages;
    public $selectedLanguage;
    public $user = null;
    public $admin = false;

    private function getTree($parentID)
    {
        $result = [];
        $categories = Category::active()->where('parent_id', $parentID)->orderBy('name')->get();
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

        if (Auth::check()) {
            $this->user = Auth::user();
            $groupsArray = $this->user->my_groups;
            $this->admin = $groupsArray && count(array_intersect([1, 6], $groupsArray));
        }
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
