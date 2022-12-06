@extends('admin.layout.main')
@section('title', 'Quản lý danh mục')
@section('content')

<div class='mt-2 mb-2'>
    <a href="{{ route('admin.cateCreate') }}" class="btn btn-outline-success">Thêm danh mục</a>
    @include('admin.base.messages')
</div>

<div style="width: 85%">
    <table id="table_id" class="table">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th> Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($category as  $item)
                <tr>
                    <td>{{ $item->nameCategory }}</td>
                    <td class="row" width="30%">
                        <a href="{{route('admin.cateUpdate', ['id' => $item->id])}}" class="btn btn-outline-info">Chỉnh sửa</a>

                        <a href="{{ route('admin.cateDelete', [
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
