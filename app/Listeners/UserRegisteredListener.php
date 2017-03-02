<?php

namespace App\Listeners;

use App\Events\UserRegisterd;

class UserRegisteredListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserRegisterd  $event
     * @return void
     */
    public function handle(UserRegisterd $event)
    {
        $event->user->roles()->attach(3);
    }
}
