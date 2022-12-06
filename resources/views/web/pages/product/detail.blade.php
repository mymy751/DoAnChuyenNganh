@extends('web.layout.main')
@section('title', 'Chi tiết sản phẩm')
@section('content')
    <section>
        <div class="container py-4 py-md-5 px-4 px-md-3">
            @if($product)
            <div class="row">
                <h4 style="text-align: center;">Thông tin cấu hình điện thoại {{ $product->nameProduct }}</h4>

                <form action="" method="post"
                    style="margin-left: auto; margin-right: auto; width: 800px; margin-top: 20px;">
                    <div class="row" style="margin-top: 30px;">
                        <div>
                            <img src="{{ asset('storage/'.$product->pictureProduct) }}" class="img-thumbnail "
                                    style="margin-left: 200px; max-width: 400px;" alt="... " ;></a>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 20px;">
                        <div>
                            <h3>Tên sản phẩm : {{ $product->nameProduct }}</h3>
                            <h3 style="background-color: rgb(227, 231, 234);">CPU Proccess</h3>

                            {{-- // lấy ra cái loại sản phẩm  --}}
                            {{-- @if($product->categories)
                            <div style="">Lọai sản phẩm: {{$product->categories->nameCategory}}
                            </div>
                            @endif --}}
                            <div>Speed CPU: {{$product->speedcpu}}</div>
                            <div>Caching: {{$product->caching}}</div>
                            <h3 style="background-color: rgb(227, 231, 234);">Memory, drive </h3>
                            <div>Ram: {{$product->ram}}</div>
                            <div>Hard drive: {{$product->hardDrive}}</div>
                            <h3 style="background-color: rgb(227, 231, 234);">Screen</h3>
                            <div>Screen: {{$product->screen}}</div>
                            <div>Technology sreen: {{$product->speedcpu}} </div>
                            <h3 style="background-color: rgb(227, 231, 234);">Graphics and Sound</h3>
                            <div>VGA: {{$product->vga}}</div>
                            <div>Technology studio: {{$product->technology_studio}}</div>
                            <h3 style="background-color: rgb(227, 231, 234);">Size and weight: </h3>
                            <div>Size and weight: {{$product->size}}</div>
                            <div>Material: {{$product->material}}</div>
                            <h3 style="background-color: rgb(227, 231, 234);">Information other </h3>
                            <div>Opera system: {{$product->operaSystem}}</div>
                            <div>Release time: {{$product->releasetime}}</div>
                        </div>
                    </div>
                    <div style="text-align: center; margin-top: 15px;">
                        <a href="{{ route('cart_add', ['id' => $product->id, 'action' => 'buy_now']) }}"
                            class="btn btn-primary">Mua ngay</a>
                    </div>
                </form>
            </div>
            @else
            <div class="row">
                <div class='col-md-12'>
                    Không tìm thấy sản phẩm
                </div>
            </div>
            @endif
        </div>
    </section>

@endsection
