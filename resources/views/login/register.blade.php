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
    <input name="val1" type="hidden" value="{{ $val1 = rand(1, 19) }}" >
    <input name="val2" type="hidden" value="{{ $val2 = rand(1, 19) }}" >

    <div class="form-group">
      <label for="captcha">Enter result: {{ $val1 }} + {{ $val2 }}</label>
      <input type="captcha" name="captcha" class="form-control" id="captcha">
    </div>

    <button type="submit" class="btn btn-default btn-block">Submit</button>
  </form>

@endsection
