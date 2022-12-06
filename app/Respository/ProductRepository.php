<?php

namespace App\Respository;

use App\Models\Product;

class ProductRepository extends BaseRepository
{
    public $_model;
    public function __construct(Product $productModel)
    {
        $this->_model = $productModel;
    }
    //lấy sản phẩm theo id
    // SQL : SELECT * FROM `product` WHERE id = 5;
    public function getProductById($id_product)
    {
        return $this->_model::with('categories')->find($id_product);
    }
    // quản lý lấy tất cả sản phẩm
    public function getProductAdmin()
    {
        return $this->_model->get();
    }
    //này là tạo sản phẩm khi nhấn vào thêm sản phẩm thì nó sẽ ra cái form cho mình input vào
    public function createProduct(array $form_input)
    {
        return $this->_model->create([
            'nameProduct' => $form_input['nameProduct'],
            'pictureProduct' => $form_input['pictureProduct'],
            'price' => $form_input['price'],
            'ram' => $form_input['ram'],
            'cpu' => $form_input['cpu'],
            'vga' => $form_input['vga'],
            'screen' => $form_input['screen'],
            'hardDrive' => $form_input['hardDrive'],
            'weight' => $form_input['weight'],
            'new_price' => $form_input['new_price'],
            'speedcpu' => $form_input['speedcpu'],
            'technolory_sreen' => $form_input['technolory_sreen'],
            'technology_studio' => $form_input['technology_studio'],
            'material' => $form_input['material'],
            'pin' => $form_input['pin'],
            'releasetime' => $form_input['releasetime'],
            'operaSystem' => $form_input['operaSystem'],
            'size' => $form_input['size'],
            'caching' => $form_input['caching'],
            'id_category' => $form_input['id_category'],
            'id_producer' => $form_input['id_producer']
        ]);
    }
    public function updateProduct($form_input, $id)
    {
        return $this->_model->find($id)->update([
            'nameProduct' => $form_input['nameProduct'],
            'pictureProduct' => $form_input['pictureProduct'],
            'price' => $form_input['price'],
            'ram' => $form_input['ram'],
            'cpu' => $form_input['cpu'],
            'vga' => $form_input['vga'],
            'screen' => $form_input['screen'],
            'hardDrive' => $form_input['hardDrive'],
            'weight' => $form_input['weight'],
            'new_price' => $form_input['new_price'],
            'speedcpu' => $form_input['speedcpu'],
            'technolory_sreen' => $form_input['technolory_sreen'],
            'technology_studio' => $form_input['technology_studio'],
            'material' => $form_input['material'],
            'pin' => $form_input['pin'],
            'releasetime' => $form_input['releasetime'],
            'operaSystem' => $form_input['operaSystem'],
            'size' => $form_input['size'],
            'caching' => $form_input['caching'],
            'id_category' => $form_input['id_category'],
            'id_producer' => $form_input['id_producer']
        ]);
    }
    public function deleteProduct($id)
    {
        return $this->_model->find($id)->delete();
    }

    public function search($ten_sp)
    {
        return $this->_model->where('nameProduct', 'LIKE', "%$ten_sp%")->first();
    }
}
