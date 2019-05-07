<?php

namespace App\Http\Controllers;
use App\Channel;
use Auth;
use App\Thread;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
class ThreadsController extends Controller
{

    public function __construct()
    {
         $this->middleware('auth')->except(['index','show']);
    }


    public function index($channelSlug = null)
    {
        if ($channelSlug)
        {
            $channelId = Channel::where('slug',$channelSlug)->first()->id;
            $threads = Thread::where('channel_id',$channelId)->latest()->paginate(10);
        } else {
            $threads = Thread::orderBy('created_at','desc')->paginate(10);
        }

        return view('threads.index',compact('threads'));
    }



    public function create()
    {
        $channels = Channel::all();
        return view('threads.create',compact('channels'));
    }


    public function store(Request $request)
    {
        $request->validate([
           'title' => 'required|min:2',
           'body' => 'required|min:1',
            'channel_id' => 'required|exists:channels,id',
        ]);

         $thread = Thread::create([
             'user_id' => auth()->id(),
             'channel_id' => $request['channel_id'],
             'title' => $request['title'],
             'body' => $request['body'],
        ]);
         $channelName = Channel::where('id',$request['channel_id'])->first()->name;
        Session(['success'=>'thread created Successfully']);
         return redirect('/threads/'.$channelName.'/'.$thread->id);
    }


    public function show($channelId,Thread $thread)
    {
       return view('threads.show',compact('thread'));
    }

    public function edit(Thread $thread)
    {
        $channels = Channel::all();
        return view('threads.edit',compact('channels','thread'));
    }


    public function update(Request $request, Thread $thread)
    {
        $request->validate([
            'title' => 'required|min:2',
            'body' => 'required|min:1',
            'channel_id' => 'required|exists:channels,id',
        ]);

        $thread->title = $request['title'];
        $thread->body = $request['body'];
        $thread->save();
        $channelName = Channel::where('id',$request['channel_id'])->first()->name;
        Session(['info'=>'thread updated Successfully']);
        return redirect('/threads/'.$channelName.'/'.$thread->id);
    }


    public function destroy(Thread $thread)
    {
        $thread->delete();
        Session(['info'=>'thread deleted Successfully']);
        return redirect('/threads');
    }
}
