<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield("title")</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<style>
			.navbar-right{
				margin-right: 0px;
        margin-left: 10px;
			}
			.pagination>li>a{
				color: #777;
			}
			.pagination>.active>a, .pagination>.active>a:focus,
			.pagination>.active>a:hover, .pagination>.active>span,
			.pagination>.active>span:focus, .pagination>.active>span:hover{
				background-color: #ddd;
				border-color: #ddd;
				color: #777;
			}
		</style>
	</head>

    <body>
        @include("navbar")

        <div>
            <div class="col-xs-8 col-xs-offset-2">
                @yield("content")
            </div>
        </div>
    </body>
</html>
