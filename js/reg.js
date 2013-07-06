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
		var cname = $("#Inputname").val();
		var name = $("#fio").val();
		var email = $("#inputEmail").val();
		var address = $("#Address").val();
		var site = $("#Site").val();
		var phone = $("#Phone").val();
		var logo = $("#logo").val();



		if (/^[a-zA-Z0-9](([a-z0-9\-_\+\&]?)+[a-z0-9])?\@((\w([a-zA-Z0-9\-_]+\w)?\.[a-z]{2,4})|(([01]?\d\d|2[0-4]\d|25[0-5])\.([01]?\d\d|2[0-4]\d|25[0-5])\.([01]?\d\d |2[0-4]\d|25[0-5])\.([01]?\d\d|2[0-4]\d|25[0-5]))|(localhost))$/i.test(email)) {

		} else {
			$("#1").append("<p class='err' style='color:red'>Email введен не верно</p>");
			return false;
		}


		if(cname == '' || name == '' || address == '' || phone == '') {
			$("#1").append("<p class='err' style='color:red'>Заполните все обязательные поля</p>");
			return false;
		}
		////////
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