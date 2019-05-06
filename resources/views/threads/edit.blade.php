@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit "{{$thread->title}}" Thread
                        <a href="{{route('threads.show',['thread'=>$thread])}}"
                        class="btn btn-outline-info float-right btn-sm">
                            Cancel
                        </a>
                    </div>

                    <div class="card-body">
                        @include('partials.errors')
                        <form action="{{url('threads',['thread'=>$thread])}}" method="post" enctype="multipart/form-data" >
                            @csrf
                            {{method_field('PATCH')}}
                            <div class="form-group">
                                <lable for="title">
                                    Thread Title
                                </lable>
                                <input type="text" class="form-control" name="title" placeholder="Thread title" required value="{{$thread->title}}">
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="channel_id" name="channel_id">
                                    @foreach($channels as $channel)
                                        <option value="{{$channel->id}}">
                                            {{$channel->name}}
                                        </option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <lable for="body">
                                    Thread Body
                                </lable>
                                <textarea name="body" class="form-control" id="body" cols="30" rows="5" placeholder="have something to say ?" required>
                                    {{$thread->body}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-sm" name="addthread" id="addthread" value="Re-Publish">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
