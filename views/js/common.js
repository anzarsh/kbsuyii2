
$(document).ready(function(){
    RESPONSIVEUI.responsiveTabs();

    $('.main-menu a').each(function(){
        if (location.href.search($(this).attr('href')+'$') >= 0){
            $(this).addClass('current-link');
        }
    });

    $('.az-activity, .az-eventtype').click(function(){
        $(this).next('.az-open').slideToggle('slow');
        $(this).find('.fa-angle-double-down').toggleClass('az-disp-none');
        $(this).find('.fa-angle-double-up').toggleClass('az-disp-none');
    });

    $('#azfile').on("change", function(){ 
        alert($(this).val().match(/(\\.+?\\).+?/));
        
    });



    // if($('.current-link').text() == 'мероприятия'){
    //     $('.main-menu2').css('display', 'block');
    // } 

    //funcun = function(){$('.menu-list-pressed').css({'animation-duration': '1s'});}
    //setTimeout(funcun,1000);

    $(".phone").mask("+ 7 (999) 999 - 99 - 99?"); 



    // ***************************************** ah *****************************************************

$('.ah-block3-button').click(function(e) {
    e.preventDefault();
    $(".ah-wrapper-box").removeClass('ah-wrapper-box');
    $(this).addClass('ah-wrapper-box');
    
});


    // ****************************************** ah ****************************************************

    $(".single_image").fancybox();

    $("a[rel=group]").fancybox({
      'transitionIn' : 'none',
      'transitionOut' : 'none',
      'titlePosition' : 'over',
      'titleFormat' : function(title, currentArray, currentIndex, currentOpts) {
       return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
       }
    });
    $("a[rel=group2]").fancybox({
      'transitionIn' : 'none',
      'transitionOut' : 'none',
      'titlePosition' : 'over',
      'titleFormat' : function(title, currentArray, currentIndex, currentOpts) {
       return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
       }
    });

    // $('a[name=modal]').click(function(e) {
    //     e.preventDefault();
    //     var id = $(this).attr('href');
    //     var maskHeight = $(document).height();
    //     var maskWidth = $(window).width();
    //     $('#mask').css({'width':maskWidth,'height':maskHeight});
    //     $('#mask').fadeTo("slow",0.8); 
    //     var winH = $(window).height();
    //     var winW = $(window).width();
    //     posTop = (window.pageYOffset !== undefined) ? window.pageYOffset : (document.documentElement || document.body.parentNode || document.body).scrollTop;
    //     $(id).css('top',  posTop);
    //     $(id).css('left', winW/2-$(id).width()/2);
    //     $(id).fadeIn(500); 
    // });

    $('a[rel=modal]').click(function(e) {
        if ($('.az-fixed').hasClass('az-fixed2')){
            $('#mask, .window').hide();
            $('.window').hide();
            $('.az-fixed').removeClass('az-fixed2');
        }
        e.preventDefault();
        var id = $(this).attr('href');
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

    $('.mainslider').owlCarousel({
        loop: true,
        margin:30,
        responsiveClass:false,
        nav: true,
        items: 5,
        navText:['<span class="prev arrs"></span>', '<span class="next arrs"></span>'],
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

    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            480:{
                items:2
            },
            767:{
                items:3
            },
            850:{
                items:4
            },
            967:{
                items:5
            },
            1067:{
                items:6
            },
            1200:{
                items:4
            },
            1400:{
                items:5
            },
            1600:{
                items:6
            }
        }
    });
// ************************************************** ah-footer ***************************************************
    $('.ah-search-link').click(function(){
        $('.ah-wrapper1').slideToggle();
        $(this).toggleClass('ah-search-link-rotate');
        $('html, body').animate({scrollTop : 2000},800);

        return false;
    });
// ************************************************** ah-footer ***************************************************
var a = $('body').height() - $(window).height();
funccc = function(){
    if(window.matchMedia('(max-width: 1199px)').matches)
    {
        $('.anz-contain-scroll').width($('.anz-scroll-item').length * $('.anz-scroll-item').width());
    } else{
        $('.anz-contain-scroll').height($('.anz-scroll-item').length * $('.anz-scroll-item').height());
    }
    var anz_height = $('body').height() - $('.header2').height() - $('.footer').height();
    $('.anz-height-push').css({'height': (anz_height - 149) + 'px'});
    var b = $('.anz-minus-margin').css('marginTop');
    b = parseInt(b);
    var c = (b + a - 1) + "px";
    $('.anz-minus-margin').css("marginTop", c);
    $('.scroll-pane').jScrollPane();
}

funccccc = function(){
    if(window.matchMedia('(min-width: 1199px)').matches){
        var d = $('.anz-back span').css('marginTop');
        d = parseInt(d);
        var e = (d - (a/4)) + "px";
        $('.anz-back span').css('marginTop', e);
        var b = $('.anz-back').height() - (a/2);
        $('.anz-back').height(b);

    }
}


setTimeout("funccc();",1000);
setTimeout("funccccc();",500);

});
