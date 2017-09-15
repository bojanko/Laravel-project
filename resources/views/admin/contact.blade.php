@extends("admin.master")

@section("title", "Welcome to Laravel-powered blog app!")

@section("content")
<h2>Update contact page content</h2>

<form method="post" action="/admin/contact">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="title">Username:</label>
    <input type="text" name="title" class="form-control" id="title"
    value="{{ old('title') !== null ?  old('title') : $data['naslov'] }}">
  </div>
  <div class="form-group">
    <label for="text">Text:</label>
    <textarea rows="10" name="text" class="form-control" id="text"
    >{{ old('text') !== null ?  old('text') : $data['sadrzaj']  }}</textarea>
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

  @if(Session::has('admin_flash_message'))
      <div class="alert alert-success">
        <span class="glyphicon glyphicon-ok"></span>
        <em> {!! session('admin_flash_message') !!}</em>
      </div>
  @endif

  <button type="submit" class="btn btn-default btn-block">Modify data</button>
</form>
@endsection
