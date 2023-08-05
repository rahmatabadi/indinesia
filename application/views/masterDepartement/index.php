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
                                data-bs-target="#exampleModal">Create Departement</button>
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
                                            <?= $m['departement_name'] ?>
                                        </td>
                                        <td>
                                            <ul class="list-unstyled hstack gap-1 mb-0">
                                                <li data-bs-toggle="modal" data-bs-target="#viewDepartementModal"
                                                    id="detailDepartement" data-nameMV="<?= $m['departement_name'] ?>">
                                                    <a class="btn btn-sm btn-soft-primary"><i
                                                            class="mdi mdi-eye-outline"></i></a>
                                                </li>
                                                <li data-bs-toggle="modal" data-bs-target="#updateDepartementModal"
                                                    id="updateDepartement" data-idMU="<?= $m['id'] ?>"
                                                    data-nameMU="<?= $m['departement_name'] ?>">
                                                    <a class="btn btn-sm btn-soft-info"><i
                                                            class="mdi mdi-pencil-outline"></i></a>
                                                </li>
                                                <li data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                    id="deleteTower" data-idMD="<?= $m['id'] ?>">
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
                            <h5 class="modal-title" id="exampleModalLabel">Create Departement</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label">Departement Name </label>
                                    <input type="text" class="form-control" id="departementNameM" required
                                        placeholder="Type departement name" />
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="process">Create Departement</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- updateDepartementModal -->
            <div class="modal fade" id="updateDepartementModal" tabindex="-1" aria-labelledby="updateDepartementLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateDepartementLabel">Update Departement</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <input type="hidden" class="form-control" id="departementIdMU">
                                <div class="mb-3">
                                    <label class="form-label">Departement Name </label>
                                    <input type="text" class="form-control" id="departementNameMU" required
                                        placeholder="Type Departement Name" />
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="updateProcess">Update Departement</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- viewDepartementModal -->
            <div class="modal fade" id="viewDepartementModal" tabindex="-1" aria-labelledby="viewDepartementModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewDepartementModalLabel">Detail Departement</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
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
                            <h5 class="modal-title" id="deleteModalLabel">Delete Departement</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="idMD">
                            <p>Are you sure you want to delete this data departement?</p>
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
        var name = $("#departementNameM").val();

        if (name != null && name !== "") {
            $.ajax({
                url: "masterDepartement/createDepartement",
                type: 'post',
                dataType: 'json',
                data: {
                    "name": name,
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
            alert('Your departement name is empty, please fill it in first');
        }
    });

    $(document).on('click', '#detailDepartement', function() {
        name = $(this).attr('data-nameMV');

        $('#departementNameMV').val(name);
    });

    $(document).on('click', '#updateDepartement', function() {
        id = $(this).attr('data-idMU');
        name = $(this).attr('data-nameMU');
        console.log('On Click Update');
        console.log(id + name);

        $('#departementIdMU').val(id);
        $('#departementNameMU').val(name);
    });

    $(document).on('click', '#updateProcess', function() {
        var id = $('#departementIdMU').val();
        var name = $("#departementNameMU").val();
        console.log('A');
        if (name != null && name !== "") {
            $.ajax({
                url: "masterDepartement/updateDepartement",
                type: 'post',
                dataType: 'json',
                data: {
                    "id": id,
                    "name": name,
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
            alert('Your departement name is empty, please fill it in first');
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
                url: "masterDepartement/deleteDepartement",
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