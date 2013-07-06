$(function() {
    $('#type_new_course').change(function(){
        var type_new_course = $("#type_new_course").val();
        $.ajax({
            url:'/php/subtype.php',
            type: "POST",
            dataType : "json",
            data:
                {"type_new_course":type_new_course},
                 
                success: function(data){
                    var options = '';
                    /*var kal = "rerew";
                    var data1 = eval ( '('+ data +')' );
                    alert (data);
                    alert (data1);*/


                    options += '<option value="">Выберите подтип курса</option>';
                    $.each(data.name, function(i) {
                        
                        
                        options += '<option value="' + data.id[i] + '">' + data.name[i] + '</option>';
                    });
                    $('#subtype_new_course').html(options);

                    
                }
        })
    })
})
