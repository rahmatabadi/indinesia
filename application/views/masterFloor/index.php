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
                                data-bs-target="#exampleModal">Create Floor</button>
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
                                        <th>Floor</th>
                                        <th>Floor Desc</th>
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
                                                <?= $m['tower_name'] ?>
                                            </td>
                                            <td>
                                                <a
                                                    href="masterUnit?floorId=<?= $m['floor_id'] ?>&towerId=<?= $m['tower_id'] ?>">
                                                    <?= $m['floor_number'] ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?= $m['floor_desc'] ?>
                                            </td>
                                            <td>
                                                <ul class="list-unstyled hstack gap-1 mb-0">
                                                    <li data-bs-toggle="modal" data-bs-target="#viewFloorModal"
                                                        id="detailFloor" data-tnameMV="<?= $m['tower_name'] ?>"
                                                        data-numberMV="<?= $m['floor_number'] ?>"
                                                        data-descMV="<?= $m['floor_desc'] ?>">
                                                        <a class="btn btn-sm btn-soft-primary"><i
                                                                class="mdi mdi-eye-outline"></i></a>
                                                    </li>
                                                    <li data-bs-toggle="modal" data-bs-target="#updateFloorModal"
                                                        id="updateTower" data-idMU="<?= $m['floor_id'] ?>"
                                                        data-numberMU="<?= $m['floor_number'] ?>"
                                                        data-descMU="<?= $m['floor_desc'] ?>"
                                                        data-tnameMU="<?= $m['tower_name'] ?>">
                                                        <a class="btn btn-sm btn-soft-info"><i
                                                                class="mdi mdi-pencil-outline"></i></a>
                                                    </li>
                                                    <li data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                        id="deleteTower" data-idMD="<?= $m['floor_id'] ?>">
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
                            <h5 class="modal-title" id="exampleModalLabel">Create Floor</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <input type="hidden" class="form-control" id="towerIdM" value="<?= $towerId ?>">
                                <div class="mb-3">
                                    <label class="form-label">Floor Number </label>
                                    <input type="text" class="form-control" id="floorNumberM" required
                                        placeholder="Type floor number" />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Floor Desc</label>
                                    <div>
                                        <input type="text" class="form-control" id="floorDescM" required
                                            placeholder="Type floor desc" />
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="process">Create Floor</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- updateFloorModal -->
            <div class="modal fade" id="updateFloorModal" tabindex="-1" aria-labelledby="updateTowerLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateTowerLabel">Update Floor</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <input type="hidden" class="form-control" id="floorIdMU">
                                <div class="mb-3">
                                    <label class="form-label">Tower Name</label>
                                    <div>
                                        <input type="text" class="form-control" id="nameMU" disabled
                                            placeholder="Type floor desc" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Floor </label>
                                    <input type="number" class="form-control" id="floorNumberMU" required
                                        placeholder="Type floor" />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Floor Desc</label>
                                    <div>
                                        <input type="text" class="form-control" id="floorDescMU" required
                                            placeholder="Type floor desc" />
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="updateProcess">Update Floor</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- viewTowerModal -->
            <div class="modal fade" id="viewFloorModal" tabindex="-1" aria-labelledby="viewFloorModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewFloorModalLabel">Detail Floor</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label">Tower Name</label>
                                    <input type="text" class="form-control" id="towerNameMV" disabled />
                                    <label class="form-label">Floor</label>
                                    <input type="text" class="form-control" id="floorNumberMV" disabled />
                                    <label class="form-label">Floor Desc</label>
                                    <input type="text" class="form-control" id="floorDescMV" rows="5" disabled />
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
    $(document).ready(function ($) {
        $(document).on('click', '#process', function () {
            console.log('clicked');
            var id = $("#towerIdM").val();
            var number = $("#floorNumberM").val();
            var desc = $("#floorDescM").val();

            if (number != null && number !== "") {
                if (desc != null && desc !== "") {
                    $.ajax({
                        url: "masterFloor/createFloor",
                        type: 'post',
                        dataType: 'json',
                        data: {
                            "towerId": id,
                            "number": number,
                            "desc": desc,
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
                    alert('Your desc is empty, please fill it in first');
                }
            } else {
                alert('Your floor number is empty, please fill it in first');
            }
        });

        $(document).on('click', '#detailFloor', function () {
            name = $(this).attr('data-tnameMV');
            number = $(this).attr('data-numberMV');
            desc = $(this).attr('data-descMV');

            $('#towerNameMV').val(name);
            $('#floorNumberMV').val(number);
            $('#floorDescMV').val(desc);
        });

        $(document).on('click', '#updateTower', function () {
            floorId = $(this).attr('data-idMU');
            floorNumber = $(this).attr('data-numberMU');
            floorDesc = $(this).attr('data-descMU');
            towerName = $(this).attr('data-tnameMU');

            $('#floorIdMU').val(floorId);
            $('#nameMU').val(towerName);
            $('#floorNumberMU').val(floorNumber);
            $('#floorDescMU').val(floorDesc);
        });

        $(document).on('click', '#updateProcess', function () {
            var id = $('#floorIdMU').val();
            var number = $("#floorNumberMU").val();
            var desc = $("#floorDescMU").val();


            if (number != null && number !== "") {
                if (desc != null && desc !== "") {
                    $.ajax({
                        url: "masterFloor/updateFloor",
                        type: 'post',
                        dataType: 'json',
                        data: {
                            "id": id,
                            "number": number,
                            "desc": desc,
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
                    alert('Your desc is empty, please fill it in first');
                }
            } else {
                alert('Your name is empty, please fill it in first');
            }
        });

        $(document).on('click', '#deleteTower', function () {
            id = $(this).attr('data-idMD');

            $('#idMD').val(id);
        });

        $(document).on('click', '#deleteMD', function () {
            var id = $("#idMD").val();

            if (id != null && id !== "") {
                $.ajax({
                    url: "masterFloor/deleteFloor",
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