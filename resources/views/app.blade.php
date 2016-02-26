<!DOCTYPE html >
<head>
    <title>HourTubeShare</title>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,minimum-scale=1.0" />
	<meta name="description" content="Share & Watch Interesting Videos Every Hour" />        

    
    <link rel="stylesheet" type="text/css" href="/dist/css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/dist/css/flat-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/dist/css/fonts.css" />
    <link rel="stylesheet" type="text/css" href="/dist/css/magnific-popup.css" />
    <link rel="stylesheet" type="text/css" href="/dist/css/style.css" />

	<script src="/dist/js/vendor/jquery.min.js" type="text/javascript"></script>    
	<script src="/dist/js/vendor/html5shiv.js" type="text/javascript"></script>    
	<script src="/dist/js/vendor/respond.min.js" type="text/javascript"></script>    
	<script src="/dist/js/flat-ui.min.js" type="text/javascript"></script>    
	<script src="/dist/js/magnific-popup.min.js" type="text/javascript"></script>    
	<script src="/dist/js/bootbox.min.js" type="text/javascript"></script>    
        
</head>

@include('partials.header')
@include('partials.menu')        
@include('flash::message')
        @yield('content')


<script>
    $('#flash-overlay-modal').modal();

    $('div.alert').delay(3000).slideUp(400)
</script>
        @yield('footer')


</html>