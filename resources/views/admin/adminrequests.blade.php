@extends("admin.master")

@section("title", "Welcome to Laravel-powered blog app!")

@section("content")
<h2>Admin requests</h2>

@if($data->count() > 0)

@foreach($data as $request)
    <h3>User: {{ $request['name'] }}</h3>
    <h3>Email: {{ $request['email'] }}</h3>

    <div class="row">
        <div class="col-sm-6">
            <a class="btn btn-default navbar-btn  btn-block"
            href="/admin/adminrequests/approve/{{ $request['user_id'] }}_{{ $request['id'] }}">Approve</a>
        </div>
        <div class="col-sm-6">
            <a class="btn btn-default navbar-btn  btn-block"
            href="/admin/adminrequests/disapprove/{{ $request['id'] }}">Disapprove</a>
        </div>
    </div>

    <hr />
@endforeach

	{{ $data->links() }}

@else
    <h3>No admin requests yet!</h3>
@endif

@endsection
