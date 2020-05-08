<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    public function user(){
        return $this->hasMany('App\User','id_user','id_user');
    }
    public function cd(){
        return $this->hasMany('App\Cd','id_cd','id_cd');
    }
}