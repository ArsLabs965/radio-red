<?php
    session_start();
    $connection = mysqli_connect('127.0.0.1', 'root', 'password', 'radio'); 
    $logget = mysqli_query($connection, "SELECT * FROM `invites`  WHERE `who` = '$_SESSION[user]'");
   while(($acc = mysqli_fetch_assoc($logget))){
       if($acc[sec] + 30 > time()){
        ?>
            <script>
            var audio = new Audio();
audio.preload = 'auto';
audio.src = 'noti.mp3';
audio.play();
setTimeout(goo<?php echo $acc[id]; ?>, 1000);
function goo<?php echo $acc[id]; ?>() {
                var iss = confirm("<?php echo $acc[login] . " пригласил вас на радиостанцию " . $acc[radio] . ". Перейти?"; ?>");
                if(iss){
                    document.location.href = "http://radio-red.ru/radio.php?&radio=" + <?php echo $acc[radio]; ?>;
                }
}
            </script>
        <?php
       }else{
        ?>
        <script>
            var iss = confirm("<?php echo $acc[login] . " приглашал вас на радиостанцию " . $acc[radio] . ". Когда: " . $acc[time] . ". Перейти?"; ?>");
            if(iss){
                document.location.href = "http://radio-red.ru/radio.php?&radio=" + <?php echo $acc[radio]; ?>;
            }
        </script>
    <?php
       }
        mysqli_query($connection, "DELETE FROM `invites` WHERE `who` = '$_SESSION[user]' AND `radio` = '$acc[radio]'");
   }
?>