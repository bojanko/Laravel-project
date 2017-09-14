@extends('master')

@section("title", "Welcome to Laravel-powered blog register page!")

@section("content")

  <form method="post" action="/register">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" name="username" class="form-control" id="username"
      value="{!! old('username') !!}">
    </div>
    <div class="form-group">
      <label for="email">Email address:</label>
      <input type="text" name="email" class="form-control" id="email"
      value="{!! old('email') !!}">
    </div>
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

    <button type="submit" class="btn btn-default btn-block">Submit</button>
  </form>

@endsection
