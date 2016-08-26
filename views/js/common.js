
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

    var az_posTop = -1;
    var temp;

    function event_table(z, temp){
        var begin = z*5;
        var end = begin+5;
        var k;
        //temp.forE
        var strtemp = '';
        for (i=begin; i<end&&i<temp.length; i++){
            strtemp += '<tr><td>' + (i+1) + 
                '</td><td><a href="#activist" rel="modal">' + temp[i].middlename + ' ' +
                temp[i].uname + ' ' + temp[i].lastname +
                '</a></td><td>' + temp[i].uname +
                '</td><td>' + temp[i].course +
                '</td><td>' + temp[i].id_department +
                '</td></tr>';
        }
        $('#eventtable').html(strtemp);
    }

    function f_event(temp){
        //alert(temp.startdate);
        $('#event0').text(temp.uname);
        $('#event1').text(temp.eventlevel.uname);
        $('#event2').text(
            temp.iCoordinator.uname.slice(0,1)+'.'+
            temp.iCoordinator.lastname.slice(0,1)+'.'+
            temp.iCoordinator.middlename
            );
        $('#event3').text(temp.startdate);
        var strtemp = '';
        temp.registrator.forEach(function(item, j){
            strtemp +=  (j==0)?(
                        item.uname.slice(0,1) + '.' +
                        item.lastname.slice(0,1) + '.' +
                        item.middlename
                        ):(
                        ', ' + 
                        item.uname.slice(0,1) + '.' +
                        item.lastname.slice(0,1) + '.' +
                        item.middlename
                        );
        });
        $('#event4').text(strtemp);
        $('#event5').text(temp.finishdate);
        strtemp = '';
            temp.activity.forEach(function(item, j){
                strtemp +=  (j==0)?(item.uname):(', ' + item.uname);
            });
        $('#event6').text(strtemp);
        $('#event7').text(temp.location);
        strtemp = '';
        temp.eventtype.forEach(function(item, j){
            strtemp +=  (j==0)?(item.uname):(', ' + item.uname);
        });
        $('#event8').text(strtemp);
        $('#event9').text(temp.comment);
        event_table(0, temp.users);

        //alert(temp.temp.event.uname);
    }




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
                //temp = eval(data);
                //if(id == '#event'){f_event(temp.query);}
                //alert(1);
                $('#event9').text(data);
                //alert(data);
            }
        });
        

        var maskHeight = $(document).height();
        var maskWidth = $(window).width() + 30;
        $('#mask').css({'width':maskWidth,'height':maskHeight});
        $('#mask').fadeTo("slow",0.8); 
        var winH = $(window).height();
        var winW = $(window).width();
        if (az_posTop == -1){
            az_posTop = (window.pageYOffset !== undefined) ? window.pageYOffset : (document.documentElement || document.body.parentNode || document.body).scrollTop;
        }
        $(id).css('top', 30);
        $(id).css('left', winW/2-$(id).width()/2);
        $(id).fadeIn(500);
        $('.az-fixed').addClass('az-fixed2');
        $('.az-fixed2').css('top',  -az_posTop);
    });


    $('#mask, .an-exit__krest').click(function () {
        //e.preventDefault();
        //alert(az_posTop);
        $('#mask').hide();
        $('.window').hide();
        $('.az-fixed').attr('style', '');
        $('.az-fixed').removeClass('az-fixed2');
        $(document).scrollTop(az_posTop);
        az_posTop = -1;
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
