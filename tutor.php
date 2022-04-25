<?php
session_start();
if($_SESSION[lists] == NULL){
    $_SESSION[lists] = 1;
}
if($_GET[help] == "simple"){
    $_SESSION[lists] = 2;
}
if($_GET[help] == "users"){
    $_SESSION[lists] = 3;
}
if($_GET[help] == "makers"){
    $_SESSION[lists] = 4;
}
if($_SESSION[lists] == 1){


?>
<!DOCTYPE html>
<html lang="ru">
<head>
<link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Инструкции</title>
</head>
<body>

       <div id="center">
       <a style="color: Red;" href="index.php">Назад</a><br><br>
         <h1>Инструкции</h1>
         <form action="" method="GET">
         <div id="in">
         <p><input name="help" type="radio" value="simple" checked>Краткий обзор</p>
         <p><input name="help" type="radio" value="users">Инструкции для пользователей</p>
        <p><input name="help" type="radio" value="makers">Инструкции для контент-мейкеров</p>
        </div>
        <p id="in"><input type="submit" value="Показать"></p>
         </form>
       </div>
  
</body>
</html>
<?php
}

if($_SESSION[lists] == 2){


    ?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
    <link rel="stylesheet" href="style.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Краткий обзор</title>
    </head>
    <body>
    
           <div id="center">
           <a style="color: Red;" href="index.php">На главную</a><br><br>
             <h1>Краткий обзор</h1>
            <div>
                Этот сайт позволит вам общаться с людьми полностью анонимно! Этот сайт не сохраняет ваши сообщения более чем на 30 секунд и тем более не передаёт их неугодным вам людям!<br><br>
                Вы можете вести этот сайт как публичный блог или дневник!<br><br>
                Добавляйте в друзья знакомых и следите за их новостями.
            </div>
           </div>
      
    </body>
    </html>
    <?php
    }

    if($_SESSION[lists] == 3){


        ?>
        <!DOCTYPE html>
        <html lang="ru">
        <head>
        <link rel="stylesheet" href="style.css">
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Пользователям</title>
        </head>
        <body>
        
               <div id="center">
               <a style="color: Red;" href="index.php">На главную</a><br><br>
                 <h1>Пользователям</h1>
                <div>
                <h2>Радиостанции</h2>
                Сайт состоит из радиостаний (0 - 99999999999). Можно выбрать любую на свой вкус для общения как в группах, так и для личного общения. У некотороых радиостанций есть ещё и ключевые слова, которые называются DNS.
                Например к радиостанции номер 1 привязан DNS 'Radio Red'. Чтобы найти нужную радиостанцию используйте поиск (подробнее в разделе "Поиск"). На радиостанциях вы можете отправлять сообщения и изображения, кроме некоторовых приватных радиостанций, но что бы вы не отправили хранится на сервере всего лишь 30 секунд после чего безвозвратно удаляется.
                Мы гарантируем конфиденциальность. На каждой радиостанции показано кто на ней. Нажав на плюсик можно прикласить одного из своих подписчиков на какую - либо станцию.
                  <h2>Поиск</h2>
                  На главной странице сайта слева в десктопной версии и сверху в мобильной версии находится сторока поиска. Туда можно вводить искомые радиостанции, DNS радиостанций, аккаунты.
                  Поиск выдаёт ответы на поисковые запросы, если они существуют.
                  <h2>Аккаунты</h2>
                  У каждного зарегестрировавшегося есть свой аккаунт. На своей странице можно оставлять новости и добавлять в друзья другие аккаунты. 
                  <h2>Лента</h2>
                  Лента формируется для каждого пользователя отдельно. В ней появляются новости тех, кого вы добавили в друзья и иногда появляются возможно интересные вам новости.
                  <h2>Лайки</h2>
                  Под каждой новостью, кроме своих, можно поставить лайк, если вам понравилась новость.
                  <h2>Коины</h2>
                  Нажав на красную надпись "Коины" в аккаунте вы получаете игру - кликер, то что вы накликали можно переводить другим. Так же в аккаунте ниже баланса есть кнопка нажав на неё вы получаете ссылку,
                  если по ней зарегестрируется новый пользователь, вы получите +20% от ваших коинов.
               </div>
               </div>
          
        </body>
        </html>
        <?php
        }

        if($_SESSION[lists] == 4){


            ?>
            <!DOCTYPE html>
            <html lang="ru">
            <head>
            <link rel="stylesheet" href="style.css">
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Контент-мейкерам</title>
            </head>
            <body>
            
                   <div id="center">
                   <a style="color: Red;" href="index.php">На главную</a><br><br>
                     <h1>Контент-мейкерам</h1>
                    <div>
                    <h2>Создать DNS</h2>
                        На главной странице снизу есть значок из 3-х прямоугольников. Нажав вы перейдёте к созданию нового DNS
                        <h2>Создать приват для радиостанции</h2>
                        На главной странице снизу есть значок перечёркнутого круга. Нажав вы перейдёте к привату, после чего запрос должен быть одобрен модератором. После одобрения станция будет заблокирована.
                        <h2>А как теперь отправлять сообщения в заприваченные станции?</h2>
                        Отправка осуществляется с помощью нашего API.<br>
                        Чтобы добавить сообщение, необходимо отправить GET запросы оп адресу: http://radio-red.ru/send.php.<br>
                        1) radio - Номер радиостанции.<br>
                        2) password - Пароль, коровый вы ставили при привате.<br>
                        3) who - Отправлять от чьего имени.<br>
                        4) msg - само сообщение.<br>
                        5) remove (со значением '1') - Очистить всё из радиостанции.<br>
                        К сожалению отправка изображений пока что не предустмотрена.
                    </div>
                   </div>
              
            </body>
            </html>
            <?php
            }
?>