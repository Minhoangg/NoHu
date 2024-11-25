<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Game;
use App\Models\UserGameSession;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;


class HandleGame extends Component
{

    public $gameId;
    public $min_percent;
    public $max_percent;
    public $min_ratio;
    public $max_ratio;

    // Phương thức để lấy dữ liệu game
    public function getDataGame()
    {
        $this->gameId = (int) $this->gameId;

        if ($this->gameId) {
            $game = Game::find($this->gameId);

            dd($game);

            if ($game) {
                $this->min_percent = $game->min_percent;
                $this->max_percent = $game->max_percent;
                $this->min_ratio = $game->min_ratio;
                $this->max_ratio = $game->max_ratio;
            } else {
                session()->flash('error', 'Game không tồn tại.');
            }
        } else {
            session()->flash('error', 'Game ID không hợp lệ.');
        }
    }


    public function handleClick() {
        $addGameData = $this->getDataGame();

    }

    public function render()
    {
        return view('livewire.handle-game');
    }
}
