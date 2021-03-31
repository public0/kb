<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupsUsers extends Model
{
    use HasFactory;

    protected $table = 'dbo.x_groups_users';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'group_id',
        'user_id'
    ];

    public function group()
    {
        return $this->belongsTo(UserGroups::class, 'group_id');
    }
}
