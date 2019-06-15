<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Functions;
use App\SecondaryFunction;
use App\User;

class Resource extends Model
{
    public $table = 'resource';
    public $timestamps = false;

    protected $primaryKey ='id';

    public function functions()
    {
      return $this->hasOne(Functions::class, 'id');
    }

    public function secondaryFunction()
    {
      return $this->hasMany(SecondaryFunction::class, 'resource_id');
    }

    public function user()
    {
      return $this->belongsTo(User::class, 'user_id');
    }

    public function unit()
    {
      return $this->hasOne(Unit::class, 'id');
    }
}
