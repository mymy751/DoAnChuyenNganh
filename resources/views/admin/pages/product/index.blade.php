@extends('admin.layout.main')
@section('title', 'Quản lý sản phẩm')
@section('content')
    <div class='mt-2 mb-2'>
        <a href="{{ route('admin.productCreate') }}" class="btn btn-outline-success">Thêm sản phẩm</a>
        @include('admin.base.messages')

    </div>
    <div style="width: 85%">
        <table id="table_id" class="table">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th> Hành động</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as  $item)
                    <tr>
                        <td>{{ $item->nameProduct }}</td>
                        <td>
                            <img src="{{ asset('storage/'.$item->pictureProduct) }}" width="100px">
                        </td>
                        <td class="row">
                            <a href="{{route('admin.productUpdate', ['id' => $item->id])}}" class="btn btn-outline-info">Chỉnh sửa</a>

                            <a href="{{ route('admin.productDelete', [
                                'id' => $item->id
                            ]) }}"
                                class="btn btn-outline-danger">Xóa</a>
                        </td>
                    </tr>
                @empty
                    Chưa có sản phẩm nào
                @endforelse
            </tbody>
        </table>
        <script>
            $(document).ready(function() {
                $('#table_id').DataTable();
            });
        </script>
    </div>
@endsection
