@extends('layouts.client.master-layout')

@section('content')
    <video id="video_login" autoplay loop muted>
        <source type="video/mp4" src="{{ asset('assets/video/171-135788231_small.mp4') }}">
    </video>
    <div id="login_wrap" class="container-fluid">
        <div class="login_box" style="background-image: url('{{ asset('assets/img/frame_popup-desktop.png') }}')" >
            <form action="">
                <div class="mb-3">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Tên đăng nhập">
                </div>
                <div class="mb-3">
                    <i class="fa-solid fa-unlock"></i>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu">
                </div>
                <button type="submit" class="btn btn-primary">
                    Đăng nhập
                </button>
                <p class="q-register" style="color: white"> Chưa có tài khoản? <span class="link-register-model" style="
                color: #00ff75">Đăng ký</span></p>
            </form>
        </div>
    </div>
@endsection
