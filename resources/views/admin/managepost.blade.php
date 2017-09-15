@extends("admin.master")

@section("title", "Welcome to Laravel-powered blog app!")

@section("content")
<h2>Manage posts</h2>

@if($data->count() > 0)

@foreach($data as $post)
    <h3>Title: {{ $post['naslov'] }}</h3>
    @if(strlen($post['sadrzaj']) > 100)
        <p>{{ substr(strip_tags($post['sadrzaj']),0, 100)."..." }}</p>
    @else
        <p>{{ $post['sadrzaj'] }}</p>
    @endif

    <div class="row">
        <div class="col-sm-6">
            <a class="btn btn-default navbar-btn  btn-block"
            href="/admin/managepost/edit/{{ $post['id'] }}">Edit post</a>
        </div>
        <div class="col-sm-6">
            <a class="btn btn-default navbar-btn  btn-block"
            href="/admin/managepost/delete/{{ $post['id'] }}">Delete post</a>
        </div>
    </div>

    <hr />
@endforeach

	{{ $data->links() }}

@else
    <h3>No posts yet!</h3>
@endif

@endsection
