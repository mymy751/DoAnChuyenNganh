@extends('admin.layout.main')
@section('title', 'Quản lý người dùng')
@section('content')
<div class='mt-2 mb-2'>
    <a href="{{route('admin.userCreate') }}" class="btn btn-outline-success">Thêm người dùng</a>

</div>
<div style="width: 85%">
    <table id="table_id" class="table">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Email</th>
                <th> Password </th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as  $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>
                       {{ $item->email}}
                    </td>
                    <td>{{ $item->password}}</td>
                    <td class="row">
                        <a href="{{ route ('admin.userUpdate', [
                            'id' => $item->id
                        ])}}" class="btn btn-outline-info">Chỉnh sửa</a>

                        <a href="{{ route ('admin.userDelete', [
                            'id' => $item->id
                        ])}}"
                        class="btn btn-outline-danger">Xóa</a>
                    </td>
                </tr>

            @empty
                Chưa có người này
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
