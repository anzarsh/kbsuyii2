
$(document).ready(function(){
    //RESPONSIVEUI.responsiveTabs();
    //alert(1);
    
    $('#datepicker, #datepicker2').datepicker();

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

    function event_table(temp){
        
    }

    function event_table(temp){
        //var begin = z*5;
        //var end = begin+5;
        var k;
        //temp.forE
        var strtemp = '';
        for (i=0; i<temp.length; i++){
            if(temp[i].id_role != 0){
            strtemp += '<tr><td>' + (i+1) + 
                '</td><td><a href="#activist" rel="modal">' + temp[i].user.middlename + ' ' +
                temp[i].user.uname + ' ' + temp[i].user.lastname +
                '</a></td><td>' + temp[i].role.uname +
                '</td><td>' + temp[i].user.course +
                '</td><td>' + temp[i].user.id_department +
                '</td></tr>';
            }
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
        var k;
        var strtemp = '';
        for (i=0; i<temp.roles.length; i++){
            if(temp.roles[i].id_role != 0){
            strtemp += '<tr><td>' + (i+1) + 
                '</td><td><a dataId="' + temp.roles[i].user.id + '" href="#activist" rel="modal">' + temp.roles[i].user.middlename + ' ' +
                temp.roles[i].user.uname + ' ' + temp.roles[i].user.lastname +
                '</a></td><td>' + temp.roles[i].role.uname +
                '</td><td>' + temp.roles[i].user.course +
                '</td><td>' + temp.roles[i].user.id_department +
                '</td></tr>';
            }
        }
        $('#eventtable').html(strtemp);
    }

    function f_user(temp){
        //alert(1);
        $('#user1').text(temp.middlename + ' ' + temp.uname + ' ' + temp.lastname);
        $('#user2').text('('+temp.birthday+')');
        $('#user3').text(temp.department.uname + ', ' + temp.department.unit.uname);
        $('#user4').text(' +7(' + temp.phonenum.slice(0,3)
                    + ')' + temp.phonenum.slice(2,5)
                    + '-' + temp.phonenum.slice(5,7)
                    + '-' + temp.phonenum.slice(7,9));
        var strtemp = '<span id="user5">';
        temp.groups.forEach(function(item, j){
            strtemp +=  (j==(temp.groups.length-1))?(
                '<span class="az-style1"><a dataId="' + item.id + '" href="#group" rel="modal">'
                + item.uname + '</a></span>'
                        ):(
                '<span class="az-style1"><a dataId="' + item.id + '"  href="#group" rel="modal">'
                + item.uname + '</a>, </span>'
                        );
        });
        strtemp += '</span>'
        $('#user5').html(strtemp);
        //alert(1);
        var k;
        strtemp = '';
        for (i=0; i<temp.events.length; i++){
            //alert(temp.events[i].event.id);
            if(temp.events[i].id_role != 0){
            strtemp += '<tr><td>' + (i+1) + 
                '</td><td>' + temp.events[i].event.finishdate + '<br/>' + temp.events[i].event.startdate +
                '</td><td><a dataId="' + temp.events[i].event.id + '" href="#event" rel="modal">' + temp.events[i].event.uname +
                '</a></td><td>' + temp.events[i].role.uname +
                '</td><td>' + temp.events[i].role.mark +
                '</td></tr>';
            }
            //alert(strtemp);
            
        }
        $('#usertable').html(strtemp);
    }

    function f_group(temp){
        //alert(temp.uname);
        //alert(temp.startdate);
        $('#group0').text(temp.uname);
        $('#group1').text(temp.users.length);
        
        var k;
        var strtemp = '';
        for (i=0; i<temp.users.length; i++){
            //alert(temp.users[i].id_role);
            //if(temp.users[i].id_role != 0){
            strtemp += '<tr><td>' + (i+1) + 
                '</td><td><a dataId="' + temp.users[i].id + '" href="#activist" rel="modal">' + temp.users[i].middlename + ' ' +
                temp.users[i].uname + ' ' + temp.users[i].lastname +
                '</a></td><td>' + temp.users[i].course +
                '</td><td>' + temp.users[i].id_department +
                '</td></tr>';
            //}
        }
        //alert(strtemp);
        $('#grouptable').html(strtemp);
    }


    $('body').on('click', 'a[rel=modal]', function(e) {
        //alert(1);

        if ($('.az-fixed').hasClass('az-fixed2')){
            $('#mask, .window').hide();
            $('.window').hide();
            $('.az-fixed').removeClass('az-fixed2');
        }
        e.preventDefault();
        var id = $(this).attr('href');
        //alert(id);
        var id_event = Number($(this).attr('dataid'));
        //alert(id_event);
        //alert(id_event);
        //var id2 = id.splice(1);

        $.ajax({
            url: "/ajax/" + id.slice(1),
            type: 'get',
            //datatype: 'json',
            data: {
                id : id_event,
                //id_event: id_event
            },
            success: function (data) {
                data = '('+data+')';
                temp = eval(data);
                if(id == '#event'){f_event(temp.query);}
                else if(id == '#activist'){f_user(temp.query);}
                else if(id == '#group'){f_group(temp.query);}
                //alert(1);
                //$('#event9').text(data);
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


$('.az-form1').submit(function(){
    var form_data = $(this).serialize();
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
