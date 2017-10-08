
function postUserInfo(){
    var Name=$("#Name").val();
    var Email=$("#Email").val();
    var Msg=$("#Msg").val();
    if(Name=='' || Email=='' || Msg=='')
        {
            alert('Please Fill all Fields before sending the message !');
        }
    else
        {
           $.post("ajax/ContactEmail.php",{
               Name:Name,
               Email:Email,
               Msg:Msg
           },function(data){
               alert(data);
               if(data==1)
                   {
                       alert('Email Sent. Thank you for your Email');
                   }
               else
                   {
                       alert('Somthing went wrong please try another time');
                   }
               $("#Name").val('');
               $("#Email").val('');
               $("#Msg").val('');
           }); 
        }
}
$(window).load(function() {
    setTimeout(function(){
        $('#loading').hide();    
    },1000);
    setTimeout(function(){
         if ($('.wow').hasClass('animated')) {
            $(this).removeClass('animated');
            $(this).removeAttr('style');
            new WOW().init();
        }
    },500);
  });
$(function () {
    function scroll() {
        if($(window).width()<=440)
            {
                
                $('#events ul li:first').slideUp(function () {
                    $(this).show().parent().append(this);
                });
            }
    }
    setInterval(scroll, 3000);
    if ($(window).width() < 740)
        $("#btnBack").addClass("btn-sm");
    else
        $("#btnBack").removeClass("btn-sm");
    var mainbottom = $('#for-shrink').offset().top + $('#for-shrink').height();
    $(window).on("load resize", function () {
        $(".fill-screen").css("height", window.innerHeight);
    });
    //add scrollspy Bootstrap
    $('body').scrollspy({
        target: '.navbar'
    });
    $('nav a').bind('click', function () {

        $('html, body').stop().animate({
            scrollTop: $($(this).attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        e.preventDefault();
        e.stopPropagation();
        return false;
    });
    var offset = 10;

    $('.navbar li a').click(function (event) {
        $($(this).attr('href'))[0].scrollIntoView();
        scrollBy(0, -offset);
        e.preventDefault();
        e.stopPropagation();
        return false;
    });
    //add Smooth Scrolling
    $('.down-btn a').bind('click', function () {
        $('html, body').stop().animate({
            scrollTop: $($(this).attr('href')).offset().top - 60
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
        event.stopPropagation();
        return false;
    });
    $(window).on('scroll', function () {
        var stop = Math.round($(window).scrollTop());
        if (stop > mainbottom) {
            $('.navbar-header').addClass('push-logo-right');
            $('.navbar-default').addClass('navbar-default-bg');
            $('.nav').addClass('navbar-margin-top');
            $('.navbar').addClass('logo-shrink');
        } else {
            $('.navbar-header').removeClass('push-logo-right');
            $('.navbar-default').removeClass('navbar-default-bg');
            $('.nav').removeClass('navbar-margin-top');
            $('.navbar').removeClass('logo-shrink');
        }

    });
    new WOW().init();
});