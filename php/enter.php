<?php
	session_start();
	include 'db.php';
	//echo $name;
	$password = $_POST['password'];
	$email = $_POST['email'];

	$result = mysql_query("SELECT `email`,`password`,`compname_rus`,`id_company`,`compname_eng` FROM `companies` WHERE `email`='$email' ");
		if(mysql_num_rows($result)>0){
			while($row = mysql_fetch_array($result)) {
				if($password == $row['password']) {
        			$val = md5($row['password'].md5($row['compname_rus']));
        			setcookie ("hash", $val,time() + 50000,'/');
        			setcookie ("id", $row['id_company'],time() + 50000,'/');
        			//$rez = mysql_query("SELECT * FROM `users` WHERE `pass`='$pass'");
					$_SESSION['id'] = $row['id_company'];
					$_SESSION['name'] = strtolower($row['compname_eng']);
					
				}else echo "2";        
	    	}	
	    }else echo "1";
    
?>