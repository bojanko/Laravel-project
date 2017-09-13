@extends("master")

@section("title", "Contact Laravel-powered blog owner!")

@section("content")
    @include("page")
    <br />
    <h2>Contact me</h2>
    <br />
    @include("email.form")
@endsection
