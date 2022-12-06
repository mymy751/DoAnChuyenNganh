<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Respository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public $_userRepo;
    //public $_usercreateRepo;

    public function __construct(UserRepository $userRepo){
        $this->_userRepo = $userRepo;
    }
    public function index(){
        $users = $this->_userRepo->getUserAdmin();
        return view('admin.pages.user.index', compact('users'));
    }

    public function userCreate(){
        return view('admin.pages.user.create');
    }

    public function userCreatePost(Request $request){
        $validator = Validator::make ($request->all(),
        [
            'userName' => ['required'],
            'userEmail' => ['required'],
            'userPass' => ['required']
        ]);

        if($validator->fails()){
            return redirect()->back()->withInput()-with([ //withInput này là để dữ liệu lúc nhập ko bị mất đi
                'messages' => $validator->errors()->first(),
                'type' => 'alert-danger'
            ]);
        }
        $input_user = $request->all();
        $user = $this->_userRepo->createUser($input_user);
        if($user){
            return redirect()->back()->with([
                'messages' => 'Tạo người dùng thành công',
                'type' => 'alert-success'
            ]);
        }

    }
    public function userUpdate(Request $request, $id)
    {
        $user = $this->_userRepo->getUserByID($id);
        return view('admin.pages.user.update', compact('user'));
    }

    public function userUpdatePost(Request $request, $id){
        $validator = Validator::make ($request->all(),
        [
            'userName' => ['required'],
            'userEmail' => ['required'],
            'userPass' => ['required']
        ],
    [
        'userName.required' => 'Vui lòng nhập tên người dùng',
        'userEmail.required' => 'Vui lòng nhập email',
        'userPass.required' => 'Vui lòng nhập pass'
    ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->with([ //withInput này là để dữ liệu lúc nhập ko bị mất đi
                'messages' => $validator->errors()->first(),
                'type' => 'alert-danger'
            ]);
        }

        $input_user = $request->all();
        $user = $this->_userRepo->updateUser($input_user, $id);
        if($user){
            return redirect()->back()->with([
                'messages' => 'Chỉnh sửa người dùng thành công',
                'type' => 'alert-success'
            ]);
        }
    }

    public function userDelete ($id){
        $data = $this->_userRepo->getUserByID($id);
        if(!$data){
            return redirect()->back()->with([
                'messages'=>'Không tìm thấy người ngày',
                'type' => 'alert-danger'
            ]);
        }
        $delete = $this->_userRepo->deleteUser($id);
        return redirect()->back()->with([
            'messages' => 'Xóa thành công người dùng',
            'type' =>'alert-success'
        ]);
    }
}
