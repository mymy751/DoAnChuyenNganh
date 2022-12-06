<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Respository\ProducerRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProducerController extends Controller
{
    public $_producerRepo;

    public function __construct(ProducerRepository $producerRepo){
        $this->_producerRepo = $producerRepo;
    }
    public function index()
    {
        $producers = $this->_producerRepo->getAllProducer();

        return view('admin.pages.producer.index', compact('producers'));
    }
    public function producerCreate()
    {
        return view('admin.pages.producer.create');
    }
    public function producerCreatePost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nameProducer' => ['required'],
            'describe' => ['required'],
            'pictureProducer' => ['required'],
        ], [
            'nameProducer.required' => 'Vui lòng nhập tên nhà sản xuất',
            'describe.required' => 'Vui lòng nhập mô tả nhà sản xuất',
            'pictureProducer.required' => 'Vui lòng nhập hình ảnh nhà sản xuất',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with([   //ưithinput là cái mà giữ lại dữ liệu cũ
                'messages' => $validator->errors()->first(),
                'type' => 'alert-danger'
            ]);
        }
        $input_producer = $request->all(); // mảng
        $producer = $this->_producerRepo->createProducer($input_producer);
        if ($producer) {
            return redirect()->back()->with([
                'messages' => 'Tạo nhà sản xuất thành công',
                'type' => 'alert-success'
            ]);
        }
    }
    public function producerUpdate(Request $request , $id)
    {
        $producer = $this->_producerRepo->getProducerById($id);
        return view('admin.pages.producer.update', compact('producer'));
    }

    public function producerUpdatePost(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nameProducer' => ['required'],
            'describe' => ['required'],
            'pictureProducer' => ['required'],
        ], [
            'nameProducer.required' => 'Vui lòng nhập tên nhà sản xuất',
            'describe.required' => 'Vui lòng nhập mô tả nhà sản xuất',
            'pictureProducer.required' => 'Vui lòng nhập hình ảnh nhà sản xuất',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with([   //ưithinput là cái mà giữ lại dữ liệu cũ
                'messages' => $validator->errors()->first(),
                'type' => 'alert-danger'
            ]);
        }
        $input_producer = $request->all(); // mảng
        $producer = $this->_producerRepo->updateProducer($input_producer, $id);
        if ($producer) {
            return redirect()->back()->with([
                'messages' => 'Chỉnh sửa nhà sản xuất thành công',
                'type' => 'alert-success'
            ]);
        }

    }
    public function producerDelete($id)
    {
        $data = $this->_producerRepo->getProducerById($id);
        if (!$data) {
            return redirect()->back()->with([   //ưithinput là cái mà giữ lại dữ liệu cũ
                'messages' => 'Không tìm thấy nhà sản xuất',
                'type' => 'alert-danger'
            ]);
        }
        $delete = $this->_producerRepo->deleteProducer($id);
        return redirect()->back()->with([
            'messages' => 'Xóa nhà sản xuất thành công',
            'type' => 'alert-success'
        ]);
    }
}
