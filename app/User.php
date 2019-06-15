<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Admin;
use App\CimtUser;
use App\ResourceProvider;
use App\Incident;
use App\Resource;

class User extends Authenticatable
{
    use Notifiable;

    public $table = 'user';

    protected $primaryKey = 'user_id';

    //timestamps - must set to false for seeding tables
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password', 'username', 'user_icon',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    //1:M relationship --> one user can have multiple incidents associated with the user
    // public function incidents() {
    //     return $this->hasMany('App\Incident');
    // }
    public function admin()
    {
        //grabs email column from admin table
        return $this->hasOne(Admin::class, 'user_id')->select('email');

    }

    public function cimtUser()
    {
        //grabs phone column from cimt_user table
        return $this->hasOne(CimtUser::class, 'user_id')->select('phone');

    }

    public function resourceProvider()
    {
        //grabs address column from resource_provider table
        return $this->hasOne(ResourceProvider::class, 'user_id')->select('address');

    }

    public function incidents()
    {
        return $this->hasMany(Incident::class, 'user_id');
    }

    public function resources()
    {
        return $this->hasMany(Resource::class, 'user_id');
    }
}
