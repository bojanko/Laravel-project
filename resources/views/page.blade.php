@foreach($content as $post)

    <h2>{{ $post['naslov'] }}</h2>
    <p>{{ $post['sadrzaj'] }}</p>

@endforeach
