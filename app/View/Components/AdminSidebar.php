<?php

namespace App\View\Components;

use App\Models\Article;
use App\Models\Category;
use App\Models\Client;
use App\Models\Comment;
use App\Models\Newsletter;
use App\Models\SwagDocument;
use App\Models\TemplatePlaceholderGroup;
use App\Models\TemplateType;
use App\Models\User;
use App\Models\UserAccountRequest;
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
        $authUser = Auth::user();

        $data = [
            'user' => $authUser
        ];
        if ($authUser->hasPermission('AdminUsersAccountRequest')) {
            $data['users_account_request_nr'] = UserAccountRequest::count();
        }
        if ($authUser->hasPermission('AdminUsers')) {
            $usersNr = $authUser->client_id ? User::where('client_id', $authUser->client_id)->count() : User::count();
            $data['users_nr'] = $usersNr;
        }
        if ($authUser->hasPermission('AdminClients')) {
            $data['clients_nr'] = Client::count();
        }
        if ($authUser->hasPermission('AdminKBArticles')) {
            $data['articles_nr'] = Article::count();
        }
        if ($authUser->hasPermission('AdminKBCategories')) {
            $data['categories_nr'] = Category::count();
        }
        if ($authUser->hasPermission('AdminKBComments')) {
            $data['comments_nr'] = Comment::count();
        }
        if ($authUser->hasPermission('AdminNewsletterSubscribers')) {
            $data['subscribers_nr'] =  Newsletter::count();
        }
        if ($authUser->hasPermission('AdminTplTypes')) {
            $data['tpl_types_nr'] =  TemplateType::count();
        }
        if ($authUser->hasPermission('AdminTplPlaceholders')) {
            $data['tpl_placeholders_nr'] =  TemplatePlaceholderGroup::count();
        }
        if ($authUser->hasPermission('AdminSwagDocuments')) {
            $data['swag_docs_nr'] =  SwagDocument::count();
        }

        return view('components.admin-sidebar', $data);
    }
}
