<?php
session_start();
if($_SESSION[user] == NULL){
echo '<META HTTP-EQUIV="REFRESH" content="0; URL=http://radio-red.ru">';
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Что за коины?</title>
</head>
<body>

       <div id="center">
            <div id="bgr">
            <a style="color: White;" href="http://radio-red.ru/accaunt.php?&acc=<?php echo $_SESSION[user]; ?>">Назад</a>
            </div>
            <div id="bgr">
            <h1>http://radio-red.ru/reg.php?&acc=<?php echo $_SESSION[user]; ?></h1>
            </div>
            <div id="bgr">
                Приглашайте друзей по этой ссылке! За каждого приглашённого вам будет выдаваться +20% от ваших коинов!
            </div>
       </div>
  
</body>
</html>