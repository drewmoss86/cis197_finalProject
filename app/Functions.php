<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Resource;
use App\SecondaryFunction;

class Functions extends Model
{
    public $table = 'functions';
    public $timestamps = false;

    protected $primaryKey = 'id';

    public function resource()
    {
      //functions belongs to resource
      return $this->belongsTo(Resource::class, 'func_id');
    }

    public function secondaryFunction()
    {
      //secondary functions
      return $this->belongsTo(SecondaryFunction::class, 'func_id');
    }
}
