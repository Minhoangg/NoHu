<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="{{ asset('assets/scss/client/auth/auth.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>


    <div class="login_wrap">
        <video autoplay loop muted>
            <source src="{{ asset('assets/video/1115.mp4') }}" type="video/mp4">
        </video>

        <div class="login_form card shadow-lg"
            style="background-image: url('{{ asset('assets/img/frame_popup-desktop.png') }}')">
            <h3 class="text-center mb-4">Đăng ký</h3>

            @if (session('successRegister'))
                <div class="alert alert-success">
                    {{ session('successRegister') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('client.register-submit') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="text" name="name" class="form-control" id="name"
                        placeholder="Tên dùng để đăng nhập" value="{{ old('name') }}">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Số điện thoại"
                        value="{{ old('phone') }}">
                    @error('phone')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" id="password"
                        placeholder="Nhập mật khẩu">
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Đăng ký</button>
                </div>
            </form>
            <p style="color: white">bạn đã có tài khoản <a href="{{ route('client.login-form') }}">đăng nhập</a></p>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
