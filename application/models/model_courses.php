<?php

class Model_Courses extends Model
{

	public function get_sport()
	{	

        $data = mysql_query("SELECT distinct `courses`.`id_course`,`courses`.`coursename_rus`, `courses`.`coursename_eng`, `courses`.`price`,`courses`.`description`, `courses`.`minprice`, `companies`.`id_company`,`companies`.`compname_rus`,`companies`.`compname_eng`
                            FROM `courses` 
                               join `cv` on `courses`.`id_course` = `cv`.`id_course` 
                               join `venues` on `cv`.`id_venue` = `venues`.`id_venue`                       
                               join `companies` on `companies`.`id_company`=`venues`.`id_company`
                            where courses.type = '2' ");              
        return $data;
		
	}
    public function get_martial()
	{	

        $data = mysql_query("SELECT  distinct `courses`.`id_course`,`courses`.`coursename_rus`, `courses`.`coursename_eng`, `courses`.`price`, `courses`.`description`, `courses`.`minprice`, `companies`.`id_company`,`companies`.`compname_rus`,`companies`.`compname_eng`
                            FROM `courses` 
                               join `cv` on `courses`.`id_course` = `cv`.`id_course` 
                               join `venues` on `cv`.`id_venue` = `venues`.`id_venue`                       
                               join `companies` on `companies`.`id_company`=`venues`.`id_company`
                            where courses.type = '1' ");              
        return $data;
		
	}
    public function get_computer()
	{	
        $data = mysql_query("SELECT  distinct `courses`.`id_course`,`courses`.`coursename_rus`, `courses`.`coursename_eng`, `courses`.`price`,`courses`.`description`, `courses`.`minprice`, `companies`.`id_company`, `companies`.`compname_rus`,`companies`.`compname_eng`
                            FROM`courses` 
                               join `cv` on `courses`.`id_course` = `cv`.`id_course` 
                               join `venues` on `cv`.`id_venue` = `venues`.`id_venue`                       
                               join `companies` on `companies`.`id_company`=`venues`.`id_company`
                            where courses.type = '3' ");              
        return $data;
		
	}
    public function get_languages()
	{	
        $data = mysql_query("SELECT  distinct `courses`.`id_course`,`courses`.`coursename_rus`, `courses`.`coursename_eng`, `courses`.`price`, `courses`.`description`, `courses`.`minprice`, `companies`.`id_company`,`companies`.`compname_rus`,`companies`.`compname_eng`
                            FROM `courses` 
                               join `cv` on `courses`.`id_course` = `cv`.`id_course` 
                               join `venues` on `cv`.`id_venue` = `venues`.`id_venue`                       
                               join `companies` on `companies`.`id_company`=`venues`.`id_company`
                            where courses.type = '4' ");              
        return $data;
		
	}

	public function get_dances()
	{	
        $data = mysql_query("SELECT  distinct `courses`.`id_course`, `courses`.`coursename_rus`, `courses`.`coursename_eng`, `courses`.`price`,`courses`.`description`, `courses`.`minprice`, `companies`.`id_company`,`companies`.`compname_rus`,`companies`.`compname_eng`

                            FROM `courses` 
                               join `cv` on `courses`.`id_course` = `cv`.`id_course` 
                               join `venues` on `cv`.`id_venue` = `venues`.`id_venue`                       
                               join `companies` on `companies`.`id_company`=`venues`.`id_company`
                            where courses.type = '5' ");              

        return $data;
		

	}
    public function get_data($course)
    {
            $data = mysql_query("SELECT  distinct `courses`.`id_course`,`courses`.`coursename_rus`, `courses`.`coursename_eng`, `courses`.`price`, `courses`.`description`, `courses`.`minprice`, `companies`.`id_company`,`companies`.`compname_rus` ,`companies`.`compname_eng`
                                FROM `courses` 
                               join `cv` on `courses`.`id_course` = `cv`.`id_course` 
                               join `venues` on `cv`.`id_venue` = `venues`.`id_venue`                       
                               join `companies` on `companies`.`id_company`=`venues`.`id_company`
                                where courses.subtype = '$course' ");
            return $data;                           

    }
    /*public function get_yoga()
    {   
        $data = mysql_query("SELECT  distinct `courses`.`coursename_rus`, `courses`.`coursename_eng`, `courses`.`price`, `courses`.`description`, `courses`.`minprice`,`companies`.`compname_rus`,`companies`.`compname_eng`
                            FROM`courses` 
                               join `cv` on `courses`.`id_course` = `cv`.`id_course` 
                               join `venues` on `cv`.`id_venue` = `venues`.`id_venue`                       
                               join `companies` on `companies`.`id_company`=`venues`.`id_company`
                            where courses.type = 'hiphop' or courses.type = 'latin' ");              
        return $data;
        
    }

       public function get_pilates()
    {   
        $data = mysql_query("SELECT  distinct `courses`.`coursename_rus`, `courses`.`coursename_eng`, `courses`.`price`, `courses`.`description`, `courses`.`minprice`,`companies`.`compname_rus`,`companies`.`compname_eng`
                            FROM `courses` 
                               join `cv` on `courses`.`id_course` = `cv`.`id_course` 
                               join `venues` on `cv`.`id_venue` = `venues`.`id_venue`                       
                               join `companies` on `companies`.`id_company`=`venues`.`id_company`
                            where courses.type = 'hiphop' or courses.type = 'latin' ");              
        return $data;
        
    }*/
}

