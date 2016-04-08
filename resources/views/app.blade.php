<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Master Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css"/>
</head>
<body>
    @include('partials.nav')

    <div class="container">
        @yield('content')
    </div>


    <script src="/js/all.js"></script>

    <script>
        $('#flash-overlay-modal').modal();
        // $('div.alert').not('.alert-important').delay(3000).slideUp(300);
    </script>
    @yield('footer')

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>