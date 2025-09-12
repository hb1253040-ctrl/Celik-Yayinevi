<?php echo $data['header']; ?>
<div role="main" class="main">
				<div id="home" class="owl-carousel owl-carousel-light owl-carousel-light-init-fadeIn owl-theme manual dots-inside dots-horizontal-center show-dots-hover nav-inside nav-inside-plus nav-dark nav-md nav-font-size-md show-nav-hover mb-0" data-plugin-options="{'autoplayTimeout': 7000}" style="height: 100vh;">
					<div class="owl-stage-outer">
						<div class="owl-stage">
							<!-- Carousel Slide 1 -->
							<?php foreach ($slider_data as $key => $value): ?>
                            <div class="owl-item position-relative pt-5" style="background-image: url(<?php echo assets('img/slider/'.$value['image']); ?>); background-size: cover; background-position: center; background-color: #35383d;">
                                <div class="container position-relative z-index-3 h-100">
                                    <div class="row justify-content-center align-items-center h-100">
                                        <div class="col-lg-6">
                                            <div class="d-flex flex-column align-items-center">
												<img src="" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<?php endforeach; ?> 
						</div>
					</div>
					<div class="owl-nav">
						<button type="button" role="presentation" class="owl-prev" aria-label="Previous"></button>
						<button type="button" role="presentation" class="owl-next" aria-label="Next"></button>
					</div>
				</div>

				<div id="projects" class="container">
					<div class="row justify-content-center pt-5 mt-5">
						<div class="col-lg-9 text-center">
							<div class="appear-animation" data-appear-animation="fadeInUpShorter">
								<h1 class="font-weight-bold mb-2 text-color-quaternary">Önerilenler</h1>
								<p class="mb-4">Sizin İçin Önerdiğimiz Kitaplar..</p>
							</div>
						</div>
					</div>
					<div class="row pb-5 mb-5">
						<div class="col">
							<div class="appear-animation popup-gallery-ajax" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
								<div class="owl-carousel owl-theme mb-0" data-plugin-options="{'items': 4, 'margin': 35, 'loop': false}">
									<?php foreach ($book_data as $key => $value): ?>
										<div class="portfolio-item">
											<a href="ajax/portfolio-ajax-project.html" data-ajax-on-modal>
												<span class="thumb-info thumb-info-lighten">
													<span class="thumb-info-wrapper">
														<img src="<?php echo assets('img/books/'.$value['image']); ?>" class="img-fluid border-radius-0" alt="">
														<span class="thumb-info-title">
															<span class="thumb-info-inner"><?php echo $value['name']; ?></span>
															<span class="thumb-info-type"><?php echo $value['category_name']; ?></span>
														</span>
														<span class="thumb-info-action">
															<span class="thumb-info-action-icon bg-dark opacity-8"><i class="fas fa-plus"></i></span>
														</span>
													</span>
												</span>
											</a>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="team" class="container pb-4">
					<div class="row pt-5 mt-5 mb-4">
						<div class="col text-center appear-animation" data-appear-animation="fadeInUpShorter">
							<h2 class="font-weight-bold mb-1">Son Çıkan Kitaplar</h2>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="owl-carousel owl-theme show-nav-title" data-plugin-options="{'items': 6, 'margin': 10, 'loop': false, 'nav': true, 'dots': false}">
								<?php foreach ($book_data as $key => $value): ?>
									<div>
										<img alt="" class="img-fluid rounded" src="<?php echo assets('img/books/'.$value['image']); ?>">
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
<?php echo $data['footer']; ?>