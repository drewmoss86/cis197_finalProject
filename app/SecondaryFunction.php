<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Resource;
use App\Functions;

class SecondaryFunction extends Model
{
    protected $table = 'secondary_functions';
    public $timestamps = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'resource_id', 'func_id'
    ];

    public function resource()
    {
        return $this->hasMany(Resource::class, 'id');
    }

    public function functions()
    {
      return $this->hasMany(Functions::class, 'id');
    }
}
