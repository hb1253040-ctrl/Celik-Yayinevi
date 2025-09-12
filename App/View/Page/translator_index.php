<?php echo $data['header']; ?>

<div role="main" class="main">
				<section class="page-header page-header-modern bg-color-grey page-header-md ">
					<div class="container-fluid">
						<div class="row align-items-center">

							<div class="col">
								<div class="row">
									<div class="col-md-12 align-self-center p-static order-2 text-center">
										<div class="overflow-hidden pb-2">
											<h1 class="text-dark font-weight-bold text-9 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="100">Mütercimler</h2>
										</div>
									</div>
									<div class="col-md-12 align-self-center order-1">
										<ul class="breadcrumb d-block text-center appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="300">
											<li><a href="#">Anasayfa</a></li>
											<li><a href="#"></a>Mütercimler</li>
										</ul>
									</div>
								</div>
							</div>

						</div>
					</div>
				</section>

				<div class="container py-2">
					<ul id="portfolioPaginationFilter" class="nav nav-pills sort-source sort-source-style-3 justify-content-center" data-sort-id="portfolio" data-option-key="filter" data-plugin-options="{'layoutMode': 'fitRows'}"></ul>
					<div class="sort-destination-loader sort-destination-loader-showing mt-4 pt-2">
						<div id="portfolioPaginationWrapper" class="row portfolio-list sort-destination" data-sort-id="portfolio" data-items-per-page="8">
							<?php foreach ($author_data as $key => $value): 
								if ($value['type'] == "translator"): ?>
								<div class="col-sm-6 col-lg-3 isotope-item brands">
									<div class="portfolio-item">
										<a href="<?php echo _link('translator_index/translator_about/'.$value['id']); ?>">
											<span class="thumb-info thumb-info-lighten border-radius-0">
												<span class="thumb-info-wrapper" style="border-radius:40px;">
													<img src="<?php echo assets('img/author/'.$value['image']); ?>" class="img-fluid border-radius-0" alt="">
													<span class="thumb-info-title">
														<span class="thumb-info-inner"><?php echo $value['name']; ?></span>
													</span>
												</span>
											</span>
										</a>
									</div>
								</div>
							<?php endif; endforeach; ?>
						</div>
						<div class="row">
							<div class="col">
								<div id="portfolioPagination" class="float-end"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
<?php echo $data['footer']; ?>

			