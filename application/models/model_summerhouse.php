<?php


class Model_Summerhouse extends Model{
    
        public function get_data(){
            $routes = explode('/', $_SERVER['REQUEST_URI']);
            
            //$location = $_POST['location'];
            //echo $location;
            $data1 = mysql_query("SELECT *
                                  FROM companies
                                  where companies.compname_eng = '$routes[1]'"); 
            if (!isset($location))
            {
                $data2 = mysql_query(" SELECT *
                                         FROM companies
					                   JOIN venues on companies.id_company = venues.id_company
                                       JOIN courses on venues.id_venue = courses.id_venue
                                       where companies.compname_eng = '$routes[1]'
			                         ");
            } else {   
            	$data2 = mysql_query("  SELECT *
                                        FROM companies
                                JOIN venues on companies.id_company = venues.id_company			
                                where companies.name_eng = '$routes[1]' and venues.address = '$location'");
            }

            $data[1] = $data1;
            $data[2] = $data2;            

            return $data;
        }
    
}

?>