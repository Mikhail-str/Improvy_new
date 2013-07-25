$(function() {
	//$('#myModal').hide();
	/*if($.cookie("login")) {
		$("#b").hide();
		$("#b3").hide();
		$("#b1").show();
		$("#b2").show();
	} else {
		$("#b1").hide();
		$("#b2").hide();

	}*/
	$("#b").click(function() {
		//$('#myModal').modal('show')
		//$("#entForm").hide();
		//$("#regForm").show();
		location.href = '/registration';

	})
	$("#b2").click(function() {
		$.cookie("id", null, {
			path: '/'
		});
		$.cookie("hash", null, {
			path: '/'
		});
		$.ajax({
			url: '/php/del.php',
			success: function(data) {
				if (data == 1) {
					location.href = '/';
				};
			}
		});

	})
	$("#b3").click(function() {
		$('#myModal').modal('show');
		$("#regForm").hide();
		$("#entForm").show();
	})
})
$(function() {
	$("#sub").click(function() {
		$(".err").remove();
		$("#sub").hide();
		var cname = $("#Inputname").val();
		var name = $("#fio").val();
		var email = $("#inputEmail").val();
		var address = $("#Address").val();
		var site = $("#Site").val();
		var phone = $("#Phone").val();
		var logo = $("#logo").val();
		var validate = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);

		if (!validate.test(email)) {
			$("#1").append("<p class='err' style='color:red'>Email введен не верно</p>");
			$("#sub").show();
			return false;
		}

		if(cname == '' || name == '' || address == '' || phone == '') {
			$("#1").append("<p class='err' style='color:red'>Заполните все обязательные поля</p>");
			$("#sub").show();
			return false;
		}
		////////
		$("#sub").after("<p class='text-info'  id='wait_mes'>Пожалуйста подождите</p>");
		$.ajax({
			type: "POST",
			url: '/php/registration.php',
			data: {
				"cname": cname,
				"name": name,
				"email": email,
				"address": address,
				"site": site,
				"phone": phone
			},
			success: function(data) {
				if(data == 1) {
					$("#1").append("<p class='err'>Пользователь с таким именим или Email существует</p>");
					//alert(1);
				} else {
					$("#regForm").hide();
					$("#thx").show();
					//window.location = "http://localhost:8010/main#";
					//$('#myModal').modal('show');
					//window.location = "/main";
					//alert(data);
				};
			}
		}) 

	})
	$("#ent").click(function() {
		$(".er").remove();
		var email = $("#entEmail").val();
		var pas = $("#entPassword").val();
		
		if (email != '') {
			$.ajax({
				type: "POST",
				url: '/php/enter.php',
				data: {
					"password": pas,
					"email": email
				},
				success: function(data) {

					if (data == 1) {
						$('#myModal').modal('show');
						$("#ent").after("<div class='er'>Пользователя с таким Email не существует</div>");
					}
					if (data == 2) {
						$('#myModal').modal('show');
						$("#ent").after("<div class='er'>Вы ввели неверно пароль</div>");
					}
					if (data != 1 && data != 2) {
						window.location = location.href.substring(0, location.href.length - 6);
						//alert($.cookie("PHPSESSID"))
						//$('#myModal').modal('show');
					}
				}
			})
			
		} else {
			$("#ent").after("<div class='er'>Введите Email</div>");
			return false;
		}
	})
})