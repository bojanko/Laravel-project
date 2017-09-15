<form method="post" action="">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" name="title" class="form-control" id="name"
     value="{{ old('title') !== null ? old('title') : Auth::user()->name }}">
  </div>
  <div class="form-group">
    <label for="txt">Text:</label>
    <textarea rows="10" name="text" class="form-control" id="txt"
    >{!! old('text') !!}</textarea>
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

  <button type="submit" class="btn btn-default btn-block">Send comment</button>
</form>
