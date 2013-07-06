<div class="container pad">

<?php
  if (isset($_SESSION["crumb"])) {
         echo "<div class='navig'><i class='icon-arrow-left'></i><a href='".$_SESSION["crumb"]."'>Назад к поиску</a></div>"; 
         }  
  ?>

    <div class="row">
        <div class="span12">
            <h4 style="margin-top: 0 !important;">
             
              <?php
                    
                    $routes = explode('/', $_SERVER['REQUEST_URI']);
                    $name_companies_eng =  $routes[1];
                    $name_course_eng = $routes[2];
                    while($row = mysql_fetch_array($data['info_company_query']))
                    { 
                        $id_company = $row["id_company"];
                        $name_companies_rus = $row["compname_rus"];
                        $telephone = $row["telephone"];
                    }
                    
                    while($row = mysql_fetch_array($data['info_course_query']))
                    { 
                        $name_course_rus = $row["coursename_rus"]; 
                        $id_course = $row['id_course'];
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
                            "ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya"
                        );
                        return strtr($str,$translit);
                    } 
                   
                   
                     
                if (isset($_POST['action_course_rus'])) {
                    if (!($_POST['action_course_rus']=='2'))    {                 
                        if (($_POST['action_save_course_rus']=='1'))    {
                            //Запись в базу данных
                            $name_course_rus_edit = $_POST["test"];
                            $compid = $_SESSION['id'];
                            $name_eng = translit($name_course_rus_edit);
                            
                            mysql_query("UPDATE  `improvy_db`.`courses` 
                                         SET  `coursename_rus` = '$name_course_rus_edit',
                                              `coursename_eng` = 'hiphop'
                                         WHERE  `courses`.`id_course` = '$id_course' ");
                        }                               
                        echo '<form name="frm" method="POST" class = "margino">';                        
                        //Вывод из базы данных 
                        echo $name_course_rus_edit.""; 
                        //Флаг для смены окна
                        echo '   <input type="submit" value="Редактировать!" class="btn" >
                                <input type="hidden" name="action_course_rus" value=2>
                              </form>';                            				
                    }
                    else {   
                        echo '<form name="frm" method="POST" class = "margino">';
                        //Флаг для смены окна
                        echo '<input type="hidden" name="action_course_rus" value=1>';
                        //Флаг для сохранения
                        echo '<input type="hidden" name="action_save_course_rus" value=1>';
                        //Вывод из базы данных  
                        echo '<input placeholder="Название курса" name = "test" value = "'.$name_course_rus.'"></input>';                           
                        
                        echo '<input type="submit" value="Сохранить" class="btn" >';
                        echo '</form>';     
                    }
                }
                else{
                    echo '<form name="frm" method="POST" class = "margino">';
                    //Вывод из базы данных 
                    echo $name_course_rus.""; 
                    //Флаг для смены окна
                    echo '<input type="hidden" name="action_course_rus" value=2>';
                    if (isset($_SESSION['id'])&&($_SESSION['id']==$id_company))
                    {                        
                        echo '<input type="submit" value="Изменить название" class="btn"></input>';
                    }
                    echo '</form>';   
                }   
                    echo '
                    
                        <small><a href="/'.$name_companies_eng.'">'.$name_companies_rus.'</a></small>';
                    
                    ?>
                    
                    
            </h4>
        </div>
    </div>
    
    <div class="row">
        <div class="span8">
            <div class="thumbnail">
                <?php
                echo "<img src='../images/courselogo/".$id_course.".jpg' />";
                ?>
            </div>
            <br />
            <div class="tabbable"> <!-- Only required for left/right tabs -->
                <?php 
                    $data_course = mysql_query("SELECT distinct `courses`.id_course, `courses`.minprice, `courses`.description, `courses`.price, `courses`.timetable
                                        FROM `courses` 
                                        join `cv` on `courses`.`id_course` = `cv`.`id_course` 
                                        join `venues` on `cv`.`id_venue` = `venues`.`id_venue`                       
                                        join `companies` on `companies`.`id_company`=`venues`.`id_company`
                                        where `courses`.`coursename_eng` = '$name_course_eng' ");
                    while($row = mysql_fetch_array($data_course)) 
                    {
                        $id_course = $row['id_course'];
                        $minprice_course = $row['minprice'];
                        $description_course = $row['description'];
                        $price_course = $row['price'];
                        $timetable_course = $row['timetable'];
                    }   
                                        
                                        
             echo  '<ul class="nav nav-tabs">
                    <li '; if ((isset($_POST['action_description_course']))||( !isset($_POST['action_price_course'])&& !isset($_POST['action_timetable_course'])))   {echo 'class="active"';} echo '><a href="#tab1" data-toggle="tab">О курсе</a></li>
                    <li '; if (isset($_POST['action_price_course']))         {echo 'class="active"';} echo '><a href="#tab2" data-toggle="tab">Цена от '.$minprice_course.'</a></li>
                    <li '; if (isset($_POST['action_timetable_course']))     {echo 'class="active"';} echo '><a href="#tab3" data-toggle="tab">Расписание</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane  '; if ((isset($_POST['action_description_course']))||( !isset($_POST['action_price_course'])&& !isset($_POST['action_timetable_course'])))   {echo 'active';} echo '" id="tab1">
                        <div class="well well-small" id="about">';
                        
                        
                    
                        
                                if (isset($_POST['action_description_course'])) {
                                    if (!($_POST['action_description_course']=='2'))    {                 
                                        if (($_POST['action_save_description_course']=='1'))    {
                                            //Запись в базу данных
                                            $description_course = $_POST["test"];
                                            $compid = $_SESSION['id'];
                                            mysql_query("UPDATE  `improvy_db`.`courses` 
                                                        SET  `description` = '$description_course' 
                                                        WHERE  `courses`.`id_course` ='$id_course'
                                           ");
                                        }                               
                                        echo '<form name="frm1" method="POST">
                                                <input type="submit" value="Редактировать!" class="button_edit_textarea" style = "top: -5px;left:10px;">';                        
                                        //Вывод из базы данных 
                                        echo $description_course."<br/>"; 
                                        //Флаг для смены окна
                                        echo '<input type="hidden" name="action_description_course" value=2>
                                              </form>';                            				
                                    }
                                    else {   
                                        echo '<form name="frm1" method="POST">';
                                        echo '<input type="submit" value="Сохранить" class="btn button_save">';
                                        //Флаг для смены окна
                                        echo '<input type="hidden" name="action_description_course" value=1>';
                                        //Флаг для сохранения
                                        echo '<input type="hidden" name="action_save_description_course" value=1>';
                                        //Вывод из базы данных  
                                        echo '<textarea class="textarea_description" placeholder="Введите описание вашей компании." style="width: 586px; height: 200px" name="test">'.$description_course.'</textarea>';                           
                                        
                                        echo '</form>';     
                                    }
                                }
                                else{
                                    echo '<form name="frm1" method="POST">';
                                    if (isset($_SESSION['id'])&&($_SESSION['id']==$id_company))
                                    {                    
                                        echo '<input type="submit" value="Редактировать!" class="button_edit_textarea" style = "top: -5px;left:10px;">';
                                    }
                                    //Вывод из базы данных 
                                    echo $description_course."<br/>"; 
                                    //Флаг для смены окна
                                    echo '<input type="hidden" name="action_description_course" value=2>';
                                    echo '</form>';   
                                }                               
                           
                				        
                        
                        
                        
                        
                        //Хип-хоп (англ. Hip-hop) — музыкальный жанр или музыкальная форма, являющийся сочетанием ритмичной музыки и наложенным на неё речитативом, иногда — с наличием мелодичного куплета.[1] Хип-хоп музыка является сочетанием двух музыкальных элементов субкультуры хип-хопа— диджеинга и эмсиинга.
                        //$_description_course
                    echo '          <script>
                							$(".textarea_description").wysihtml5();
                						</script>
                						<script type="text/javascript" charset="utf-8">
                							$(prettyPrint);
                						</script>
                        
                        </div>
                    </div>
                    <div class="tab-pane '; if (isset($_POST['action_price_course']))   {echo 'active';} echo '" id="tab2">
                        <div class="well well-small" id="about">
                            <p>';
                             
                             //$price_course
                             
                             if (isset($_POST['action_price_course'])) {
                                    if (!($_POST['action_price_course']=='2'))    {                 
                                        if (($_POST['action_save_price_course']=='1'))    {
                                            //Запись в базу данных
                                            $price_course = $_POST["test"];
                                            $compid = $_SESSION['id'];
                                            mysql_query("UPDATE  `improvy_db`.`courses` 
                                                        SET  `price` = '$price_course' 
                                                        WHERE  `courses`.`id_course` ='$id_course'
                                           ");
                                        }                               
                                        echo '<form name="frm2" method="POST">
                                                <input type="submit" value="Редактировать!" class="button_edit_textarea" style = "top: -5px;left:10px;">';                        
                                        //Вывод из базы данных 
                                        echo $price_course."<br/>"; 
                                        //Флаг для смены окна
                                        echo '<input type="hidden" name="action_price_course" value=2>
                                              </form>';                            				
                                    }
                                    else {   
                                        echo '<form name="frm2" method="POST">';
                                        echo '<input type="submit" value="Сохранить" class="btn button_save">';
                                        //Флаг для смены окна
                                        echo '<input type="hidden" name="action_price_course" value=1>';
                                        //Флаг для сохранения
                                        echo '<input type="hidden" name="action_save_price_course" value=1>';
                                        //Вывод из базы данных  
                                        echo '<textarea class="textarea_price" placeholder="Введите описание вашей компании." style="width: 586px; height: 200px" name="test">'.$price_course.'</textarea>';                           
                                        
                                        echo '</form>';     
                                    }
                                }
                                else{
                                    echo '<form name="frm2" method="POST">';
                                    if (isset($_SESSION['id'])&&($_SESSION['id']==$id_company))
                                    {                        
                                        echo '<input type="submit" value="Редактировать!" class="button_edit_textarea" style = "top: -5px;left:10px;">';
                                    }
                                    //Вывод из базы данных 
                                    echo $price_course."<br/>"; 
                                    //Флаг для смены окна
                                    echo '<input type="hidden" name="action_price_course" value=2>';
                                    echo '</form>';   
                                }  
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             echo '          <script>
                							$(".textarea_price").wysihtml5();
                						</script>
                             
                             
                             </p>
                        </div>
                    </div>
                    <div class="tab-pane '; if (isset($_POST['action_timetable_course']))   {echo 'active';} echo '" id="tab3">
                        <div class="well well-small" id="about">
                            <p> ';
                            
                            //.$timetable_course.
                            if (isset($_POST['action_timetable_course'])) {
                                    if (!($_POST['action_timetable_course']=='2'))    {                 
                                        if (($_POST['action_save_timetable_course']=='1'))    {
                                            //Запись в базу данных
                                            $timetable_course = $_POST["test"];
                                            $compid = $_SESSION['id'];
                                            mysql_query("UPDATE  `improvy_db`.`courses` 
                                                        SET  `timetable` = '$timetable_course' 
                                                        WHERE  `courses`.`id_course` ='$id_course'
                                           ");
                                        }                               
                                        echo '<form name="frm3" method="POST">
                                                <input type="submit" value="Редактировать!" class="button_edit_textarea" style = "top: -5px;left:10px;">';                        
                                        //Вывод из базы данных 
                                        echo $timetable_course."<br/>"; 
                                        //Флаг для смены окна
                                        echo '<input type="hidden" name="action_timetable_course" value=2>
                                              </form>';                            				
                                    }
                                    else {   
                                        echo '<form name="frm3" method="POST">';
                                        echo '<input type="submit" value="Сохранить" class="btn button_save">';
                                        //Флаг для смены окна
                                        echo '<input type="hidden" name="action_timetable_course" value=1>';
                                        //Флаг для сохранения
                                        echo '<input type="hidden" name="action_save_timetable_course" value=1>';
                                        //Вывод из базы данных  
                                        echo '<textarea class="textarea_timetable" placeholder="Введите описание вашей компании." style="width: 586px; height: 200px" name="test">'.$timetable_course.'</textarea>';                           
                                        
                                        echo '</form>';     
                                    }
                                }
                                else{
                                    echo '<form name="frm3" method="POST">';
                                    if (isset($_SESSION['id'])&&($_SESSION['id']==$id_company))
                                    {                        
                                        echo '<input type="submit" value="Редактировать!" class="button_edit_textarea" style = "top: -5px;left:10px;">';
                                    }
                                    //Вывод из базы данных 
                                    echo $timetable_course."<br/>"; 
                                    //Флаг для смены окна
                                    echo '<input type="hidden" name="action_timetable_course" value=2>';
                                    echo '</form>';   
                                }  
                             
                             
                             
                             
                             
                             
                             
                             
                             
                             echo '     <script>
                							$(".textarea_timetable").wysihtml5();
                						</script>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            </p>
                        </div>
                    </div>
                    
                    ';
                    ?>
                </div>
            </div>
            
        </div>
        
        
        
        
        
        
        
        
        
        <div class="span4">
            <div class="well" style="padding: 9px; ">
                <!-- Этот блок кода нужно вставить в ту часть страницы, где вы хотите разместить карту (начало) -->
            <div id="ymaps-map-id_1" style="width: 280px; height: 320px;"></div>
            <script type="text/javascript">

            function fid_1(ymaps) {
                var map = new ymaps.Map("ymaps-map-id_1", {center: [30.381683621829444, 59.950885785505406], zoom: 8, type: "yandex#map"});

                    map.controls.add("zoomControl").add("mapTools").add(new ymaps.control.TypeSelector(["yandex#map", "yandex#satellite", "yandex#hybrid", "yandex#publicMap"]));
                    <?php
                    
                    $ij = 0;
                    while($row = mysql_fetch_array($data['map_address_query']))
                    {
                        $ij = $ij + 1;
                        echo 'map.geoObjects.add(new ymaps.Placemark(['.$row["coordinate"].'], {balloonContent: "1", iconContent: "'.$ij.'"}, {preset: "twirl#redIcon"}));';
                        
                    }
                    ?>
                    };</script>
            <script type="text/javascript" src="http://api-maps.yandex.ru/2.0-stable/?lang=ru-RU&coordorder=longlat&load=package.full&wizard=constructor&onload=fid_1"></script>
            <!-- Этот блок кода нужно вставить в ту часть страницы, где вы хотите разместить карту (конец) -->
            </div>
            
            <?php
                    
                    $ij = 0;
                    echo "<dl>";
                    while($row = mysql_fetch_array($data['info_address_query']))
                    {
                        $venuename_rus = $row['venuename_rus'];
                        if (isset($_SESSION['id'])&&($_SESSION['id']==$id_company))
                        { 
                            echo '<i class="icon-remove icon-remove_button" id="'.$row["id_venue"].'" onclick="f(this)" >
                        
                        </i>';
                        }
                        $ij = $ij + 1;
                        echo  '<dt >'.$ij.') '.$row['venuename_rus'].'</dt><dd> Адрес: ';
                        if ($row["metro"]!='')
                        echo 'метро '.$row["metro"].', '; 
                        
                        if ($row["home"]=='')                        
                            echo 'улица  '.$row["street"].', дом '.$row["home"].'<br>';                        
                        else                         
                            echo 'улица  '.$row["street"].', дом '.$row["home"].', корпус '.$row["corpus"].'<br>';
                        
                        if ($row["phone"]!='') 
                            echo 'Телефон:'.$row["phone"].'</dd>';
                        else
                            if  ($telephone!='')
                                echo 'Телефон:'.$telephone.'</dd>';
                            else 
                                echo '</dd>';
                    }
                    echo "</dl>";
                    ?>
            <script>
            
               function f(el) {
                    id_remove_venue = el.id;
                    id_remove_course = '<?php echo $id_course;?>';
                    name_course_rus = '<?php echo $name_course_rus;?>';
                    venuename_rus = '<?php echo $venuename_rus;?>';
                    //alert('1'+id_remove_venue + '1  1' + id_remove_course+'1');
                    
                    
                        $.ajax({
            			type: "POST",
            			url: '/php/remove_venues.php',
            			data: {
            				"id_remove_venue": id_remove_venue,
                            "id_remove_course": id_remove_course,
                            "name_course_rus": name_course_rus,
                            "venuename_rus":venuename_rus
            			},
            			success: function(data) {
            				    alert(data);
            				    location.reload();
            				    window.location = location.href;
            					//$('#myModal').modal('show');
            			}
            		})
                }
                
            </script>
        </div>
    </div>
    <div class="row">
        <div class="span8">
            
        </div>
    </div>
</div>
<div class = "hfooter"></div>
</div>
