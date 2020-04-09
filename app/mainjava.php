<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v4.0"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-148996872-1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-148996872-1');
</script>


<!-- main.js -->
<script src="js/jquery.min.js" type="text/javascript"></script>

<!-- bootstrap js -->
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
 <!-- add js -->
<script src="js/wow.min.js" type="text/javascript"></script>
<script>
new WOW().init();


     $(window).bind('scroll', function() {
     var navHeight = 0;
       if ($(window).scrollTop() > navHeight) {
         $('.header').addClass('fixed-head fadeInDown animated');
         
       }
       else {
         $('.header').removeClass('fixed-head fadeInDown animated')
    
       }
    });

var loca = window.location.pathname;
$('.nav-bottom-link').each(function() {
     var link = "/"+$(this).attr('href');
         if(loca == "/"){
      loca = "/home";
         }
      //var parentTag = $(this).parent();
    
     $(this).toggleClass('active', link == loca);  

  });


// for x2kids
$(".nav-bottom-link").mouseover(function(){
  $(this).addClass("rubberBand animated");
})
$(".nav-bottom-link").mouseleave(function(){
  $(this).removeClass("rubberBand animated");
})
</script>

<?php






if (file_exists(stream_resolve_include_path($alias . "_SCR.php"))) {include $alias . "_SCR.php";}
?>