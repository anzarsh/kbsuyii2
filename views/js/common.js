
$(document).ready(function(){
    //RESPONSIVEUI.responsiveTabs();
    // alert(1);

/*dates*/
    $('#datepicker, #datepicker2, #datepicker3, #datepicker4').datepicker({
        pickTime: false, language: 'ru'
    });

    $(".startdate").change(function (e) {
        var time1 = new Date($(this).val().split(".").reverse().join("-"));
        var time2 = new Date($(".finishdate").val().split(".").reverse().join("-"));
        //alert(time1.getTime());
        if(time1.getTime()>time2.getTime() && $(".finishdate").val()!=''){
            $(".finishdate").val($(this).val());
        }
    });
    $(".finishdate").change(function (e) {
        var time1 = new Date($(this).val().split(".").reverse().join("-"));
        var time2 = new Date($(".startdate").val().split(".").reverse().join("-"));
        if(time2.getTime()>time1.getTime() && $(".startdate").val()!=''){
            $(".startdate").val($(this).val());
        }
    });
/*dates*/

/*pagination with filter*/
    $('.az-activity, .az-eventtype').click(function(){
        $(this).next('.az-open').slideToggle('slow');
        $(this).find('.fa-angle-double-down').toggleClass('az-disp-none');
        $(this).find('.fa-angle-double-up').toggleClass('az-disp-none');
    });
/*pagination with filter*/

/*functions*/
    var az_posTop = -1;
    var temp;

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
        var datetemp = new Date(temp.startdate);//.format("dd.mm.yyyy");
        // alert(asdfd.toLocaleDateString());
        $('#event3').text(datetemp.toLocaleDateString());
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
        var datetemp = new Date(temp.finishdate);
        $('#event5').text(datetemp.toLocaleDateString());
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
                '</td><td>' + temp.roles[i].user.department.shortname + ':'
                + temp.roles[i].user.department.unit.shortname +
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
        id_group2 = temp.id;
        id_group3 = temp.id;
        
        var k;
        var strtemp = '';
        searchingusers = new Array();
        usersin = new Array();
        for (i=0; i<temp.users.length; i++){
            //alert(temp.users[i].id_role);
            //if(temp.users[i].id_role != 0){
            searchingusers.push(temp.users[i].id);
            usersin.push(temp.users[i].id);
            strtemp += '<tr><td>' + (i+1) + 
                '</td><td><a dataId="' + temp.users[i].id + '" href="#activist" rel="modal">' + temp.users[i].middlename + ' ' +
                temp.users[i].uname + ' ' + temp.users[i].lastname +
                '</a></td><td>' + temp.users[i].course +
                '</td><td>' + temp.users[i].id_department +
                '</td></tr>';
            //}
        }
        //alert(strtemp);
        // alert(searchingusers);
        $('#grouptable').html(strtemp);

        var strtemp = '';

        for(var i=0; i<temp.users.length; i++){
                strtemp2 = temp.users[i].middlename + ' ' + temp.users[i].uname + ' ' + temp.users[i].lastname;
                strtemp2 = strtemp2.length > 25 ? strtemp2.slice(0, 25) + '...' : strtemp2;
                strtemp += ' <div class="col-md-6 col-sm-6 col-xs-12"><ul class="ah_uplist"><li><span class="fa fa-times ah_uplist-span" aria-hidden="true" dataId="'+
                        temp.users[i].id +'"></span>' + 
                        strtemp2 + '</li></ul></div>';
        }

        $('#usersadded').html(strtemp);
    }

    function f_finduser(temp, tagid){
        var strtemp = '';
        for (i=0; i<temp.length; i++){
            strtemp += '<option value="' + 
            temp[i].id + '">' +
            temp[i].middlename + ' ' +
            temp[i].uname + ' ' +
            temp[i].lastname + ' ' + 
            '</option>';
        }
        // alert(strtemp);
        // alert(tagid);
        if(tagid=='#selectuser'){
            $('#usersadd .an-exit a').attr('dataId', id_group2);
        }
        $(tagid).html(strtemp);
    }
/*functions*/

/*popups*/
    $('body').on('click', 'a[rel=modal]', function(e) {
        // alert(1);

        if ($('.az-fixed').hasClass('az-fixed2')){
            $('#mask, .window').hide();
            $('.window').hide();
            $('.az-fixed').removeClass('az-fixed2');
        }
        e.preventDefault();
        var id = $(this).attr('href');
        // alert(id);
        var tempdata = -1;
        if (id == '#event' || id == '#activist' || id == '#group'){
            tempdata = Number($(this).attr('dataid'));
        //alert(tempdata);
        } else if(id == '#usersadd'){
            senddel = new Array();
            send = new Array();
            // searchingusers = new Array();
            // usersin = new Array();
            // searchingusers = new Array();
            // usersin
            // tempdata = $('#finduser').val();
        }
        // alert(tempdata);
        if (id == '#event' || id == '#activist' || id == '#group' || id == '#usersadd' || id == '#addEvent'){
            // alert(1);
            var controllername = (id!='#addEvent')?id.slice(1):'usersadd';
            // alert(controllername);
            $.ajax({
                url: "/ajax/" + controllername,
                type: 'get',
                data: {
                    data : tempdata,
                },
                success: function (data) {
                    // data = '('+data+')';
                    // alert(data);
                    temp = eval(data);
                    // alert(temp);
                    if(id == '#event'){f_event(temp.query);}
                    else if(id == '#activist'){f_user(temp.query);}
                    else if(id == '#group'){f_group(temp.query);}
                    else if(id == '#usersadd'){f_finduser(temp.query, '#selectuser');}
                    else if(id == '#addEvent'){f_finduser(temp.query, '#selectcoord');}

                    // alert(1);
                    //$('#event9').text(data);
                    //alert(data);
                    // alert(2);
                }
            });
        }

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
        $(window).scrollTop(0);
    });


    $('#mask, .an-exit__krest').click(function () {
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

/*popups*/

/*online activist searching*/
    var id_group2;
    var searchingusers = new Array();
    var usersin = new Array();
    var send = new Array();
    var delnum = new Array();
    var senddel = new Array();

    function sortNumber(a,b) {
        return a - b;
    }

    function inArray(num, arr){
        for(var i=0; i<arr.length; i++){
            if(arr[i] == num){return true;}
        }
        return false;
    }

    function union_arr(arr1, arr2) {
        delnum = new Array();
        var comp = true;
        for(var i=0; i<arr2.length; i++){
            comp = true;
            for(var j=0; j<arr1.length; j++){
                if (arr1[j] == arr2[i]){
                    comp = false;
                }
            }
            if(comp){
                arr1.push(arr2[i]);
                if(!inArray(arr2[i], senddel)){
                    send.push(arr2[i]);
                }
            } else{
                delnum.push(arr2[i]);
            }
        }
        for(var i=0; i<arr2.length; i++){
            for(var j=0; j<senddel.length; j++){
                if (senddel[j] == arr2[i]){
                    senddel.splice(j,1);
                }
            }
        }
        // alert(senddel);
        return arr1;
    }

    function inArray(num, arr){
        for(var i=0; i<arr.length; i++){
            if(arr[i] == num){return true;}
        }
        return false;
    }
    
    $('#finduser').keyup(function(e) {
        var val = $('#finduser').val();
        var fio = val.split(' ', 3);
        // alert(fio[0]);
        $.ajax({
            url: "/ajax/finduser",
            type: 'get',
            data: {
                data : fio
            },
            success: function (data) {
                temp = eval(data);
                f_finduser(temp.query, '#selectuser');

            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
              }
        });
    });
    // alert(1);
    $('#selectuserbtn').click(function(e) {
        var val = $('#selectuser').val();
        // alert(val);
        // var str = '';
        // alert(searchingusers);
        // usersadding = union_arr(usersadding, val);
        searchingusers = union_arr(searchingusers, val);
        // alert(val);
        // alert(searchingusers);
        // alert(delnum);
        
        str = '';
        for(var i=0; i<val.length; i++){
            if(!inArray(val[i], delnum)){
                strtemp = $('#selectuser option[value="' + val[i] + '"]').text();
                strtemp = strtemp.length > 25 ? strtemp.slice(0, 25) + '...' : strtemp;
                str += ' <div class="col-md-6 col-sm-6 col-xs-12"><ul class="ah_uplist"><li><span class="fa fa-times ah_uplist-span" aria-hidden="true" dataId="'+
                val[i] + '"></span>' + 
                        strtemp + '</li></ul></div>';
            }
        }
        
        $('#usersadded').html($('#usersadded').html() + str);

        return false;
    });

    $('body').on('click','.ah_uplist-span', function(){
        // alert(searchingusers);
        temp_id = Number($(this).attr('dataId'));
        // alert(temp_id);
        for(var i=0; i<searchingusers.length; i++){
            if(searchingusers[i] == temp_id){
                searchingusers.splice(i, 1);
                $(this).parents('.ah_uplist').parent().remove();
            }
        }
        for(var i1=0; i1<send.length; i1++){
            if(send[i1] == temp_id){
                send.splice(i1, 1);
            }
        }
        for(var i2=0; i2<usersin.length; i2++){
            if(usersin[i2] == temp_id){
                senddel.push(temp_id);
            }
        }
        // alert(senddel);
        // alert(searchingusers);
        
    });
    // alert(1);
    $('#selectuseraddbtn').click(function(){
        // alert(id_group2);
        $.ajax({
            url: "/ajax/usersadd2",
            type: 'get',
            data: {
                data : send,
                id : id_group2,
                del : senddel
            },
            success: function () {
                location.href = location.href;
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
              }
        });
        return false;
    });
/*online activist searching*/

/*change group*/
    var id_group3;

    $('#group3').click(function(){
        $('#changeGroup .an-exit a').attr('dataId', id_group3);
        $('#changeGroup [name="AddGroup[id]"]').val(id_group3);
    });

    $('#group4').click(function(){
        $.ajax({
                url: "/ajax/groupremove",
                type: 'get',
                data: {
                    id : id_group3,
                },
                success: function () {
                    location.href = location.href;
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                  }
            });
            return false;
    });
/*change group*/

/*add new event*/
    $('#findcoord').keyup(function(e) {
        var val = $('#findcoord').val();
        var fio = val.split(' ', 3);
        $.ajax({
            url: "/ajax/finduser",
            type: 'get',
            data: {
                data : fio
            },
            success: function (data) {
                temp = eval(data);
                f_finduser(temp.query, '#selectcoord');

            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
              }
        });
    });

    $('.form12').submit(function(e){
        var temp = $(this).find('input[name="AddEvent[uname]"]');
        if(temp.val() == ''){
            temp.addClass('error-input');
            temp.focus();
            return false;
        }
        temp = $(this).find('input[name="AddEvent[startdate]"]');
        if(temp.val() == ''){
            temp.addClass('error-input');
            temp.focus();
            return false;
        }
        temp = $(this).find('input[name="AddEvent[finishdate]"]');
        if(temp.val() == ''){
            temp.addClass('error-input');
            temp.focus();
            return false;
        }
    });
    $('.form12 input[name="AddEvent[uname]"], .form12 input[name="AddEvent[startdate]"], .form12 input[name="AddEvent[finishdate]"]').blur(function(){
        $(this).removeClass('error-input');
    });
/*add new event*/

// /**/



});


// *****************************************************************
    // $('input[type="text"]').mousedown(function() { 
    //     $('input[type="text"]').removeClass("error-input");
    // });


    // $('#azfile').on("change", function(){ 
    //     alert($(this).val().match(/(\\.+?\\).+?/));
        
    // });



    // if($('.current-link').text() == 'мероприятия'){
    //     $('.main-menu2').css('display', 'block');
    // } 

    //funcun = function(){$('.menu-list-pressed').css({'animation-duration': '1s'});}
    //setTimeout(funcun,1000);

// $('.az-form1').submit(function(){
//     var form_data = $(this).serialize();
// });


     // $(".ah-requestform").submit(function() {

     //        var tel = $(this).find('input[name="tel"]');
     //        var empty = false;
     //        if (tel.val() == ""){
     //            empty = true;
     //        }
     //        if (empty == true){
     //            tel.addClass("error-input");
     //            tel.focus();
     //        }else{
     //            var form_data = $(this).serialize(); 
     //            $.ajax({
     //                type: "POST", 
     //                url: "/sendmessage.php", 
     //                data: form_data,
     //                success: function() {
     //                    cleanTnakns(this);
     //                }
     //            });
     //        }
     //        return false;
     //    });

// ***********************************************************************************
// function getFormData($form){
//     var unindexed_array = $form.serializeArray();
//     var indexed_array = {};

//     $.map(unindexed_array, function(n, i){
//         indexed_array[n['name']] = n['value'];
//     });

//     return indexed_array;
// }
    // $(".form5").submit(function(e) { 

    //     // alert(JSON.stringify($(this).serializeArray()));
    //     //  if ($('.az-fixed').hasClass('az-fixed2')){
    //     //     $('#mask, .window').hide();
    //     //     $('.window').hide();
    //     //     $('.az-fixed').removeClass('az-fixed2');
    //     // }
    //     //alert(1);
    //     //e.preventDefault();
    //     //var $form = $(this);
    //     // var form_data = getFormData($form);
    //     // var form_data = JSON.stringify($(this).serializeArray());
    //     // form_data = JSON.parse(form_data);
    //     //$.toJSON(form_data);[{"name":"uname","value":"ab"}]
    //     // document.write(form_data);
    //     $.ajax({
    //         url: "/ajax/groupsadd/",
    //         type: "POST",
    //         contentType: "application/json",
    //         dataType: "json",
    //         //datatype: 'json',
    //         //var form_data = $(this).serialize(); 
    //         data: '{"form_data"}' ,
    //         success: function (data) {
    //             alert(data);
    //             //data = '('+data+')';
    //             //temp = eval(data);
    //             //if(id == '#event'){f_event(temp.query);}
    //             //else if(id == '#activist'){f_user(temp.query);}
    //             //else if(id == '#group'){f_group(temp.query);}
    //             //alert(1);
    //             //$('#event9').text(data);
    //             //alert(data);
    //         },
    //         error: function (xhr, ajaxOptions, thrownError) {
    //             alert(xhr.status);
    //             alert(thrownError);
    //           }
    //     });
    //     e.preventDefault();
    //     //alert(1);

    //     // var maskHeight = $(document).height();
    //     // var maskWidth = $(window).width() + 30;
    //     // $('#mask').css({'width':maskWidth,'height':maskHeight});
    //     // $('#mask').fadeTo("slow",0.8); 
    //     // var winH = $(window).height();
    //     // var winW = $(window).width();
    //     // if (az_posTop == -1){
    //     //     az_posTop = (window.pageYOffset !== undefined) ? window.pageYOffset : (document.documentElement || document.body.parentNode || document.body).scrollTop;
    //     // }
    //     // $(id).css('top', 30);
    //     // $(id).css('left', winW/2-$(id).width()/2);
    //     // $(id).fadeIn(500);
    //     // $('.az-fixed').addClass('az-fixed2');
    //     // $('.az-fixed2').css('top',  -az_posTop);
    // });

    // $(".form255").submit(function() { 
    //     var tel = $(this).find('input[name="tel"]');
    //     var empty = false;
    //     if (tel.val() == ""){
    //         empty = true;
    //     }
    //     if (empty == true){
    //         tel.addClass("error-input");
    //         tel.focus();
    //     }else{
    //         var form_data = $(this).serialize();
    //         $.ajax({
    //             type: "POST", 
    //             url: "/sendmessage.php", 
    //             data: form_data,
    //             success: function() {
    //                 cleanTnakns(this);
    //             }
    //         });
    //     }
    //     return false;
    // });
    // $(".form355").submit(function() { 
    //     var tel = $(this).find('input[name="tel"]');
    //     var empty = false;
    //     if (tel.val() == ""){
    //         empty = true;
    //     }
    //     if (empty == true){
    //         tel.addClass("error-input");
    //         tel.focus();
    //     }else{
    //         var form_data = $(this).serialize(); 
    //         $.ajax({
    //             type: "POST", 
    //             url: "/sendmessage.php", 
    //             data: form_data,
    //             success: function() {
    //                 cleanTnakns(this);
    //             }
    //         });
    //     }
    //     return false;
    // });
    // $(".form455").submit(function() { 
    //     var tel = $(this).find('input[name="email"]');
    //     var empty = false;
    //     if (tel.val() == ""){
    //         empty = true;
    //     }
    //     if (empty == true){
    //         tel.addClass("error-input");
    //         tel.focus();
    //     }else{
    //         var form_data = $(this).serialize(); 
    //         $.ajax({
    //             type: "POST", 
    //             url: "/sendmessage.php", 
    //             data: form_data,
    //             success: function() {
    //                 cleanTnakns(this);
    //             }
    //         });
    //     }
    //     return false;
    // });





// (function() {
//  function toJSONString( form ) {
//   var obj = {};
//   var elements = form.querySelectorAll( "input, select, textarea" );
//   for( var i = 0; i < elements.length; ++i ) {
//    var element = elements[i];
//    var name = element.name;
//    var value = element.value;

//    if( name ) {
//     obj[ name ] = value;
//    }
//   }

//   return JSON.stringify( obj );
//  }

//  document.addEventListener( "DOMContentLoaded", function() {
//   var form = document.getElementById( "test" );
//   var output = document.getElementById( "output" );
//   form.addEventListener( "submit", function( e ) {
//    e.preventDefault();
//    var json = toJSONString( this );
//    output.innerHTML = json;

//   }, false);

//  });

// })();