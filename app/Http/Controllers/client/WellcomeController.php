<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Lobby;
use App\Livewire\HandleGame;
use App\Models\UserGameSession;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class WellcomeController extends Controller
{
    public function index()
    {
        return view('client/wellcome');
    }

    public function home()
    {
        $lobbys = Lobby::all();
        return view('client/home', ['lobbys' => $lobbys]);
    }

    public function details($id)
    {
        $lobby = Lobby::find($id);
        $games = Game::where('lobby_id', $id)->get(); // Sử dụng get() thay vì getAll()
        return view('client/webdetail', ['games' => $games, 'lobby' => $lobby]);
    }

    public function getScore($id)
    {

        $GameId = $id;

        // $userId = Auth::id();

        // $session = UserGameSession::where('user_id', $userId)
        //     ->where('game_id', $GameId)
        //     ->first();

        // if (!$session) {

        //     // Tạo một session mới cho người chơi
        //     $session = UserGameSession::create([
        //         'user_id' => $userId,
        //         'game_id' => $GameId,
        //         'round_min' => null,
        //         'round_max' => null,
        //         'percent' => null,
        //         'time_start' => null,
        //         'time_end' => null,
        //     ]);
        // }

        // $sessions = UserGameSession::whereNotNull('time_end')->get();

        // foreach ($sessions as $session) {
        //     // Chuyển đổi thời gian lưu vào đối tượng Carbon
        //     $lastRateReceivedAt = Carbon::parse($session->time_end);
        //     $currentDateTime = now(); // Lấy thời gian hiện tại


        //     // Nếu đã qua 35 phút, cập nhật last_rate_received_at thành null
        //     if ($currentDateTime >= $lastRateReceivedAt) {
        //         $session->update([
        //             'time_start' => null,
        //             'time_end' => null,
        //             'percent' => null,  // Nếu cần, có thể cập nhật thêm các trường khác
        //             'round_max' => null,
        //             'round_min' => null,
        //         ]);
        //     }
        // }

        return view('client.getscoregame', compact('GameId'));
    }
}
