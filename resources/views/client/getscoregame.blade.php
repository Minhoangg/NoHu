@extends('layouts.client.master-layout')

@section('content')
    <section
        style="
        background-image: url('{{ asset('assets/img/photo_6183962405080515886_y.jpg') }}');
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 100vh;
    ">
        <div class="core-game-client">

            @livewire('handle-game', ['id' => $GameId])

        </div>
    </section>
@endsection
