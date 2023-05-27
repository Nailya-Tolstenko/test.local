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

    <!-- Оф сайт - https://jquery.com/download/ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    <style>
        #mes {
            text-align: center;
            color: #FF0000;
            margin-top: 20px;
        }
    </style>

</head>

<body>

    <form id="reg-form" action="./reg.php" method="post" style="text-align: center; margin-top: 100px">
        <input type="text" name="login" id="login" placeholder="Введите логин" required="true">
        <input type="email" name="email" id="email" placeholder="Введите email" required="true">
        <input type="submit" id="btn" value="Зарегистрироваться">
    </form>

    <div id="mes"></div>

    <script>

        //document это главный элемент dom дерева странички
        //Говорим что по событию submit формы с id=reg-form
        //Запустить код который внутри
        //submit срабатывает когда мы отправляем форму
        $(document).on('submit', '#reg-form', function(e) {

            //Тут мы предотвращаем отправку формы чтобы страничку не перезагрузилась
            //после того как кнопка Зарегистрироваться была нажата
            e.preventDefault();

            //Данные со всех полей формы лучше получать вот так
            var data = $(this).serializeArray();

            //Для проверки можно вывести данные в консоль, которая в браузере есть
            console.log(data);

            //Передаём данные формы в файлик reg.php
            $.ajax({
                url: '/reg.php',
                data: data,
                dataType: 'html', 
                type: 'post',
                success:function(data) {
                    //Просто выводим а экран то что нам вернул файлик reg.php
                    $('#mes').html(data);
                },
            });

        });

    </script>

</body>
</html>

