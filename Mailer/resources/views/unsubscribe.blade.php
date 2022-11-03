<!DOCTYPE html>
<html lang="ru">

<head>

    <base href="{{$baseUrl}}">
    <title>Отмена подписки</title>

    @vite('resources/css/app.css')

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="align-center">Подписка отменена</h2>
            <p class="align-center">Электронная почта {{ $email }} успешно удалена из рассылок</p>
        </div>
    </div>
</div>

@vite('resources/js/app.js')

</body>
</html>
