@extends('web.layout.main')
@section('content')
    <h2 class="text-center">Giỏ hàng của bạn</h2>

    <div class="container">
        <table id="cart" class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th style="width:50%">Tên sản phẩm</th>
                    <th style="width:10%">Giá</th>
                    <th style="width:8%">Số lượng</th>
                    <th style="width:22%" class="text-center">Thành tiền</th>
                    <th style="width:10%"></th>
                </tr>
            </thead>
            <tbody>
                {{-- kiểm ttra không rỗng thì nó chạy xuống vòng lặp để lấy --}}
                @if (!empty(@$cart->items))
                    @foreach ($cart->items as $id_product => $item)
                        <tr>
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-2 hidden-xs">
                                        <img src="{{ asset('storage/' . $item['image']) }}" alt="Sản phẩm 1"
                                            class="img-responsive" style="max-width: 100px;" />
                                    </div>
                                    <div class="col-sm-10">
                                        {{-- lấy ra cái tên sản phẩm  --}}
                                        <h4 class="nomargin">{{ $item['nameProduct'] }}</h4>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price">{{ number_format($item['price']) }}</td>
                            <td data-th="Quantity">
                                {{ $item['quantity'] }}
                            </td>
                            <td data-th="Subtotal" class="text-center">
                                {{-- number_format là để format lại cái giá đó thành kiểu 1,000,000 --}}
                                {{ number_format($item['price'] * $item['quantity']) }}
                                VND
                            </td>
                            <td class="actions" data-th="">
                                {{-- này là để xóa sản phẩm ra khỏi giỏ hàng --}}

                                <a href="{{ route('cart_delete', ['id' => $item['id']]) }}" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i></a>
                            </td>
                        </tr>

                    @endforeach

                    <tr>
                        <td data-th="Product-detail" colspan="4">
                            Tổng sản phẩm đã mua : {{ $cart->total_quanlity }}
                        </td>
                        <td>Tổng giá tiền : {{ number_format($cart->total_price) }}</td>

                    </tr>
                    <tr>
                        <a href="{{ route('nameorder') }}"
                        class="btn btn-primary">Đặt hàng</a>
                    </tr>

                @else
                    <tr>
                        <td colspan="6">
                            Giỏ hàng trống
                        </td>
                    </tr>
                @endif

                </tfoot>
        </table>
    </div>
@endsection
