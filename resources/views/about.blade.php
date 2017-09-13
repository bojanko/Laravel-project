@extends("master")

@section("title", "About Laravel-powered blog app!")

@section("content")
    <h2>{{ $content['naslov'] }}</h2>
    <p>{{ $content['sadrzaj'] }}</p>
@endsection
