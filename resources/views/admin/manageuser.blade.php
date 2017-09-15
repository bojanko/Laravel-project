@extends("admin.master")

@section("title", "Welcome to Laravel-powered blog app!")

@section("content")
<h2>Admin requests</h2>

@if($data->count() > 0)

@foreach($data as $user)
    <h3>User: {{ $user['name'] }}</h3>
    <h3>Email: {{ $user['email'] }}</h3>
    <h3>Role: {{ $user['manager'] == 1 ? 'Admin' : 'Regular user' }}</h3>

    @unless($user['superadmin'] == 1)
    <div class="row">
        <div class="col-sm-6">
            @if($user['manager'] == 1)
                <a class="btn btn-default navbar-btn  btn-block"
                href="/admin/manageuser/revokeadmin/{{ $user['id'] }}"
                >Revoke admin rights</a>
            @endif
        </div>
        <div class="col-sm-6">
            <a class="btn btn-default navbar-btn  btn-block"
            href="/admin/manageuser/delete/{{ $user['id'] }}">Delete user</a>
        </div>
    </div>
    @endunless

    <hr />
@endforeach

	{{ $data->links() }}

@else
    <h3>No admin requests yet!</h3>
@endif

@endsection
