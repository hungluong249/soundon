<!-- /.content-wrapper -->
<footer>
    <div class="container-fluid">
<!--		<div class="left image">-->
<!--			<div class="mask">-->
<!--				<img src="https://images.unsplash.com/photo-1488992783499-418eb1f62d08?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=94653fa675a682fedd91970fae3fa1e1&auto=format&fit=crop&w=1453&q=80" alt="image footer">-->
<!--			</div>-->
<!--		</div>-->
<!---->
<!--		<div class="right image">-->
<!--			<div class="mask">-->
<!--				<img src="https://images.unsplash.com/photo-1488992783499-418eb1f62d08?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=94653fa675a682fedd91970fae3fa1e1&auto=format&fit=crop&w=1453&q=80" alt="image footer">-->
<!--			</div>-->
<!--		</div>-->

		<div class="container">
			<div class="row head">
				<div class="col-xs-12 col-sm-6 col-xl-2 item">
					<h3 class="title-sm">Product</h3>

					<ul>
						<li>
							<a href="<?php echo base_url('about/') ?>">
								Speakers
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('menu/') ?>">
								Headphones
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('blogs/') ?>">
								Accessories
							</a>
						</li>
					</ul>
				</div>

				<div class="col-xs-12 col-sm-6 col-xl-2 item">
					<h3 class="title-sm">About Us</h3>

					<ul>
						<li>
							<a href="<?php echo base_url('about/') ?>">
								About Us
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('menu/') ?>">
								Contact Us
							</a>
						</li>
					</ul>
				</div>

				<div class="col-xs-12 col-sm-6 col-xl-2 item">
					<h3 class="title-sm">Help</h3>

					<ul>
						<li>
							<a href="<?php echo base_url('about/') ?>">
								Help
							</a>
						</li>
						<li>
							<a href="<?php echo base_url('menu/') ?>">
								Terms & Conditions
							</a>
						</li>
					</ul>
				</div>

				<div class="col-xs-12 col-sm-6 col-xl-6 item">
					<h3 class="title-sm">Help</h3>

					<div class="input-group">
						<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="button-addon2" placeholder="Enter email">
						<button type="button " class="btn btn-default" id="button-addon2">Subscribe</button>
					</div>

				</div>
			</div>

			<div class="row body">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<h3 class="title-sm">Showroom</h3>
				</div>

				<?php for ($i = 0; $i <4; $i++) { ?>
				<div class="col-xs-12 col-sm-6 col-xl-3 item">
					<p class="paragraph">Location</p>
					<p class="paragraph">
						917 Rosenbaum Lodge Apt. 831
					</p>
					<a href="tel:(84) 1234 5678">
						(84) 1234 5678
					</a>
					<a href="mailto:showroom1@soundon.store">
						showroom1@soundon.store
					</a>
				</div>
				<?php } ?>

			</div>

			<div class="row foot">
				<div class="col">
					<p class="paragraph">2018 soundon</p>
				</div>
				<div class="col">
					<p class="paragraph"> &copy; All Copyrights Reversed.</p>
				</div>
			</div>
		</div>
	</div>
</footer>


<!-- jQuery -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->

<!-- popper js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<!-- Bootstrap js -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<!-- Script -->
<script src="<?php echo site_url('assets/js/') ?>script.js"></script>

<!-- Cart -->
<script src="<?php echo site_url('assets/js/') ?>cart.js"></script>
<script>
    var url = window.location.protocol + '//' + window.location.hostname;
    var cart = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : [];
    $(document).ready(function(){
        $.ajax({
            method: "get",
            url: url + '/soundon/checkout',
            data: {
                cart: JSON.stringify(cart)
            },
            success: function(response){
            	console.log(response);
            },
            error: function(jqXHR, exception){
            }
        });
    })
    
</script>

</body>
</html>