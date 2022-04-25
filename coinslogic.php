<?php
session_start();
$connection = mysqli_connect('127.0.0.1', 'root', 'password', 'radio');
$logget = mysqli_query($connection, "SELECT * FROM `accaunts`  WHERE `login` = '$_SESSION[user]'");
if(($acc = mysqli_fetch_assoc($logget))){
    echo $acc[coins] + 1;
    $to = $acc[coins] + 1;
    mysqli_query($connection, "UPDATE `accaunts` SET `coins` = '$to' WHERE `accaunts`.`login` = '$_SESSION[user]'");
}
?>
