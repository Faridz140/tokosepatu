<?php
session_start();
include"koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Shoes Store</title>
 
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="data/images/icons/icon2.png"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="data/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="data/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="data/fonts/themify/themify-icons.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="data/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="data/fonts/elegant-font/html-css/style.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="data/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="data/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="data/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="data/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="data/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="data/vendor/slick/slick.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="data/vendor/lightbox2/css/lightbox.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" href="data/css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<!-- Font Awesome JS -->
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="data/css/util.css">
	<link rel="stylesheet" type="text/css" href="data/css/main.css">
	<link rel="stylesheet" type="text/css" href="admin/assets/css/bootstrap.css">
	<!--===============================================================================================-->
</head>
<body class="animsition">

	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			

			<nav  class="navbar navbar-expand-lg navbar-light bg-light">

				<div class="collapse navbar-collapse" id="navbarTogglerDemo01">

					
					
					<!-- Header Icon -->
					<div class="header-icons">
						
						<div class="container">
							<a class="navbar-brand" href="index.php">Shoes Store
							</a>
						
							<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
								<li class="nav-item active">
									<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="shop.php">Shop</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="Keranjang.php">Keranjang</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="riwayat.php">History </a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="about.php">About</a>
								</li>
							</ul>
							<form class="navbar-form  navbar-right" action="pencarian.php" method="GET">
								<input type="text" class="form-control" name="keyword">
								<button class="btn btn-primary" >Search</button>
							</form>
						</div>
						
						<span class="linedivide1"></span>


						<div class="header-wrapicon2">

							<img src="data/images/icon2.png" class="header-icon1 js-show-header-dropdown" alt="ICON">

							<!-- Header cart noti -->
							<div class="header-cart header-dropdown">
								<ul class="header-cart-wrapitem">
									<li class="header-cart-item">
										<div class="header-cart-item-img">
											<?php if (isset($_SESSION['pelanggan'])): ?>
												<img src="foto/<?php echo $_SESSION['pelanggan']['foto'] ?>" alt="IMG" width="50%" height="50%">
												<?php else: ?>
												<img src="images/icon2.png" alt="IMG" width="50%" height="50%">
											<?php endif ?>
											
										</div>

										<div class="header-cart-item-txt">
											<?php if (isset($_SESSION['pelanggan'])):?>
												<h2><?php echo $_SESSION["pelanggan"]['nama_pelanggan'];?></h2>
												<span class="header-cart-item-info">
													<?php echo $_SESSION["pelanggan"]['email_pelanggan'];?>
												</span>
												<?php else: ?>
													<h2>Please login</h2>

												<?php endif?>



											</div>
										</li>
									</ul>

									<div class="header-cart-total">

									</div>

									<div class="header-cart-buttons">
										<div class="header-cart-wrapbtn">
											<!-- Button -->
											<?php if (isset($_SESSION['pelanggan'])):?>
												<a  href="logout.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">LogOut</a>

											</div>

											<div class="header-cart-wrapbtn">
												<!-- Button --> 
												<a href="profil.php?id=<?php echo $_SESSION['pelanggan']['id_pelanggan'];?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">My Profil</a>
												<?php else:?>
													<a href="login.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
														Login
													</a>
												</div>
												<div class="header-cart-wrapbtn">
													<a href="daftar.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">Register</a>
												<?php endif?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>



				</div>

			</nav>
		</div>

	</div>

</div>
</header>

<!-- Slide1 -->
<section class="slide1">
	<div class="wrap-slick1">
		<div class="slick1">
			<div class="item-slick1 item1-slick1" style="background-image: url(data/images/sepatu1.jpg);">
				<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
					<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
						Shop All photo needs
					</span>

					<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
						quality guaranteed
					</h2>
				</div>
			</div>

			<div class="item-slick1 item2-slick1" style="background-image: url(data/images/sepatu2.jpg);">
				<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
					<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rollIn">
						complete
					</span>

					<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
						shopping needs only on this web
					</h2>

					<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
						<!-- Button -->
						<a href="shop.php" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
							Shop Now
						</a>
					</div>
				</div>
			</div>

			<div class="item-slick1 item3-slick1" style="background-image: url(data/images/sepatu3.jpg);">
				<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
					<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
						Safety
					</span>

					<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
						fast and relaible
					</h2>

				</div>
			</div>

		</div>
	</div>
