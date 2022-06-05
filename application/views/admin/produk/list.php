<div class="row">
	<div class="col-12">
		<div class="row">
			<div class="col-xl-12">
				<div class="card">
					<div class="card-body">
						<!-- <h4 class="header-title mb-4">Product</h4> -->

						<ul class="nav nav-pills navtab-bg nav-justified">
							<li class="nav-item">
								<a href="#product" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
									Data table
								</a>
							</li>
							<li class="nav-item">
								<a href="#list" data-bs-toggle="tab" aria-expanded="false" class="nav-link ">
									Galery Products
								</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane" id="list">
								<h4 class="header-table">List</h4>
								<div class="add-button">
									<a href="<?= base_url('admin/produk/tambah') ?>" class="btn btn-success rounded-pill waves-effect waves-light">
									<i class="fa fa-plus"></i>
									Tambah Data
									</a>
								</div>

								<div class="col-12">
									<h4 class="mt-0 mb-3"></h4>
									<div class="row">
									<?php foreach($produk as $key) : ?>
									
										<div class="col-md-4 col-12" id="detailProduct">
											<div class="card">
												<img class="card-img-top img-fluid" src="<?=base_url('assets/upload/image/').$key->image; ?>" alt="Card image cap">
												<div class="card-body">
													<h4 class="card-title"><?= $key->product_name ?></h4>
													<p class="card-text"><?= $key->description ?></p>
													<p class="card-text"><b>Price IDR <?=number_format($key->price,0,',','.');  ?></b></p>
													<p class="card-text">
														<small class="text-muted">Stock <?= $key->stock ?></small>
													</p>
												</div>
											</div>
										</div>

									<?php endforeach; ?>
									</div>
								</div>
							</div>
							
							<div class="tab-pane show active" id="product">
								<h4 class="header-table">Table</h4>
								<div class="add-button">
									<a href="<?= base_url('admin/produk/tambah') ?>" class="btn btn-success rounded-pill waves-effect waves-light">
									<i class="fa fa-plus"></i>
									Tambah Data
									</a>
								</div>

								<table id="product" class="table table-bordered dt-responsive table-responsive nowrap product">
									<thead>
									<tr>
										<th>No</th>
										<th>Product Name</th>
										<th>Product Code</th>
										<th>Price</th>
										<th>Stock</th>
										<th>Description</th>
										<th>Action</th>
									</tr>
									</thead>
									<tbody>
									</tbody>
								</table>

							</div>
						</div>
					</div>
				</div> <!-- end card-->
			</div> <!-- end col -->
		</div>
	</div>
	</div>
</div> <!-- end row -->