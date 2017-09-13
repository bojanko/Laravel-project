@extends("master")

@section("title", "Welcome to Laravel-powered blog app!")

@section("content")
    @foreach($content as $post)

    	<h2><a href="/post/{{ $post['id'] }}">{{ $post['naslov'] }}</a></h2>
    	@if(strlen($post['sadrzaj']) > 500)
          <p>{{ substr(strip_tags($post['sadrzaj']),0, 500)."..." }}</p>
      @else
          <p>{{ $post['sadrzaj'] }}</p>
      @endif
      <br />
      <a href="/post/{{ $post['id'] }}" class="btn btn-default navbar-btn  btn-block">
          Show post and comments
      </a>
      <br />

	@endforeach

	{{ $content->links() }}

@endsection
