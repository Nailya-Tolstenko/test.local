<?php

//Включаем вывод ошибок
error_reporting(E_ALL | E_STRICT);
ini_set('display_startup_errors', 0);
ini_set('display_errors','On');

/*require_once('./inc/db.php');

$sqlUser = mysqli_query($db, "SELECT * FROM t_user WHERE id = '1'");

$user = mysqli_fetch_row($sqlUser);

//print_r($user);

echo $user[1];

$sqlUser2 = mysqli_query($db, "SELECT * FROM t_user WHERE id = '1'");

$user2 = mysqli_fetch_assoc($sqlUser2);

//print_r($user2);

echo '<br />';

echo $user2['username'];
echo '<br />'; */

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <script src="http://ajax.googlleapis.com/ajax/libs/jquery/1.7/.1/jqery.min.js">

    </script>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js">
    </script>
</head>

<body>
<form action="./reg.php" method="post" style="text-align:center; margin-top:100px">

<input type="text" name="login" id="login" placeholder="Введите логин">
<input type="email" name="email" id="email" placeholder="Введите email">
<input type="submit" id="btn" value="Зарегистрироваться">

</form>

<div id="mes"></div>

<script>
$ (DOCUMENT) .on('click','#btn', function(e) {
    e.preventDefault()


var login=$('#login').val();
var email=$('#email').val();
    $ajax( {
        url: '/reg.php',
        data:{'login':login, 'email':email},
        dataType: "html", 
        metod: "post",
        success:function(data){
            $('#mes').htm(data);
        },
    });
});


    </script>

</body>
</html>

