<?php
$id_remove_course = $_POST['id_remove_course'];
mysql_query("   DELETE FROM `improvy`.`courses` 
                WHERE `courses`.`id_course` = '$id_remove_course';
            ") || die(mysql_error());
echo  'Из курса '.$id_remove_course;

?>