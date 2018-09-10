<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- TITLE -->
	<title>SOUND ON</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<!-- FontAwesome 5 -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/solid.css" integrity="sha384-wnAC7ln+XN0UKdcPvJvtqIH3jOjs9pnKnq9qX68ImXvOGz2JuFoEiCjT8jyZQX2z" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/brands.css" integrity="sha384-nT8r1Kzllf71iZl81CdFzObMsaLOhqBU1JD2+XoAALbdtWaXDOlWOZTR4v1ktjPE" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css" integrity="sha384-HbmWTHay9psM8qyzEKPc8odH4DsOuzdejtnr+OFtDmOcIVnhgReQ4GZBH7uwcjf6" crossorigin="anonymous">

	<!-- Style -->
	<link rel="stylesheet" href="<?php echo site_url('assets/sass/') ?>style.css">
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

</head>

<body>

<header class="">
	<nav>
		<div class="nav-brand nav-item">
			<a href="<?php echo base_url('') ?>">
				<img src="<?php echo site_url('assets/img/') ?>logo.png" alt="logo Sound ON">
			</a>
		</div>

		<div class="nav-main nav-item">
			<div class="left">
				<div id="expand-nav">
					<a class="btn-nav-expand" role="button" id="btn-nav-expand">
						<span class="nav-icon"></span>
					</a>
				</div>
			</div>

			<div class="right">
				<ul>
					<li>
						<a href="<?php echo base_url('products')?>">
							Store
						</a>
					</li>
					<li>
						<a href="<?php echo base_url('')?>">
							Second Hand
						</a>
					</li>
					<li>
						<a href="<?php echo base_url('')?>">
							Advise Corner
						</a>
					</li>

					<li>
						<div class="divide"></div>
					</li>

					<li>
						<a href="<?php echo base_url('')?>">
							<i class="fas fa-shopping-cart"></i> <span id="total-cart">0</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url('')?>">
							Log in
						</a>
					</li>
					<li>
						<a href="<?php echo base_url('')?>">
							Sign up
						</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="nav-expand">
			<div class="row head">
				<div class="col item">
					<h2 class="title-md">
						<a href="<?php echo base_url('products/') ?>">
							Speakers
						</a>
					</h2>

					<ul class="d-none d-md-block">
						<li>
							<a href="<?php echo base_url('products/') ?>">
								Bookshelfs
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('products/') ?>">
								Speakers with Ampli
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('products/') ?>">
								TV Speakers
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('products/') ?>">
								Surround
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('products/') ?>">
								Floor Standing
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('products/') ?>">
								2.1 Speakers
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('products/') ?>">
								5.1 Speakers
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('products/') ?>">
								Karaoke Speakers
							</a>
						</li>
					</ul>
				</div>

				<div class="col item">
					<h2 class="title-md">
						<a href="<?php echo base_url('products/') ?>">
							Headphones
						</a>
					</h2>

					<ul class="d-none d-md-block">
						<li>
							<a href="<?php echo base_url('products/') ?>">
								In-ear
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('products/') ?>">
								Over-ear
							</a>
						</li>
					</ul>
				</div>

				<div class="col item">
					<h2 class="title-md">
						<a href="<?php echo base_url('products/') ?>">
							Accessories
						</a>
					</h2>

					<ul class="d-none d-md-block">
						<li>
							<a href="<?php echo base_url('products/') ?>">
								Speaker
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('products/') ?>">
								Headphone
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('products/') ?>">
								Cable
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('products/') ?>">
								Ampli
							</a>
						</li>
					</ul>
				</div>

				<div class="col item">
					<h2 class="title-md">
						<a href="<?php echo base_url('about/') ?>">
							About Us
						</a>
					</h2>

					<ul class="d-none d-md-block">
						<li>
							<a href="<?php echo base_url('about/') ?>">
								About Us
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('contact/') ?>">
								Contact Us
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('support/') ?>">
								Support
							</a>
						</li>
						<li>
							<a href="<?php ?>">
								Help
							</a>
						</li>
						<li>
							<a href="<?php ?>">
								Terms & Conditions
							</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="row foot">
				<div class="col">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">
								<i class="fas fa-search"></i>
							</span>
						</div>
						<input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
						<button class="btn btn-link" type="button" id="button-addon2">Search</button>
					</div>
				</div>
			</div>
		</div>
	</nav>
</header>
