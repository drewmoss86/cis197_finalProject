<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;


class ResourceProvider extends Model
{
    protected $table = 'resource_provider';

    //address
    protected $fillable = ['address'];

    //timestamps - must set to false for seeding tables
    public $timestamps = false;

    //1:M one user may be associated with one ResourceProvider user
    public function user() {
      return $this->belongsTo(User::class, 'user_id');
    }

}
