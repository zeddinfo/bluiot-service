<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPosition extends Model
{
    protected $table = 'user_position';

    public function user(){
        return $this->hasOne('App/Models/Visitors', 'id', 'id_user');
    }
}
