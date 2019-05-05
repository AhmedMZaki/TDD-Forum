@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Forum Threads</div>

                    <div class="card-body">
                        @foreach($threads as $thread)
                            <article>
                               <h4>
                                   <a href="/threads/{{$thread->channel->slug}}/{{$thread->id}}">
                                   {{$thread->title}}
                                   </a>
                               </h4>
                                <div class="card-body">
                                    {{$thread->body}}
                                </div>
                            </article>
                            @endforeach
                    </div>
                </div>
                <div class="row justify-content-center">
                <div class="modal-footer ">
                    {{$threads->links()}}
                </div>
                </div>
            </div>
        </div>

    </div>
@endsection
