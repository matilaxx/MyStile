<?php
session_start();
include 'dbconnect.php';

$s = $_POST['Search'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>My Stile - Pencarian</title>
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
						<li><a href="cart.php">Keranjang </a></li>
						<li><a href="konfirmasi.php">Daftar Order</a></li>
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
				<li class="active">Kategori</li>
			</ol>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<!--- beverages --->
	<div class="products">
		<div class="container">
			<div class="col-md-4 products-left">
				<div class="categories">
					<h2>Categories</h2>
					<ul class="cate">
						
						
						<?php 
						$kat=mysqli_query($conn,"SELECT * FROM kategori ORDER BY idkategori ASC");
						while($p=mysqli_fetch_array($kat)){

							?>
							<li><a href="kategori.php?idkategori=<?php echo $p['idkategori'] ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i><?php echo $p['namakategori'] ?></a></li>
							
							<?php
						}
						?>
						
					</ul>
				</div>																																												
			</div>
			<!--SEARCH-->
			<div class="col-md-8 products-right">VVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVV VVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVVV
				<div class="agile_top_brands_grids">
					
					
					<?php 
					$brgs=mysqli_query($conn,"SELECT * FROM produk WHERE namaproduk LIKE '%$s%' OR deskripsi LIKE '%$s%' ORDER BY idproduk ASC");
					$x = mysqli_num_rows($brgs);
					
					if($x>0){
						while($p=mysqli_fetch_array($brgs)){
							?>
							
							<div class="col-md-4 top_brand_left">
								<div class="hover14 column">
									<div class="agile_top_brand_left_grid">
										
										<div class="agile_top_brand_left_grid1">
											<figure>
												<div class="snipcart-item block">
													<div class="snipcart-thumb">
														<a href="product.php?idproduk=<?php echo $p['idproduk'] ?>"><img src="<?php echo $p['gambar']?>" width="200px" height="200px"></a>		
														<p><?php echo $p['namaproduk'] ?></p>
														<h4>Rp<?php echo number_format($p['hargaafter']) ?><br> <span>Rp<?php echo number_format($p['hargabefore']) ?></span></h4>
													</div>
													<div class="snipcart-details top_brand_home_details">
														<fieldset>
															<a href="product.php?idproduk=<?php echo $p['idproduk'] ?>"><input type="submit" class="button" value="Lihat Produk" /></a>
														</fieldset>
													</div>
												</div>
											</figure>
										</div>
									</div>
								</div>
							</div>
							<?php
						}
					} else {
						echo "Data tidak ditemukan, coba kata kunci lainnya";
					}
					?>
					
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!--- beverages --->
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