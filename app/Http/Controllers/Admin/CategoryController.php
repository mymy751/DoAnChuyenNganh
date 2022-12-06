<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Respository\CategoryRespository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public $_cateRepo;

    public function __construct(CategoryRespository $cateRepo){
        $this->_cateRepo = $cateRepo;
    }
    public function index(){
        $category = $this->_cateRepo->getAllCategory();
        return view('admin.pages.categogy.index', compact('category'));
    }
    public function cateCreate(){
        return view('admin.pages.categogy.create');
    }

    public function cateCreatePost(Request $request){
        $validator = Validator::make ($request->all(), [
            'nameCategory' => ['required']
        ], [
            'nameCategory' => 'Vui lòng nhập tên danh mục'
        ]);
        if($validator->fails()){
            return redirect()->back()->withInput()->with([
                'messages' => $validator->errors()->first(),
                'type' => 'alert-danger'
            ]);
        }
        $input_cate = $request->all();
        $category = $this->_cateRepo->createCate($input_cate);
        if($category){
            return redirect()->back()->with([
                'messages' => 'Tạo danh mục thành công',
                'type' => 'alert-success'
            ]);
        }
    }

    public function cateUpdate(Request $request , $id)
    {
        $category = $this->_cateRepo->getCategoryById($id);
        return view('admin.pages.categogy.update', compact('category'));
    }

    public function cateUpdatePost(Request $request, $id){
        $validator = Validator::make ($request->all(),
        [
            'nameCategory' => ['required']

        ],
    [
        'nameCategory.required' => 'Vui lòng nhập tên danh mục'

    ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->with([ //withInput này là để dữ liệu lúc nhập ko bị mất đi
                'messages' => $validator->errors()->first(),
                'type' => 'alert-danger'
            ]);
        }

        $input_cate = $request->all();
        $cate = $this->_cateRepo->updateCate($input_cate, $id);
        if($cate){
            return redirect()->back()->with([
                'messages' => 'Chỉnh sửa danh mục thành công',
                'type' => 'alert-success'
            ]);
        }
    }

    public function cateDelete ($id){
        $data = $this->_cateRepo->getCategoryById($id);
        if(!$data){
            return redirect()->back()->with([
                'messages'=>'Không tìm thấy danh mục ngày',
                'type' => 'alert-danger'
            ]);
        }
        $delete = $this->_cateRepo->deleteCate($id);
        return redirect()->back()->with([
            'messages' => 'Xóa thành công danh mục',
            'type' =>'alert-success'
        ]);
    }

}
