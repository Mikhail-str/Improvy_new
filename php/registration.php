<?php
	
	session_start();
	include 'db.php';
    $Cname = $_POST['cname'];
	$fio = $_POST['name'];
	//echo $name;
	//$pass = md5($_POST['pass']);
	$email = $_POST['email'];
	$address = $_POST['address'];
	$site = $_POST['site'];
	$phone = $_POST['phone'];
	$Cname_eng = translit($Cname);
	$password = generateCode();
	$uploaddir = './files/';
	$description = "Информация о Вашей компании";
	/*$uploadfile = $uploaddir.$Cname_eng.'.jpeg';*/

	// Копируем файл из каталога для временного хранения файлов:
	
	//if($_FILES['userfile']['size'] != 0 and $_FILES['userfile']['size']<=1024000) { // Здесь мы проверяем размер если он более 1 МБ 
		//if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) { // Здесь идет процесс загрузки изображения 
			//$size = getimagesize($uploadfile); // с помощью этой функции мы можем получить размер пикселей изображения
			// if ($size[0] < 601 && $size[1]<5001) { // если размер изображения не более 600 пикселей по ширине и не более 5000 по высоте echo "Файл загружен. Путь к файлу: 
			//}else {
			//	echo "Размер пикселей превышает допустимые нормы (ширина не более - 600 пикселей, высота не более 5000)"; 
			//unlink($uploadfile); // удаление файла 
			//} 
		//} else {
		//	echo "Файл не загружен, верьнитель и попробуйте еще раз";
		//} else { 
			//echo "Размер файла не должен превышать 1000Кб";
		//}


	
	$checkEmail = mysql_fetch_array(mysql_query("SELECT `email` FROM `companies` WHERE `email`='$email'"));
	$checkCname = mysql_fetch_array(mysql_query("SELECT `compname_rus` FROM `companies` WHERE `compname_rus`='$Cname'"));
	if (($checkEmail['email'] != null) || ($checkCname['compname_rus'])!= null) {
		
		echo ("<script type='text/javascript'>  
				  	alert('Компания с таким e-nail или названием уже зарегистрированна!')
		 				
				 	</script>");
	}
	else
	{		
		/*if($_FILES['uploadfile']['size'] != 0)
			{
				if ($_FILES['uploadfile']['size']<=1024000)
				{
				$imageinfo = getimagesize($_FILES['uploadfile']['tmp_name']);
				 if($imageinfo['mime'] != 'image/png' && $imageinfo['mime'] != 'image/jpeg') {
				  echo ("<script type='text/javascript'>  
				  	alert('Картинка должна быть только формата JPEG или PNG!')
		 				
				 	</script>");
				  exit;
				 }
				if (copy($_FILES['uploadfile']['tmp_name'], $uploadfile))
				{
				echo "<h3>Файл успешно загружен на сервер</h3>";
				}
				else { 
					echo "<h3>Ошибка! Не удалось загрузить файл на сервер!</h3>"; 
					exit; 
				}
				} else 
				echo ("<script type='text/javascript'>  
					  	alert('Размер не должен превышать 10Мб!')
			 				
					 	</script>");
			}*/
		if (mysql_query("INSERT INTO companies (compname_rus, compname_eng, fio, address, email, password, telephone, site, activation, about) VALUES ('" .$Cname. "','" .$Cname_eng. "','" .$fio. "', '" .$address. "','" .$email. "','" .$password. "', '" .$phone. "','" .$site. "', '0','".$description."')")) //пишем данные в БД и авторизовываем пользователя
		{
				echo ("");
				echo ("<script type='text/javascript'> 
					alert('Спасибо за регистрацию, дальнейшие инструкции отправлены на ваш e-mail')
					var a = document.createElement('a');
					a.href='/main';
					a.target = '_top';
					
					a.click();
					</script>");
				//setcookie ("login", $pass, time() + 50000, '/');
				//setcookie ("password", md5($login.$password), time() + 50000, '/');
				//$rez = mysql_query("SELECT * FROM users WHERE pass=".$pass);
				//@$row = mysql_fetch_assoc($rez);
				//$_SESSION['id'] = $row['id'];
				//$regged = true;
				//include ("template/registration.php"); //подключаем шаблон*/
				createControl(strtolower($Cname_eng));

		} else echo "mimo";
	}

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
function generateCode($length = 6)
		{
		   $chars = 'abdefhiknrstyz1234567890';
		   $numChars = strlen($chars);
		   $string = '';
		   for ($i = 0; $i < $length; $i++)
		   {
		      $string .= substr($chars, rand(1, $numChars) - 1, 1);
		   }
		   return $string;
		}

function createControl($name){ //Автоматизированное добавление контроллера при регистрации компании
	
	$filename = '../application/controllers/controller_'.$name.'.php';
	$fp = fopen($filename,'w+');
	if(is_writable($filename)){
		$mytext = '<?php
					include "application/models/model_company.php";
	            	class Controller_'.$name.' extends Controller{
			            function __construct(){
				            $this->model = new Model_Company();
				            $this->view = new View();
				        }
				        function action_index() {
				            $data = $this->model->get_data_company();
				            $this->view->generate("company_view.php","template_view.php",$data);
			        	}
		            }'; // Исходная строка
		$test = fwrite($fp, $mytext);
		if(!$test){
			echo "Error";
		}
		
	}
	else{
	echo "Файл не доступен для записи";
	}
}
//////////////////////////////////////
	/*$date=time();
	
	//Добавляем данные во временную таблицу

	$q=@mysql_query("INSERT into `validate_temp` VALUES('','".$email."','".$date."')");

	if(@mysql_error($conn_id)!='') {
   		 die("Ошибка в запросе к БД !");
    }
*/
//Сообщение зарегистрированному пользователю

	$message="Вы получили это письмотак как, зарешистрировались на Improvy.ru.
	Для подтверждения регистрации наш менеджер свяжется с вами в течение нескольких часов
	Если вы не регистрировались на нашем сайте, то попросту удалите данное письмо.

	
	-----------------------------

	С уважением администрация Improvy.ru";

	//Посылаем сообщение пользователю

	@mail($email,"Уведомление",$message,"Content-Type: text/html; 
	charset=windows-1251","From: root@simprovy.ru");

	@mysql_close();
///////////////////////////////////
?>
