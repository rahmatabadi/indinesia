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
                                data-bs-target="#exampleModal">Create Category Complaint</button>
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
                                        <th>Category</th>
                                        <th>Departement</th>
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
                                                <?= $m['category_complaint_name'] ?>
                                            </td>
                                            <td>
                                                <?= $m['departement_name'] ?>
                                            </td>
                                            <td>
                                                <ul class="list-unstyled hstack gap-1 mb-0">
                                                    <li data-bs-toggle="modal" data-bs-target="#viewCategoryModal"
                                                        id="detailCategory"
                                                        data-nameMV="<?= $m['category_complaint_name'] ?>"
                                                        data-descMV="<?= $m['category_complaint_desc'] ?>"
                                                        data-tnameMV="<?= $m['departement_name'] ?>">
                                                        <a class="btn btn-sm btn-soft-primary"><i
                                                                class="mdi mdi-eye-outline"></i></a>
                                                    </li>
                                                    <li data-bs-toggle="modal" data-bs-target="#updateCategoryModal"
                                                        id="updateCategory" data-idMU="<?= $m['category_complaint_id'] ?>"
                                                        data-nameMU="<?= $m['category_complaint_name'] ?>"
                                                        data-descMU="<?= $m['category_complaint_desc'] ?>"
                                                        data-didMU="<?= $m['id'] ?>">
                                                        <a class="btn btn-sm btn-soft-info"><i
                                                                class="mdi mdi-pencil-outline"></i></a>
                                                    </li>
                                                    <li data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                        id="deleteEmployee" data-idMD="<?= $m['category_complaint_id'] ?>">
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
                            <h5 class="modal-title" id="exampleModalLabel">Create Category Complaint</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label">Category Name </label>
                                    <input type="text" class="form-control" id="categoryNameM" required
                                        placeholder="Type category name" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Category Desc </label>
                                    <input type="text" class="form-control" id="categoryDescM" required
                                        placeholder="Type category desc" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Departement </label>
                                    <select class="form-select" id="departementSelectM">
                                        <option value="0">Select</option>
                                        <?php foreach ($departement as $d): ?>
                                            <option value="<?= $d['id'] ?>"><?= $d['departement_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="process">Create Category
                                Complaint</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- updateCategoryModal -->
            <div class="modal fade" id="updateCategoryModal" tabindex="-1" aria-labelledby="updateCategoryLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateCategoryLabel">Update Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <input type="hidden" class="form-control" id="categoryIdMU">
                                <div class="mb-3">
                                    <label class="form-label">Category Name </label>
                                    <input type="text" class="form-control" id="categoryNameMU" required
                                        placeholder="Type employee name" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Category Desc </label>
                                    <input type="tel" class="form-control" id="categoryDescMU" required
                                        placeholder="Type employee phone" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Departement </label>
                                    <select class="form-select" id="departementSelectMU">
                                        <option value="0">Select</option>
                                        <?php foreach ($departement as $d): ?>
                                            <option value="<?= $d['id'] ?>"><?= $d['departement_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="updateProcess">Update Category</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- viewDepartementModal -->
            <div class="modal fade" id="viewCategoryModal" tabindex="-1" aria-labelledby="viewCategoryModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewCategoryModalLabel">Detail Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label">Category Name</label>
                                    <input type="text" class="form-control" id="categoryNameMV" disabled />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Category Desc</label>
                                    <input type="text" class="form-control" id="categoryDescMV" disabled />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Departement Name</label>
                                    <input type="text" class="form-control" id="departementNameMV" disabled />
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
                            <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="idMD">
                            <p>Are you sure you want to delete this data category?</p>
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
    $(document).ready(function ($) {
        $(document).on('click', '#process', function () {
            var name = $("#categoryNameM").val();
            var desc = $("#categoryDescM").val();
            var departement = $("#departementSelectM").val();

            if (name != null && name !== "") {
                if (desc != null && desc !== "") {
                    if (departement != null && departement !== "") {
                        $.ajax({
                            url: "masterComplaint/createComplaint",
                            type: 'post',
                            dataType: 'json',
                            data: {
                                "name": name,
                                "desc": desc,
                                "departement": departement,
                                "_token": "{{ csrf_token() }}"
                            },

                            success: function (result) {
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
                        alert('Your departement is empty, please fill it in first');
                    }
                } else {
                    alert('Your desc is empty, please fill it in first');
                }

            } else {
                alert('Your category name is empty, please fill it in first');
            }
        });

        $(document).on('click', '#detailCategory', function () {
            name = $(this).attr('data-nameMV');
            desc = $(this).attr('data-descMV');
            tname = $(this).attr('data-tnameMV');

            $('#categoryNameMV').val(name);
            $('#categoryDescMV').val(desc);
            $('#departementNameMV').val(tname);
        });

        $(document).on('click', '#updateCategory', function () {
            id = $(this).attr('data-idMU');
            name = $(this).attr('data-nameMU');
            desc = $(this).attr('data-descMU');
            departementId = $(this).attr('data-didMU');

            $('#categoryIdMU').val(id);
            $('#categoryNameMU').val(name);
            $('#categoryDescMU').val(desc);
            document.getElementById('departementSelectMU').value = departementId;
        });

        $(document).on('click', '#updateProcess', function () {
            var id = $('#categoryIdMU').val();
            var name = $("#categoryNameMU").val();
            var desc = $("#categoryDescMU").val();
            var departementId = $("#departementSelectMU").val();

            if (name != null && name !== "") {
                if (desc != null && desc !== "") {
                    if (departementId != null && departementId !== "") {
                        $.ajax({
                            url: "masterComplaint/updateComplaint",
                            type: 'post',
                            dataType: 'json',
                            data: {
                                "id": id,
                                "name": name,
                                "desc": desc,
                                "departementId": departementId,
                                "_token": "{{ csrf_token() }}"
                            },

                            success: function (result) {
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
                        alert('Your departement is empty, please fill it in first');
                    }
                } else {
                    alert('Your category desc is empty, please fill it in first');
                }
            } else {
                alert('Your category name is empty, please fill it in first');
            }
        });

        $(document).on('click', '#deleteEmployee', function () {
            id = $(this).attr('data-idMD');

            $('#idMD').val(id);
        });

        $(document).on('click', '#deleteMD', function () {
            var id = $("#idMD").val();

            if (id != null && id !== "") {
                $.ajax({
                    url: "masterComplaint/deleteComplaint",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        "id": id,
                        "_token": "{{ csrf_token() }}"
                    },

                    success: function (result) {
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