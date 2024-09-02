<?php

namespace App\Http\Controllers;

use App\Events\UserMessageEvent;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $message = $request->input('message');
        UserMessageEvent::dispatch($message);
        return response()->json(['status' => 'Message sent']);
    }
}
