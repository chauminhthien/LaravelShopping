<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'Product';

    public function loai(){
    	return $this->belongsTo('App\Cate','id_cate', 'id');
    }
}
