<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_startup_errors', 0);
ini_set('display_errors','On');


require ('connect.php');
$login = $_POST['login'];
$email = $_POST['email'];
if ($login==''){
	echo 'ведите логин';
}
elseif($email==''){
	echo 'Введите email';
}

echo $sql="INSERT INTO users(login,email) VALUES($login,$email)";
//$dbh->exec($sql);

echo "Вы зарегистрировались";