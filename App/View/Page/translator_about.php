<?php echo $data['header']; ?>
<div role="main" class="main">
				<div class="container pt-5">
					<div class="row py-4 mb-2">
						<div class="col-md-7 order-2">
							<div class="overflow-hidden">
								<h2 class="text-color-dark font-weight-bold text-12 mb-2 pt-0 mt-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="300"><?php echo $author_data['name']; ?></h2>
							</div>
							<p class="lead appear-animation p-3"  data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700"><?php echo $author_data['description']; ?></p>
							<hr class="solid my-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900">
						</div>
						<div class="col-md-5 order-md-2 mb-2 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter">
							<img src="<?php echo assets('img/author/'.$author_data['image']); ?>" class="img-fluid mb-2 " style="border-radius:150px;"  alt="">
						</div>
					</div>
				</div>

				<div class="container pt-5 pb-2">
					<div class="overflow-hidden">
						<h2 class="text-color-dark font-weight-normal text-6 mb-0 appear-animation" data-appear-animation="maskUp"><strong class="font-weight-extra-bold">Kitapları</strong></h2>
					</div>
					<div class="row">
						<div class="col">
							<div class="my-4 lightbox appear-animation" data-appear-animation="fadeInUpShorter" data-plugin-options="{'delegate': 'a.lightbox-portfolio', 'type': 'image', 'gallery': {'enabled': true}}">
								<div class="owl-carousel owl-theme pb-3" data-plugin-options="{'items': 4, 'margin': 35, 'loop': false}">
									<?php foreach ($about_book_data as $key => $value): if ($value['author_id'] === $author_data['id']): ?>
										<div class="portfolio-item">
											<span class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
												<span class="thumb-info-wrapper border-radius-0">
													<img src="<?php echo assets('img/books/'.$value['book_image']); ?>" class="img-fluid border-radius-0" alt="">
													<span class="thumb-info-title">
														<span class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3"><?php echo $value['book_name']; ?></span>
														<span class="thumb-info-type"><?php ?></span>
													</span>
													<span class="thumb-info-action">
														<a href="<?php echo _link('book_index/book_about/'.$value['book_id']); ?>">
															<span class="thumb-info-action-icon thumb-info-action-icon-primary"><i class="fas fa-link"></i></span>
														</a>
													
													</span>
												</span>
											</span>
										</div>
									<?php endif; endforeach; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
<?php echo $data['footer']; ?> 