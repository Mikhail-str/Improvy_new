<?php
					include "application/models/model_company.php";
	            	class Controller_shkola_tantsev_madstyle extends Controller{
			            function __construct(){
				            $this->model = new Model_Company();
				            $this->view = new View();
				        }
				        function action_index() {
				            $data = $this->model->get_data_company();
				            $this->view->generate("company_view.php","template_view.php",$data);
			        	}
		            function action_shkola_tantsev_madstyle(){
                $data = $this->model->get_data_course();
                $this->view->generate("course_view.php","template_view.php",$data);
            }
        function action_shkola_vokala(){
                $data = $this->model->get_data_course();
                $this->view->generate("course_view.php","template_view.php",$data);
            }
        }