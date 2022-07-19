<!DOCTYPE html>
<html lang="ru">

<head>

    <base href="{{$baseUrl}}">
    <title>Mailer</title>

    @vite(['resources/css/app.css'])

    <link rel="shortcut icon" href="/favicon.ico" />

</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                @include('sidebar')
            </div>
            <div class="col-lg-10">

                    @section('addressbook-list')
                    @show

                    @section('contact-list')
                    @show

                @section('add-addressbook-form')
                @show
            </div>
        </div>
    </div>

    @vite(['resources/js/app.js'])

</body>
</html>
