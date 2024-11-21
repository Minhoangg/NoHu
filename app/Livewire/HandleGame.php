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
    public $id;
    public $percentage = 0;

    public $roundText = ''; // Lưu trữ giá trị Round
    public $startTime;
    public $endTime;

    public $nameGame;
    public $imgGame;

    public $contact;

    public $isContact = false;

    public function mount($id)
    {
        $this->id = $id;

        // Lấy thông tin game
        $dataGame = Game::find($this->id);

        if ($dataGame) {
            $this->nameGame = $dataGame->title;
            $this->imgGame = $dataGame->image;
        } else {
            $this->nameGame = 'Game Not Found';
            $this->imgGame = 'default-image.jpg';
        }

        $user = Auth::user();

        if ($user->coin < 10) {
            $this->isContact = true;
        }

        if ($user) {
            $parentId = $user->parent_id;  // Kiểm tra parent_id
            if ($parentId) {
                // Nếu có parent_id, tìm người dùng có id bằng parent_id này
                $parentUser = User::find($parentId); // Dùng find để lấy người dùng theo id
                if ($parentUser && $parentUser->telegram) {
                    // Lấy thông tin telegram từ người dùng parent
                    $telegram = $parentUser->telegram;

                    // Hiển thị thông báo hoặc lưu thông tin vào một thuộc tính để sử dụng trong view
                    $this->contact = $telegram;
                }
            }
        }


        // Khởi tạo session hoặc lấy session hiện tại
        $this->initializeSession();
    }

    private function initializeSession()
    {
        $userId = Auth::id();

        // Tìm session dựa trên user_id và game_id
        $session = UserGameSession::where('user_id', $userId)
            ->where('game_id', $this->id)
            ->first();

        // Kiểm tra nếu session tồn tại
        if ($session) {
            // Chuyển đổi time_end thành đối tượng Carbon để so sánh
            $lastRateReceivedAt = Carbon::parse($session->time_end);
            $currentDateTime = now(); // Lấy thời gian hiện tại

            // Nếu thời gian hiện tại nhỏ hơn lastRateReceivedAt
            if ($currentDateTime < $lastRateReceivedAt) {
                // Gán các giá trị vào các thuộc tính của component
                $this->roundText = "Round: {$session->round_min} - {$session->round_max}";
                $this->percentage = $session->percent;

                // Chuyển đổi time_start và time_end thành định dạng giờ:phút (H:i)
                $this->startTime = Carbon::parse($session->time_start)->format('H:i');
                $this->endTime = Carbon::parse($session->time_end)->format('H:i');
            }
        }
    }


    public function generateRandomPercentage()
    {

        $user = Auth::user();
        if ($user->coin >= 10) {
            $userId = Auth::id();

            // Lấy session hiện tại
            $session = UserGameSession::where('user_id', $userId)
                ->where('game_id', $this->id)
                ->first();

            if ($session) {
                $dataGame = Game::find($this->id);

                $currentDate = now();
                if ($currentDate < $session->time_end) {
                    // Nếu thời gian hiện tại nhỏ hơn time_end, không cho phép cập nhật
                    return; // Dừng thực thi hàm
                }

                // Tạo giá trị ngẫu nhiên cho round và phần trăm
                $min = rand($dataGame->min_ratio, $dataGame->max_ratio);
                $max = rand($dataGame->min_ratio, $dataGame->max_ratio);

                if ($min > $max) {
                    list($min, $max) = [$max, $min]; // Đảm bảo min < max
                }

                $percentage = rand($dataGame->min_percent, $dataGame->max_percent);

                // Cập nhật thời gian
                $currentDate = now();
                $startTime = $currentDate->copy()->addMinutes(5);
                $endTimeSave = $currentDate->copy()->addMinutes(35);

                // Đợi 3 giây trước khi tiếp tục
                sleep(3); // Delay 3 giây

                // Lưu giá trị mới vào session
                $session->update([
                    'round_min' => $min,
                    'round_max' => $max,
                    'percent' => $percentage,
                    'time_start' => $currentDate,
                    'time_end' => $endTimeSave,
                ]);

                $user->decrement('coin', 10);


                // Hiển thị giá trị mới lên giao diện
                $this->roundText = "Round: $min - $max";
                $this->percentage = $percentage;
                $this->startTime = $startTime->format('H:i');
                $this->endTime = $endTimeSave->format('H:i');
            }
        }
    }

    public function render()
    {
        return view('livewire.handle-game');
    }
}
