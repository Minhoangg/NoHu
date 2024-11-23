@extends('layouts.client.master-layout')

@section('content')
    <div class="game_wrap container-fluid p-0">
        <video autoplay loop muted>
            <source src="{{ asset('assets/video/1120.mp4') }}" type="video/mp4">
        </video>

        <div class="container game_box">
            <div class="box_game">
                <div class="back d-flex justify-content-between">
                    <i class="fa-solid fa-backward"></i>
                    <div class="name">
                        <h4>Sảnh PG</h4>
                    </div>
                </div>
                <div class="row">
                    @foreach ($games as $game)
                        <div class="col-12 col-sm-6 col-md-4 lobby_item_parent">
                            <div class="lobby_item">
                                <a href="">
                                    <img src="{{ asset('storage/' . $game->image) }}" height="auto"
                                        alt="{{ $game->title }}">
                                    <div class="item_name">{{ $game->title }}</div>
                                    <div class="animation_item"
                                        style=" background-image: url('{{ asset('assets/img/loadrmbg.png') }}')">
                                        <img src="{{ asset('assets/img/photo_6190289574807322784_x-removebg-preview.png') }}"
                                            alt="">
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
