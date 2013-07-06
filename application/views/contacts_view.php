<div class = "texture">
  <div class = "container">
    <div class="row">
      <div class = "span12 hero-unit2">
        <h1>ImprovY</h1>
        <p>- это простой и удобный инструмент, позволяющий автоматизировать организацию и продвижение событий.&nbsp &nbsp
        Сервис предназначен для тренеров, косультантов, преподавателей различных образовательных программ.&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
        С помощью ImprovY вы сократите временные затраты на создание и продвижение мероприятий в интернете.
      </div>
    </div>
  </div>      
</div>

<div class="container">
	<div class="row">
		

		<div class="span4">
			<legend>Наши контакты</legend>
			<address>
				<i class="icon-envelope"></i> <strong>Телефон</strong> &nbsp&nbsp +79112423152 </br>
				<i class="icon-envelope"></i> <strong>Email</strong> &nbsp&nbsp<a href="mailto:info@improvy.ru">info@improvy.ru</a>
			</address>

		</div>

		<div class="span6 offset2">
			<!-- <legend><p class = "text-center">Форма обратной связи</p></legend>
			<form class="form-horizontal">
			  <div class="control-group">
			    <label class="control-label" for="inputName">Имя</label>
			    <div class="controls">
			      <input type="text" class="span4" id="inputName" placeholder="Имя" >
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label" for="inputEmail">Email</label>
			    <div class="controls">
			      <input type="text" class="span4" id="inputEmail" placeholder="Email">
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label" for="inputComment">Текст</label>
			    <div class="controls">
			      <textarea id="inputComment" class="span4" rows="5"> </textarea>
			    </div>
			  </div>
			</form> -->
			<fieldset>
				<form method = "post" action = "<?php echo $_SERVER['REQUEST_URI']; ?>" >
				<legend>Форма обратной связи</legend>
				
					<input type="text" class = "span6" placeholder = "Имя" name = "name" required>
					<input type="text" class = "span6" placeholder = "Email" name = "email" required>
					<textarea class="span6" placeholder = "Сообщение" rows = "5" name = "message" required></textarea>
					<input type="submit" class="btn btn-info pull-right" value = "Отправить" name = "submit">
				</form>	
			</fieldset>
		</div>
	</div>

</div>
<div class = "hfooter"></div>
</div>

