<?php
session_start();
    if($_SESSION[user] != 'AL9'){
        echo '<META HTTP-EQUIV="REFRESH" content="0; URL=http://radio-red.ru">';
    }else{
        if(isset($_POST[ban])){
            $connection = mysqli_connect('127.0.0.1', 'root', 'password', 'radio');
            mysqli_query($connection, "INSERT INTO `ban` (`login`, `why`) VALUES ('$_GET[acc]', '$_POST[why]')");
            echo '<META HTTP-EQUIV="REFRESH" content="0; URL=http://radio-red.ru/accaunt.php?&acc=' . $_GET[acc] . '">';
        }
        ?>
        <form action="" method="POST">
            Почему вы хотите выдать бан <input type="text" name="acc" value="<?php echo $_GET[acc] ?>">?<br><br>
            <input type="text" name="why" value="" placeholder="Причина (обращение)"><br><br>
            <input type="submit" name="ban" id="in" value="Ну всё... Бан!">
        </form>
        <?php




    }
?>