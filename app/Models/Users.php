<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    public function visitor(){
        return $this->hasOne('App/Models/Visitors', 'id_user', 'id');
    }
}
