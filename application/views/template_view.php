<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8"/>
		<meta name="description" content="Imptovy - это место, где собраны все образовательные курсы и спортивные секции вашего города." />
		<meta name="keywords" content="" />
		<title>ImprovY</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link href="/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
        <link href="/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" /> 

        <link href="/css/style.css" rel="stylesheet" type="text/css"/>
        <script src="/js/jquery.js" type="text/javascript"></script>
        <script src="/js/jquery.cookie.js" type="text/javascript"></script>
        <script src="/js/code.js" type="text/javascript"></script>        
        <link rel="stylesheet" href="/css/jquery-ui-1.9.0.custom.css" />
        <script src="/js/jquery-ui.js"></script>
        <script src="/js/reg.js"></script>
        <script src="/js/select.js"></script>
        <script src="/js/addcourse.js"></script>
        <script src="/js/addvenue.js"></script>
		    <script src="/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Textarea edit -->
         <link rel="stylesheet" type="text/css" href="/css/bootstrap-wysihtml5.css"></link>


        <script type="text/javascript">        
          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', 'UA-30181385-1']);
          _gaq.push(['_trackPageview']);
        
          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();        
        </script>
        <script type="text/javascript">
          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', 'UA-40684932-1']);
          _gaq.push(['_trackPageview']);

          (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
          })();
        </script>  
        <script src="/js/wysihtml5-0.3.0.js"></script>
        <script src="/js/bootstrap-wysihtml5.js"></script>  
        <!-- Textarea edit  end     -->
	</head>
 
	<body >    
        <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
          <div class="modal-header" id="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">ImprovY</h3> 
          </div>
          <div class="modal-body">
                <form class="form-horizontal" method="POST" action="" id="entForm">
                     <div class="control-group">
                        <label class="control-label" for="inputEmail">Email</label>
                        <div class="controls">
                          <div class="input-prepend">
                            <span class="add-on"><i class="icon-envelope"></i></span>
                            <input type="text" id="entEmail" placeholder="Email" name="Email">
                          </div>
                        </div>
                      </div>
                      <div class="control-group mb">
                        <label class="control-label" for="inputPassword">Пароль</label>
                        <div class="controls">
                          <div class="input-prepend">
                            <span class="add-on"><i class="icon-lock"></i></span>
                            <input type="password" id="entPassword" placeholder="Пароль" name="Pass">
                          </div>
                        </div>
                      </div>
                      <div class="control-group">
                        <div class="controls">                          
                          <button class="btn btn-primary" type="button" id="ent" href='#'>Войти</button>&nbsp&nbsp&nbsp&nbsp&nbsp 
                          <a href=""><small>Забыли пароль?</small></a>                                                
                        </div>
                      </div>
                                              
                          
                          
                        
                      
                </form>
                
          </div>
         
          <div class="modal-footer">
            <a href="/registration"><small>Зарегистрироваться</small></a>
          </div>
        </div>
        <div class = "content">
        <header>                
                    <div class="navbar navbar-fixed-top">
                        <div class="navbar-inner ">
                            <div class="container">
                                <a class="brand" href="/main">ImprovY <sub><i>beta</i></sub> </a> 
                                <a class="brand" href="/main">Санкт-Петербург</a>
                                <ul class="nav pull-right">
                                    <li><a href='/contacts'>О нас</a></li>
                                    
                                    <?php
                                   if (!isset($_SESSION['id'])) {
                                    echo("<li><a href='#enter' id='b3'>Вход</a></li>
                                      <li><button class='btn btn-primary' type='button' id='b'>Добавить курсы</button></li>");
                                    } else {
                                        $compname = $_SESSION['name'];
                                        echo "<li><a href='/$compname' id='b1'>Личный кабинет</a></li>
                                        <li><a href='#exit' id='b2'>Выход</a></li>";
                                    }
                                    ?>                         
                                </ul>
                            </div>
                        </div>
                    </div>
              
        </header>
        <?php include 'application/views/'.$content_view; ?>
        
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="span7 vm">
                      
                        <ul class="inline">
                          <li><small>Copyright © ImprovY 2013</small></li>
                          <li><a href="/main"><small>Главная</small></a></li>
                          <li><a href="/about"><small>О нас</small></a></i>
                          <li><a href="/registration"><small>Организаторам</small></a></li>
                        </ul>
                        
                    </div>
                    <div class="span5 ">
                        <div class="pull-left" >
                                <div class="cocial_img" >
                                    <a href="http://vk.com/improvy" target="_blank">
                                        <img  src="/images/main/vk_over.png" onmouseover="this.src='/images/main/vk.png';" onmousedown="this.src='/images/main/vk_click.png';" onmouseout="this.src='/images/main/vk_over.png';"/>
                                     </a>
                                 </div>
                                <div class="cocial_img" >
                                    <a href="http://www.facebook.com/groups/608762325807004/" target="_blank">
                                        <img  src="/images/main/facebook_over.png" onmouseover="this.src='/images/main/facebook.png';"onmousedown="this.src='/images/main/facebook_click.png';" onmouseout="this.src='/images/main/facebook_over.png';"/>
                                    </a>
                                </div>
                                <div class="cocial_img" >
                                    <a href="" target="_blank">
                                        <img  src="/images/main/odnoklassniki_over.png" onmouseover="this.src='/images/main/odnoklassniki.png';"onmousedown="this.src='/images/main/odnoklassniki_click.png';" onmouseout="this.src='/images/main/odnoklassniki_over.png';"/>
                                    </a>
                                </div>
                                <div class="cocial_img" >
                                    <a href="" target="_blank">
                                        <img  src="/images/main/twiter_over.png" onmouseover="this.src='/images/main/twiter.png';"onmousedown="this.src='/images/main/twitter_click.png';" onmouseout="this.src='/images/main/twiter_over.png';"/>
                                    </a>
                                </div>
                            </div>
                                     
                    
                    </div>
                </div>
            </div>

            <script type="text/javascript">
            (function (d, w, c) {
                (w[c] = w[c] || []).push(function() {
                    try {
                        w.yaCounter20304454 = new Ya.Metrika({id:20304454,
                                webvisor:true,
                                clickmap:true,
                                trackLinks:true,
                                accurateTrackBounce:true});
                    } catch(e) { }
                });
            
                var n = d.getElementsByTagName("script")[0],
                    s = d.createElement("script"),
                    f = function () { n.parentNode.insertBefore(s, n); };
                s.type = "text/javascript";
                s.async = true;
                s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";
            
                if (w.opera == "[object Opera]") {
                    d.addEventListener("DOMContentLoaded", f, false);
                } else { f(); }
            })(document, window, "yandex_metrika_callbacks");
            </script>
            <noscript><div><img src="//mc.yandex.ru/watch/20304454" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
            <!-- /Yandex.Metrika counter -->
            
            <script type="text/javascript">

              var _gaq = _gaq || [];
              _gaq.push(['_setAccount', 'UA-38811259-1']);
              _gaq.push(['_trackPageview']);
            
              (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
              })();
            
            </script>
        </footer> 
				
	</body>
</html>
