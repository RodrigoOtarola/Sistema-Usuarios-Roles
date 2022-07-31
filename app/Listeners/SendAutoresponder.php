<?php

namespace App\Listeners;

use App\Event\MessageWasReceived;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendAutoresponder
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
        //dd($event->message);

        //Para pasar parametros del envió de datos.
        $message = $event->message;

        Mail::send('emails.contact',['msg'=>$message], function($m) use ($message){

            $m->to($message->email, $message->name)->subject('Mensaje recibido con exito');
        });
    }
}
