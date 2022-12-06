<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link rel="stylesheet" href="{{ asset('/css/w3.css') }}">


    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <link href="/css/bootstrap.css" rel="stylesheet">
    <!-- JavaScript Bundle with Popper -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
    <title>@yield('title')</title>
</head>



<body>
    @include('web.base.header')
    @yield('content')
    @include('web.base.footer')
    @include('web.base.message')
</body>

</html>
