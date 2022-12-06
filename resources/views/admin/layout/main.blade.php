<!DOCTYPE html>
<html>
<title> @yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/css/w3.css">
<link rel="stylesheet" href="/css/bootstrap.css">
<link rel="stylesheet" href="/css/styles.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

<script src="{{ asset('js/jquery.min.js') }}"></script>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />


<body>
    <!-- // đay la header -->


    <section>
        <div class="row">
            @include('admin.base.nav')
            <div id="main" style="margin-left: 21%;">
                <div class="w3-teal" style="display: flex;">
                    <div class="w3-container">
                        <h1>
                            @yield('title')
                        </h1>
                    </div>
                </div>
                <div class="w3-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div style="width: 75%;">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



</body>

</html>
