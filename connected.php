<?php
    session_start();
    $connection = mysqli_connect('127.0.0.1', 'root', 'password', 'radio');
    if($_SESSION[idd] == NULL){
        $_SESSION[idd] = time() - rand(0, 100000);
    }
    if($_SESSION[user] != NULL){
       
     $wall = mysqli_query($connection, "SELECT * FROM `connected` WHERE `radio` = $_GET[radio] AND `name` = '$_SESSION[user]'");
     if(!($walluse = mysqli_fetch_assoc($wall))){
        $tt = time();
            mysqli_query($connection, "INSERT INTO `connected` (`radio`, `name`, `time`) VALUES ('$_GET[radio]', '$_SESSION[user]', '$tt')");
     }else{
        $tt = time();
        mysqli_query($connection, "UPDATE `connected` SET `time` = '$tt' WHERE `connected`.`name` = '$_SESSION[user]' AND `connected`.`radio` = '$_GET[radio]'");
     }
    }else{
       
        $wall = mysqli_query($connection, "SELECT * FROM `connected` WHERE `radio` = $_GET[radio] AND `name` = 'null$_SESSION[idd]'");
        if(!($walluse = mysqli_fetch_assoc($wall))){
            $tt = time();
            mysqli_query($connection, "INSERT INTO `connected` (`radio`, `name`, `time`) VALUES ('$_GET[radio]', 'null$_SESSION[idd]', '$tt')");
        }else{
            $tt = time();
            mysqli_query($connection, "UPDATE `connected` SET `time` = '$tt' WHERE `connected`.`name` = 'null$_SESSION[idd]' AND `connected`.`radio` = '$_GET[radio]'");
        }
    }
    $ty = time() - 3;
    mysqli_query($connection, "DELETE FROM `connected` WHERE `time` < $ty");
    $wall = mysqli_query($connection, "SELECT * FROM `connected` WHERE `radio` = $_GET[radio]");
    echo '<div id="bgr">Получают: ';
    $co = 0;
     while(($walluse = mysqli_fetch_assoc($wall))){
         if(strpos($walluse[name], 'null') !== false){
            $co++;
         }else{
             echo '<a href="http://radio-red.ru/accaunt.php?&acc=' . $walluse[name] . '" style="color: Red;">';
             if($_SESSION[user] == $walluse[name]){
                echo 'Вы';
             }else
            echo $walluse[name];
            echo "</a>, ";
         }
     }
     if($co != 0){
     echo 'и ещё <a style="color: Red;">';
     if($co == 1 AND $_SESSION[user] == NULL){
        echo 'Вы';
     }else
     echo $co;
     echo "</a> без имени";
     }
     echo '</div>';
?>