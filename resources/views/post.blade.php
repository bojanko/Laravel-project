@foreach($content as $post)

    <h2>{{ $post['naslov'] }}</h2>
    <p>{{ $post['tekst'] }}</p>

@endforeach
