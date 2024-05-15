<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Support\Facades\Log;
use App\Jobs\UpdateUserPoints;

// Artisan::command('schedule:run', function (Schedule $schedule) {
//     $schedule->command('queue:work --stop-when-empty')->hourly()
//         ->before(function () {
//             Log::info('Queue worker started at: ' . now());
//         })
//         ->after(function () {
//             Log::info('Queue worker stopped at: ' . now());
//         });
//     Log::info('Schedule run executed at: ' . now());
// })->purpose('Run the scheduler');
Schedule::job(new UpdateUserPoints)->hourly();

