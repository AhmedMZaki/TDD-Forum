<div class="card">
    <div class="card-header">
        <small>
            <a href="#">
                {{$reply->user->name}}
            </a>
        </small>  <small>said</small> &nbsp;&nbsp;

        <small>{{$reply->created_at->toFormattedDateString()}}</small>
    </div>
    <div class="card">
        <div class="card-body">
            {{$reply->body}}
        </div>
    </div>

</div>
