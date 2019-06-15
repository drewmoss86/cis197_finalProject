<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Category;

class Incident extends Model
{
    protected $table = 'incident';
    public $timestamps = false;

    protected $primaryKey = 'id';

    public function user()
    {
      return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
      return $this->hasOne(Category::class, 'id');
    }
}
