@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Thread</div>
                    <div class="card-body">
                        @include('partials.errors')
                        <form action="{{url('threads')}}" method="post" enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                                <lable for="title">
                                    Thread Title
                                </lable>
                                <input type="text" class="form-control" name="title" placeholder="Thread title" value="{{old('title')}}" required >
                            </div>
                            <div class="form-group">
                                <lable for="body">
                                    Thread Body
                                </lable>
                                <textarea name="body" class="form-control" id="body" cols="30" rows="5" placeholder="have something to say ?" required>
                                  {{old('body')}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-sm" name="addthread" id="addthread" value="Publish">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
