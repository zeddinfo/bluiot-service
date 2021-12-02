<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPosition extends Model
{
    protected $table = 'user_position';
    protected $primaryKey = 'id';

    public function visitors(){
        return $this->hasOne('App\Models\Visitors', 'id', 'id_visitor');
    }
    public function users(){
        return $this->hasOne('App\Models\Users', 'id', 'id_user');
    }
}
