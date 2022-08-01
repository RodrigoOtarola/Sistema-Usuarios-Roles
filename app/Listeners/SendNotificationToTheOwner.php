<?php

namespace App\Listeners;

use App\Event\MessageWasReceived;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNotificationToTheOwner
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
     * @param  \App\Event\MessageWasReceived  $event
     * @return void
     */
    public function handle(MessageWasReceived $event)
    {
        $message = $event->message;

        Mail::send('emails.contact',['msg'=>$message], function($m) use ($message){

            $m->from($message->email, $message->name)
                ->to('rodrigo@rotarola.cl','Rodrigo')
                ->subject('Mensaje recibido con exito');
        });
    }
}
