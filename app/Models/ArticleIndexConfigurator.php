<?php

namespace App\Models;

use ScoutElastic\IndexConfigurator;
use ScoutElastic\Migratable;

class ArticleIndexConfigurator extends IndexConfigurator
{
    use Migratable;
    protected $name = 'article_ind';

    /**
     * @var array
     */
    protected $settings = [
        //
    ];
}
