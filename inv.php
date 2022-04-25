<?php
session_start();
$connection = mysqli_connect('127.0.0.1', 'root', 'password', 'radio');
$ti = time();
mysqli_query($connection, "INSERT INTO `invites` (`login`, `radio`, `sec`, `who`) VALUES ('$_SESSION[user]', $_SESSION[radio_l], $ti, '$_GET[acc]')");
echo '<META HTTP-EQUIV="REFRESH" content="0; URL=http://radio-red.ru/radio.php?radio=' . $_SESSION[radio_l] . '">';
?>
