<?php echo $data['header']; print_r($book_rows);?>
<div role="main" class="main shop py-4">
			<div class="container">
				<div class="row">
					<div class="col-lg-9">
						<div class="row">
							<div class="col-lg-6">
								<div class="thumb-gallery-wrapper">
									<div>
										<img alt="" class="img-fluid" style="border-radius:30px; height:465px" src="<?php echo assets('img/books/'.$book_data['image']); ?>">
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="summary entry-summary position-relative">
									<h1 class="mb-0 font-weight-normal text-7"><?php echo $book_data['name']; ?></h1>
									<div class="pb-0 clearfix d-flex align-items-center">
										<div title="Rated 3 out of 5" class="float-start">
											<input type="text" class="d-none" value="3" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'primary', 'size':'xs'}">
										</div>
									</div>
									<p class="price mb-3">
										<span class="amount">₺<?php echo $book_data['price']; ?></span>
									</p>
									<ul class="list list-unstyled text-2">
										<li class="mb-3">Yayınevi: <strong class="text-color-dark">
											<?php foreach ($publisher_data as $key => $value):  echo $book_data['publisher_id'] == $value['id']  ? $value['name'] : ''; endforeach;?></strong>
										</li>
										<li class="mb-3">Yazar Adı: <strong class="text-color-dark"><?php foreach ($about_book_data as $key => $value): echo $book_data['id'] == $value['book_id'] ? ($value['author_type'] != 'editor' && $value['author_type'] != 'translator' ? $value['author_name'] : '') : ''; endforeach;?></strong></strong></li>
										<?php 
											foreach 
												($about_book_data as $key => $value): echo $book_data['id'] == $value['book_id'] ? ($value['author_type'] == 'editor' ? '<li class="mb-3">Düzenleyen Adı: <strong class="text-color-dark">'.$value["author_name"].'</strong></li>' : '') : '';  
											endforeach;
										?>
										<?php 
											foreach 
												($about_book_data as $key => $value): echo $book_data['id'] == $value['book_id'] ? ($value['author_type'] == 'translator' ? '<li class="mb-3">Çevirmen Adı: <strong class="text-color-dark">'.$value["author_name"].'</strong></li>' : '') : '';  
											endforeach;
										?>
										<li class="mb-3" >Kategori Adı: <strong class="text-color-dark">
											<?php foreach ($category_data as $key => $value):  echo $book_data['category_id'] == $value['id']  ? $value['name'] : ''; endforeach;?></strong>
										</li>
										<li class="mb-3">Kağıt Türü: <strong class="text-color-dark">
											<?php foreach ($paper_type_data as $key => $value):  echo $book_data['paper_type_id'] == $value['id']  ? $value['name'] : ''; endforeach;?></strong>
										</li>
										<li class="mb-3">Cilt Türü: <strong class="text-color-dark">
											<?php foreach ($skin_type_data as $key => $value):  echo $book_data['skin_type_id'] == $value['id']  ? $value['name'] : ''; endforeach;?></strong>
										</li>
										<li class="mb-3">Boyutlar: <strong class="text-color-dark"><?php echo $book_data['size']; ?> cm</strong></li>
										<li class="mb-3">Sayfa Sayısı: <strong class="text-color-dark"><?php echo $book_data['paper_number']; ?></strong></li>
										<li class="mb-3">ISBN: <strong class="text-color-dark"><?php echo $book_data['isbn']; ?></strong></li>
										<li class="mb-3">Barkod: <strong class="text-color-dark"><?php echo $book_data['barkod']; ?></strong></li>
									</ul>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col">
								<div id="description" class="tabs tabs-simple tabs-simple-full-width-line tabs-product tabs-dark mb-2">
									<ul class="nav nav-tabs justify-content-start">
										<li class="nav-item"><a class="nav-link active font-weight-bold text-3 text-uppercase py-2 px-3" href="#productDescription" data-bs-toggle="tab">Açıklama</a></li>
										<li class="nav-item"><a class="nav-link font-weight-bold text-3 text-uppercase py-2 px-3" href="#productInfo" data-bs-toggle="tab">Yazar</a></li>
										<li class="nav-item"><a class="nav-link nav-link-reviews font-weight-bold text-3 text-uppercase py-2 px-3" href="#productReviews" data-bs-toggle="tab">Yorumlar</a></li>
									</ul>
									
									<div class="tab-content p-0">
										<div class="tab-pane px-0 py-3 active" id="productDescription">
											<p><?php echo $book_data['description']; ?></p>
										</div>
										<div class="tab-pane px-0 py-3" id="productInfo">
											<div class="toggle toggle-primary m-0" data-plugin-toggle>
												<section class="toggle active">
													<?php foreach ($about_book_data as $key => $value): echo $book_data['id'] == $value['book_id'] ? ($value['author_type'] != 'editor' ? '<a class="toggle-title">'.$value["author_name"].'</a>' : '') : '';  endforeach;?>
													<div class="toggle-content">
														<?php foreach ($about_book_data as $key => $value): echo $book_data['id'] == $value['book_id'] ? ($value['author_type'] != 'editor' ? '<p>'.$value["author_description"].'</p>' : '') : '';  endforeach;?>
													</div>
												</section>
											</div>
										</div>
										<div class="tab-pane px-0 py-3" id="productReviews">
											<?php 
												foreach ($book_comment_data  as $key => $value): if ($value['book_id'] === $book_data['id']):   ?>
												<ul class="comments">
													<li>
														<div class="comment">
															<div class="img-thumbnail border-0 p-0 d-none d-md-block">
																<img class="avatar rounded-circle" alt="" src="<?php echo assets('img/avatar.jpg'); ?>">
															</div>
															<div class="comment-block">
																<div class="comment-arrow"></div>
																<span class="comment-by">
																	<strong><?php echo $value['name']; ?></strong>
																	<span class="float-end">
																		<div class="pb-0 clearfix">
																			<div title="Rated 3 out of 5" class="float-start">
																				<input type="text" class="d-none" value="3" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'primary', 'size':'xs'}">
																			</div>
																		</div>
																	</span>
																</span>
																<p><?php echo $value['comment']; ?></p>
															</div>
														</div>
													</li>
												</ul>
											<?php endif; endforeach;  ?>
											<hr class="solid my-5">
											<h4>Yorum Yaz</h4>

											<?php if ($success == 1){ ?>
											<div class="alert alert-success alert-dismissible text-center mx-auto">
												Yorum Yaptınız Teşekkürler.....
											</div>
											<?php } else if($success == 0 ) {  ?>
											<div class="alert alert-danger alert-dismissible text-center mx-auto">
												Yorum Yapamadınız Bilgileri Doldurduğunuza Emin Olun !!
											</div>
											<?php } else if($success == -1 ) {  ?>
											<div class="alert alert-primary alert-dismissible text-center">
												Kitap Hakkında Görüşlerinizi Yazınız
											</div>
											<?php } ?>

											<div class="row">
												<form method="post" id="form_comment">
												<input type="hidden" name="book_id" value="<?php echo $book_data['id'] ?? ''; ?>">
													<div class="col">
														<div class="row">
															<div class="form-group col-lg-6">
																<label class="form-label required font-weight-bold text-dark">Ad Soyad</label>
																<input type="text" class="form-control" name="name" >
															</div>
															<div class="form-group col-lg-6">
																<label class="form-label required font-weight-bold text-dark">E-posta</label>
																<input type="email" class="form-control" name="email">
															</div>
														</div>
														<div class="row">
															<div class="form-group col">
																<label class="form-label font-weight-bold text-dark">Mesaj</label>
																<textarea class="form-control" name="comment"></textarea>
															</div>
														</div>
                    									<button type="submit" class="btn btn-primary" name="book_comment_add">Yorum Yap</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<hr class="solid my-5">
						<h4 class="mb-3">Benzer <strong>Kitaplar</strong></h4>
						<div class="products row">
							<div class="col">
								<div class="owl-carousel owl-theme show-nav-title nav-dark mb-0" data-plugin-options="{'loop': false, 'autoplay': false,'items': 4, 'nav': true, 'dots': false, 'margin': 20, 'autoplayHoverPause': true, 'autoHeight': true}">
									<?php foreach ($books_data as $key => $value): if ($value['category_id'] == $book_data['category_id']): ?>
										<div class="product mb-0">
											<div class="product-thumb-info border-0 mb-3">
												<a href="<?php echo _link('book_index/book_about/'.$value['id']); ?>" class="quick-view text-uppercase font-weight-semibold text-2">
													Tıklayınız
												</a>
												<a href="<?php echo _link('book_index/book_about/'.$value['id']); ?>">
													<div class="product-thumb-info-image">
														<img alt="" class="img-fluid" src="<?php echo assets('img/books/'.$value['image']); ?>">
													</div>
												</a>
											</div>
											<div class="d-flex justify-content-between">
												<div>
													<a href="#" class="d-block text-uppercase text-decoration-none text-color-default text-color-hover-primary line-height-1 text-0 mb-1"><?php  echo $value['category_name']; ?></a>
													<h3 class="text-3-5 font-weight-medium font-alternative text-transform-none line-height-3 mb-0"><a href="shop-product-sidebar-right.html" class="text-color-dark text-color-hover-primary"><?php echo $value['name']; ?></a></h3>
												</div>
											</div>
											<div title="Rated 5 out of 5">
												<input type="text" class="d-none" value="5" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'default', 'size':'xs'}">
											</div>
											<p class="price text-5 mb-3">
												<span class="sale text-color-dark font-weight-semi-bold"><?php echo $value['price']; ?> TL</span>
												<span class="amount"><?php echo $value['price']; ?> TL</span>
											</p>
										</div>
									<?php endif; endforeach;  ?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<aside class="sidebar">
							<form action="page-search-results.html" method="get">
								<div class="input-group mb-3 pb-1">
									<input class="form-control text-1" placeholder="Ara..." name="s" id="s" type="text">
									<button type="submit" class="btn btn-dark text-1 p-2"><i class="fas fa-search m-2"></i></button>
								</div>
							</form>
							<h5 class="font-weight-semi-bold">Kategoriler</h5>
								<ul class="nav nav-list flex-column sort-source mb-5" data-sort-id="portfolio" data-option-key="filter" data-plugin-options="{'layoutMode': 'fitRows', 'filter': '*'}">
                                    <?php foreach ($category_data as $key => $value): ?>
                                        <li class="nav-item" data-option-value="*"><a class="nav-link active" href="#"><?php echo $value['name'] ?></a></li>
                                    <?php endforeach; ?>
								</ul>
						</aside>
					</div>
				</div>
			</div>
		</div>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<?php echo $data['footer']; ?> 