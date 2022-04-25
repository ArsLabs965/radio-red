<?php
session_start();
if(isset($_POST[btn]) AND isset($_POST[psw]) AND isset($_POST[radio])){
    $connection = mysqli_connect('127.0.0.1', 'root', 'password', 'radio');
    $wall = mysqli_query($connection, "SELECT * FROM `moder` WHERE `radio` = '$_POST[radio]'");
    if(($walluse = mysqli_fetch_assoc($wall))){
        echo "ТАКАЯ ЗАПИСЬ УЖЕ СУЩЕСТВУЕТ!!!";
    }else{
        mysqli_query($connection, "INSERT INTO `moder` (`radio`, `password`) VALUES ('$_POST[radio]', '$_POST[psw]')");
        echo "СОЗДАНО Ожидайте разрешения модератора!!!";
    }

    
    
    mysqli_close($connection);
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<link rel="shortcut icon" href="ico.png" type="image/x-icon">
<link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radio Red</title>
</head>
<body>
<div id="center">
<div id="bgr">
<h1>Запросить приват</h1>
<a style="color: White;" href="index.php">Назад</a>
</div>
<div id="bgr">
<form action="" method="POST">
        <input id="in" type="text" name="radio" placeholder="Радиостанция"><br><br>
        <input id="in" type="password" name="psw" placeholder="Пароль"><br><br>
        <input id="in" type="submit" name="btn" value="Добавить">
    </form>
</div>
</div>
</body>
</html>