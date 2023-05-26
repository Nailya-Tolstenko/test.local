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
</head>

<body>
<form action="./reg.php" method="post" style="text-align:center; margin-top:100px">

<input type="text" name="login" placeholder="Введите логин">
<input type="email" name="email" placeholder="Введите email">
<input type="submit" value="Зарегистрироваться">

</form>

</body>
</html>

