@extends('admin.layout.main')
@section('title', 'Tạo sản phẩm')
@section('content')
    <form method="POST" action="{{ route('admin.productUpdatePost', ['id' => $product->id]) }}" enctype="multipart/form-data">
        @csrf
        <div class="mt-2">
            @include('admin.base.messages')
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tên sản phẩm</label>
                <input type="text" name="nameProduct" class="form-control" id="exampleFormControlInput1"
                    value="{{ old('nameProduct', $product->nameProduct) }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Hình sản phẩm</label>
                <input type="file" name="pictureProduct" class="form-control" id=""
                    value="{{ old('pictureProduct') }}" />
                <div class="image-review">
                    <img src="{{ asset('storage/'.$product->pictureProduct) }}" width="100px">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Chọn producer</label>
                <select class="form-select" name="id_producer">
                    <option selected>Open this select menu</option>
                    @forelse ($producers as $item)
                        <option value="{{ $item->id }}" {{ old('id_producer', $product->id_producer) == $item->id ? 'selected' : '' }}>
                            {{ $item->nameProducer }}</option>
                    @empty
                        Chưa có danh sách
                    @endforelse
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Chọn Category</label>
                <select class="form-select" name="id_category" value="{{ old('id_category', ) }}">
                    <option selected>Open this select menu</option>
                    @forelse ($categories as $item)
                        <option value="{{ $item->id }}" {{ old('id_category', $product->id_category) == $item->id ? 'selected' : '' }}>
                            {{ $item->nameCategory }}</option>
                    @empty
                        Chưa có danh sách
                    @endforelse
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Giá cũ</label>
                <input type="text" name="price" class="form-control" id="exampleFormControlInput2"
                    value="{{ old('price', $product->price) }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Ram: </label>
                <input type="text" name="ram" class="form-control" id="exampleFormControlInput3"
                    value="{{ old('ram', $product->ram) }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">CPU: </label>
                <input type="text" name="cpu" class="form-control" id="exampleFormControlInput4"
                    value="{{ old('cpu', $product->cpu) }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">VGA</label>
                <input type="text" name="vga" class="form-control" id="exampleFormControlInput5"
                    value="{{ old('vga', $product->vga) }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Screen</label>
                <input type="text" name="screen" class="form-control" id="exampleFormControlInput6"
                    value="{{ old('screen', $product->screen) }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">hardDrive</label>
                <input type="text" name="hardDrive" class="form-control" id="exampleFormControlInput7"
                    value="{{ old('hardDrive', $product->hardDrive) }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Cân nặng</label>
                <input type="text" name="weight" class="form-control" id="exampleFormControlInput8"
                    value="{{ old('weight', $product->weight) }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">status</label>
                <input type="text" name="status" class="form-control" id="exampleFormControlInput9"
                    value="{{ old('status', $product->status) }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Gia moi</label>
                <input type="text" name="new_price" class="form-control" id="exampleFormControlInput10"
                    value="{{ old('new_price', $product->new_price) }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">speedcpu</label>
                <input type="text" name="speedcpu" class="form-control" id="exampleFormControlInput11"
                    value="{{ old('speedcpu', $product->speedcpu) }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">technolory_sreen</label>
                <input type="text" name="technolory_sreen" class="form-control" id="exampleFormControlInput12"
                    value="{{ old('technolory_sreen', $product->technolory_sreen) }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">technology_studio</label>
                <input type="text" name="technology_studio" class="form-control" id="exampleFormControlInput13"
                    value="{{ old('technology_studio', $product->technology_studio) }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">material</label>
                <input type="text" name="material" class="form-control" id="exampleFormControlInput14"
                    value="{{ old('material', $product->material) }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">pin</label>
                <input type="text" name="pin" class="form-control" id="exampleFormControlInput15"
                    value="{{ old('pin', $product->pin) }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">releasetime</label>
                <input type="text" name="releasetime" class="form-control" id="exampleFormControlInput16"
                    value="{{ old('releasetime', $product->releasetime) }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">operaSystem</label>
                <input type="text" name="operaSystem" class="form-control" id="exampleFormControlInput17"
                    value="{{ old('operaSystem', $product->operaSystem) }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">size</label>
                <input type="text" name="size" class="form-control" id="exampleFormControlInput18"
                    value="{{ old('size', $product->size) }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">caching</label>
                <input type="text" name="caching" class="form-control" id="exampleFormControlInput19"
                    value="{{ old('caching', $product->caching) }}">
            </div>
            <div style="text-align: center;">
                <button type="submit" class="btn btn-outline-danger" style="align-items: center;">Chỉnh sửa</button>
            </div>
        </div>
    </form>
@endsection
