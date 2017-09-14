@extends('master')

@section("title", "Welcome to Laravel-powered blog login page!")

@section("content")

  <form method="post" action="/login">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="email">Email address:</label>
      <input type="text" name="email" class="form-control" id="email"
      value="{!! old('email') !!}">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" name="password" class="form-control" id="password">
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

    @if(Session::has('flash_message'))
        <div class="alert alert-success">
          <span class="glyphicon glyphicon-ok"></span>
          <em> {!! session('flash_message') !!}</em>
        </div>
    @endif
    @if(Session::has('password_error'))
        <div class="alert alert-danger">
          <span class="glyphicon glyphicon-remove"></span>
          <em> {!! session('password_error') !!}</em>
        </div>
    @endif

    <button type="submit" class="btn btn-default btn-block">Submit</button>
  </form>

@endsection
