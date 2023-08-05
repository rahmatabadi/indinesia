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
                                data-bs-target="#exampleModal">Create Unit</button>
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
                                        <th>Unit</th>
                                        <th>Unit Desc</th>
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
                                            <a href="masterUnit?floorId=<?= $m['tower_id'] ?>">
                                                <?= $m['tower_name'] ?>
                                            </a>

                                        </td>
                                        <td>
                                            <?= $m['floor_number'] ?>
                                        </td>
                                        <td>
                                            <?= $m['unit_number'] ?>
                                        </td>
                                        <td>
                                            <?= $m['unit_desc'] ?>
                                        </td>
                                        <td>
                                            <ul class="list-unstyled hstack gap-1 mb-0">
                                                <li data-bs-toggle="modal" data-bs-target="#viewUnitModal"
                                                    id="detailUnit" data-tnameMV="<?= $m['tower_name'] ?>"
                                                    data-fnumberMV="<?= $m['floor_number'] ?>"
                                                    data-numberMV="<?= $m['unit_number'] ?>"
                                                    data-descMV="<?= $m['unit_desc'] ?>">
                                                    <a class="btn btn-sm btn-soft-primary"><i
                                                            class="mdi mdi-eye-outline"></i></a>
                                                </li>
                                                <li data-bs-toggle="modal" data-bs-target="#updateUnitModal"
                                                    id="updateUnit" data-idMU="<?= $m['unit_id'] ?>"
                                                    data-numberMU="<?= $m['unit_number'] ?>"
                                                    data-descMU="<?= $m['unit_desc'] ?>"
                                                    data-tnameMU="<?= $m['tower_name'] ?>"
                                                    data-fnumberMU="<?= $m['floor_number'] ?>">
                                                    <a class="btn btn-sm btn-soft-info"><i
                                                            class="mdi mdi-pencil-outline"></i></a>
                                                </li>
                                                <li data-bs-toggle="modal" data-bs-target="#deleteModal" id="deleteUnit"
                                                    data-idMD="<?= $m['unit_id'] ?>">
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
                            <h5 class="modal-title" id="exampleModalLabel">Create Unit</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <input type="hidden" class="form-control" id="floorIdM" value="<?= $floorId ?>">
                                <div class="mb-3">
                                    <label class="form-label">Unit Number </label>
                                    <input type="text" class="form-control" id="unitNumberM" required
                                        placeholder="Type unit number" />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Unit Desc</label>
                                    <div>
                                        <input type="text" class="form-control" id="unitDescM" required
                                            placeholder="Type unit desc" />
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="process">Create Unit</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- updateUnitModal -->
            <div class="modal fade" id="updateUnitModal" tabindex="-1" aria-labelledby="updateUnitLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateUnitLabel">Update Unit</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <input type="hidden" class="form-control" id="unitIdMU">
                                <div class="mb-3">
                                    <label class="form-label">Tower Name</label>
                                    <div>
                                        <input type="text" class="form-control" id="tnameMU" disabled
                                            placeholder="Type floor desc" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Floor</label>
                                    <div>
                                        <input type="text" class="form-control" id="fnumberMU" disabled
                                            placeholder="Type floor desc" />
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Unit </label>
                                    <input type="number" class="form-control" id="unitNumberMU" required
                                        placeholder="Type unit" />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Unit Desc</label>
                                    <div>
                                        <input type="text" class="form-control" id="unitDescMU" required
                                            placeholder="Type unit desc" />
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="updateProcess">Update Unit</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- viewTowerModal -->
            <div class="modal fade" id="viewUnitModal" tabindex="-1" aria-labelledby="viewUnitModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewUnitModalLabel">Detail Unit</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label">Tower Name</label>
                                    <input type="text" class="form-control" id="towerNameMV" disabled />
                                    <label class="form-label">Floor</label>
                                    <input type="text" class="form-control" id="floorNumberMV" disabled />
                                    <label class="form-label">Unit</label>
                                    <input type="text" class="form-control" id="unitNumberMV" disabled />
                                    <label class="form-label">Unit Desc</label>
                                    <input type="text" class="form-control" id="unitDescMV" rows="5" disabled />
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
                            <p>Are you sure you want to delete this data unit?</p>
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
        var id = $("#floorIdM").val();
        var number = $("#unitNumberM").val();
        var desc = $("#unitDescM").val();

        if (number != null && number !== "") {
            if (desc != null && desc !== "") {
                $.ajax({
                    url: "masterUnit/createUnit",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        "floorId": id,
                        "number": number,
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
            alert('Your unit number is empty, please fill it in first');
        }
    });

    $(document).on('click', '#detailUnit', function() {
        name = $(this).attr('data-tnameMV');
        fnumber = $(this).attr('data-fnumberMV');
        number = $(this).attr('data-numberMV');
        desc = $(this).attr('data-descMV');

        $('#towerNameMV').val(name);
        $('#floorNumberMV').val(fnumber);
        $('#unitNumberMV').val(number);
        $('#unitDescMV').val(desc);
    });

    $(document).on('click', '#updateUnit', function() {
        unitId = $(this).attr('data-idMU');
        unitNumber = $(this).attr('data-numberMU');
        unitDesc = $(this).attr('data-descMU');
        towerName = $(this).attr('data-tnameMU');
        floorNumber = $(this).attr('data-fnumberMU');

        $('#unitIdMU').val(unitId);
        $('#tnameMU').val(towerName);
        $('#fnumberMU').val(floorNumber);
        $('#unitNumberMU').val(unitNumber);
        $('#unitDescMU').val(unitDesc);
    });

    $(document).on('click', '#updateProcess', function() {
        var id = $('#unitIdMU').val();
        var number = $("#unitNumberMU").val();
        var desc = $("#unitDescMU").val();


        if (number != null && number !== "") {
            if (desc != null && desc !== "") {
                $.ajax({
                    url: "masterUnit/updateUnit",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        "id": id,
                        "number": number,
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
            alert('Your unit is empty, please fill it in first');
        }
    });

    $(document).on('click', '#deleteUnit', function() {
        id = $(this).attr('data-idMD');

        $('#idMD').val(id);
    });

    $(document).on('click', '#deleteMD', function() {
        var id = $("#idMD").val();

        if (id != null && id !== "") {
            $.ajax({
                url: "masterUnit/deleteUnit",
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
                    }
                }
            });
        } else {
            alert('Your id is empty');
        }
    });
});
</script>