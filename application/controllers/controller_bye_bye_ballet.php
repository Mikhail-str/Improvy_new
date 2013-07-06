<?php
					include "application/models/model_company.php";
	            	class Controller_bye_bye_ballet extends Controller{
			            function __construct(){
				            $this->model = new Model_Company();
				            $this->view = new View();
				        }
				        function action_index() {
				            $data = $this->model->get_data_company();
				            $this->view->generate("company_view.php","template_view.php",$data);
			        	}
		            function action_shkola_bye_bye_ballet(){
                $data = $this->model->get_data_course();
                $this->view->generate("course_view.php","template_view.php",$data);
            }
        function action_test_test(){
                $data = $this->model->get_data_course();
                $this->view->generate("course_view.php","template_view.php",$data);
            }
        function action_shkola_bye_bye_ballet_(){
                $data = $this->model->get_data_course();
                $this->view->generate("course_view.php","template_view.php",$data);
            }
        }