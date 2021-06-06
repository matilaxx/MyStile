<?php
session_start();
if(!isset($_SESSION['log'])){
	
} else {
	header('location:index.php');
};
include 'dbconnect.php';

if(isset($_POST['adduser']))
{
	$nama = $_POST['nama'];
	$telp = $_POST['telp'];
	$alamat = $_POST['alamat'];
	$email = $_POST['email'];
	$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT); 

	$tambahuser = mysqli_query($conn,"INSERT INTO login (namalengkap, email, password, notelp, alamat) 
		values('$nama','$email','$pass','$telp','$alamat')");
	if ($tambahuser){
		echo " <div class='alert alert-success'>
		Berhasil mendaftar, silakan masuk.
		</div>
		<meta http-equiv='refresh' content='1; url= login.php'/>  ";
		} else { echo "<div class='alert alert-warning'>
		Gagal mendaftar, silakan coba lagi.
		</div>
		<meta http-equiv='refresh' content='1; url= registered.php'/> ";
	}

};

?>

<!DOCTYPE html>
<html>
<head>
	<title>My Stile - Register</title>
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">

	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>

<body>
	<!-- header -->
	<div class="agileits_header">
		<div class="container">
			<div class="w3l_offers">
				<p>My Stile</p>
				
			</div>

			
			<div class="w3l_search">
				<form action="search.php" method="post">
					<input type="search" name="Search" placeholder="Cari produk...">
					<button type="submit" class="btn btn-default search" aria-label="Left Align">
						<i class="fa fa-search" aria-hidden="true"> </i>
					</button>
					<div class="clearfix"></div>
				</form>
			</div>
			
			<div class="clearfix"> </div>
		</div>
	</div>

	
	<!-- //header -->

	<!-- navigation -->
	<div class="navigation-agileits">
		<div class="container">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header nav_2">
					<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div> 
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php" class="act">Home</a></li>	
						<!-- Mega Menu -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Kategori <b class="caret"></b></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<div class="multi-gd-img">
										<ul class="multi-column-dropdown">
											<h6>Kategori</h6>

											<?php 
											$kat=mysqli_query($conn,"SELECT * from kategori order by idkategori ASC");
											while($p=mysqli_fetch_array($kat)){

												?>
												<li><a href="kategori.php?idkategori=<?php echo $p['idkategori'] ?>"><?php echo $p['namakategori'] ?></a></li>

												<?php
											}
											?>
										</ul>
									</div>	

								</div>
							</ul>
						</li>
					</ul>
					<div class="agile-login">
						<ul>
							<?php
							if(!isset($_SESSION['log'])){
								echo '
								<li><a href="registered.php"> Register</a></li>
								<li><a href="login.php">Login</a></li>
								';
							} else {

								if($_SESSION['role']=='Member'){
									echo '
									<li style="color:white">Halo, '.$_SESSION["name"].'
									<li><a href="logout.php">Logout?</a></li>
									';
								} else {
									echo '
									<li style="color:white">Halo, '.$_SESSION["name"].'
									<li><a href="admin">Halaman Admin</a></li>
									<li><a href="logout.php">Logout?</a></li>
									';
								};

							}
							?>
							
						</ul>

					</div>
				</div>
			</nav>
		</div>
	</div>

	<!-- //navigation -->
	<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Register</li>
			</ol>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<!-- register -->
	<div class="register">
		<div class="container">
			
			<div class="login-form-grids">
				<h2>Register</h2><br>

				<h5>Data Pribadi</h5>
				<form method="post">
					
					<input type="text" name="nama" placeholder="Nama Lengkap" required>
					<input type="text" name="telp" placeholder="Nomor Telepon" required maxlength="13">
					<input type="text" name="alamat" placeholder="Alamat Lengkap" required>

					<h6>Data Login</h6>
					
					<input type="email" name="email" placeholder="Email" required="@">
					<input type="password" name="pass" placeholder="Password" required>
					<input type="submit" name="adduser" value="Daftar"><br>
					<div style="text-align: right;font-size: 14px">
						<a href="index.php">Batal</a>
					</div>
				</form>
			</div>
			
		</div>
	</div>
	<!-- //register -->
	<!-- //footer -->
	<div class="footer">
		<div class="container">
			<div class="w3_footer_grids">
				<div class="col-md-3 w3_footer_grid">
					<h3>Tentang Kami</h3>
					<ul class="info"> 
						<li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="about.php">About Us</a></li>
						
					</ul>
				</div>
				<div class="col-md-4 w3_footer_grid">
					<h3>Hubungi Kami</h3>
					
					<ul class="address">
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Alvani Fahrizal.</li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:alvaniutama09@email">alvaniutama09@gmail.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>081358678088</li>
					</ul>
				</div>
				
				<div class="clearfix"> </div>
			</div>
		</div>
		
		<div class="footer-copy">
			
			<div class="container">
				<p>© 2021 Alvani F. All rights reserved</p>
				<div class="w3layouts-foot">
					

				</div>

			</div>
		</div>
		
	</div>	

	<!-- //footer -->
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>

	<!-- top-header and slider -->
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 4000,
				easingType: 'linear' 
			};
			

			$().UItoTop({ easingType: 'easeOutQuart' });

		});
	</script>
	<!-- //here ends scrolling icon -->

	<!-- main slider-banner -->
	<script src="js/skdslider.min.js"></script>
	<link href="css/skdslider.css" rel="stylesheet">
	<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery('#demo1').skdslider({'delay':5000, 'animationSpeed': 2000,'showNextPrev':true,'showPlayButton':true,'autoSlide':true,'animationType':'fading'});

			jQuery('#responsive').change(function(){
				$('#responsive_wrapper').width(jQuery(this).val());
			});
			
		});
	</script>	
	<!-- //main slider-banner --> 
</body>
</html>