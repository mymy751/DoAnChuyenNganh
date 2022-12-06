<?php

namespace App\Respository;

use App\Models\Category;

class CategoryRespository extends BaseRepository
{
    // hàm thực hiện xử lý logic kết nối database
    public $_model;
    public function __construct(Category $modelCategory)
    {
        $this->_model = $modelCategory;
    }
    public function getCategoryById($id_category){
        return $this->_model->find($id_category);
    }
    public function getAllCategory()
    {
        return $this->_model->get();
    }
    /**
     *  Lấy category join với table product
     */
    public function getCategoryJoinProduct()
    {
        return $this->_model->with('products')->get();
    }

    public function createCate(array $form_input){
        return $this->_model->create([
            'nameCategory' => $form_input['nameCategory'],
        ]);
    }

    public function updateCate($form_input, $id){
        return $this->_model->find($id)->update([
            'nameCategory' => $form_input['nameCategory'],
        ]);
    }

    public function deleteCate($id){
        return $this->_model->find($id)->delete();
    }
}
