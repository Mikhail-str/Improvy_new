<?php   
include 'db.php';
        if(mysql_num_rows($data) > 0) {
                        $i=1;
                        $num=10;
                        $page=$_POST['page'];
                        $count=mysql_num_rows($data);

                        $total = intval(($count - 1) / $num) + 1;
                        $page = intval($page);  
						// Если значение $page меньше единицы или отрицательно  
						// переходим на первую страницу  
						// А если слишком большое, то переходим на последнюю  
						if(empty($page) or $page < 0) $page = 1;  
						  if($page > $total) $page = $total;  
						// Вычисляем начиная к какого номера  
						// следует выводить сообщения  
						$start = $page * $num - $num; 
						 
                        //$k=0;
                       // echo "<script>alert(".mysql_num_rows($data).")</script>";
                        while($row = mysql_fetch_array($data)) {
                        //echo $i."name_eng=".$row['name_eng'];
                        //echo "<br>".$i."eng=".$row['eng'];
                        //echo "<br>".$i."name_rus=".$row['name_rus'];
                        //echo "<br>".$i."price=".$row['price'];
                        //echo "<br>".$i."description=".$row['description'];
                           // if ($i%10==0) {
                              // echo "<script>alert(".mysql_num_rows($data).")</script>";
                            //}

                        echo (" <div class='accordion-group' id='issue_element".$i."'>                        
                                    <div class='accordion-heading' >
                                        <div class='accordion-toggle' data-toggle='collapse' data-parent='#accordion2' data-target='#collapse".$i."'>                                            
                                            
                                            <table class = 'table_course'><tr>
                                            <td width = '150px'>
                                            <div class = 'picture_course'>
                                                <a href=/".$row['compname_eng']."/".$row['coursename_eng'].">
                                                    <img src='../images/1.jpg'/>
                                                </a>
                                            </div>
                                            </td>
                                            <td>
                                            <div class='name_course'>
                                                <span class='page-header'> 
                                                    <h4>
                                                        <a href=/".$row['compname_eng']."/".$row['coursename_eng'].">".$row['coursename_rus']."</a>
                                                    </h4>
                                                    <p>
                                                        <small>".$row['compname_rus']."</small>
                                                    </p>
                                                </span>                                    
                                            </div>
                                            </td>
                                            <td>
                                            <div class='price_course'>
                                                    price".$row['price']."
                                            </div>
                                            </td>
                                            </tr></table>
                                        </div>                                                                               
                                    </div>
                                    <div id='collapse".$i."' class='accordion-body collapse'>
                                        <div class='accordion-inner'>
                                            <div class = 'description_course'> 
                                             ".$row['description']."
                                             </div>
                                        </div>
                                    </div>
                                </div>
                                ");
                        $i=$i+1;

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
                                      хуй вам
                                 </div>
                             </div>
                        ");
?>