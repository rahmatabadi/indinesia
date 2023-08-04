<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Master Room</h4>

                        <div class="page-title-right">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Create Tower</button>
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
                                        <th>Tower</th>
                                        <th>Desc</th>
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
                                            <a href="masterRoom/detailTower/<?= $m['tower_id'] ?>">
                                                <?= $m['tower_name'] ?>
                                            </a>

                                        </td>
                                        <td>
                                            <?= $m['tower_desc'] ?>
                                        </td>
                                        <td>
                                            <ul class="list-unstyled hstack gap-1 mb-0">
                                                <li data-bs-toggle="modal" data-bs-target="#viewTowerModal"
                                                    id="detailTower" data-nameMV="<?= $m['tower_name'] ?>"
                                                    data-descMV="<?= $m['tower_desc'] ?>">
                                                    <a class="btn btn-sm btn-soft-primary"><i
                                                            class="mdi mdi-eye-outline"></i></a>
                                                </li>
                                                <li data-bs-toggle="modal" data-bs-target="#updateTowerModal"
                                                    id="updateTower" data-idMU="<?= $m['tower_id'] ?>"
                                                    data-nameMU="<?= $m['tower_name'] ?>"
                                                    data-descMU="<?= $m['tower_desc'] ?>">
                                                    <a class="btn btn-sm btn-soft-info"><i
                                                            class="mdi mdi-pencil-outline"></i></a>
                                                </li>
                                                <li data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                    id="deleteTower" data-idMD="<?= $m['tower_id'] ?>">
                                                    <a class="btn btn-sm btn-soft-danger"><i
                                                            class="mdi mdi-delete-outline"></i></a>
                                                </li>
                                                <!-- <li>
                                                        <a class="btn btn-sm btn-soft-info"><i
                                                                class="mdi mdi-pencil-outline"></i></a>
                                                    </li>
                                                    <li data-bs-toggle="modal" data-bs-target="#viewTowerModal"
                                                        id="detailTower" data-nameMV="<?= $m['tower_name'] ?>"
                                                        data-descMV="<?= $m['tower_desc'] ?>">
                                                        <a href="#jobDelete" data-bs-toggle="modal"
                                                            class="btn btn-sm btn-soft-danger"><i
                                                                class="mdi mdi-delete-outline"></i></a>
                                                    </li> -->
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
                            <h5 class="modal-title" id="exampleModalLabel">Create Tower</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label">Tower Name </label>
                                    <input type="text" class="form-control" id="towerNameM" required
                                        placeholder="Type tower name" />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Tower Desc</label>
                                    <div>
                                        <input type="text" class="form-control" id="towerDescM" required
                                            placeholder="Type tower desc" />
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="process">Create Tower</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- updateTowerModal -->
            <div class="modal fade" id="updateTowerModal" tabindex="-1" aria-labelledby="updateTowerLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateTowerLabel">Update Tower</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <input type="hidden" class="form-control" id="towerIdMU">
                                <div class="mb-3">
                                    <label class="form-label">Tower Name </label>
                                    <input type="text" class="form-control" id="towerNameMU" required
                                        placeholder="Type tower name" />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Tower Desc</label>
                                    <div>
                                        <input type="text" class="form-control" id="towerDescMU" required
                                            placeholder="Type tower desc" />
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="updateProcess">Update Tower</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- viewTowerModal -->
            <div class="modal fade" id="viewTowerModal" tabindex="-1" aria-labelledby="viewTowerModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewTowerModalLabel">Detail Tower</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label">Tower Name</label>
                                    <input type="text" class="form-control" id="towerNameMV" disabled />
                                    <label class="form-label">Tower Desc</label>
                                    <input type="text" class="form-control" id="towerDescMV" rows="5" disabled />
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
                            <p>Are you sure you want to delete this data tower?</p>
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
        console.log('clicked');
        var name = $("#towerNameM").val();
        var desc = $("#towerDescM").val();

        if (name != null && name !== "") {
            if (desc != null && desc !== "") {
                $.ajax({
                    url: "masterRoom/createTower",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        "name": name,
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

    $(document).on('click', '#detailTower', function() {
        name = $(this).attr('data-nameMV');
        desc = $(this).attr('data-descMV');

        $('#towerNameMV').val(name);
        $('#towerDescMV').val(desc);
    });

    $(document).on('click', '#updateTower', function() {
        id = $(this).attr('data-idMU');
        name = $(this).attr('data-nameMU');
        desc = $(this).attr('data-descMU');

        $('#towerIdMU').val(id);
        $('#towerNameMU').val(name);
        $('#towerDescMU').val(desc);
    });

    $(document).on('click', '#updateProcess', function() {
        var id = $('#towerIdMU').val();
        var name = $("#towerNameMU").val();
        var desc = $("#towerDescMU").val();
        console.log(id + name + desc)
        if (name != null && name !== "") {
            if (desc != null && desc !== "") {
                $.ajax({
                    url: "masterRoom/updateTower",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        "id": id,
                        "name": name,
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
                url: "masterRoom/deleteTower",
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