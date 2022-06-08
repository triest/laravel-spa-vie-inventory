<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vue SPA Demo</title>
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />
</head>
<body>
@if (Auth::check())
    <script>window.authUser={!! json_encode(Auth::user()); !!};</script>
@else
    <script>window.authUser=null;</script>
@endif
<div id="app" style="width:800px; margin:0 auto;">
</div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
