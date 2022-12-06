<header class="bg-black sticky-top">
    <div class="head-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4 p-3 ">
                    <a href="{{ route('home') }}"> <img src="/images/logo.png" width="170px" height="60px"
                            style="margin-top:-10px ;"></a>
                </div>
                <div class="col-md-4 p-3">
                    <form class="d-flex" method="GET" action="{{ route('searchProduct') }}" role="search">
                        <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-info" type="submit ">Search</button>
                    </form>
                </div>

                <div class="col-md-4 mt-4 text-end">
                    <span class="p-3"><a href="{{route('cart')}}"><i
                                class="fa-solid fa-cart-shopping text-danger fs-3"></i></a></span>
                    <span class="p-3"><a href=""><i
                                class="fa-regular fa-heart text-danger fs-3"></i></a></span>

                    <span class="p-3"><a href="{{ route('login') }}"><i
                                class="fa-regular fa-user text-danger fs-3 "></i></a></span>
                </div>
            </div>
        </div>
    </div>
</header>
