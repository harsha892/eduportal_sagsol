<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>
        <!-- Styles -->
    </head>
    <body>
        <ul>
            <li>Name: {{$userName}}</li>
            <li>Email: {{$email}}</li>
            <li><a href="/portal/verifyUser/{{$userName}}/{{$email}}/{{$userId}}/{{$code}}">Click here to verify your email</a></li>
        </ul>
    </body>
</html>