</section>

<!-- Instagram -->
<section class="instagram p-t-20">
	<div class="sec-title p-b-52 p-l-15 p-r-15">
		<h3 class="m-text5 t-center">
			Produk Unggulan !!
		</h3>
		<div class="row">
			<?php $ambil = $koneksi->query("SELECT * FROM produk  ORDER BY RAND() LIMIT 8 ");?>
			<?php while ($produk = $ambil->fetch_assoc()){ ?>
				<div class="col-xs-3 col-md-3">
					<div class="thumbnail">
						<div class="hov-img-zoom">
						<a href="detail.php?id=<?php echo $produk['id_produk'];?>"><img width="400"  class="img-responsive" src="foto_produk/<?php echo $produk['foto_produk'];?>" alt=""></a>
					</div>
						<div class="caption" align="center">
							<a href="detail.php?id=<?php echo $produk['id_produk'];?>" style="color: black;"><h3><?php echo $produk['nama_produk'];?></h3></a>
							<h4><b>Rp.<?php echo number_format($produk['harga_produk']);?></b></h4>
							<a href="beli.php?id=<?php echo $produk['id_produk'];?>" class="btn btn-primary">Buy</a>
							<a href="detail.php?id=<?php echo $produk['id_produk'];?>" class="btn btn-default">Detail</a>
						</div>
					</div>
				</div>
			<?php }?>
		</div>
	</div>
</section>
<section class="instagram p-t-20">
	<div class="sec-title p-b-52 p-l-15 p-r-15">
		<h3 class="m-text5 t-center">
			Other product !!
		</h3>
		<div class="row">
			<?php $ambil = $koneksi->query("SELECT * FROM produk ORDER BY RAND() LIMIT 4 ");?>
			<?php while ($produk = $ambil->fetch_assoc()){ ?>
				<div class="col-xs-4 col-md-4">
					<div class="thumbnail">
						<div class="hov-img-zoom">
						<a href="detail.php?id=<?php echo $produk['id_produk'];?>"><img width="400"  class="img-responsive" src="foto_produk/<?php echo $produk['foto_produk'];?>" alt=""></a>
					</div>
						<div class="caption" align="center">
							<a href="detail.php?id=<?php echo $produk['id_produk'];?>" style="color: black;"><h3><?php echo $produk['nama_produk'];?></h3></a>
							<h4><b>Rp.<?php echo number_format($produk['harga_produk']);?></b></h4>
							<a href="beli.php?id=<?php echo $produk['id_produk'];?>" class="btn btn-primary">Buy</a>
							<a href="detail.php?id=<?php echo $produk['id_produk'];?>" class="btn btn-default">Detail</a>
						</div>
					</div>
				</div>
			<?php }?>
		</div>
	</div>
