<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SPA - Laravel</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div id="app">
        <header-component></header-component>
        {{-- <h1>Hello wolrd @{{ title }}</h1> --}}
        <router-view></router-view>
        {{-- <h1 v-text="`Hello ` + title"></h1> --}}
        {{-- <example-component></example-component> --}}
        <footer-component></footer-component>
    </div>
    {{-- <example-component></example-component> --}}
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
