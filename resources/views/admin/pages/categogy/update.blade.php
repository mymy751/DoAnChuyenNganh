@extends('admin.layout.main')
@extends('admin.base.nav')
@section('title', 'Tạo danh mục')
@section('content')
<form method="POST" action="{{ route('admin.cateUpdatePost', ['id' => $category->id]) }}" enctype="multipart/form-data">
    @csrf
    <div class="mt-2">
        @include('admin.base.messages')
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tên danh mục</label>
            <input type="text" name="nameCategory" class="form-control" id="exampleFormControlInput1"
                value="{{ old('nameCategory', $category->nameCategory) }}">
        </div>

        <div style="text-align: center;">
            <button type="submit" class="btn btn-outline-danger" style="align-items: center;">Chỉnh sửa</button>
        </div>
    </div>
</form>
@endsection
