<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
        
        // $this->middleware(function ($request, $next) {

        //    dd( $this->user = Auth::user());

        // });
    }

    public function index()
    {
        return view('message.chats');
    }

    public function fetchMessages()
    {
        return Message::with('user')->get();
    }

    public function sendMessages(Request $request)
    {
        
       $message = auth()->user()->messages()->create([

            'message' => $request->message
        ]);

        broadcast(new MessageSent($message->load('user')));

        return ['status' => 'success'];
    }
}
