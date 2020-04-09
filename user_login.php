<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Welcome X2Kids Club</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
    ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
    ============================================ -->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Work+Sans:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS
    ============================================ -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/30cfa4516b.js" crossorigin="anonymous"></script>
    <!-- user loginCSS
    ============================================ -->
    <link rel="stylesheet" href="css/user_login.css">
    <!-- modernizr JS
    ============================================ -->
    <script src="js/modernizr-2.8.3.min.js"></script>
    	<style>
/* Paste this css to your style sheet file or under head tag */
/* This only works with JavaScript, 
if it's not present, don't show loader */
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: url(imgs/logo/load.svg) center no-repeat #fff; 
}
.wrapper-pro{
  display: none;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script>
		  $(window).load(function() {
    
      $(".se-pre-con").fadeOut("slow");
     
      new WOW().init();
      $(".wrapper-pro").css("display","block"); 

  });
</script>
</head>

<body class="wrapper-pro">
    <section class="wrapper-content multi-parallax" data-parallax>

        <div class="container">
        	<img src="image/login/login-01.png" class="bg-login-01 wow fadeIn"  data-depth="-0.5" data-type="parallax">
          <img src="image/login/login-03.png" class="bg-login-03 wow fadeIn"  data-depth="-0.5" data-type="parallax">
        	<img src="image/login/login-02.png" class="bg-login-02 wow fadeIn"  data-depth="0.5" data-type="parallax">
            <div class="top-logo">
                <img src="image/login/x2kids-logo-05.png" class="wow bounceInDown">
            </div>
            <div class="login-box wow fadeIn" data-wow-delay="1s">
                <form method="POST" action="checklogin">
                    <input type="hidden" name="user_type" value="user">
                    <p class="title-box">Welcome!</p>
                    <div class="field">
                        <span class="fa fa-user"></span>
                        <input type="text" name="username" required placeholder="Email or Username">
                    </div>
                    <div class="field space">
                        <span class="fa fa-lock"></span>
                        <input type="password" name="password" class="pass-key" required placeholder="Password">
                        <span class="show">SHOW</span>
                    </div>
                    <a href="">
                        <p class="text-right text-seccundary">Forget password</p>
                    </a>
                    <p class="text-center"><button class='btn btn-login'>Login</button></p>
                </form>
                <div class="login-footer">
                    I would like to have an account!
                </div>
            </div>
            <!-- loginbox -->
        </div>
        <!-- container -->
        <div class="bottom-foot">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                    	<span class="copy-right">X2 Kids Club Copyright ©</span>
                    </div>
                    <div class="col-md-6">
                    	<ul class="list-unstyled">
                    		
                    		<li>170/87 9th Floor Ocean Tower 1 Bldg. New Rachadaphisek Road, Khlong toey, Bangkok, Thailand 10110</li>
                    		<li>+66 2 822 7453</li>
                    	</ul>
                    </div>		
                </div>
            </div>
        </div>
    </section>
    <!-- js -->
    <script src="js/jquery.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
    const pass_field = document.querySelector(".pass-key");
    const showBtn = document.querySelector(".show");
    showBtn.addEventListener("click", function() {
        if (pass_field.type === "password") {
            pass_field.type = "text";
            showBtn.textContent = "HIDE";
            showBtn.style.color = "#3498db";
        } else {
            pass_field.type = "password";
            showBtn.textContent = "SHOW";
            showBtn.style.color = "#222";
        }
    });
    </script>
    <script src='https://kswedberg.github.io/jquery-smooth-scroll/src/jquery.smooth-scroll.js'></script>
<script>
$(function() {

  //Smooth Scroll
  $('a').smoothScroll();
  
  //Parallax jQ
  function multiParallax() {
    var $winHeight  = $( window ).height();
    
    $('[data-parallax]').each(function() {
      var $position = $(this).offset().top - $(document).scrollTop();

      if ( $winHeight >= $position ) {
        var $depth, $i, $layer, $layers, $len, $movement, $translate3d;
        var $layers   = $('[data-type="parallax"]');

        $($layers).each(function() {
          $parent   = $(this).parent();
          $curPos   = $($parent).offset().top - $(document).scrollTop();

          $depth    = $(this).attr('data-depth');
          $movement = $curPos * $depth;
          $translate  = 'translate3d(0, ' + $movement + 'px, 0)';

          $(this).css({
            "-webkit-transform" : $translate, 
            "-moz-transform"  : $translate,
            "-ms-transform"   : $translate,
            "-o-transform"    : $translate,
            "transform"     : $translate
          });
        });
      }
    });
  }

  $(window).on('load scroll', function() {
    multiParallax();
  });


});
</script>
</body>

</html>