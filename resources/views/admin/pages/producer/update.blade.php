@extends('admin.layout.main')
{{-- header --}}
@extends('admin.base.nav')
{{-- nav --}}
@section('title', 'Tạo nhà sản xuất')
@section('content')
    <form method="POST" action="{{ route('admin.producerUpdatePost', ['id' => $producer->id]) }}" enctype="multipart/form-data">
        @csrf
        <div class="mt-2">
            @include('admin.base.messages')
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tên nhà sản xuất</label>
                <input type="text" name="nameProducer" class="form-control" id="exampleFormControlInput1"
                    value="{{ old('nameProducer', $producer->nameProducer) }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Describe</label>
                <input type="text" name="describe" class="form-control" id="exampleFormControlInput2"
                    value="{{ old('describe', $producer->describe ) }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">pictureProducer</label>
                <input type="text" name="pictureProducer" class="form-control" id="exampleFormControlInput3"
                    value="{{ old('pictureProducer', $producer->pictureProducer) }}">
            </div>
            <div style="text-align: center;">
                <button type="submit" class="btn btn-outline-danger" style="align-items: center;">Chỉnh sửa</button>
            </div>
        </div>
    </form>
@endsection
