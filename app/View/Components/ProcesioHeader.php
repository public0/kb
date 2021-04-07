<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Language;
use Illuminate\Support\Facades\App;

class ProcesioHeader extends Component
{
    public $languages;
    public $selectedLanguage;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
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
        return view('components.procesio-header');
    }
}
