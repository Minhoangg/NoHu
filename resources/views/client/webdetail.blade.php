@extends('layouts.client.master-layout')

@section('content')
    <section
        style="
        background-image: url('{{ asset('assets/img/backgouund2.jpg') }}');
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 120vh;
    ">
        <div class="list-game-client">
            <ul style="
            padding: 0px;
        background-image: url('{{ asset('assets/img/bakground6.jpg') }}');
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    "
                class="list-game">
                <i class="fa-solid fa-backward p-1 fs-5" style="color: aqua; cursor: pointer;" onclick="goBack()"></i>
                <h1 style="margin: 10px 0;color: rgb(255, 109, 4);">{{ $lobby->name }}</h1>
                <ul class="container-game">
                    @if ($games->isEmpty())
                        <h3 style="color: white;">Không game nào trong dữ liệu!</h3>
                    @else
                        @foreach ($games as $game)
                            <a href="{{ route('client.get-score', $game->id) }}">
                                <li class="game-item">
                                    <div class="top-game-item">
                                        <div class="game-info">
                                            <img src="{{ asset('storage/' . $game->image) }}" alt="">
                                            <h5>{{ $game->title }}</h5>
                                        </div>
                                        <div
                                        style="display: flex; align-items: center; justify-content: center; position: relative; width: 103px; height: 95px; background-image: url('{{ asset('assets/img/loadrmbg.png') }}'); background-position: center center; background-repeat: no-repeat; background-size: cover;">
                                        <img style="animation: spin 1s linear infinite; position: absolute; width: 100px; height: 84px;"
                                            src="{{ asset('assets/img/photo_6190289574807322784_x-removebg-preview.png') }}" alt="">
                                        <p class="position-absolute"
                                            style="color: yellow; text-align: center; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                        </p>
                                    </div>
                                    </div>
                                    <div class="bottom-game-item">
                                        <img src="{{ asset('assets/img/slot_item_bg.png') }}" alt="">
                                        <div class="process-bar">
                                        </div>
                                    </div>
                                </li>
                            </a>
                        @endforeach
                    @endif
                </ul>
            </ul>
        </div>
    </section>
@endsection
