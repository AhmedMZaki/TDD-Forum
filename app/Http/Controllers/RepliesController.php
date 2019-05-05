<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Reply;
class RepliesController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
    }

    public function addReply($channelId,Request $request,$thread)
    {
        $request->validate([
           'body' => 'required|min:1|max:500',
        ]);


        Reply::create([
           'user_id' => auth()->user()->id,
            'thread_id' => $thread,
            'body' => $request['body'],
        ]);

        return redirect()->back();

    }
}
