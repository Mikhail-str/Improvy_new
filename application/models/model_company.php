<?php


class Model_Company extends Model{
    
        public function get_data_company(){
            
            $routes = explode('/', $_SERVER['REQUEST_URI']);
            $name_company = $routes[1];

            $photo_query = mysql_query("

                    SELECT  `companies`.`id_company`
                    FROM  `companies` 
                    WHERE  `companies`.`compname_eng` =  '$name_company' ");

            $map_query = mysql_query("

                    SELECT  `venues`.`coordinate`, `venues`.`venuename_rus`, `companies`.`id_company`

                    FROM  `venues` 
                    JOIN  `companies` ON  `venues`.`id_company` =  `companies`.`id_company` 
                    WHERE  `companies`.`compname_eng` =  '$name_company' "); // Координаты для карты
            
            $map_venue_query = mysql_query(" 
                    SELECT  *
                    FROM  `venues` 
                    JOIN  `companies` ON  `venues`.`id_company` =  `companies`.`id_company` 
                    WHERE  `companies`.`compname_eng` =  '$name_company' "); // Филиалы под картой

            $about_query = mysql_query("
                    SELECT about FROM companies
                    WHERE companies.compname_eng = '$name_company' "); //  Описание компании

            $courses_query = mysql_query("
                    SELECT distinct `courses`.`id_course`, `companies`.`id_company`, compname_eng, coursename_eng, coursename_rus, compname_rus, minprice, description 
                    FROM `courses` 
                    JOIN `cv` on `courses`.`id_course` = `cv`.`id_course` 
                    JOIN `venues` on `cv`.`id_venue` = `venues`.`id_venue`                       
                    JOIN `companies` on `companies`.`id_company`=`venues`.`id_company` 
                    WHERE companies.compname_eng = '$name_company' ") ; // Вывод курсов
            
            $courses_venue_query = mysql_query("
                    SELECT  `venues`.`venuename_rus` as p1 ,  `venues`.`id_venue` as p2 ,  `companies`.`compname_eng`
                    FROM  `venues` 
                    JOIN  `companies` ON  `venues`.`id_company` =  `companies`.`id_company` 
                    WHERE  `companies`.`compname_eng` =  '$name_company' "); // Филиалы при добавлении курсов                      
            /*if (!isset($location))
            {
                $data2 = mysql_query(" SELECT distinct compname_eng, coursename_eng, coursename_rus, compname_rus, minprice, description 
                                        FROM `courses` 
                                                   join `cv` on `courses`.`id_course` = `cv`.`id_course` 
                                                   join `venues` on `cv`.`id_venue` = `venues`.`id_venue`                       
                                                   join `companies` on `companies`.`id_company`=`venues`.`id_company` 
                                       where companies.compname_eng = '$routes[1]'
			                         ");
            } else {
            	$data2 = mysql_query("SELECT * FROM companies
                                JOIN venues on companies.id_company = venues.id_company			
                                where companies.name_eng = '$routes[1]' and venues.address = '$location'");
            }*/

            $data['photo_query'] = $photo_query;
            $data['map_query'] = $map_query;
            $data['map_venue_query'] = $map_venue_query;
            $data['about_query'] = $about_query;
            $data['courses_query'] = $courses_query;
            $data['courses_venue_query'] = $courses_venue_query;   


            return $data;
        }
        public function get_data_course(){

            $routes = explode('/', $_SERVER['REQUEST_URI']);
            $name_companies_eng =  $routes[1];
            $name_course_eng = $routes[2];
            
            $info_company_query = mysql_query("   

                        SELECT `id_company`, `compname_rus`, `telephone`

                        FROM `companies` 
                        where   `companies`.`compname_eng` =  '$name_companies_eng' "); // Информация о компании на странице курса

            $info_course_query = mysql_query("   
                        SELECT distinct `coursename_rus`, `id_course`,`companies`.`id_company`
                        FROM `courses`                         
                        join `venues` on `venues`.`id_venue` = `venues`.`id_venue` 
                        join `companies` on `companies`.`id_company`=`venues`.`id_company`
                        where   `courses`.`coursename_eng` = '$name_course_eng' and 
                        `companies`.`compname_eng` =  '$name_companies_eng' "); // Информация о курсе

            $info_address_query = mysql_query(" 
                        SELECT  `venues`.`id_venue`,
                            `venues`.`venuename_rus`, 
                            `venues`.`phone`, 
                            `venues`.`metro`, 
                            `venues`.`country`, 
                            `venues`.`street`, 
                            `venues`.`home`, 
                            `venues`.`corpus`, 
                            `venues`.`how_found`, 
                            `venues`.`coordinate`
                    FROM `courses` 
                    join `cv` on `courses`.`id_course` = `cv`.`id_course` 
                    join `venues` on `cv`.`id_venue` = `venues`.`id_venue`                       
                    join `companies` on `companies`.`id_company`=`venues`.`id_company`
                    where   `courses`.`coursename_eng` = '$name_course_eng' and 
                    `companies`.`compname_eng` =  '$name_companies_eng' "); // Вывод филиалов
            $num_rows = mysql_num_rows($info_address_query);
            $map_address_query = mysql_query(" 
                        SELECT  `venues`.`venuename_rus`, 
                            `venues`.`phone`, 
                            `venues`.`metro`, 
                            `venues`.`country`, 
                            `venues`.`street`, 
                            `venues`.`home`, 
                            `venues`.`corpus`, 
                            `venues`.`how_found`, 
                            `venues`.`coordinate`
                    FROM `courses` 
                    join `cv` on `courses`.`id_course` = `cv`.`id_course` 
                    join `venues` on `cv`.`id_venue` = `venues`.`id_venue`                       
                    join `companies` on `companies`.`id_company`=`venues`.`id_company`
                    where   `courses`.`coursename_eng` = '$name_course_eng' and 
                    `companies`.`compname_eng` =  '$name_companies_eng' "); // Вывод на карту

            $data['info_company_query'] = $info_company_query;
            $data['info_course_query'] = $info_course_query;
            $data['info_address_query'] = $info_address_query;
            $data['map_address_query'] = $map_address_query;
            $data['num_rows'] = $num_rows;

            return $data;



        }
    
}

?>