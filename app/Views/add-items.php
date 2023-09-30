<?= view('/admin/top'); ?>

<body>
    <div class="container-xl">

        <div id="addEmployeeModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="edit">
                        <form method="post" action="/save">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Item</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="image">Item Image</label>
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
                                    <textarea class="form-control" id="description" name="description" rows="4"
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

</body>

</html>