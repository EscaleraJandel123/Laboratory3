<?= view('/admin/top'); ?>
<body>
	<div class="container-xl">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-sm-6">
							<h2>Manage <b>Fruits</b></h2>
						</div>
						<div class="col-sm-6">
						<a href="/logout" class="btn btn-danger"><i class="material-icons">&#xE879;</i> <span>Log Out</span></a>
						</div>
					</div>
				</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>

							<th>image</th>
							<th>Item Name</th>
							<th>Item Description</th>
							<th>Item Price</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php if (isset($items)):
							foreach ($items as $item): ?>
								<tr>

									<td><img src="/uploads/<?= $item['image']; ?>" alt="<?= $item['name']; ?>" width="100"></td>

									<td>
										<?= $item['name']; ?>
									</td>
									<td>
										<?= $item['description']; ?>
									</td>
									<td>
										<?= $item['price']; ?>
									</td>
									<td>
										<a href="/edit/<?= $item['id'] ?>" class="edit"><i
												class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a></a>
										<a href="/delete/<?= $item['id'] ?>" class="delete"><i data-toggle="tooltip" class="material-icons"
												title="Delete">&#xE872;</i></a>
									</td>
								</tr>
							<?php endforeach; else: ?>
							<tr>
								<td colspan="4">No items found</td>
							</tr>
						<?php endif; ?>
					</tbody>
				</table>
				
				<div class="clearfix">

					<!-- <ul class="pagination">
					<li class="page-item disabled"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul> -->
				</div>
			</div>

		</div>
		<div id="addEmployeeModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="edit">
                        <form method="post" action="/save" enctype="multipart/form-data">
                            <div class="modal-header" style="background-color: #0d4680;">
                                <h4 class="modal-title" style="color: white;">Manage Fruits</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="image">Item Image</label>
									<input type="hidden" name="id" value="<?= isset($pro['id']) ? $pro['id'] : '' ?>">
                                    <input type="file" class="form-control-file" id="image" name="image"
                                        accept="image/*" required>
                                </div>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required
                                        value="<?= isset($pro['name']) ? $pro['name'] : '' ?>">
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3"
                                        required><?= isset($pro['description']) ? $pro['description'] : '' ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control" id="price" name="price" required
                                        value="<?= isset($pro['price']) ? $pro['price'] : '' ?>">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="/admin" class="btn btn-secondary">Cancel</a>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
	</div>
</body>

</html>