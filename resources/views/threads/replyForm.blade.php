<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Add New Reply
            </div>
            <div class="card-body">
                <form action="/threads/{{$thread->channel->slug}}/{{$thread->id}}/reply" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <textarea class="form-control" name="body" id="body" cols="30" rows="5" placeholder="add new comment" required>

                        </textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-outline-primary" name="submit" value="Comment" title="click to send comment">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
