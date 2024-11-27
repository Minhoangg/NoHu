<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Game;

class UpdateGamePercent extends Command
{
    // Tên của lệnh
    protected $signature = 'game:update-percent';

    // Mô tả của lệnh
    protected $description = 'Cập nhật trường percent trong bảng games mỗi 5 phút';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Lấy tất cả các game từ bảng games
        $games = Game::all();
    
        foreach ($games as $game) {
            // Tạo một số ngẫu nhiên từ 0 đến 100 cho mỗi game
            $randomPercent = rand(0, 100);
    
            // Cập nhật trường percent cho từng game
            $game->update(['percent' => $randomPercent]);
    
            // In ra thông báo cho mỗi game đã được cập nhật
            $this->info('Game ID ' . $game->id . ' đã được cập nhật với giá trị percent: ' . $randomPercent . '%');
        }
    
        $this->info('Trường percent đã được cập nhật cho tất cả game!');
    }
    
}
