<?php
session_start();
include 'db.php';
$company_new_course = $_SESSION['id'];
function translit($str) 
{
    $translit = array(
        "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G",
        "Д"=>"D","Е"=>"E","Ж"=>"J","З"=>"Z","И"=>"I",
        "Й"=>"Y","К"=>"K","Л"=>"L","М"=>"M","Н"=>"N",
        "О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T",
        "У"=>"U","Ф"=>"F","Х"=>"H","Ц"=>"TS","Ч"=>"CH",
        "Ш"=>"SH","Щ"=>"SCH","Ъ"=>"","Ы"=>"YI","Ь"=>"",
        "Э"=>"E","Ю"=>"YU","Я"=>"YA","а"=>"a","б"=>"b",
        "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ж"=>"j",
        "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
        "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
        "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
        "ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
        "ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya",
        " "=>"_", "-"=> "_"
    );
    return strtr($str,$translit);
}
$name_new_venue = $_POST['name_new_venue'];
$name_eng_new_venue = translit($name_new_venue);
$phone_new_venue = $_POST['phone_new_venue'];
$metro_new_venue = $_POST['metro_new_venue'];
$found_adress_new_venue = $_POST['found_adress_new_venue'];
$countre_adress_new_venue = $_POST['countre_adress_new_venue'];
$street_adress_new_venue = $_POST['street_adress_new_venue'];
$home_adress_new_venue = $_POST['home_adress_new_venue'];
$corpus_adress_new_venue = $_POST['corpus_adress_new_venue'];

//echo "Запрос к геокодеру по адресу: </br>";

$link_geocoder =    "город ".$countre_adress_new_venue.
                    " улица ".$street_adress_new_venue.
                    " дом ".$home_adress_new_venue.
                    " корпус ".$corpus_adress_new_venue ; 
                    
                          
$adress = $link_geocoder;
$key = "ACaQDlEBAAAADx8EBAIAVvmKSReS9YyV0-V0wOJcrlmSxgIAAAAAAAAAAABvYWqTFI1UJvu1H3wCMja4lQhHDA==";
$adress1=urlencode($adress);
$url="http://geocode-maps.yandex.ru/1.x/?geocode=".$adress1;
$content=file_get_contents($url);
preg_match('/<pos>(.*?)<\/pos>/',$content,$point);
$coordinate=str_replace(' ',', ',trim(strip_tags($point[1])));

echo "Запрос к геокодеру по адресу:".  $link_geocoder." :::  " .$coordinate ;


echo "<br>".$name_new_venue."<br>".$name_eng_new_venue."<br>".$phone_new_venue."<br>".$metro_new_venue."<br>".$found_adress_new_venue."<br>".$company_new_course."<br>";

$result_new_course = mysql_query("
              INSERT INTO  `improvy_db`.`venues` (
                `id_venue` ,
                `id_company` ,
                `venuename_eng` ,
                `venuename_rus` ,
                `phone` ,
                `metro` ,
                `country` ,
                `street` ,
                `home` ,
                `corpus` ,
                `how_found` ,
                `coordinate`
                )
              VALUES (
                NULL ,  
                '$company_new_course',  
                '$name_eng_new_venue',  
                '$name_new_venue',  
                '$phone_new_venue',  
                '$metro_new_venue',  
                '$countre_adress_new_venue',  
                '$street_adress_new_venue',  
                '$home_adress_new_venue',  
                '$corpus_adress_new_venue',  
                '$found_adress_new_venue',  
                '$coordinate'
                );
");
echo 1323;

















?>