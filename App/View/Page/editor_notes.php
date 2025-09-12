<?php echo $data['header']; ?>
<div role="main" class="main">

				<section class="page-header page-header-modern bg-color-grey page-header-md">
					<div class="container">
						<div class="row">
							<div class="col-md-12 align-self-center p-static order-2 text-center">
								<h1 class="text-dark font-weight-bold text-8">Editör Notları</h1>
							</div>
						</div>
					</div>
				</section>

				<div class="container py-4">

					<div class="row">
						<div class="col">
							<div class="blog-posts">
								<div class="masonry-loader masonry-loader-showing">
									<div class="masonry row" data-plugin-masonry data-plugin-options="{'itemSelector': '.masonry-item'}">
                                        <?php foreach ($book_data as $key => $value): ?>
                                            <div class="masonry-item no-default-style col-md-4 col-lg-3">
                                                <article class="post post-medium border-0 pb-0 mb-5">
                                                    <div class="post-image">
                                                        <a href="blog-post.html">
                                                            <img src="<?php echo assets('img/books/'.$value['image']);?>" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="post-content">
                                                        <h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2"><a href="blog-post.html"><?php echo $value['name']; ?></a></h2>
                                                        <div class="post-meta">
                                                            <span><i class="far fa-user"></i> By <a href="#">John Doe</a> </span>
                                                            <span><i class="far fa-folder"></i> <a href="#">News</a>, <a href="#">Design</a> </span>
                                                            <span><i class="far fa-comments"></i> <a href="#">12 Comments</a></span>
                                                            <span class="d-block mt-2"><a href="blog-post.html" class="btn btn-xs btn-light text-1 text-uppercase">Read More</a></span>
                                                        </div>
                                                    </div>
                                                </article>
                                            </div>
                                        <?php endforeach; ?>
									</div>
								</div>

								<div class="row">
									<div class="col">
										<ul class="pagination float-end">
											<li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
											<li class="page-item active"><a class="page-link" href="#">1</a></li>
											<li class="page-item"><a class="page-link" href="#">2</a></li>
											<li class="page-item"><a class="page-link" href="#">3</a></li>
											<li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
										</ul>
									</div>
								</div>

							</div>
						</div>

					</div>

				</div>

			</div>

<?php echo $data['footer']; ?>