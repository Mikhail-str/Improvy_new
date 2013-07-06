$(function() {
	var arr = [];
	$(".iss").each(function(i) {
		arr[i] = $(this);
	})

	var len = arr.length;
	var It_on_page = 10;
	var pages = Math.round(len / It_on_page) + 1;
	if (len > 10){
		for (var i = 1; i <= pages; i++) {
			$("#nav_num").append("<li class='disable nums'><a href='#page"+i+"'>" + i + "</a></li>")
		}
	}
	var temp;
	var start = 0;
	for (var i = start; i < It_on_page; i++) {
		arr[i].show();
	}
	$(".nums a").click(function() {
		$(".nums").each(function(i) {
			$(this).removeClass("active").addClass("disable");
		})
		$(this).parent().removeClass("disable").addClass("active");

		var page = $(this).text()
		temp = start;
		start = page * It_on_page - It_on_page;
		var finish = start + It_on_page;
		if (finish > len) finish = len;

		/*if (temp > start) {
			for (var j = temp; j<finish; j++) {
			arr[j].hide();
			}
			alert("temp: "+temp+"	start: "+start)	
			var swap = temp;
			temp = start;
			start = swap ;
			alert("temp: "+temp+"	start: "+start)	
		} 	
			
			for (var j = temp; j<start; j++) {
				arr[j].hide();
			}
			if (temp > 10) {
			for (var j = 0; j<temp-10; j++) {
				arr[j].hide();
			}	
			}	
			alert(start+It_on_page)
			*/
		for (var i = 0; i < len; i++) {
			arr[i].hide()
		}
		for (var i = start; i < finish; i++) {
			arr[i].show();
		}

	})
})