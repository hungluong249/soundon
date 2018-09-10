<section id="about">
    <div class="cover">
		<div class="mask">
			<img src="https://images.unsplash.com/photo-1505515888495-c1897b0b5740?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=ca2beb82c990e56325cce416232970b6&auto=format&fit=crop&w=1350&q=80" alt="image about cover">
		</div>
	</div>

	<div class="container">
		<h1 class="title-lg">
			About Us
		</h1>

		<div class="row">
			<?php foreach ( $result as $key => $value): ?>

			<div class="item col-xs-12 col-md-6">
				<a href="<?php echo base_url('about/detail/') . $value['id'] ?>">
					<h2 class="title-md text-wrapper"><?php echo $value['title'] ?></h2>
				</a>

				<p class="paragraph text-wrapper"><?php echo $value['description'] ?></p>

				<a class="btn btn-link" href="<?php echo base_url('about/detail/') . $value['id'] ?>" role="button">Read more ...</a>

				<div class="mask">
					<a href="<?php echo base_url('about/detail/') . $value['id'] ?>">
						<img src="<?php echo $value['image'] ?>" alt="image <?php echo $value['title'] ?>">
					</a>
				</div>
			</div>

			<?php endforeach; ?>
		</div>
	</div>
</section>