<?php

namespace App\Listeners;

use App\Events\UserMessageEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProcessUserMessage
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserMessageEvent $event)
    {
        // Mesajı işleyin, örneğin bir veri tabanına kaydedin veya başka işlemler yapın
    }
}
