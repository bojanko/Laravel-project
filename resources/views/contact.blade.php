@extends("master")

@section("title", "Contact Laravel-powered blog owner!")

@section("content")
    <h2>{{ $content['naslov'] }}</h2>
    <p>{{ $content['sadrzaj'] }}</p>
    <br />
    <h2>Contact me</h2>
    <br />
    @include("email.form")
@endsection
