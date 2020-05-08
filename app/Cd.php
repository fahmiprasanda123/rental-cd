<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cd extends Model
{

    protected $table = 'table_cd';
    protected $primaryKey = 'id_cd';
    public function category(){
        return $this->hasMany('App\Category','id_category','id_category');
    }
}