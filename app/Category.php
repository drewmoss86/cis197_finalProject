<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Incident;

class Category extends Model
{
    protected $table = 'category';
    public $incrementing = false;
    public $timestamps = false;

    protected $primaryKey = 'id';

    public function incident() {
      return $this->belongsTo(Incident::class, 'cat_id');
    }
}
