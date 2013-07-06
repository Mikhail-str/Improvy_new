<?php
$id_remove_venue = $_POST['id_remove_venue'];
$id_remove_course = $_POST['id_remove_course'];
$name_course_rus = $_POST['name_course_rus'];
$venuename_rus = $_POST['venuename_rus'];
mysql_query("   DELETE FROM `improvy`.`cv` 
                WHERE `cv`.`id_venue` = '$id_remove_venue' AND `cv`.`id_course` = '$id_remove_course';
            ") || die(mysql_error());
echo  'Из курса "'.$name_course_rus.'" удалено расположение "'.$venuename_rus.'"';

?>