</section>




		<!-- Footer -->
		<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
			<div class="flex-w p-b-90">
				<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
					<h4 class="s-text12 p-b-30">
						GET IN TOUCH
					</h4>

					<div>
						<p class="s-text7 w-size27">
							Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+62) 8221-323-9264
						</p>
					</div>
				</div>

				<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
					<h4 class="s-text12 p-b-30">
						Categories
					</h4>

					<ul>
						<li class="p-b-9">
							<a href="#" class="s-text7">
							   Sepatu
							</a>
						</li>

					</ul>
				</div>

				<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
					<h4 class="s-text12 p-b-30">
						Links
					</h4>

					<ul>
						<li class="p-b-9">
							<a href="#" class="s-text7">
								Search
							</a>
						</li>

						<li class="p-b-9">
							<a href="#" class="s-text7">
								About Us
							</a>
						</li>

						<li class="p-b-9">
							<a href="#" class="s-text7">
								Contact Us
							</a>
						</li>

						<li class="p-b-9">
							<a href="#" class="s-text7">
								Returns
							</a>
						</li>
					</ul>
				</div>

				<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
					<h4 class="s-text12 p-b-30">
						Help
					</h4>

					<ul>
						<li class="p-b-9">
							<a href="#" class="s-text7">
								Track Order
							</a>
						</li>

						<li class="p-b-9">
							<a href="#" class="s-text7">
								Returns
							</a>
						</li>

						<li class="p-b-9">
							<a href="#" class="s-text7">
								Shipping
							</a>
						</li>

						<li class="p-b-9">
							<a href="#" class="s-text7">
								FAQs
							</a>
						</li>
					</ul>
				</div>

				<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
					<h4 class="s-text12 p-b-30">
						Newsletter
					</h4>

					<form>
						<div class="effect1 w-size9">
							<input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
							<span class="effect1-line"></span>
						</div>

						<div class="w-size2 p-t-20">
							<!-- Button -->
							<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
								Subscribe
							</button>
						</div>

					</form>
				</div>
			</div>

			<div class="t-center p-l-15 p-r-15">
				<a href="#">
					<img class="h-size2" src="data/images/icons/paypal.png" alt="IMG-PAYPAL">
				</a>

				<a href="#">
					<img class="h-size2" src="data/images/icons/visa.png" alt="IMG-VISA">
				</a>

				<a href="#">
					<img class="h-size2" src="data/images/icons/mastercard.png" alt="IMG-MASTERCARD">
				</a>

				<a href="#">
					<img class="h-size2" src="data/images/icons/express.png" alt="IMG-EXPRESS">
				</a>

				<a href="#">
					<img class="h-size2" src="data/images/icons/discover.png" alt="IMG-DISCOVER">
				</a>

				<div class="t-center s-text8 p-t-20">
					Copyright © 2019 All rights reserved. | Website ini Dibuat Oleh<i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="" target="_blank">Agustio Fernando</a>
				</div>
			</div>
		</footer>



		<!-- Back to top -->
		<div class="btn-back-to-top bg0-hov" id="myBtn">
			<span class="symbol-btn-back-to-top">
				<i class="fa fa-angle-double-up" aria-hidden="true"></i>
			</span>
		</div>

		<!-- Container Selection1 -->
		<div id="dropDownSelect1"></div>



		<!--===============================================================================================-->
		<script type="text/javascript" src="data/vendor/jquery/jquery-3.2.1.min.js"></script>
		<!--===============================================================================================-->
		<script type="text/javascript" src="data/vendor/animsition/js/animsition.min.js"></script>
		<!--===============================================================================================-->
		<script type="text/javascript" src="data/vendor/bootstrap/js/popper.js"></script>
		<script type="text/javascript" src="data/vendor/bootstrap/js/bootstrap.min.js"></script>
		<!--===============================================================================================-->
		<script type="text/javascript" src="data/vendor/select2/select2.min.js"></script>
		<script type="text/javascript">
			$(".selection-1").select2({
				minimumResultsForSearch: 20,
				dropdownParent: $('#dropDownSelect1')
			});
		</script>
		<!--===============================================================================================-->
		<script type="text/javascript" src="data/vendor/slick/slick.min.js"></script>
		<script type="text/javascript" src="data/js/slick-custom.js"></script>
		<!--===============================================================================================-->
		<script type="text/javascript" src="data/vendor/countdowntime/countdowntime.js"></script>
		<!--===============================================================================================-->
		<script type="text/javascript" src="data/vendor/lightbox2/js/lightbox.min.js"></script>
		<!--===============================================================================================-->
		<script type="text/javascript" src="data/vendor/sweetalert/sweetalert.min.js"></script>
		<script type="text/javascript">
			$('.block2-btn-addcart').each(function(){
				var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
				$(this).on('click', function(){
					swal(nameProduct, "is added to cart !", "success");
				});
			});

			$('.block2-btn-addwishlist').each(function(){
				var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
				$(this).on('click', function(){
					swal(nameProduct, "is added to wishlist !", "success");
				});
			});
		</script>

		<!--===============================================================================================-->
		<script src="data/js/main.js"></script>
<!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
     <!-- Bootstrap core JavaScript -->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

      <!-- Menu Toggle Script -->
      <script>
        $("#menu-toggle").click(function(e) {
          e.preventDefault();
          $("#wrapper").toggleClass("toggled");
        });
      </script>
</body>

</html>
