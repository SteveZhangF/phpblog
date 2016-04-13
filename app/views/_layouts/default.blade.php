<!DOCTYPE html>

<html>

<head lang="zh">

	<meta charset="UTF-8"/>

	<title>Steve</title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>

	<meta name="viewport"

	content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<meta name="format-detection" content="telephone=no"/>

	<meta name="renderer" content="webkit"/>

	<meta http-equiv="Cache-Control" content="no-siteapp"/>

	<link rel="alternate icon" type="image/x-icon" href="{{ URL::asset('i/favicon.ico') }}"/>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
	integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
	integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      {{ HTML::style('css/custom.css') }}
  </head>

  <body>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
  	integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
  	crossorigin="anonymous"></script>

  	<header>


  		@include('_layouts.nav')


  	</header>

  	<div class="container"> 

  		@yield('main')

  	</div>

  	@include('_layouts.footer')

  </body>

  </html>