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

class AdminSidebar extends Component
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
            'users_nr' => User::count(),
            'articles_nr' => Article::count(),
            'categories_nr' => Category::count(),
            'comments_nr' => Comment::count(),
            'subscribers_nr' => Newsletter::count(),
            'tpl_types_nr' => TemplateType::count(),
            'tpl_placeholders_nr' => TemplatePlaceholderGroup::count(),
            'swag_docs_nr' => SwagDocument::count(),
            'user' => Auth::user()
        ];

        return view('components.admin-sidebar', $data);
    }
}
