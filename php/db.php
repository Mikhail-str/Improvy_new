<?php
    
    $localhost  = 'improvy.mysql'; // хост
    $dbuser     = 'improvy_mysql';      // имя пользователя
    $dbpassword = 'raugnhsa';          // пароль
    $database   = 'improvy_db';      // база данных
    
    /*
     * Подключение к БД
     */
    $db = mysql_pconnect($localhost, $dbuser, $dbpassword) or die('В настоящий момент сервер базы данных не доступен.');  
    mysql_query("SET NAMES 'UTF8'");
    mysql_select_db($database, $db) or die ('В настоящий момент база данных не доступна.');?>