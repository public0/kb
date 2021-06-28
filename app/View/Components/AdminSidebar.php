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
use App\Models\UserGroups;
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
            'users' => User::count(),
            'users_groups' => UserGroups::count(),
            'articles' => Article::count(),
            'categories' => Category::count(),
            'comments' => Comment::count(),
            'subscribers' => Newsletter::count(),
            'tpl_types' => TemplateType::count(),
            'tpl_placeholders' => TemplatePlaceholderGroup::count(),
            'swag_docs' => SwagDocument::count(),
            'current_user_name' => Auth::user()->full_name
        ];

        return view('components.admin-sidebar', $data);
    }
}
