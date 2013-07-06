<?php
					include "application/models/model_company.php";
	            	class Controller_trening_tsentr_\"advance\" extends Controller{
			            function __construct(){
				            $this->model = new Model_Company();
				            $this->view = new View();
				        }
				        function action_index() {
				            $data = $this->model->get_data_company();
				            $this->view->generate("company_view.php","template_view.php",$data);
			        	}
		            }