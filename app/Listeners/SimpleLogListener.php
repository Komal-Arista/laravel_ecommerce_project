<?php

// SimpleLogListener.php
namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Log;
use App\Models\ActivityLog;

class SimpleLogListener
{
    public function handle(Login $event)
    {
        Log::info('SimpleLogListener fired.');
        dd($event);

        ActivityLog::create([
            'user_id' => $event->user->id,
            'activity' => $event instanceof Login ? 'User Logged In' : 'User Logged Out',
            'activity_time' => now(),
        ]);
    }
}
