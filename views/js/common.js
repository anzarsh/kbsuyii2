
$(document).ready(function(){
    //RESPONSIVEUI.responsiveTabs();
    //alert(1);
    $('.main-menu a').each(function(){
        var link1 = $(this).attr('href');
        var link2 = location.href;
        var ll = link2.indexOf(link1);
        //alert(link2.lastIndexOf(link1)+link1.length);
        //alert(link2.length);
        //var patern = '/.*?'+$(this).attr('href')+'$/';
        if (ll >= 0){
            if (ll + link1.length == link2.length){
                $(this).addClass('current-link');
            }
        }
    });

    $('.az-activity, .az-eventtype').click(function(){
        $(this).next('.az-open').slideToggle('slow');
        $(this).find('.fa-angle-double-down').toggleClass('az-disp-none');
        $(this).find('.fa-angle-double-up').toggleClass('az-disp-none');
    });

    // $('#azfile').on("change", function(){ 
    //     alert($(this).val().match(/(\\.+?\\).+?/));
        
    // });



    // if($('.current-link').text() == 'мероприятия'){
    //     $('.main-menu2').css('display', 'block');
    // } 

    //funcun = function(){$('.menu-list-pressed').css({'animation-duration': '1s'});}
    //setTimeout(funcun,1000);




    // ****************************************** ah ****************************************************




    $('a[rel=modal]').click(function(e) {
        //alert(1);

        if ($('.az-fixed').hasClass('az-fixed2')){
            $('#mask, .window').hide();
            $('.window').hide();
            $('.az-fixed').removeClass('az-fixed2');
        }
        e.preventDefault();
        var id = $(this).attr('href');
        var id_event = Number($(this).parents('tr').attr('dataId'));
        //alert(id_event);
        //var id2 = id.splice(1);
        $.ajax({
            url: "/ajax/event",
            type: 'get',
            //datatype: 'json',
            data: {
                id : id,
                id_event: id_event
            },
            success: function (data) {
                data = '('+data+')';
                //var temp = eval(data);
                //alert(temp.str);
                alert(data);
            }
        });
        

        var maskHeight = $(document).height();
        var maskWidth = $(window).width();
        $('#mask').css({'width':maskWidth,'height':maskHeight});
        $('#mask').fadeTo("slow",0.8); 
        var winH = $(window).height();
        var winW = $(window).width();
        posTop = (window.pageYOffset !== undefined) ? window.pageYOffset : (document.documentElement || document.body.parentNode || document.body).scrollTop;
        $(id).css('top',  posTop + 20);
        $(id).css('left', winW/2-$(id).width()/2);
        $(id).fadeIn(500);
        $('.az-fixed').addClass('az-fixed2');
    });

    
     
    $('.window .close').click(function (e) {
        e.preventDefault();
        $('#mask, .window').hide();
        $('.window').hide();
        $('.az-fixed').removeClass('az-fixed2');
    }); 
      
    $('#mask, .an-exit__krest').click(function () {
        $('#mask').hide();
        $('.window').hide();
        $('.az-fixed').removeClass('az-fixed2');
    }); 

 
   function cleanTnakns(form){
        $('input[type="text"]').removeClass("error-input");
        $("input[type=text], textarea").val("");
        $('.window').hide();
        $('a[href=#thanks]').trigger('click');
        
    }


    $('input[type="text"]').mousedown(function() { 
        $('input[type="text"]').removeClass("error-input");
    });

// ********************************** fotoludi3 *******************************
     $(".ah-requestform").submit(function() {

            var tel = $(this).find('input[name="tel"]');
            var empty = false;
            if (tel.val() == ""){
                empty = true;
            }
            if (empty == true){
                tel.addClass("error-input");
                tel.focus();
            }else{
                var form_data = $(this).serialize(); 
                $.ajax({
                    type: "POST", 
                    url: "/sendmessage.php", 
                    data: form_data,
                    success: function() {
                        cleanTnakns(this);
                    }
                });
            }
            return false;
        });

// ***********************************************************************************

    $(".form1").submit(function() { 
        var tel = $(this).find('input[name="tel"]');
        var empty = false;
        if (tel.val() == ""){
            empty = true;
        }
        if (empty == true){
            tel.addClass("error-input");
            tel.focus();
        }else{
            var form_data = $(this).serialize(); 
            $.ajax({
                type: "POST", 
                url: "/sendmessage.php", 
                data: form_data,
                success: function() {
                    cleanTnakns(this);
                }
            });
        }
        return false;
    });

    $(".form2").submit(function() { 
        var tel = $(this).find('input[name="tel"]');
        var empty = false;
        if (tel.val() == ""){
            empty = true;
        }
        if (empty == true){
            tel.addClass("error-input");
            tel.focus();
        }else{
            var form_data = $(this).serialize(); 
            $.ajax({
                type: "POST", 
                url: "/sendmessage.php", 
                data: form_data,
                success: function() {
                    cleanTnakns(this);
                }
            });
        }
        return false;
    });
    $(".form3").submit(function() { 
        var tel = $(this).find('input[name="tel"]');
        var empty = false;
        if (tel.val() == ""){
            empty = true;
        }
        if (empty == true){
            tel.addClass("error-input");
            tel.focus();
        }else{
            var form_data = $(this).serialize(); 
            $.ajax({
                type: "POST", 
                url: "/sendmessage.php", 
                data: form_data,
                success: function() {
                    cleanTnakns(this);
                }
            });
        }
        return false;
    });
    $(".form4").submit(function() { 
        var tel = $(this).find('input[name="email"]');
        var empty = false;
        if (tel.val() == ""){
            empty = true;
        }
        if (empty == true){
            tel.addClass("error-input");
            tel.focus();
        }else{
            var form_data = $(this).serialize(); 
            $.ajax({
                type: "POST", 
                url: "/sendmessage.php", 
                data: form_data,
                success: function() {
                    cleanTnakns(this);
                }
            });
        }
        return false;
    });


});
