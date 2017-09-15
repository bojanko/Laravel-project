@extends("admin.master")

@section("title", "Welcome to Laravel-powered blog app!")

@section("content")
<h2>Moderate comments</h2>

@if($data->count() > 0)

@foreach($data as $comment)
    <h3>User: {{ $comment['ime'] }}</h3>
    <h4>Post name: {{ $comment->post->naslov }}</h4>
    <p>{{ $comment['sadrzaj'] }}</p>

    <div class="row">
        <div class="col-sm-6">
            <a class="btn btn-default navbar-btn  btn-block"
            href="/admin/comments/approve/{{ $comment['id'] }}">Approve comment</a>
        </div>
        <div class="col-sm-6">
            <a class="btn btn-default navbar-btn  btn-block"
            href="/admin/comments/delete/{{ $comment['id'] }}">Delete comment</a>
        </div>
    </div>

    <hr />
@endforeach

	{{ $data->links() }}
  
@else
    <h3>No comments yet!</h3>
@endif

@endsection
