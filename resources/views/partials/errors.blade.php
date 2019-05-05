@if($errors->count() > 0)
    @foreach($errors->all() as $error)
            <div>
                <li class="alert alert-danger">
                    {{$error}}
                </li>
            </div>
    @endforeach
@endif
