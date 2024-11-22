<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;


class DeductCoinJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $userId;

    public function __construct($userId)
    {
        $this->userId = $userId; // Chỉ lưu ID người dùng
    }

    public function handle()
    {
        
        try {
            // Lấy lại thông tin người dùng từ database
            $user = User::find($this->userId);

            if (!$user) {
                Log::warning("Người dùng không tồn tại", ['user_id' => $this->userId]);
                return; // Người dùng đã bị xóa, dừng job
            }

            // Trừ coin cho người dùng nếu còn
            if ($user->coin > 0) {
                $user->decrement('coin');
                Log::info("Đã trừ 1 coin", [
                    'user_id' => $user->id,
                    'coin_còn_lại' => $user->coin,
                ]);

                // Dispatch job mới sau 1 phút
                $job = (new DeductCoinJob($user->id))->delay(Carbon::now()->addMinutes(1));
                dispatch($job);

            } else {
                Log::info("Người dùng không còn coin để trừ", ['user_id' => $user->id]);
            }
        } catch (\Exception $e) {
            Log::error("Lỗi xảy ra trong DeductCoinJob", [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'user_id' => $this->userId,
            ]);
            throw $e;
        }
    }
}
