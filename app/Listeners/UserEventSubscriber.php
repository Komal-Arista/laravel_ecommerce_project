<?php
 
namespace App\Listeners;
 
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\Registered;
use Illuminate\Events\Dispatcher;
use App\Models\ActivityLog;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class UserEventSubscriber
{
    /**
     * Handle user login events.
     */
    public function handleUserLogin(Login $event): void {

        ActivityLog::create([
            'user_id' => $event->user->id,
            'activity' => 'User Logged In',
            'activity_time' => Carbon::now(),
        ]);

        Log::info('Activity logged for user: ' . $event->user->id . ">>>Login");
    }
 
    /**
     * Handle user logout events.
     */
    public function handleUserLogout(Logout $event): void {

        ActivityLog::create([
            'user_id' => $event->user->id,
            'activity' => 'User Logged Out',
            'activity_time' => Carbon::now(),
        ]);

        Log::info('Activity logged for user: ' . $event->user->id . ">>>Logout");
    }

     /**
     * Handle user logout events.
     */
    public function handleUserRegister(Registered $event): void {

        ActivityLog::create([
            'user_id' => $event->user->id,
            'activity' => 'User Registered',
            'activity_time' => Carbon::now(),
        ]);

        Log::info('Activity logged for user: ' . $event->user->id . ">>>Registered");
    }
 
    /**
     * Register the listeners for the subscriber.
     */
    public function subscribe(Dispatcher $events): void
    {
        $events->listen(
            Login::class,
            [UserEventSubscriber::class, 'handleUserLogin']
        );
 
        $events->listen(
            Logout::class,
            [UserEventSubscriber::class, 'handleUserLogout']
        );

        $events->listen(
            Registered::class,
            [UserEventSubscriber::class, 'handleUserRegister']
        );
    }
}