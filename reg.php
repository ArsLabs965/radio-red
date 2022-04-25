<?php
session_start();
$_SESSION[invreg] = $_GET[acc];
if($_SESSION[user] != NULL){
    echo '<META HTTP-EQUIV="REFRESH" content="0; URL=http://radio-red.ru">';
    }
if($_GET[acc] != NULL AND $_SESSION[lastacc] != NULL){
    $_SESSION[invreg] = NULL;
    echo 'Покиньте эту страницу или ваш Аккаунт "' . $_SESSION[lastacc] . '" будет удалён НАВСЕГДА!<br><a href="index.php">НАЗАД</a>';
}else{

?>
<!DOCTYPE html>
<html lang="ru">
<head>
<link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
</head>
<body>

       
    
    <?php
     $connection = mysqli_connect('127.0.0.1', 'root', 'password', 'radio');
     
     if(isset($_POST[in])){
         $cleatl = strip_tags($_POST[login], '<br>');
        if($cleatl != '' AND $_POST[pass] != '' AND $_POST[pass2] != ''){
        if($_POST[pass] == $_POST[pass2]){
            $logget = mysqli_query($connection, "SELECT * FROM `accaunts`  WHERE `login` = '$cleatl'");
            if(mysqli_fetch_assoc($logget)){
                echo '<div id="error">Логин занят!</div>';
            }else{
                
                   
                    
                
                echo '<div id="green">Удачно!</div>';
              
                    if($_SESSION[invreg] != NULL){
                        
                        $logget = mysqli_query($connection, "SELECT * FROM `accaunts`  WHERE `login` = '$_SESSION[invreg]'");
                        if(($acc = mysqli_fetch_assoc($logget))){
                            $ccc = $acc[coins] + $acc[coins] / 5 + 1;
                            mysqli_query($connection, "UPDATE `accaunts` SET `coins` = '$ccc' WHERE `accaunts`.`login` = '$_SESSION[invreg]'"); 
                        }
                        $_SESSION[invreg] = NULL;
                    }
                
                mysqli_query($connection, "INSERT INTO `accaunts` (`login`, `password`) VALUES ('$cleatl', '$_POST[pass]')");
                $_SESSION[user] = $cleatl;
                $_SESSION[lastacc] = $cleatl;
                echo '<META HTTP-EQUIV="REFRESH" content="2; URL=http://radio-red.ru">';
                    }
                
                
            
        }else{
            echo '<div id="error">Пароли разные!</div>';
        }
    }else{
        echo '<div id="error">Заполните поля!</div>';
    }
     }
     mysqli_close($connection);

    ?>
    </div>
    <div id="center">
        <h1 id="blue">Регистрация</h1>
        <a style="color: Red;" href="index.php">Назад</a><br>
        <form action="" method="POST">
            <?php
  
    ?>
    <br>*логин будет записан без ПРОБЕЛОВ<br><br>
    <input type="text" name="login" placeholder="логин" id="in" value="<?php echo $_POST[login]; ?>"><br><br>
        <input type="password" name="pass" placeholder="Пароль" id="in" value=""><br><br>
        <input type="password" name="pass2" placeholder="Пароль ещё раз" id="in" value=""><br><br>
        
        
       
        <input id="in" type="submit" name="in" value="Готово!"><br><br>
        <?php
  
            ?>
        </form>
    
</body>
</html>
<?php } ?>