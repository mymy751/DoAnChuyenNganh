@extends('admin.layout.main')
@section('title', 'Quản lý đơn hàng')
@section('content')

    <div class='mt-2 mb-2'>
        Liệt kê đơn hàng
    </div>

    <div style="width: 85%">
        <table id="table_id" class="table">
            <thead>
                <tr>
                    <th>Mã hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Ngày lập đơn hàng</th>
                    <th>Quản lý</th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td>shbhcafa</td>
                    <td>dsg</td>
                    <td>dsknf</td>
                    <td>
                    <td class="btn btn-outline-info">Xoa</td>
                    <td class="btn btn-outline-danger">Xem</td>
                    </td>
                </tr>

            </tbody>
        </table>
        <script>
            $(document).ready(function() {
                $('#table_id').DataTable();
            });
        </script>
    </div>

@endsection
