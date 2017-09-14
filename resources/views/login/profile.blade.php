@extends("master")

@section("title", "Laravel-powered blog profile management!")

@section("content")
<h3>Username: {{ $user['name'] }}</h3>
<h3>Email: {{ $user['email'] }}</h3>
<h3>Role: {{ $user['manager'] == 1 ? 'Admin' : 'Regular user' }}</h3>

@unless(App\AdminRequest::where('email', '=', $user['email'])->exists())
    <br />
      <a class="btn btn-default btn-block" href="/profile/request"
      >Request admin privileges</a>
@endunless

@if(Session::has('request_message'))
    <br />
    <div class="alert alert-warning">
      <span class="glyphicon glyphicon-ok"></span>
      <em> {!! session('request_message') !!}</em>
    </div>
@endif

<br />

<h3>Change password:</h3>
<br />

<form method="post" action="/profile">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" name="password" class="form-control" id="password">
  </div>
  <div class="form-group">
    <label for="password_confirmation">Confirm password:</label>
    <input type="password" name="password_confirmation" class="form-control"
    id="password_confirmation">
  </div>

  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  @if(Session::has('password_change'))
      <div class="alert alert-success">
        <span class="glyphicon glyphicon-ok"></span>
        <em> {!! session('password_change') !!}</em>
      </div>
  @endif

  <button type="submit" class="btn btn-default btn-block">Submit</button>
</form>
@endsection
