@extends('web.layout.main')
@section('title', 'Trang Chủ')
@section('content')
    @include('web.base.nav')

    <section>
        <div class="container-xxl bd-gutter mt-3 my-md-4 bd-layout ">
            <div class="bd-sidebar ">
                <div class="bd-intro pt-2 ps-lg-2 ">
                    <div class="row ">
                        <div class="col-6 col-lg-2 mb-3 " class="container py-4 py-md-5 px-4 px-md-3 ">
                            <h4>Danh mục</h4>
                            <!-- hiển thị danh mục sản phẩm ở đây qua biến controller ds_category -->
                            <ul class="list-unstyled ">
                                @foreach ($category as $item)
                                    <li class="mb-2 "><a
                                            href="danh-muc-san-pham/1?id={{ $item->id_category }}">{{ $item->nameCategory }}</a>
                                            {{-- href="{{ route ('danh-muc-san-pham/1?id=', ['id' => $product->id]) }}"</a> --}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-md-9 " style="background-color: rgb(229, 220, 206); ">
                            <div class="row ">
                                <h2 class="col-md-11 ">Sản phẩm khuyến mãi
                                </h2>
                                <div class="col-md-1 ">
                                    <a class="btn btn-sm btn-bd-light " href=" "
                                        title="View and edit this file on GitHub " target="_blank " rel="noopener ">
                                        See all
                                    </a>
                                </div>
                            </div>
                            <div class="container py-4 py-md-5 px-4 px-md-3 ">
                                @foreach ($category_product as $key => $cate_product)
                                    <div class="row ">
                                        {{-- lấy ra tên của loại sản phẩm --}}
                                        <h2>{{ $cate_product->nameCategory }}</h2>
                                        {{-- lấy ra danh sách sản phẩm theo loại --}}
                                        @forelse ($cate_product->products as $key => $product)
                                            <div class="col-md-4 d-flex align-items-stretch card">

                                                <img class="card-img-top"
                                                    src="{{ asset('storage/' . $product->pictureProduct) }}" alt="">
                                                <div class="card-body">
                                                    <h5 class="card-title">Tên sản phẩm : </h5> {{ $product->nameProduct }}
                                                    <p class="card-text" style="color: black;">Giá mới:
                                                        {{number_format( $product->price) }} VND
                                                    </p>
                                                    <p class="card-text">Ram:
                                                        {{$product->ram}}
                                                    </p>
                                                    <p class="card-text">Cpu:
                                                        {{$product->cpu}}
                                                    </p>
                                                    <p class="card-text"> Màn hình"
                                                        {{$product->screen}}
                                                    </p>
                                                    <p class="card-text" style="color: red; text-decoration: line-through;">
                                                        Giá cũ:
                                                        {{ number_format ($product->new_price) }} VND</p>
                                                    <a href="{{ route('productById', ['id' => $product->id]) }}"
                                                        class="btn btn-primary">Xem chi tiết</a>
                                                        {{-- khi nhấn vào mua ngay thì nó sẽ lấy sản phẩm theo id --}}
                                                    <a href="{{ route('cart_add', ['id' => $product->id]) }}"
                                                        class="btn btn-primary">Thêm vào giỏ hàng</a>
                                                </div>
                                            </div>
                                        @empty
                                            Chưa có sản phẩm
                                        @endforelse
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
