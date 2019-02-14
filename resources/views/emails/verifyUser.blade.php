<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

        <!-- Styles -->
    </head>
    <body>
        <ul>
            <li>Name: <span id="username"></span></li>
            <li>Email: <span id="useremail"></span></li>
            <li><button onClick="verifyUser()">Click here to activate</button></li>
        </ul>
        <script>
        var apiPath = "/api/auth/verifyUser";
        document.getElementById("username").innerHTML = window.location.pathname.split("/")[3];
        document.getElementById("useremail").innerHTML =  window.location.pathname.split("/")[4];
        var user_id = window.location.pathname.split("/")[5];
        var activationCode = window.location.pathname.split("/")[6];

        function verifyUser(){
            console.log(user_id,activationCode);
            $.post(apiPath,{ user_id: user_id, activationCode: activationCode })
            .done(function(response) {
                if(response.completed===true){
                window.location.replace("/portal");
                //console.log(response,"response");
                }else{
                    alert(response);
                }
            });
        }   
        </script>
    </body>
</html>
