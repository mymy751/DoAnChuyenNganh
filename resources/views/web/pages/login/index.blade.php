@extends('web.layout.main')
@section('title', 'Đăng nhập')
@section('content')
    <!-- // này là trang đăng ký tài khoản. -->
    <div class="container" style="padding: 50px;">
        <div class="row">
            <form action="{{ route('postLogin') }}" method="post" enctype="multipart/form-data"
                style="border: 1px solid #ddd; max-width: 500px; margin: auto; padding: 10px;">
                @csrf
                <!-- Email input -->
                <h3>
                    <p class="fw-light" style="text-align: center; padding: auto; color: rgb(57, 20, 206);">Đăng nhập
                    </p>
                </h3>
                <div class="form-outline mb-4">
                    <label for="inputEmail4">Email</label>
                    <input type="email" name="email" class="form-control" id="inputEmail4">
                </div>
                <div class="form-outline mb-4">
                    <label for="inputPassword4">Password</label>
                    <input type="password" name="password" class="form-control" id="inputPassword4">
                </div>
                <div>
                    @if ($errors->any())
                        <p style="color: red;">{{ $errors->first() }} </p>
                    @endif
                </div>
                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                    <div class="col d-flex justify-content-center">
                        <!-- Checkbox -->

                    </div>

                </div>

                <!-- Submit button -->
                <div style="text-align: center;">
                    <button type="submit" name="btn-primary" class="btn btn-primary btn-block mb-4">Sign in</button>

                </div>
            </form>
        </div>
    </div>
@endsection
