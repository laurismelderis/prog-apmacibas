<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, width=device-width"/>
        <title>Laravel & React</title>
    
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    
    <body>
        <div id="app"></div>
        <script>
            let authUser = {!! json_encode(Auth::user()) !!}
        </script>
        <script src="{{asset('js/app.js')}}"></script>
    </body>

</html>