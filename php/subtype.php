<?php
include 'db.php';
$i = 0;
$type_new_course = $_POST["type_new_course"];

$query = mysql_query ("SELECT * FROM  `subtype` where `subtype`.`id_type` = $type_new_course ");
if(mysql_num_rows($query)>0) {
    //$subtype[] = array('id'=>$row['id'], 'title'=>$row['name']);
    while($row = mysql_fetch_array($query)){
       $subtype['id']["$i"] = $row['id_subtype'];
       $subtype['name']["$i"] = $row['name'];
       $i++;
    }
    print (json_encode($subtype));
    
}else echo "Error";