<?php
$filename = '../application/controllers/test.php';
echo $filename;
$fp = fopen($filename,'w+');
if(is_writable($filename)){
	$mytext = '<?php
	            class Controller_Summerhouse extends Controller{
	            function __construct(){
	            $this->model = new Model_Summerhouse();
	            $this->view = new View();}
	            function action_index() {
	            $data = $this->model->get_data();
	            $this->view->generate("company_view.php","template_view.php",$data);}
	            
	             
	            }'; // Исходная строка

	$test = fwrite($fp, $mytext);
	if(!$test){
		echo "Error";
	}
	header("Location: http://localhost/php/controller_test.php");
	exit;
}
else{
	echo "Файл не доступен для записи";
}