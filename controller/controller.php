<?php
use PHPMailer\PHPMailer\PHPMailer;
include "function.php";

$alias = $_GET['alias'];
if($_GET['alias'] == 'checklogin'){

if($_POST['username'] && $_POST['password']){
			$user_type = $_POST['user_type'];

			switch ($user_type) {
					case "admin":
						if($database->has("userinfo",["AND" => ["OR"=>["username"=>$_POST['username'],"email"=>$_POST['username']], "password"=>md5($_POST['password']),"user_type"=>"admin"]])){

							$_SESSION["admin_user"] ='admin';
							$_SESSION['userinfo'] = $database->get("userinfo","*",["AND" => ["OR"=>["username"=>$_POST['username'],"email"=>$_POST['username']], "password"=>md5($_POST['password']),"user_type"=>"admin"]]);
							header('location:dashboard');
						}else{
							include "user_login.php";
						}
					break;
					case "user":
							if($database->has("userinfo",["AND" => ["OR"=>["username"=>$_POST['username'],"email"=>$_POST['username']], "password"=>md5($_POST['password']),"user_type"=>"user"]])){

							$_SESSION["user"] = 'login';
							$_SESSION['userinfo'] = $database->get("userinfo","*",["AND" => ["OR"=>["username"=>$_POST['username'],"email"=>$_POST['username']], "password"=>md5($_POST['password']),"user_type"=>"user"]]);
							header('location:home');
						}else{
							include "user_login.php";
						}
					break;
				}
				// end switch 
		}else{
			include "user_login.php";
		}
}elseif($_GET['alias'] == 'logout'){
	session_destroy();
	header('location:home');
}elseif($alias == 'admin'){
include "admin_login.php";
}else{
		if ($_SESSION["admin_user"]=='admin') {
				if ($alias == '') {$alias = 'dashboard';}else {
					$alias = $alias;}
					// admin switch 

					switch ($alias) {
				
					}
					// end switch admin
				include('admin_path/index.php');
			}
			// end if it's admin
		else{

		if($_SESSION['user']=="login"){
				if ($alias == '') {$alias = 'home';}else {
		$alias = $alias;}
				// user switch 
		switch ($alias) {

		
				}
				// end switch 
					include 'app/index.php';
			}else{

				include "user_login.php";
			}
			// if user 
				
				
			
		}
		//end if not admin

}
// end check admin



?>