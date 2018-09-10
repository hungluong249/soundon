<section id="products">
    <div class="container">
        <div class="row">
            <div class="left col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <h2 class="title-md">
					Speakers
					<br>
					<?php echo count($result) ?>
				</h2>

                <div class="accordion" id="accordion">

                    <!-- Collapse 1: Production -->
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h3 class="title-sm">
                                <a role="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Production
                                </a>
                            </h3>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <?php
                                $production = array(
                                    'Bose' , 'Marshall' , 'Q Acoutics' , 'JBL' , 'NHT'
                                )
                                ?>
                                <?php for ($i = 0; $i < count($production); $i++) { ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                        <?php echo $production[$i] ?>
                                    </label>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <!-- Collapse 2: Fit -->
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h3 class="title-sm">
                                <a role="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                    Fit
                                </a>
                            </h3>
                        </div>
                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <?php
                                $fit = array(
                                    'In-ear' , 'Over-ear'
                                )
                                ?>
                                <?php for ($i = 0; $i < count($fit); $i++) { ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            <?php echo $fit[$i] ?>
                                        </label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <!-- Collapse 3: Features -->
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h3 class="title-sm">
                                <a role="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseOne">
                                    Features
                                </a>
                            </h3>
                        </div>
                        <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                                <?php
                                $features = array(
                                    'Noise cancelling' , 'Wireless' , 'Sport' , 'Aviation' , 'Heart rate sensor'
                                )
                                ?>
                                <?php for ($i = 0; $i < count($features); $i++) { ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            <?php echo $features[$i] ?>
                                        </label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <!-- Collapse 4: Price -->
                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h3 class="title-sm">
                                <a role="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseOne">
                                    Price
                                </a>
                            </h3>
                        </div>
                        <div id="collapseFour" class="collapse show" aria-labelledby="headingFour" data-parent="#accordion">
                            <div class="card-body">
                                <?php
                                $price = array(
                                    '0-$200' , '$201 - $500' , '$501 - $1000' , '$1000+'
                                )
                                ?>
                                <?php for ($i = 0; $i < count($price); $i++) { ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            <?php echo $price[$i] ?>
                                        </label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <!-- Collapse 4: Sort by -->
                    <div class="card">
                        <div class="card-header" id="headingFive">
                            <h3 class="title-sm">
                                <a role="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseOne">
                                    Sort by
                                </a>
                            </h3>
                        </div>
                        <div id="collapseFive" class="collapse show" aria-labelledby="headingFive" data-parent="#accordion">
                            <div class="card-body">
                                <?php
                                $sortby = array(
                                    'Highest Rated' , 'Price (Low > High)' , 'Price (high > Low)'
                                )
                                ?>
                                <?php for ($i = 0; $i < count($sortby); $i++) { ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                            <?php echo $sortby[$i] ?>
                                        </label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="right col-xs-12 col-sm-12 col-md-9 col-lg-9">
                <div class="banner">
                    <img src="<?php echo site_url('assets/img/')?>banner-discount.jpg" alt="banner discount 5%">
                </div>

                <div id="list">
					<div class="row">

                        <?php foreach ($result as $key => $value): ?>
							<div class="col-xs-12 col-lg-6 item">
								<div class="inner">
									<div class="mask">
										<img src="<?php echo site_url('assets/img/product/') . $value['image'] ?>" alt="image product <?php echo $value['title'] ?>">
									</div>

									<div class="item-info">
										<h4 class="subtitle-sm"><?php echo $value['subtitle'] ?></h4>
										<h3 class="title-sm text-wrapper"><?php echo $value['title'] ?></h3>
										<h3 class="title-sm">
											$<?php echo $value['price'] ?>

											<span class="featured">
													<?php
                                                    if ($value['bluetooth'] == 1){
                                                        echo '<i class="fab fa-bluetooth-b"></i>';
                                                    } else{
                                                        echo '';
                                                    }
                                                    ?>

                                                    <?php
                                                    if ($value['battery'] == 1){
                                                        echo '<i class="fas fa-battery-full"></i>';
                                                    } else{
                                                        echo '';
                                                    }
                                                    ?>

                                                    <?php
                                                    if ($value['waterproof'] == 1){
                                                        echo '<i class="fas fa-tint"></i>';
                                                    } else{
                                                        echo '';
                                                    }
                                                    ?>

                                                    <?php
                                                    if ($value['heartbeat'] == 1){
                                                        echo '<i class="fas fa-heartbeat"></i>';
                                                    } else{
                                                        echo '';
                                                    }
                                                    ?>

												</span>
										</h3>
									</div>

									<div class="overlay">
										<h4 class="subtitle-sm"><?php echo $value['subtitle'] ?></h4>
										<h3 class="title-sm text-wrapper"><?php echo $value['title'] ?></h3>
										<h3 class="title-sm">
											$<?php echo $value['price'] ?>

											<span class="featured">
													<?php
                                                    if ($value['bluetooth'] == 1){
                                                        echo '<i class="fab fa-bluetooth-b"></i>';
                                                    } else{
                                                        echo '';
                                                    }
                                                    ?>

                                                    <?php
                                                    if ($value['battery'] == 1){
                                                        echo '<i class="fas fa-battery-full"></i>';
                                                    } else{
                                                        echo '';
                                                    }
                                                    ?>

                                                    <?php
                                                    if ($value['waterproof'] == 1){
                                                        echo '<i class="fas fa-tint"></i>';
                                                    } else{
                                                        echo '';
                                                    }
                                                    ?>

                                                    <?php
                                                    if ($value['heartbeat'] == 1){
                                                        echo '<i class="fas fa-heartbeat"></i>';
                                                    } else{
                                                        echo '';
                                                    }
                                                    ?>
												</span>
										</h3>
										<p class="paragraph text-wrapper"><?php echo $value['description'] ?></p>
									</div>

									<div class="buttons">
										<button role="button" class="btn btn-light add-to-cart" data-id="<?php echo $value['id'] ?>" data-name="<?php echo $value['title'] ?>" data-price="<?php echo $value['price'] ?>">
											Add to Cart
										</button>
										<a href="<?php echo base_url('products/detail/') . $value['id'] ?>" role="button" class="btn btn-link">
											See Detail
										</a>
									</div>
								</div>
							</div>
                        <?php endforeach; ?>
					</div>

					<nav aria-label="Page navigation example">
						<ul class="pagination justify-content-center">
							<li class="page-item disabled">
								<a class="page-link" href="#" tabindex="-1">Previous</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item">
								<a class="page-link" href="#">Next</a>
							</li>
						</ul>
					</nav>

                </div>
            </div>
        </div>
    </div>
</section>