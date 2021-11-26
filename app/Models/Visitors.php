<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitors extends Model
{
    protected $table = 'visitors';

    public function position(){
        return $this->hasOne('App/Models/USerPosition', 'id_user', 'id');
    }
}
