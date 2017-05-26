<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    //
    protected $table = 'Cate';

    public function sanpham(){
    	return $this->hasMany('App\Product', 'id_cate', 'id');
    }
}
