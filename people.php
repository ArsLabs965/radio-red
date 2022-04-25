<!DOCTYPE html>
<html lang="ru">
<head>
<link rel="shortcut icon" href="ico.png" type="image/x-icon">
<link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Люди</title>
</head>
<body>
   
        <div id="center">
        <div id="bgr">
        <a style="color: Red;" href="index.php">На главную</a><br>
        </div>
        
    <?php
$connection = mysqli_connect('127.0.0.1', 'root', 'password', 'radio');
$wall = mysqli_query($connection, "SELECT * FROM `accaunts` WHERE NOT `login` in (SELECT `login` FROM `ban`) ORDER BY RAND() DESC LIMIT 50");
while(($walluse = mysqli_fetch_assoc($wall))){
    echo '<div id="bgr">';
    $wa = mysqli_query($connection, "SELECT * FROM `accaunts` WHERE `login` = '$walluse[login]'");
    $ac = mysqli_fetch_assoc($wa);
    if($ac[ava] != NULL){
        $show_img = base64_encode($ac[ava]);
           
            
        echo '<img src="data:image/jpeg;base64, '. $show_img .'" alt="Изображение не добавлено"  width="20px">';
        
        }
    echo ' <a href="http://radio-red.ru/accaunt.php?acc=' . $walluse[login] . '" style="color: Red;">';
    echo $walluse[login];
    if($ac[v])
    echo '<img src="img/v.png" alt="Изображение не добавлено"  width="15px">';
    echo '</a>';
    echo '<br><a style="color: Grey;">' . $ac[name] . '</a><br></div>';
}
    ?>
         <div  id="bgr">
         <br> <br> <br> <br>
    <form action="" method="POST">
    
        <input id="in" type="submit" value="Ещё">
    </form>
    <br> <br> <br> <br>
    </div>
    </div>
   
</body>
</html>