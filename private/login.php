<?php
session_start();
include('../api/function.php');
if (isLogin()) {
    echo "<script>window.location = '../private';</script>";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Private :: Login</title>
    <script src="../script/jquery-3.1.0.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/font-awesome.css">
</head>

<style>
    body {
        margin-top: 15%;
        background-image: url('../files/background.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }

    #errors {
        display: none;
    }

    #form-container{
        padding:50px;
        background-color: rgba(255,255,255,0.5);
        border-radius:5px;
    }
</style>
<body>
<div class="container">
    <div class="col-md-5 col-md-offset-3" id="form-container">
        <h1 class="text-center">Please Login</h1>
        <div class="alert alert-warning text-center" id="errors"></div>
        <form class="form-horizontal" id="loginform">
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">Username:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" placeholder="Username">
                </div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">Password:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default btn-block">Sign in</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
<script>
    $(document).ready(function () {
        $("#loginform").click(function (e) {
            e.preventDefault();
            var errors = $("#errors");
            errors.html("");
            errors.css('display', 'none');
            var username = $('#username').val();
            var password = $('#password').val();
            var data = {
                username: username,
                password: password
            };
            $.post('../api/login.php', data, function (response) {
                var data = JSON.parse(response);
                //var data = response.parseJSON;
                //console.log(data);
                if (data.status) {
                    window.location = '../private';
                } else {
                    errors.html(data.message);
                    errors.css('display', 'block');
                }
            }).fail(function () {

            })
        });
    });
</script>
</html>