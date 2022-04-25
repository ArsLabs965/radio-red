<br>
<?php
$connection = mysqli_connect('127.0.0.1', 'root', 'password', 'radio');
    if($_GET[w] == 0){
        $wall = mysqli_query($connection, "SELECT * FROM `friends` WHERE `login` = '$_GET[who]' ORDER BY `id` DESC");
        while(($walluse = mysqli_fetch_assoc($wall))){
            $wa = mysqli_query($connection, "SELECT * FROM `accaunts` WHERE `login` = '$walluse[friend]'");
            $ac = mysqli_fetch_assoc($wa);
            if($ac[ava] != NULL){
                $show_img = base64_encode($ac[ava]);
                   
                    
                echo '<img src="data:image/jpeg;base64, '. $show_img .'" alt="Изображение не добавлено"  width="20px">';
                
                }
            echo ' <a href="http://radio-red.ru/accaunt.php?acc=' . $walluse[friend] . '" style="color: Red;">';
            echo $walluse[friend];
            echo '</a>';
            if($ac[v])
            echo '<img src="img/v.png" alt="Изображение не добавлено"  width="15px">';
            echo '<br><a style="color: Grey;">' . $ac[name] . '</a><br><br>';
        }
    }else{
        $wall = mysqli_query($connection, "SELECT * FROM `friends` WHERE `friend` = '$_GET[who]' ORDER BY `id` DESC");
        while(($walluse = mysqli_fetch_assoc($wall))){
            $wa = mysqli_query($connection, "SELECT * FROM `accaunts` WHERE `login` = '$walluse[login]'");
            $ac = mysqli_fetch_assoc($wa);
            if($ac[ava] != NULL){
                $show_img = base64_encode($ac[ava]);
                   
                    
                echo '<img src="data:image/jpeg;base64, '. $show_img .'" alt="Изображение не добавлено"  width="20px">';
                
                }
            echo ' <a href="http://radio-red.ru/accaunt.php?acc=' . $walluse[login] . '" style="color: Red;">';
            echo $walluse[login];
            echo '</a>';
            if($ac[v])
            echo '<img src="img/v.png" alt="Изображение не добавлено"  width="15px">';
            echo '<br><a style="color: Grey;">' . $ac[name] . '</a><br><br>';
        }
    }
    
?>
<hr>
<a style="color: Red;" href="people.php">Все люди</a>