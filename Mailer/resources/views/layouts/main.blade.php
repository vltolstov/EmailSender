<!DOCTYPE html>
<html lang="ru">

<head>

    <base href="{{$baseUrl}}">
    <title>Mailer</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="shortcut icon" href="/favicon.ico" />

</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                @include('sidebar')
            </div>
            <div class="col-lg-10">
                @isset($addressbooks)
                @section('addressbook-list')
                @show
                @endisset
                @section('add-addressbook-form')
                @show
            </div>
        </div>
    </div>

</body>
</html>
