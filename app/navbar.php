<section class="nav-bar">
<section class="nav-top">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6">
				<div class="flame-logo">
					<a href="home"><img src="image/logo/x2kids-logo-05.png"></a>
				</div>
				
			</div>
			<div class="col-md-6">
				<ul class="list-inline top-menu-user">
					 <li class="list-inline-item"><span class="user-name"><?=$_SESSION['userinfo']['first_name']." ".$_SESSION['userinfo']['last_name']?></span></li>
					 <li class="list-inline-item li-link"><img src="<?=$_SESSION['userinfo']['profile_img']?>" class="user-profile"><i class="fas fa-caret-down"></i>
					 		<div class="dropdown">
                    <ul>
                        <li>
                            <a href="">
                                <h3>Edit</h3>
                                <span>Edit your Profile                                     </span>
                            </a>
                        </li>
                        <li>
                            <a href="logout">
                                <h3>Logout</h3>
                                <span>Click Logout Here</span>
                            </a>
                        </li>
                     
                    </ul>
                   
                </div>
					 </li>
				</ul>
			</div>	
		</div>
	</div>
</section>
<section class="nav-bottom">
	<img src="image/welcome/menu-leaf-10.png" class="nav-leaf">
	<img src="image/welcome/menu-dino-09.png" class="nav-dino">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<a href="khanacademy" class="nav-bottom-link">Khan Academy</a>
			</div>
			<div class="col-md-4">
				<a href="" class="nav-bottom-link">National Geographic</a>
			</div>
			<div class="col-md-4">
				<a href="" class="nav-bottom-link">Live Zoo Streams</a>
			</div>
			<div class="col-md-3">
				<a href="" class="nav-bottom-link">Story Time</a>
			</div>
			<div class="col-md-3">
				<a href="" class="nav-bottom-link">Youtube Channels</a>
			</div>
			<div class="col-md-3">
				<a href="" class="nav-bottom-link">Let’s Exercise</a>
			</div>
			<div class="col-md-3">
				<a href="" class="nav-bottom-link">E-Pal</a>
			</div>
		</div>
	</div>
</section>
</section>

