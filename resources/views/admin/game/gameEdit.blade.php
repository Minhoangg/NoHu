@extends('layouts.admin.master')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Cập nhật game</h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form action="{{ route('system.game-update', $game->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <div class="card-title">Cập nhật game</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="lobby_id">Lobby</label>
                                            <select name="lobby_id" class="form-control" id="lobby_id">
                                                @foreach ($lobbies as $lobby)
                                                    <option value="{{ $lobby->id }}" {{ $lobby->id == $game->lobby_id ? 'selected' : '' }}>
                                                        {{ $lobby->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('lobby_id')
                                                <small class="form-text text-muted text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="title">Tiêu đề</label>
                                            <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $game->title) }}" placeholder="Nhập tên game" />
                                            @error('title')
                                                <small class="form-text text-muted text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="image">Hình ảnh</label>
                                            <input type="file" name="image" class="form-control" id="image" />
                                            @if ($game->image)
                                                <img src="{{ asset('storage/' . $game->image) }}" alt="Game Image" width="100" />
                                            @endif
                                            @error('image')
                                                <small class="form-text text-muted text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="min_percent">Min Percent</label>
                                            <input type="number" name="min_percent" class="form-control" id="min_percent" value="{{ old('min_percent', $game->min_percent) }}" placeholder="Min Percent" />
                                            @error('min_percent')
                                                <small class="form-text text-muted text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="max_percent">Max Percent</label>
                                            <input type="number" name="max_percent" class="form-control" id="max_percent" value="{{ old('max_percent', $game->max_percent) }}" placeholder="Max Percent" />
                                            @error('max_percent')
                                                <small class="form-text text-muted text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="min_ratio">Min Ratio</label>
                                            <input type="number" name="min_ratio" class="form-control" id="min_ratio" value="{{ old('min_ratio', $game->min_ratio) }}" placeholder="Min Ratio" />
                                            @error('min_ratio')
                                                <small class="form-text text-muted text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="max_ratio">Max Ratio</label>
                                            <input type="number" name="max_ratio" class="form-control" id="max_ratio" value="{{ old('max_ratio', $game->max_ratio) }}" placeholder="Max Ratio" />
                                            @error('max_ratio')
                                                <small class="form-text text-muted text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <button type="submit" class="btn btn-success">Cập nhật Game</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
