$(function() {
$("#button_add_venue").click(function() {
    var all_data_address_correct = '1';
    var name_new_venue = $("#name_new_venue").val();
    if((name_new_venue == '')&&(all_data_address_correct == '1')) {
        alert("Введите название филиала где будет проходить данный курс.<br>Если названия нет, укажите ближайшее метро");
        var input = document.getElementById ("name_new_venue");
        input.focus();
        all_data_address_correct = 0;
    }

	var countre_adress_new_venue = $("#countre_adress_new_venue").val();
        if((countre_adress_new_venue == '')&&(all_data_address_correct == '1')) {
            alert("Введите город нового филиала");
            var input = document.getElementById ("countre_adress_new_venue");
            input.focus();
            all_data_address_correct = 0;
        }
    
	var phone_new_venue = $("#phone_new_venue").val();
    
	var street_adress_new_venue = $("#street_adress_new_venue").val();
        if((street_adress_new_venue == '')&&(all_data_address_correct == '1')) {
            alert("Введите улицу, где будет проходить курс");
            var input = document.getElementById ("street_adress_new_venue");
            input.focus();
            all_data_address_correct = 0;
        }
        
	var metro_new_venue = $("#metro_new_venue").val();
    
	var home_adress_new_venue = $("#home_adress_new_venue").val();
        if((home_adress_new_venue == '')&&(all_data_address_correct == '1')) {
            alert("Введите номер дома, где будет проходить курс");
            var input = document.getElementById ("home_adress_new_venue");
            input.focus();
            all_data_address_correct = 0;
        }
        
	var found_adress_new_venue = $("#found_adress_new_venue").val();
    
	var corpus_adress_new_venue = $("#corpus_adress_new_venue").val();
   // alert(all_data_address_correct);
    if (all_data_address_correct=='1')
        {
        $.ajax({
        			type: "POST",
        			url: '/php/new_venue.php',
        			data: {
                        "name_new_venue": name_new_venue,
                        "countre_adress_new_venue": countre_adress_new_venue,
                        "phone_new_venue": phone_new_venue,
                        "street_adress_new_venue": street_adress_new_venue,
                        "metro_new_venue": metro_new_venue,
                        "home_adress_new_venue": home_adress_new_venue,
                        "found_adress_new_venue": found_adress_new_venue,
                        "corpus_adress_new_venue":corpus_adress_new_venue
        			},
        			success: function(data) {
        			     
                        //alert(data);
        				$('#modal_new_venue').modal('hide');
                       // alert(data);
                            
        				//$('#modal_preview_maps').modal('show');
        				    //location.reload();
       				     window.location.reload();
        					        				
                        
        			}
        		})        
            var input = document.getElementById ("modal-header");
            input.focus();
        }
    
    })
})