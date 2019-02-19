<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="css/animate.3.7.0.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/style.css">
        <title>School portal</title>
        <link rel="stylesheet" href="/css/vue-tags-input.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/css/style.css">
        <!-- Styles -->

    </head>
    <body>
        <div id="mainApp" class>
            <main-component></main-component>
        </div>
    </body>
    <script src="/js/jquery.3.2.1.js"></script>
    <script src="/js/sweetalert.2.1.2.js"></script>
    <script src="/js/app.js?1"></script>
    <!-- <script>
        alert("education-portal");
    </script> -->
</html>
