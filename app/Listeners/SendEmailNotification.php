<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
//use Illuminate\Auth\Events\Login; //for login...
use App\Services\Register;

class SendEmailNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->mailer = new Register;
    }

    /**
     * Handle the event.
     *
     * @param  Registered $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $this->mailer->funcSend('Was registred', $event->user->email);
    }
}
