<script type="text/javascript" src="/js/issue.js"></script>
<div class = "texture_cour">
  <div class = "container">
    <div class="row">
      <div class = "span12 hero-unit2">  
      <h1>ImprovY</h1>      
        <p class="text-center"> - место, где собраны все курсы и школы твоего города!</p>
      </div>
    </div>
  </div>  
</div>    
    <div class="container pad">
        <ul>
          <?php
                $_SESSION["crumb"]= $_SERVER['REQUEST_URI'];     
          ?>
        </ul>
            <div class="row">
                <div class="span3">

                    <div id="side" >
                    <!--
                      <h3><li><a href="sport">Спорт/Фитнес</a></li></h3>
                      <ul class="nav nav-list">
                                        <li><a href="yoga">Yoga</a></li>
                                        <li><a href="pilates">Pilates</a></li>
                                        <li><a href="stripdance">Strip Dance</a></li>
                                        <li><a href="tennis">Теннис</a></li>
                                        <li><a href="run">Бег</a></li>
                                        <li><a href="stretching">Стречинг</a></li>
                      </ul> 

                      <h3><li><a href="martial">Боевые искусства</a></li></h3>
                      <ul class="nav nav-list">
                                        <li><a href="boxing">Бокс</a></li>
                                        <li><a href="karate">Каратэ</a></li>
                                        <li><a href="sambo">Самбо</a></li>
                                        <li><a href="dzudo">Дзюдо</a></li>
                                        <li><a href="taibox">Тайский бокс</a></li>
                      </ul>

                      <h3><li><a href="computer">Компьютерные курсы</a></li></h3>
                      <ul class="nav nav-list">
                                        <li><a href="programming">Программирование</a></li>
                                        <li><a href="seo">SEO</a></li>
                                        <li><a href="smm">SMM</a></li>
                                        <li><a href="design">Дизайн</a></li>
                                        <li><a href="editing">Видеомонтаж</a></li>
                      </ul>
                        -->

                      <h3><li><a href="languages">Иностранные языки</a></li></h3>
                      <ul class="nav nav-list">
                                        <li><a href="english">Английский</a></li>
                                        <li><a href="french">Французский</a></li>
                                        <li><a href="spanish">Испанский</a></li>
                                        <li><a href="italian">Итальянский</a></li>
                                        <li><a href="german">Немецкий</a></li>
                                        <li><a href="chinese">Китайский</a></li>
                      </ul>
                      <!--
                      <h3><li><a href="dances">Танцы</a></li></h3>
                      <ul class="nav nav-list">
                                        <li><a href="clubdance">Клубные танцы</a></li>
                                        <li><a href="hiphop">Hip-Hop</a></li>
                                        <li><a href="balroom">Бальные танцы</a></li>
                                        <li><a href="childdance">Детские танцы</a></li>
                                        <li><a href="bellydance">Танец живота</a></li>
                                        <li><a href="tango">Танго</a></li>
                                        <li><a href="balet">Балет</a></li>
                                        <li><a href="vals">Вальс</a></li>
                                        <li><a href="samba">Самба</a></li>
                                        <li><a href="breakdance">Брейк</a></li>
                                        <li><a href="latina">Латина</a></li>
                                        <li><a href="r_and_b">R&B</a></li>
                                        <li><a href="irlandskie">Ирландские</a></li>
                                        <li><a href="chechetka">Чечетка</a></li>
                                        <li><a href="kapoera">Капоэйра</a></li>
                                        <li><a href="narodnie">Народные</a></li>
                                        <li><a href="other_dance">Другие</a></li>           
                        </ul>
                    -->
                    </div>
                </div>

                <div class="span9">                  
                    <div id="courses">
                        <div class="accordion" id="accordion2">
                            <?php                                      
                            if(mysql_num_rows($data) > 0) {
                                $k=1;
                                while($row = mysql_fetch_array($data)) {
                                //echo $i."name_eng=".$row['name_eng'];
                                //echo "<br>".$i."eng=".$row['eng'];
                                //echo "<br>".$i."name_rus=".$row['name_rus'];
                                //echo "<br>".$i."price=".$row['price'];
                                //echo "<br>".$i."description=".$row['description'];
                                $name_course_eng = $row['coursename_eng'];
                                $name_companies_eng =  $row['compname_eng'];
                                echo (" <div class='accordion-group iss'>                        
                                            <div class='accordion-heading' >
                                                <div class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' data-target='#collapse".$k."'>                                            
                                                    
                                                    <table class = 'table_course'><tr>
                                                    <td width = '20%'>
                                                    <div class = 'picture_course'>
                                                        <a href=/".strtolower($row['compname_eng'])."/".strtolower($row['coursename_eng']).">
                                                            <img src='../images/courselogo/".$row['id_course'].".jpg'/>
                                                        </a>
                                                    </div>
                                                    </td>
                                                    <td width = '40%'>
                                                        <div class='name_course'>
                                                            <span class='page-header'> 
                                                                <h4>
                                                                    <a href=/".strtolower($row['compname_eng'])."/".strtolower($row['coursename_eng']).">".$row['coursename_rus']."</a>
                                                                </h4>
                                                                <p>
                                                                    <small>".$row['compname_rus']."</small>
                                                                </p>
                                                            </span>                                    
                                                        </div>
                                                    </td>
                                                    
                                                    <td width = '25%'>
                                                        <div class='location_courses'>
                                                            <span class='page-header'> 
                                                                <ul class='unstyled'>");
                                                                                                             $info_address_course = mysql_query(" 
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
                                                                                                                        `companies`.`compname_eng` =  '$name_companies_eng'
                                                                                                                ");
                                                                                                                $info_address_course_count = mysql_query(" 
                                                                                                                    SELECT  count(*) as p
                                                                                                                    FROM `courses` 
                                                                                                                       join `cv` on `courses`.`id_course` = `cv`.`id_course` 
                                                                                                                       join `venues` on `cv`.`id_venue` = `venues`.`id_venue`                       
                                                                                                                       join `companies` on `companies`.`id_company`=`venues`.`id_company`
                                                                                                                    where   `courses`.`coursename_eng` = '$name_course_eng' and 
                                                                                                                            `companies`.`compname_eng` =  '$name_companies_eng'
                                                                                                                    ");
                                                                                                                while($row1 = mysql_fetch_array($info_address_course_count))
                                                                                                                {
                                                                                                                    $count = $row1['p'] - 3;
                                                                                                                }
                                                                                                                $i = 0;
                                                                                                                while($row2 = mysql_fetch_array($info_address_course))
                                                                                                                {
                                                                                                                    $i = $i+1;
                                                                                                                    if (($i>3)&&($count!=1))
                                                                                                                    {
                                                                                                                        echo "<li>и еще ".$count." других мест</li>";
                                                                                                                        break;
                                                                                                                    }
                                                                                                                    echo "<li>".$row2['venuename_rus']."</li>";
                                                                                                                    
                                                                                                                }
                                                                    echo ("
                                                                </ul>
                                                            </span>                                    
                                                        </div>
                                                    </td>
                                                    
                                                    <td width = '15%'>
                                                    <div class='price_course'>
                                                    ");
                                                    if ($row['minprice']!='0')
                                                    echo "
                                                    <div class='price_course'>
                                                            от ".$row['minprice']." рублей
                                                    </div>";
                                                    echo ("
                                                            
                                                    </div>
                                                    </td>
                                                    </tr></table>
                                                </div>                                                                               
                                            </div>
                                            
                                            <div id='collapse".$k."' class='accordion-body collapse'>
                                                <div class='accordion-inner'>
                                                    <div class = 'description_course'> 
                                                     ".$row['description']."
                                                     </div>
                                                </div>
                                            </div>
                                        </div>
                                        ");
                                $k=$k+1;

                                }
                            } else 
                            echo("  <div class='accordion-group'>
                                        <div class='accordion-heading' >
                                            <div style='padding:5px 10px 5px 30px ;')>
                                                <a class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' href='#collapse2'>
                                                    К сожалению, курсов данного типа еще нет в нашей базе.<br>
                                                    В ближайшее время будет пополнение курсов<br> 
                                                    Ждите новостей в группе вконтакте
                                                </a>
                                            </div>
                                        </div>
                                     </div>
                                     <div id='collapse2' class='accordion-body collapse'>
                                         <div class='accordion-inner'> 
                                              
                                         </div>
                                     </div>
                                ");
          
                         ?>
                        </div>
                    </div>
                    <div class="pagination pagination-small text-center">
                      <ul id="nav_num">
                      </ul>
                    </div>
                </div>
            </div>  
    </div>
<div class = "hfooter"></div>
