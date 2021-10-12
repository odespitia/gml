<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mail\RegistredUsers;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendAdminNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        Mail::to(env('MAIL_ADMIN'))->queue(
            new RegistredUsers($this->getUserByCountry())
        );
    }

    public function getUserByCountry(){
        return User::orderBy('country')->get();
    }
}
