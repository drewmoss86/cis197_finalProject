<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class CimtUser extends Model
{
    protected $table = 'cimt_user';

    //phone
    protected $phone = 'phone';

    //timestamps - must set to false for seeding tables
    public $timestamps = false;

    //1:1 one user may be associated with one CimtUser user
    public function user() {
      return $this->belongsTo(User::class, 'user_id');
    }

}
