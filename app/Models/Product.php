<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'product';
    protected $guarded  = [];

    //này là hàm cate 1 - n , ở lớp cate có cái id_product với id_category

    public function categories() {
        return $this->hasOne(Category::class,'id','id_category');
    }
}
