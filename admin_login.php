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


</head>
<body class="wrapper-pro">
	<section class="wrapper-content">
		<div  class="login-box">
			<form method="POST" action="checklogin">
				<input type="hidden" name="user_type" value="admin">
			<p class="title-box">Admin Site!</p>
			<div class="field">
	        <span class="fa fa-user"></span>
	        <input type="text" name="username" required placeholder="Email or Username">
      	</div>
			<div class="field space">
	        <span class="fa fa-lock"></span>
	        <input type="password" name="password" class="pass-key" required placeholder="Password">
	        <span class="show">SHOW</span>
	      </div>
	      <a href=""><p class="text-right text-seccundary">Forget password</p></a>
	      <p class="text-center"><button class='btn btn-login'>Login</button></p>
	 	 </form>
		</div>
		<!-- loginbox -->
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
</body>
</html>