<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'table_category';
    protected $primaryKey = 'id_category';
    public function cd(){
        return $this->belongsTo('App\Cd','id_category','id_category');
    }   
}