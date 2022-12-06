<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PDO;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    public $timestamps = false;
    protected $guards = []; // Chỗ này xíu anh giải thích


    // lấy ra danh sách sản phẩm liên quan tới category và product
    // gọi theo cái name này
    public function products()
    {
        // mối quan hệ 1-N trong database
        // Category liên kết tới product dựa vào field id_category và id
        // 1 Category -> N Product
        return $this->hasMany(Product::class, 'id_category', 'id');
    }

    public static function getCate()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT id, nameCategory FROM ' . static::$table);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getProductByCategory($id_category)
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT category.nameCategory , product.* FROM category INNER JOIN product ON product.id_category = category.id WHERE category.id = ' . $id_category);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
