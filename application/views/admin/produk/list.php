<div class="row">
	<div class="col-12">
		<div class="row">
			<div class="col-xl-12">
				<div class="card">
					<div class="card-body">
						<!-- <h4 class="header-title mb-4">Product</h4> -->

						<ul class="nav nav-pills navtab-bg nav-justified">
							<li class="nav-item">
								<a href="#list" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
									List
								</a>
							</li>
							<li class="nav-item">
								<a href="#datatable" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
									Data table
								</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane  show active" id="list">
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
										<div class="col-md-4 col-12">
											<div class="card">
												<img class="card-img-top img-fluid" src="<?=base_url('assets/template/')?>test.png" alt="Card image cap">
												<div class="card-body">
													<h4 class="card-title">Card title</h4>
													<p class="card-text">This card has supporting text below as a natural
														lead-in to additional content.</p>
													<p class="card-text">
														<small class="text-muted">Last updated 3 mins ago</small>
													</p>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-12">
											<div class="card">
												<img class="card-img-top img-fluid" src="<?=base_url('assets/template/')?>test.png" alt="Card image cap">
												<div class="card-body">
													<h4 class="card-title">Card title</h4>
													<p class="card-text">This card has supporting text below as a natural
														lead-in to additional content.</p>
													<p class="card-text">
														<small class="text-muted">Last updated 3 mins ago</small>
													</p>
												</div>
											</div>
										</div>
										<div class="col-md-4 col-12">
											<div class="card">
												<img class="card-img-top img-fluid" src="<?=base_url('assets/template/')?>test.png" alt="Card image cap">
												<div class="card-body">
													<h4 class="card-title">Card title</h4>
													<p class="card-text">This card has supporting text below as a natural
														lead-in to additional content.</p>
													<p class="card-text">
														<small class="text-muted">Last updated 3 mins ago</small>
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="tab-pane" id="datatable">
								<h4 class="header-table">Table</h4>
								<div class="add-button">
									<a href="<?= base_url('admin/produk/tambah') ?>" class="btn btn-success rounded-pill waves-effect waves-light">
									<i class="fa fa-plus"></i>
									Tambah Data
									</a>
								</div>

								<table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
									<thead>
									<tr>
										<th>Name</th>
										<th>Position</th>
										<th>Office</th>
										<th>Age</th>
										<th>Start date</th>
										<th>Salary</th>
									</tr>
									</thead>


									<tbody>
									<tr>
										<td>Tiger Nixon</td>
										<td>System Architect</td>
										<td>Edinburgh</td>
										<td>61</td>
										<td>2011/04/25</td>
										<td>$320,800</td>
									</tr>
									<tr>
										<td>Garrett Winters</td>
										<td>Accountant</td>
										<td>Tokyo</td>
										<td>63</td>
										<td>2011/07/25</td>
										<td>$170,750</td>
									</tr>
									<tr>
										<td>Ashton Cox</td>
										<td>Junior Technical Author</td>
										<td>San Francisco</td>
										<td>66</td>
										<td>2009/01/12</td>
										<td>$86,000</td>
									</tr>
									<tr>
										<td>Cedric Kelly</td>
										<td>Senior Javascript Developer</td>
										<td>Edinburgh</td>
										<td>22</td>
										<td>2012/03/29</td>
										<td>$433,060</td>
									</tr>
									<tr>
										<td>Airi Satou</td>
										<td>Accountant</td>
										<td>Tokyo</td>
										<td>33</td>
										<td>2008/11/28</td>
										<td>$162,700</td>
									</tr>
									<tr>
										<td>Brielle Williamson</td>
										<td>Integration Specialist</td>
										<td>New York</td>
										<td>61</td>
										<td>2012/12/02</td>
										<td>$372,000</td>
									</tr>
									<tr>
										<td>Herrod Chandler</td>
										<td>Sales Assistant</td>
										<td>San Francisco</td>
										<td>59</td>
										<td>2012/08/06</td>
										<td>$137,500</td>
									</tr>
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