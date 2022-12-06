<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Respository\CategoryRespository;
use App\Respository\ProducerRepository;
use App\Respository\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public $_productRepo;
    public $_producerRepo;
    public $_cateRepo;
    public function __construct(ProductRepository $productRepo, ProducerRepository $producerRepo, CategoryRespository $cateRepo)
    {
        $this->_productRepo = $productRepo;
        $this->_producerRepo = $producerRepo;
        $this->_cateRepo = $cateRepo;
    }

    public function index()
    {
        $products = $this->_productRepo->getProductAdmin();
        return view('admin.pages.product.index', compact('products'));
    }

    public function productCreate()
    {
        $producers = $this->_producerRepo->getAllProducer();
        $categories = $this->_cateRepo->getAllCategory();
        return view('admin.pages.product.create', compact('producers', 'categories'));
    }

    public function productCreatePost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nameProduct' => ['required'],
            'pictureProduct' => ['required'],
            'id_producer' => ['required'],
            'id_category' => ['required'],
            'price' => ['required'],
            'ram' => ['required'],
            'cpu' => ['required'],
            'vga' => ['required'],
            'screen' => ['required'],
            'hardDrive' => ['required'],
            'weight' => ['required'],
            'status' => ['required'],
            'new_price' => ['required'],
            'speedcpu' => ['required'],
            'technolory_sreen' => ['required'],
            'technology_studio' => ['required'],
            'material' => ['required'],
            'pin' => ['required'],
            'releasetime' => ['required'],
            'operaSystem' => ['required'],
            'size' => ['required'],
            'caching' => ['required']
        ], [
            'nameProduct.required' => 'Vui lòng nhập tên sản phẩm',
            'pictureProduct.required' => 'Vui lòng nhập hình ảnh sản phẩm',
            'id_producer.required' => 'Vui lòng nhập loại sản phẩm',
            'id_category.required' => 'Vui lòng nhập danh mục sản phẩm',
            'price.required' => 'Vui lòng nhập giá sản phẩm',
            'ram.required' => 'Vui lòng nhập ram sản phẩm',
            'cpu.required' => 'Vui lòng nhập cpu sản phẩm',
            'vga.required' => 'Vui lòng nhập vga sản phẩm',
            'screen.required' => 'Vui lòng nhập màn hình sản phẩm',
            'hardDrive.required' => 'Vui lòng nhập hardDrive sản phẩm',
            'weight.required' => 'Vui lòng nhập weight sản phẩm',
            'status.required' => 'Vui lòng nhập status sản phẩm',
            'new_price.required' => 'Vui lòng nhập new_price sản phẩm',
            'speedcpu.required' => 'Vui lòng nhập speedcpu sản phẩm',
            'technolory_sreen.required' => 'Vui lòng nhập technolory_sreen sản phẩm',
            'technology_studio.required' => 'Vui lòng nhập technology_studio sản phẩm',
            'material.required' => 'Vui lòng nhập material sản phẩm',
            'pin.required' => 'Vui lòng nhập pin sản phẩm',
            'releasetime.required' => 'Vui lòng nhập releasetime sản phẩm',
            'operaSystem.required' => 'Vui lòng nhập operaSystem sản phẩm',
            'size.required' => 'Vui lòng nhập size sản phẩm',
            'caching.required' => 'Vui lòng nhập caching sản phẩm',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with([   //ưithinput là cái mà giữ lại dữ liệu cũ
                'messages' => $validator->errors()->first(),
                'type' => 'alert-danger'
            ]);
        }
        $file_upload = $request->file('pictureProduct')->store('images', 'public');
        $input_product = $request->all(); // mảng
        $input_product['pictureProduct'] = $file_upload;
        $product = $this->_productRepo->createProduct($input_product);
        if ($product) {
            return redirect()->back()->with([
                'messages' => 'Tạo sản phẩm thành công',
                'type' => 'alert-success'
            ]);
        }
    }

    public function productUpdate(Request $request , $id)
    {
        $product = $this->_productRepo->getProductById($id);
        $producers = $this->_producerRepo->getAllProducer();
        $categories = $this->_cateRepo->getAllCategory();
        return view('admin.pages.product.update', compact('producers', 'categories', 'product'));
    }

    public function productUpdatePost(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nameProduct' => ['required'],
            'pictureProduct' => ['required'],
            'id_producer' => ['required'],
            'id_category' => ['required'],
            'price' => ['required'],
            'ram' => ['required'],
            'cpu' => ['required'],
            'vga' => ['required'],
            'screen' => ['required'],
            'hardDrive' => ['required'],
            'weight' => ['required'],
            'status' => ['required'],
            'new_price' => ['required'],
            'speedcpu' => ['required'],
            'technolory_sreen' => ['required'],
            'technology_studio' => ['required'],
            'material' => ['required'],
            'pin' => ['required'],
            'releasetime' => ['required'],
            'operaSystem' => ['required'],
            'size' => ['required'],
            'caching' => ['required']
        ], [
            'nameProduct.required' => 'Vui lòng nhập tên sản phẩm',
            'pictureProduct.required' => 'Vui lòng nhập hình ảnh sản phẩm',
            'id_producer.required' => 'Vui lòng nhập loại sản phẩm',
            'id_category.required' => 'Vui lòng nhập danh mục sản phẩm',
            'price.required' => 'Vui lòng nhập giá sản phẩm',
            'ram.required' => 'Vui lòng nhập ram sản phẩm',
            'cpu.required' => 'Vui lòng nhập cpu sản phẩm',
            'vga.required' => 'Vui lòng nhập vga sản phẩm',
            'screen.required' => 'Vui lòng nhập màn hình sản phẩm',
            'hardDrive.required' => 'Vui lòng nhập hardDrive sản phẩm',
            'weight.required' => 'Vui lòng nhập weight sản phẩm',
            'status.required' => 'Vui lòng nhập status sản phẩm',
            'new_price.required' => 'Vui lòng nhập new_price sản phẩm',
            'speedcpu.required' => 'Vui lòng nhập speedcpu sản phẩm',
            'technolory_sreen.required' => 'Vui lòng nhập technolory_sreen sản phẩm',
            'technology_studio.required' => 'Vui lòng nhập technology_studio sản phẩm',
            'material.required' => 'Vui lòng nhập material sản phẩm',
            'pin.required' => 'Vui lòng nhập pin sản phẩm',
            'releasetime.required' => 'Vui lòng nhập releasetime sản phẩm',
            'operaSystem.required' => 'Vui lòng nhập operaSystem sản phẩm',
            'size.required' => 'Vui lòng nhập size sản phẩm',
            'caching.required' => 'Vui lòng nhập caching sản phẩm',


        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with([   //ưithinput là cái mà giữ lại dữ liệu cũ
                'messages' => $validator->errors()->first(),
                'type' => 'alert-danger'
            ]);
        }
        $file_upload = $request->file('pictureProduct')->store('images', 'public');
        $input_product = $request->all(); // mảng
        $input_product['pictureProduct'] = $file_upload;
        $product = $this->_productRepo->updateProduct($input_product, $id);
        if ($product) {
            return redirect()->back()->with([
                'messages' => 'Đã Chỉnh sửa',
                'type' => 'alert-success'
            ]);
        }
    }

    public function productDelete($id)
    {
        $data = $this->_productRepo->getProductById($id);
        if (!$data) {
            return redirect()->back()->with([   //ưithinput là cái mà giữ lại dữ liệu cũ
                'messages' => 'Không tìm thấy sản phẩm xóa',
                'type' => 'alert-danger'
            ]);
        }
        $delete = $this->_productRepo->deleteProduct($id);
        return redirect()->back()->with([
            'messages' => 'Xóa sản phẩm thành công',
            'type' => 'alert-success'
        ]);
    }
}
