
    <?php
        if(isset($_GET[dns])){
            $connection = mysqli_connect('127.0.0.1', 'root', 'password', 'radio');
            $wall = mysqli_query($connection, "SELECT * FROM `dns` WHERE `name` = '$_GET[dns]'");
            $walluse = mysqli_fetch_assoc($wall);
            echo '<META HTTP-EQUIV="REFRESH" content="0; URL=http://radio-red.ru/radio.php?radio=' . $walluse[radio] . '">';
            mysqli_close($connection);
        }
    ?>
