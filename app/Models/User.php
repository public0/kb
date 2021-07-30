<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'dbo.users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * User roles
     *
     * @var array
     */
    public $roles = [
        0 => 'Guest',
        1 => 'Admin',
        2 => 'Intern',
        3 => 'Extern'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    /**
     * User is role.
     *
     * @param string $role
     * @return bool
     */
    public function isRole($role)
    {
        return strtolower($this->roles[$this->role]) == strtolower(trim($role));
    }

    /**
     * Get user's role name.
     *
     * @return string
     */
    public function getRoleNameAttribute()
    {
        return $this->roles[$this->role];
    }

    /**
     * Get parameters values.
     *
     * @return array
     */
    public function getPermissionsDataAttribute()
    {
        return $this->permissions ? json_decode($this->permissions, true) : [];
    }

    /**
     * User has permission.
     *
     * @param int $moduleID
     * @return bool
     */
    public function hasPermission($moduleID)
    {
        return in_array($moduleID, $this->permissions_data);
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->surname}";
    }

    /**
     * Get status name.
     *
     * @return string
     */
    public function getStatusNameAttribute()
    {
        return $this->status ? __('status.active') : __('status.inactive');
    }

    /**
     * Get users directory path for storage.
     *
     * @return string
     */
    public function getUsersDirectoryAttribute()
    {
        return 'public' . DIRECTORY_SEPARATOR . 'users';
    }

    /**
     * Get user avatar url.
     *
     * @return string
     */
    public function getAvatarAttribute()
    {
        if ($this->image) {
            $path = $this->users_directory . DIRECTORY_SEPARATOR . $this->image;
            if (Storage::exists($path)) {
                return url('storage/users/' . $this->image);
            }
        }

        return null;
    }

    /**
     * Scope a query to only include active users.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where($this->table . '.status', 1);
    }
}
