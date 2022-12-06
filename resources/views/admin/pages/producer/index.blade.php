@extends('admin.layout.main')
@section('title', 'Quản lý nhà sản xuất')
@section('content')
<div class='mt-2 mb-2'>
    <a href="{{route('admin.producerCreate') }}" class="btn btn-outline-success">Thêm nhà sản xuất</a>

</div>
<div style="width: 85%">
    <table id="table_id" class="table">
        <thead>
            <tr>
                <th>Tên nhà sản xuất</th>
                <th>Mô tả </th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($producers as  $item)
                <tr>
                    <td>{{ $item->nameProducer }}</td>
                    <td>{{ $item->describe }}</td>

                    <td class="row">
                        <a href="{{ route ('admin.producerUpdate', [
                            'id' => $item->id
                        ])}}" class="btn btn-outline-info">Chỉnh sửa</a>

                        <a href="{{ route ('admin.producerDelete', [
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
