<?php
session_start();
?>
<br>
<?php
$connection = mysqli_connect('127.0.0.1', 'root', 'password', 'radio');
        $wall = mysqli_query($connection, "SELECT * FROM `friends` WHERE `friend` = '$_SESSION[user]' ORDER BY `id` DESC");
        while(($walluse = mysqli_fetch_assoc($wall))){
            $wa = mysqli_query($connection, "SELECT * FROM `accaunts` WHERE `login` = '$walluse[login]'");
            $ac = mysqli_fetch_assoc($wa);
            if($ac[ava] != NULL){
                $show_img = base64_encode($ac[ava]);
                   
                    
                echo '<img src="data:image/jpeg;base64, '. $show_img .'" alt="Изображение не добавлено"  width="20px">';
                
                }
            echo ' <a href="http://radio-red.ru/inv.php?acc=' . $walluse[login] . '" style="color: Red;">';
            echo $walluse[login];
            if($ac[v])
    echo '<img src="img/v.png" alt="Изображение не добавлено"  width="15px">';
            echo '</a><br><a style="color: Grey;">';
            echo $ac[name];
            
            echo '</a><br><br>';
        }
    
    
?>
