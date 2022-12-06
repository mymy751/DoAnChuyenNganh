<?php

namespace App\Respository;

use App\Models\User;

class UserRepository extends BaseRepository
{
    public $_model;
    public function __construct(User $userModel)
    {
        $this->_model = $userModel;
    }
    public function getUserByID($id_user){
        return $this-> _model->find($id_user);
    }
    public function getUserAdmin()
    {
        return $this->_model->get();
    }

    // tạo người dùng khi nhấn vào thêm người dùng sẽ hiển thị ra cho mình nhập vào
    public function createUser(array $form_input){
        return $this->_model->create([
            'name' => $form_input['userName'],
            'email' => $form_input['userEmail'],
            'password' => bcrypt($form_input['userPass'])
        ]);
    }
    public function updateUser($form_input, $id){
        return $this->_model->find($id)->update([
            'name' => $form_input['userName'],
            'email' => $form_input['userEmail'],
            'password' => bcrypt($form_input['userPass'])
        ]);
    }
    public function deleteUser ($id){
        return $this->_model->find($id)->delete();
    }
}
