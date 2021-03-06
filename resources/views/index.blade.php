<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Phrasis</title>

    <!-- Fonts -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="app">
        <header-component></header-component>
        <div class="container-lg mt-5">
            <phrases-list :phrases='{!! json_encode($phrases) !!}'></phrases-list>
        </div>
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>

</html>