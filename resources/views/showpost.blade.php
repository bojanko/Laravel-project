@extends("master")

@section("title", $content['naslov'])

<div class="jumbotron clearfix">
    <div class="col-xs-8 col-xs-offset-2">
        <h1 class="text-center">{{ $content['naslov'] }}</h1>
    </div>
</div>

@section("content")
    <p>{{ $content['sadrzaj'] }}</p>

    @if($comments->count() > 0)
        <br />
        <h3>Comments:</h3>

        @foreach($comments as $com)
            <h3>{{ $com->ime }}</h3>
        @endforeach
    @else
        <br />
        <h3>No comments yet!</h3>
    @endif

    <br />
    <h2>Add comment</h2>
    @include("comment.form")
@endsection
