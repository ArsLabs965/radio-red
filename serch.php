<!DOCTYPE html>
<html lang="ru">
<head>
<link rel="shortcut icon" href="ico.png" type="image/x-icon">
<link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Поиск</title>
</head>
<body>
<div id="center">
<div id="bgr">
<a style="color: White;" href="index.php">На главную</a>
</div>
<div id="bgr">
<h1>Результаты поиска по запросу "<?php echo $_GET[serch]; ?>":</h1>
</div>

    <?php
    $as = 0;
         $connection = mysqli_connect('127.0.0.1', 'root', 'password', 'radio');
         $wall = mysqli_query($connection, "SELECT * FROM `dns` WHERE `name` = '$_GET[serch]'");
        if(($walluse = mysqli_fetch_assoc($wall))){
            echo '<div id="bgr">';
                echo 'DNS: <a id="red" href="http://radio-red.ru/dns.php?dns=' . $_GET[serch] . '">' . $_GET[serch] . '</a>';
            echo '</div>';
        }else{
           $as++;
        }

        $wall = mysqli_query($connection, "SELECT * FROM `accaunts` WHERE `login` = '$_GET[serch]'");
        if(($walluse = mysqli_fetch_assoc($wall))){
            echo '<div id="bgr">';
                echo 'Аккаунт: <a id="red" href="http://radio-red.ru/accaunt.php?acc=' . $_GET[serch] . '">' . $_GET[serch] . '</a>';
            echo '</div>';
        }else{
           $as++;
        }

        $val = preg_replace('/[^0-9]/', '', $_GET[serch]);
        if($val != ''){
            echo '<div id="bgr">';
                echo 'Радиостанция: <a id="red" href="http://radio-red.ru/radio.php?radio=' . $val . '">' . $val . '</a>';
            echo '</div>';
        }else{
           $as++;
        }
        if($as == 3){
            echo '<div id="bgr">';
                echo 'К сожалению ничего не найдено :(';
            echo '</div>';
        }
         mysqli_close($connection);
    ?>
   
</div>
</body>
</html>