<?php
     $connection = mysqli_connect('127.0.0.1', 'root', 'root', 'room');
     $wall = mysqli_query($connection, "SELECT * FROM `last`");
     if(($acc = mysqli_fetch_assoc($wall))){
      echo $acc[type];
     }
     mysqli_close($connection);
?>