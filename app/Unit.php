<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    //
    public $table = 'unit';
    public $primaryKey = 'id';
    public $timestamps = 'false';

    public function resource()
    {
      //functions belongs to resource
      return $this->belongsTo(Resource::class, 'unit_id');
    }

}
