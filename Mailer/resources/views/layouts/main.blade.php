<!DOCTYPE html>
<html lang="ru">

<head>

    <base href="{{$baseUrl}}">
    <title>Mailer</title>

    @vite(['resources/css/app.css'])

{{--    <link rel="shortcut icon" href="/favicon.ico" />--}}

    <script src="https://cdn.tiny.cloud/1/pwwklnveu0jc4p1ceg32skwkcquplljar7c0z299id0813yn/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

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

                @section('add-addressbook-form')
                @show

                @section('contact-list')
                @show

                @section('templates')
                @show

                @section('add-template-form')
                @show

                @section('edit-template-form')
                @show

                @section('mailing-lists')
                @show

                @section('add-mailinglist-form')
                @show

                @section('edit-mailinglist-form')
                @show

            </div>
        </div>
    </div>

    @vite(['resources/js/app.js'])

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'image autolink lists media table',
            toolbar: 'styleselect bold italic alignleft aligncenter alignright a11ycheck addcomment showcomments casechange checklist code export formatpainter image editimage pageembed permanentpen table tableofcontents',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            language: 'ru',
        });
    </script>

</body>
</html>
