<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

// use Illuminate\Foundation\Auth\Admin as Authenticatable;

class Admin extends Model
{
    //table name
    protected $table = 'admin';

    //primary key
    // protected $primaryKey = 'user_id';

    //email
    protected $email = ['email'];

    //timestamps - must set to false for seeding tables
    public $timestamps = false;

    //1:1 one user may be associated with one Admin user
    public function user() {
      return $this->belongsTo(User::class, 'user_id');
    }
}
