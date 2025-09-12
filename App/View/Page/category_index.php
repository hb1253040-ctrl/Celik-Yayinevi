<?php echo $data['header']; ?>
<div role="main" class="main shop pt-4">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 order-2 order-lg-1">
							<aside class="sidebar">
								<form action="page-search-results.html" method="get">
									<div class="input-group mb-3 pb-1">
										<input class="form-control text-1" placeholder="Search..." name="s" id="s" type="text">
										<button type="submit" class="btn btn-dark text-1 p-2"><i class="fas fa-search m-2"></i></button>
									</div>
								</form>
								<h5 class="font-weight-semi-bold pt-3">Kategoriler</h5>
								<ul class="nav nav-list flex-column">
									<?php foreach ($category_data as $key => $value): ?>
										<li class="nav-item"><a class="nav-link" href="<?php echo _link('book_index/category_index/'.permalink($value['slug']).'/'.$value['id']); ?>"><?php echo $value['name'] ?></a></li>
									<?php endforeach; ?>
								</ul>
							</aside>
						</div>
						<div class="col-lg-9 order-1 order-lg-2">
							<div class="masonry-loader masonry-loader-showing">
								<div class="row products product-thumb-info-list" data-plugin-masonry data-plugin-options="{'layoutMode': 'fitRows'}">
									<?php foreach ($book_pagination as $key => $value): //if ($category_slug['slug'] == $value['category_slug']):?>
										<div class="col-sm-6 col-lg-4">
											<div class="product mb-0">
												<div class="product-thumb-info border-0 mb-3">
													<a href="<?php echo _link('book_index/book_about/'.$value['id']); ?>" class="quick-view text-uppercase font-weight-semibold text-2">
														Tıklayın
													</a>
													<a href="<?php echo _link('book_index/book_about/'.$value['id']); ?>">
														<div class="product-thumb-info-image">
															<img alt="" class="img-fluid" style="border-radius:10px" src="<?php echo assets('img/books/'.$value['image'])?>">
														</div>
													</a>
												</div>
												<div class="d-flex justify-content-between">
													<div>
														<a href="#" class="d-block text-uppercase text-decoration-none text-color-default text-color-hover-primary line-height-1 text-0 mb-1"><?php echo $value['category_name'] ?></a>
														<h3 class="text-3-5 font-weight-medium font-alternative text-transform-none line-height-3 mb-0"><a href="<?php echo _link('book_index/book_about/'.$value['id']); ?>" class="text-color-dark text-color-hover-primary"><?php echo $value['name'] ?></a></h3>
													</div>
												</div>
												<div title="Rated 5 out of 5">
													<input type="text" class="d-none" value="5" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'default', 'size':'xs'}">
												</div>
												<p class="price text-5 mb-3">
													<span class="sale text-color-dark font-weight-semi-bold"><?php echo $value['price'] ?> TL</span>
													<span class="amount"><?php echo $value['price']; ?> TL</span>
												</p>
											</div>
										</div>
									<?php /*endif*/; endforeach; ?>
								</div>
								<div class="row mt-4">
									<div class="col">
										<ul class="pagination float-end">
											<?php if($page > 1): ?> 
												<a href="<?php echo _link('book_index/category_index/'.$category_slug['slug'].'/'.$category_slug['id'].'?pagination=1'); ?>"></a>
											<?php endif; ?>

											<?php if($page > 1): ?> 
												<li class="page-item"><a class="page-link" href="<?php echo _link('book_index/category_index/'.$category_slug['slug'].'/'.$category_slug['id'].'?pagination='.($page-1)); ?>"><i class="fas fa-angle-left"></i></a></li>
											<?php endif; ?>

											<?php for ($i=1; $i <= $pagination; $i++) { ?>
												<li class="<?php if($i == $page ) {echo "page-item active";}?>"><a class="page-link" href="<?php echo _link('book_index/category_index/'.$category_slug['slug'].'/'.$category_slug['id'].'?pagination='.$i); ?>"><?php echo $i; ?></a></li>
											<?php } ?> 

											<?php if($page < $pagination):  ?>
												<li class="page-item"><a class="page-link" href="<?php echo _link('book_index/category_index/'.$category_slug['slug'].'/'.$category_slug['id'].'?pagination='.($page+1)); ?>"><i class="fas fa-angle-right"></i></a></li>
											<?php endif; ?>

											<?php if($page != $total_pages): ?>
												<a href="<?php echo _link('book_index/category_index/'.$category_slug['slug'].'/'.$category_slug['id'].'?pagination='.$total_pages); ?>"></a>
											<?php endif; ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
<?php echo $data['footer']; ?>
