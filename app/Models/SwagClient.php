<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SwagClient extends Model
{
    use HasFactory;

    protected $table = 'swag.clients';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'document_id',
        'name',
        'url',
        'methods'
    ];

    public function document()
    {
        return $this->belongsTo(SwagDocument::class, 'document_id');
    }
}
