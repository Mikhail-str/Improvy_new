 $(function() {
     $("#side").accordion({
         navigation: true,
         heightStyle: "content",
         animate: false
     });
     $("#side li a").click(function() {
         $.cookie("openItem", $(this).attr("href"));
     });
     $("#side h3  ").click(function() {
         $.cookie("openItem", $(this).children().children().attr("href"));
         document.location.href = $(this).children().children().attr("href");
     });

     $("#side li a[href$='" + $.cookie("openItem") + "']").addClass("open");
     $("#side li a[href$='" + $.cookie("openItem") + "']").parent().addClass('active');

 });
 $(function() {
     var src1 = "images/png/new_coorse_minus_new.png";
     var src2 = "images/png/new_coorse_add_new.png";
     $("#APM").click(function() {
         if ($("#PM").attr("src") != src1) $("#PM").attr("src", src1);
         else $("#PM").attr("src", src2);
     })
 })

 $(function() {
     var src1 = "images/png/button_add1.png";
     var src2 = "images/png/button_add2.png";
     $("#APMI1").click(function() {
         if ($("#PMI1").attr("src") != src1) $("#PMI1").attr("src", src1);
         else $("#PMI1").attr("src", src2);
     })
     $("#APMI2").click(function() {
         if ($("#PMI2").attr("src") != src1) $("#PMI2").attr("src", src1);
         else $("#PMI2").attr("src", src2);
     })
     $("#APMI3").click(function() {
         if ($("#PMI3").attr("src") != src1) $("#PMI3").attr("src", src1);
         else $("#PMI3").attr("src", src2);
     })
     $("#APMI4").click(function() {
         if ($("#PMI4").attr("src") != src1) $("#PMI4").attr("src", src1);
         else $("#PMI4").attr("src", src2);
     })
     $("#APMI5").click(function() {
         if ($("#PMI5").attr("src") != src1) $("#PMI5").attr("src", src1);
         else $("#PMI5").attr("src", src2);
     })
     $("#APMI6").click(function() {
         if ($("#PMI6").attr("src") != src1) $("#PMI6").attr("src", src1);
         else $("#PMI6").attr("src", src2);
     })
     $("#APMI1").click(function() {
         if ($("#PMI7").attr("src") != src1) $("#PMI7").attr("src", src1);
         else $("#PMI7").attr("src", src2);
     })
     $("#APMI8").click(function() {
         if ($("#PMI8").attr("src") != src1) $("#PMI8").attr("src", src1);
         else $("#PMI8").attr("src", src2);
     })
     $("#APMI9").click(function() {
         if ($("#PMI9").attr("src") != src1) $("#PMI9").attr("src", src1);
         else $("#PMI9").attr("src", src2);
     })
     $("#APMI10").click(function() {
         if ($("#PMI10").attr("src") != src1) $("#PMI10").attr("src", src1);
         else $("#PMI10").attr("src", src2);
     })
     $("#APMI11").click(function() {
         if ($("#PMI11").attr("src") != src1) $("#PMI11").attr("src", src1);
         else $("#PMI11").attr("src", src2);
     })
     $("#APMI12").click(function() {
         if ($("#PMI12").attr("src") != src1) $("#PMI12").attr("src", src1);
         else $("#PMI12").attr("src", src2);
     })
     $("#APMI13").click(function() {
         if ($("#PMI13").attr("src") != src1) $("#PMI13").attr("src", src1);
         else $("#PMI13").attr("src", src2);
     })
     $("#APMI14").click(function() {
         if ($("#PMI14").attr("src") != src1) $("#PMI14").attr("src", src1);
         else $("#PMI14").attr("src", src2);
     })
     $("#APMI15").click(function() {
         if ($("#PMI15").attr("src") != src1) $("#PMI15").attr("src", src1);
         else $("#PMI15").attr("src", src2);
     })
     $("#APMI16").click(function() {
         if ($("#PMI16").attr("src") != src1) $("#PMI16").attr("src", src1);
         else $("#PMI16").attr("src", src2);
     })
     $("#APMI17").click(function() {
         if ($("#PMI17").attr("src") != src1) $("#PMI17").attr("src", src1);
         else $("#PMI17").attr("src", src2);
     })
     $("#APMI18").click(function() {
         if ($("#PMI18").attr("src") != src1) $("#PMI18").attr("src", src1);
         else $("#PMI18").attr("src", src2);
     })
     $("#APMI19").click(function() {
         if ($("#PMI19").attr("src") != src1) $("#PMI19").attr("src", src1);
         else $("#PMI19").attr("src", src2);
     })
 })

 $(function() {
     // alert('page');
     var page;
     $("#dsd li").click(function() {
         page = $(this).text();
         // alert(page);
         $.ajax({
             type: "POST",
             url: '/php/issue.php',
             data: {
                 "page": page
             }
         })
     })


 })

 $(function() {
     $("#inlineCheckbox1").bind("change click", function() {
         // do something
         if ($(this).prop("checked")) {
             $("input:checkbox").prop("checked", false);
         } else {
             $("input:checkbox").prop("checked", true);
         }

         //alert(1);
     });
 })