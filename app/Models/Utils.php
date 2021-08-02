<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Laravel\Scout\Searchable;
use ScoutElastic\Searchable;

class Utils extends Model
{
    use HasFactory;
    
    protected $table = 'utils.informations';
    
    protected $fillable = [
        'client',
        'status',
        'crm_version',
        'title',
        'generate_in_pdf',
        'email_not_sent',
        'db_version',
        'u_online',
        'crons',
        'services',
        'tasks',
        'custom_codes',
        'php_version',
        'yii_version',
        'created_at',
        'client_servers_id'
    ];
}
