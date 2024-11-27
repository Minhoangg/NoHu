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
    public $percent;
    public $min_ratio;
    public $max_ratio;
    public $startTime;
    public $endTime;
    public $endTimeSave;
    public $nameGame;
    public $imgGame;

    // Phương thức để lấy dữ liệu game
    public function mount()
    {
        if ($this->gameId) {
            $game = Game::find($this->gameId);

            if ($game) {
                $this->nameGame = $game->title;
                $this->imgGame = $game->image;
            } else {
                session()->flash('error', 'Game không tồn tại.');
            }
        } else {
            session()->flash('error', 'Game ID không hợp lệ.');
        }
    }


    public function handleClick()
    {

        sleep(3);

        $dataGame = Game::find($this->gameId);


        // xử lý random tỉ lệ

        $min_ratio = rand($dataGame->min_percent, $dataGame->max_percent);
        $max_ratio = rand($dataGame->min_percent, $dataGame->max_ratio);

        if ($min_ratio > $max_ratio) {
            $temp = $min_ratio;
            $min_ratio = $max_ratio;
            $max_ratio = $temp;
        }

        $this->min_ratio = $min_ratio;
        $this->max_ratio = $max_ratio;

        // kết thúc xử lý tỉ lệ


        // xử lý phần trăm

        $this->percent = rand($dataGame->min_percent, $dataGame->max_percent);


        // kết thúc xử phần trăm


        // xử lý khung giờ 

        $currentDate = now();
        $startTime = $currentDate->copy()->addMinutes(8);

        $randomMinutes = rand(6, 9);

        $endTime = $startTime->copy()->addMinutes($randomMinutes);

        $this->startTime = $startTime->format('H:i');
        $this->endTime = $endTime->format('H:i');
        $this->endTimeSave = $endTime;

        // kết thúc xử lý khung giờ

    }

    public function render()
    {
        return view('livewire.handle-game');
    }
}
