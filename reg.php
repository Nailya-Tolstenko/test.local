<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_startup_errors', 0);
ini_set('display_errors', 'On');

//Подключаемся к базе через файл connect.php
require ('./connect.php');

//@ - собачка нужна чтобы экранировать ошибки если переменная не передана по каким либо причинам
$login = @$_POST['login'];
$email = @$_POST['email'];

// $login = 'asdadsadas';
// $email = 'email@yanerrere.ere';

try {

	//Если пустая переменная login тогда говорим ввести логин
	//Если пустой Email тогда говорим ввести Email
	if (empty($login) || empty($email)) {
		throw new PDOException('Ведите логин и Email.');
	}

	//Запрашиваем пользователя с Email адресом который ввели в форме
	$sqlGetUser = $dbh->query("SELECT * FROM users WHERE email = '$email'");

	//Если такой пользователь есть - выводим ошибку что он уже зарегистрирован
	if ($sqlGetUser->rowCount()) {
		throw new PDOException('Пользователь с таким Email адресом уже зарегистрирован!');
	}

	//Генерируем пароль так как мы не указали его в форме
	//md5 превращает наш пароль в хэш так как пароль в базе нельзя хранить в исходном виде
	//только в зашифрованном
	$password = md5(random_bytes(10));

	//Сохраняем запрос в переменную $sql
	$sql = "INSERT INTO users(`login`, `email`, `password`) VALUES('$login', '$email', '$password')";

	//Получаем количество выполненных запросов
	$res = $dbh->exec($sql);

	//Проверяем работает запрос или нет
	if ($res) {

		//Тут мы получаем последний id-ник который есть в ТАБЛИЦЕ users
		$userId = $dbh->lastInsertId();
		echo 'Вы зарегистрировались под номером #' . $userId;

	} else {
		//Если нет то выводим ошибку
		//$dbh->errorInfo() - это массив с ошибками
		throw new PDOException('Запрос не выполнен - ' . print_r($dbh->errorInfo(), true));
	}

} catch(PDOException $e) {
	
	//В этот блок у нас попадают ошибки
	echo $e->getMessage();

}