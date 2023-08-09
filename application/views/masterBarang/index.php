<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">
                            <?= $title ?>
                        </h4>

                        <div class="page-title-right">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Create Product</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Product</th>
                                        <th>DESC</th>
                                        <th>Stock</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($data as $m): ?>
                                    <tr>
                                        <td>
                                            <?= $i ?>
                                        </td>
                                        <td>
                                            <?= $m['barang_name'] ?>
                                        </td>
                                        <td>
                                            <?= $m['barang_desc'] ?>
                                        </td>
                                        <td>
                                            <?= $m['barang_stock'] ?>
                                        </td>
                                        <td>
                                            <ul class="list-unstyled hstack gap-1 mb-0">
                                                <li data-bs-toggle="modal" data-bs-target="#viewProductModal"
                                                    id="detailProduct" data-nameMV="<?= $m['barang_name'] ?>"
                                                    data-descMV="<?= $m['barang_desc'] ?>"
                                                    data-stockMV="<?= $m['barang_stock'] ?>">
                                                    <a class="btn btn-sm btn-soft-primary"><i
                                                            class="mdi mdi-eye-outline"></i></a>
                                                </li>
                                                <li data-bs-toggle="modal" data-bs-target="#updateProductModal"
                                                    id="updateProduct" data-idMU="<?= $m['barang_id'] ?>"
                                                    data-nameMU="<?= $m['barang_name'] ?>"
                                                    data-descMU="<?= $m['barang_desc'] ?>"
                                                    data-stockMU="<?= $m['barang_stock'] ?>">
                                                    <a class="btn btn-sm btn-soft-info"><i
                                                            class="mdi mdi-pencil-outline"></i></a>
                                                </li>
                                                <li data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                    id="deleteTower" data-idMD="<?= $m['barang_id'] ?>">
                                                    <a class="btn btn-sm btn-soft-danger"><i
                                                            class="mdi mdi-delete-outline"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

            <!-- MODAL -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="nameM" required
                                        placeholder="Type Product Name" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Product Desc</label>
                                    <input type="text" class="form-control" id="descM" required
                                        placeholder="Type Product Desc" />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Product Stock</label>
                                    <div>
                                        <input type="number" class="form-control" id="stockM" required
                                            placeholder="Type Stock" />
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="process">Create Product</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- updateFloorModal -->
            <div class="modal fade" id="updateProductModal" tabindex="-1" aria-labelledby="updateProductLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateProductLabel">Update Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <input type="hidden" class="form-control" id="idMU">
                                <div class="mb-3">
                                    <label class="form-label">Product Name</label>
                                    <div>
                                        <input type="text" class="form-control" id="nameMU" required
                                            placeholder="Type product name" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Product Desc</label>
                                    <div>
                                        <input type="text" class="form-control" id="descMU" required
                                            placeholder="Type product name" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Product Stock </label>
                                    <input type="number" class="form-control" id="stockMU" required
                                        placeholder="Type stock" />
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="updateProcess">Update Product</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- viewTowerModal -->
            <div class="modal fade" id="viewProductModal" tabindex="-1" aria-labelledby="viewProductModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewProductModalLabel">Detail Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="nameMV" disabled />
                                    <label class="form-label">Product Desc</label>
                                    <input type="text" class="form-control" id="descMV" disabled />
                                    <label class="form-label">Product Stock</label>
                                    <input type="text" class="form-control" id="stockMV" disabled />
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DeleteModal -->
            <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Delete Tower</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="idMD">
                            <p>Are you sure you want to delete this data floor?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">No</button>
                            <button type="button" class="btn btn-primary" id="deleteMD">Yes</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


</div>
<!-- end main content-->

<script>
$(document).ready(function($) {
    $(document).on('click', '#process', function() {
        var name = $("#nameM").val();
        var stock = $("#stockM").val();
        var desc = $("#descM").val();

        if (name != null && name !== "") {
            if (stock != null && stock !== "") {
                $.ajax({
                    url: "masterBarang/createProduct",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        "name": name,
                        "stock": stock,
                        "desc": desc,
                        "_token": "{{ csrf_token() }}"
                    },

                    success: function(result) {
                        console.log(result);
                        if (result.success) {
                            location.reload();
                        } else {
                            alert(result.error);
                            //location.reload();
                        }
                    }
                });
            } else {
                alert('Your stock is empty, please fill it in first');
            }
        } else {
            alert('Your product is empty, please fill it in first');
        }
    });

    $(document).on('click', '#detailProduct', function() {
        name = $(this).attr('data-nameMV');
        stock = $(this).attr('data-stockMV');
        desc = $(this).attr('data-descMV');

        $('#nameMV').val(name);
        $('#stockMV').val(stock);
        $('#descMV').val(desc);
    });

    $(document).on('click', '#updateProduct', function() {
        id = $(this).attr('data-idMU');
        name = $(this).attr('data-nameMU');
        stock = $(this).attr('data-stockMU');
        desc = $(this).attr('data-descMU');

        $('#idMU').val(id);
        $('#nameMU').val(name);
        $('#stockMU').val(stock);
        $('#descMU').val(desc);
    });

    $(document).on('click', '#updateProcess', function() {
        var id = $('#idMU').val();
        var name = $("#nameMU").val();
        var stock = $("#stockMU").val();
        var desc = $("#descMU").val();

        if (name != null && name !== "") {
            if (stock != null && stock !== "") {
                $.ajax({
                    url: "masterBarang/updateProduct",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        "id": id,
                        "name": name,
                        "stock": stock,
                        "desc": desc,
                        "_token": "{{ csrf_token() }}"
                    },

                    success: function(result) {
                        console.log(result);
                        if (result.success) {
                            location.reload();
                        } else {
                            alert(result.error);
                            //location.reload();
                        }
                    }
                });
            } else {
                alert('Your desc is empty, please fill it in first');
            }
        } else {
            alert('Your name is empty, please fill it in first');
        }
    });

    $(document).on('click', '#deleteTower', function() {
        id = $(this).attr('data-idMD');

        $('#idMD').val(id);
    });

    $(document).on('click', '#deleteMD', function() {
        var id = $("#idMD").val();

        if (id != null && id !== "") {
            $.ajax({
                url: "masterBarang/deleteProduct",
                type: 'post',
                dataType: 'json',
                data: {
                    "id": id,
                    "_token": "{{ csrf_token() }}"
                },

                success: function(result) {
                    console.log(result);
                    if (result.success) {
                        location.reload();
                    } else {
                        alert(result.error);
                        //location.reload();
                    }
                }
            });
        } else {
            alert('Your id is empty');
        }
    });
});
</script>