@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        @if (Auth::check())

                        @if(Auth::id() == $thread->user->id)
                            <div class="float-right">
                                <form action="{{route('threads.destroy',['thread'=>$thread])}}" method="post" enctype="multipart/form-data" onclick="return confirm('Are you sure you want to delete {{$thread->title}} thread')">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <input type="submit" class="btn btn-outline-danger btn-sm" name="submit" value="Delete">
                                </form>
                            </div>
                            <div class="float-right" style="padding-right: 10px;">
                                <a href="{{route('threads.edit',['thread'=>$thread])}}" class="btn btn-outline-primary btn-sm">Edit</a>
                            </div>
                            @endif
                        @endif
                        <small>
                           <a href="#">
                                {{$thread->user->name}}
                            </a>
                        </small>
                            @if(auth()->id() == $thread->user->id)
                                you posted
                                @else
                                posted
                                @endif

                        <h4>{{$thread->title}}</h4>
                    </div>
                    <div class="card-body">
                        {{$thread->body}}
                    </div>

                </div>

            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
              @foreach($thread->replies as $reply)
                  @include('threads.replies')
                  @endforeach
            </div>

        </div>
        @if(Auth::check())
            @include('threads.replyForm')
        @else
            <div class="row justify-content-center">
                <div class="col-md-8">
            <p class="text-center alert alert-info">Please <a href="{{route('login')}}">Signin</a> to participate in this discussion </p>
                </div>
            </div>
        @endif
    </div>
@endsection
