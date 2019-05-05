<?php

namespace App\Http\Controllers;
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threads = Thread::orderBy('created_at','desc')->paginate(10);
        return view('threads.index',compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('threads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'title' => 'required|min:2',
           'body' => 'required|min:1',
            'channel_id' => 'required|exists:channels,id',
        ]);

         $thread = Thread::create([
             'user_id' => auth()->id(),
             'channel_id' => 1,
             'title' => $request['title'],
             'body' => $request['body'],
        ]);
        Session(['success'=>'thread created Successfully']);
         return redirect()->route('threads.show',['id'=>$thread->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show($channelId,Thread $thread)
    {
       return view('threads.show',compact('thread'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        return view('threads.edit',compact('thread'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        $request->validate([
            'title' => 'required|min:2',
            'body' => 'required|min:1',
        ]);

        $thread->title = $request['title'];
        $thread->body = $request['body'];
        $thread->save();
        Session(['success'=>'thread updated Successfully']);
        return redirect()->route('threads.show',['id'=>$thread->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        $thread->delete();
        Session(['info'=>'thread deleted Successfully']);
        return redirect('/threads');
    }
}
