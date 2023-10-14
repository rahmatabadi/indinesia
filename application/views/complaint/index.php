<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Complaint</h4>

                        <div class="page-title-right">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Create Complaint</button>
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
                                        <th>Id Complaint</th>
                                        <th>Tower</th>
                                        <th>Floor</th>
                                        <th>Unit</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Complaint</th>
                                        <th>Assign</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
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
                                                <?= $m['id_c'] ?>
                                            </td>
                                            <td>
                                                <?= $m['tower_name'] ?>
                                            </td>
                                            <td>
                                                <?= $m['floor_number'] ?>
                                            </td>
                                            <td>
                                                <?= $m['unit_number'] ?>
                                            </td>
                                            <td>
                                                <?= $m['name'] ?>
                                            </td>
                                            <td>
                                                <?= $m['phone'] ?>
                                            </td>
                                            <td>
                                                <?= $m['message'] ?>
                                            </td>
                                            <td>
                                                <?= $m['departement_name'] ?>
                                            </td>
                                            <td>
                                                <?= $m['created_date'] ?>
                                            </td>
                                            <td>
                                                <?php if ($m['status'] == 1): ?>
                                                    <span class="badge bg-info">
                                                        <?= $m['desc'] ?>
                                                    </span>
                                                <?php elseif ($m['status'] == 2): ?>
                                                    <span class="badge bg-warning">
                                                        <?= $m['desc'] ?>
                                                    </span>
                                                <?php elseif ($m['status'] == 3): ?>
                                                    <span class="badge bg-success">
                                                        <?= $m['desc'] ?>
                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <ul class="list-unstyled hstack gap-1 mb-0">
                                                    <li id="viewDetail" data-idCR="<?= $m['id_c'] ?>">
                                                        <a class="btn btn-sm btn-soft-primary"><i
                                                                class="mdi mdi-eye-outline"></i></a>
                                                    </li>
                                                    <?php if ($m['status'] == 1): ?>
                                                        <li data-bs-toggle="modal" data-bs-target="#updateModal" id="update"
                                                            data-idMU="<?= $m['id_c'] ?>" data-nameMU="<?= $m['name'] ?>"
                                                            data-phoneMU="<?= $m['phone'] ?>"
                                                            data-towerMU="<?= $m['tower_id'] ?>"
                                                            data-floorMU="<?= $m['floor_id'] ?>"
                                                            data-unitMU="<?= $m['unit_id'] ?>"
                                                            data-messageMU="<?= $m['message'] ?>"
                                                            data-createdDateMU="<?= $m['created_date'] ?>"
                                                            data-assignMU="<?= $m['assign'] ?>">
                                                            <a class="btn btn-sm btn-soft-info"><i
                                                                    class="mdi mdi-pencil-outline"></i></a>
                                                        </li>

                                                        <li data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                            id="deleteComplaint" data-idMD="<?= $m['id_c'] ?>">
                                                            <a class="btn btn-sm btn-soft-danger"><i
                                                                    class="mdi mdi-delete-outline"></i></a>
                                                        </li>
                                                    <?php endif; ?>

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
                            <h5 class="modal-title" id="exampleModalLabel">Create Complaint</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label">Name </label>
                                    <input type="text" class="form-control" id="nameM" required
                                        placeholder="Type your name" />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <div>
                                        <input type="tel" class="form-control" id="phoneM" required
                                            placeholder="+6285865xxxxxx">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Tower</label>
                                    <select class="form-select" id="towerSelectM">
                                        <option value="">Select</option>
                                        <?php foreach ($tower as $d): ?>
                                            <option value="<?= $d['tower_id'] ?>">
                                                <?= $d['tower_name'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="mb-3" id="forFloorM">
                                    <label class="form-label">Floor</label>
                                    <select class="form-select" id="floorSelectM">
                                    </select>
                                </div>

                                <div class="mb-3" id="forUnitM">
                                    <label class="form-label">Unit</label>
                                    <select class="form-select" id="unitSelectM">
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Message</label>
                                    <div>
                                        <textarea required class="form-control" rows="3" id="messageM"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Created</label>
                                    <div>
                                        <input class="form-control" type="datetime-local" id="createdDateM">
                                        <!-- value="2023-08-19T13:45:00" -->
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Assign To</label>

                                    <select class="form-select" id="departementSelectM">
                                        <option value="0">Select</option>
                                        <?php foreach ($departement as $d): ?>
                                            <option value="<?= $d['id'] ?>">
                                                <?= $d['departement_name'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="process">Create Complaint</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- VIEW MODAL -->
            <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewModalTitle">Detail Complaint</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label">Name </label>
                                    <input type="text" class="form-control" id="nameMV" disabled />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <div>
                                        <input type="tel" class="form-control" id="phoneMV" disabled>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Tower</label>
                                    <input type="text" class="form-control" id="towerMV" disabled />
                                </div>

                                <div class="mb-3" id="forFloorM">
                                    <label class="form-label">Floor</label>
                                    <input type="text" class="form-control" id="floorMV" disabled />
                                </div>

                                <div class="mb-3" id="forUnitM">
                                    <label class="form-label">Unit</label>
                                    <input type="text" class="form-control" id="unitMV" disabled />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Message</label>
                                    <div>
                                        <textarea disabled class="form-control" rows="3" id="messageMV"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Created</label>
                                    <div>
                                        <input class="form-control" type="datetime-local" id="createdDateMV">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Assign To</label>

                                    <input type="text" class="form-control" id="assignMV" disabled />

                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- UPDATE MODAL -->
            <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Complaint</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label">Id Complaint </label>
                                    <input type="text" class="form-control" id="idMU" disabled
                                        placeholder="Type your name" />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Name </label>
                                    <input type="text" class="form-control" id="nameMU" required
                                        placeholder="Type your name" />
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <div>
                                        <input type="tel" class="form-control" id="phoneMU" required
                                            placeholder="+6285865xxxxxx">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Tower</label>
                                    <select class="form-select" id="towerSelectMU">
                                        <option value="">Select</option>
                                        <?php foreach ($tower as $d): ?>
                                            <option value="<?= $d['tower_id'] ?>">
                                                <?= $d['tower_name'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="mb-3" id="forFloorM">
                                    <label class="form-label">Floor</label>
                                    <select class="form-select" id="floorSelectMU">
                                    </select>
                                </div>

                                <div class="mb-3" id="forUnitM">
                                    <label class="form-label">Unit</label>
                                    <select class="form-select" id="unitSelectMU">
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Message</label>
                                    <div>
                                        <textarea required class="form-control" rows="3" id="messageMU"></textarea>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Created</label>
                                    <div>
                                        <input class="form-control" type="datetime-local" id="createdDateMU">
                                        <!-- value="2023-08-19T13:45:00" -->
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Assign To</label>

                                    <select class="form-select" id="departementSelectMU">
                                        <option value="0">Select</option>
                                        <?php foreach ($departement as $d): ?>
                                            <option value="<?= $d['id'] ?>">
                                                <?= $d['departement_name'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="updateProcess">Update Complaint</button>
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
                            <h5 class="modal-title" id="deleteModalLabel">Delete Complaint</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="idMD">
                            <p>Are you sure you want to delete this complaint?</p>
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
        forFloor = document.getElementById("forFloorM");
        forUnit = document.getElementById("forUnitM");
        forFloor.setAttribute("hidden", "hidden");
        forUnit.setAttribute("hidden", "hidden");
        $(document).on('click', '#process', function () {
            console.log('clicked');
            var name = $("#nameM").val();
            var phone = $("#phoneM").val();
            var tower = $("#towerSelectM").val();
            var floor = $("#floorSelectM").val();
            var unit = $("#unitSelectM").val();
            var message = $("#messageM").val();
            var departement = $("#departementSelectM").val();
            var createdDate = $("#createdDateM").val();

            var date = new Date(createdDate);

            // Date
            var dateStr = date.toLocaleDateString();

            // JAM
            var jam = date.toTimeString();
            jam = jam.slice(0, 8);

            var finalDate = dateStr + ' ' + jam;
            console.log(finalDate.length);

            if (name != null && name !== "") {
                if (phone != null && phone !== "") {
                    if (tower != null && tower !== "" && floor != null && floor !== "" && unit !=
                        null &&
                        unit !== "") {
                        if (message != null && message !== "") {
                            if (departement != null && departement !== "" && departement !== "0") {
                                if (finalDate != null && finalDate !== "" && finalDate.length == 19) {
                                    $.ajax({
                                        url: "complaint/createComplaint",
                                        type: 'post',
                                        dataType: 'json',
                                        data: {
                                            "name": name,
                                            "phone": phone,
                                            "tower": tower,
                                            "floor": floor,
                                            "unit": unit,
                                            "message": message,
                                            "departement": departement,
                                            "createdDate": finalDate,
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
                                    alert('Your date is empty, please fill it in first');
                                }

                            } else {
                                alert('Your assign is empty, please fill it in first');
                            }
                        } else {
                            alert('Your message is empty, please fill it in first');
                        }
                    } else {
                        alert('Your room number is empty, please fill it in first');
                    }
                } else {
                    alert('Your phone number is empty, please fill it in first');
                }
            } else {
                alert('Your name is empty, please fill it in first');
            }
        });
        $("#towerSelectM").change(function () {
            var selected_option = $('#towerSelectM').val();
            forFloor.removeAttribute("hidden");
            $('#floorSelectM').html('');

            $.ajax({
                url: "complaint/getFloor",
                type: 'post',
                dataType: 'json',
                data: {
                    "towerId": selected_option,
                    "_token": "{{ csrf_token() }}"
                },

                success: function (result) {
                    console.log(result);
                    if (result.success) {
                        $('#floorSelectM').append(
                            '<option value="99" selected="true" disabled="disabled">Choose Floor</option>'
                        );
                        for (var i = 0; i <= result.data.length; i++) {
                            $('#floorSelectM').append('<option value="' + result.data[i]
                                .floor_id +
                                '">' +
                                result.data[i].floor_number + '</option>');
                        }
                    } else {
                        alert(result.error);
                        //location.reload();
                    }
                }
            });
        });

        $("#floorSelectM").change(function () {
            var selected_option = $('#floorSelectM').val();
            forUnit.removeAttribute("hidden");
            $('#unitSelectM').html('');

            $.ajax({
                url: "complaint/getUnit",
                type: 'post',
                dataType: 'json',
                data: {
                    "floorId": selected_option,
                    "_token": "{{ csrf_token() }}"
                },

                success: function (result) {
                    console.log(result);
                    if (result.success) {
                        $('#unitSelectM').append(
                            '<option value="99" selected="true" disabled="disabled">Choose Unit</option>'
                        );
                        for (var i = 0; i <= result.data.length; i++) {
                            $('#unitSelectM').append('<option value="' + result.data[i]
                                .unit_id +
                                '">' +
                                result.data[i].unit_number + '</option>');
                        }
                    } else {
                        alert(result.error);
                        //location.reload();
                    }
                }
            });
        });

        $(document).on('click', '#viewDetail', function () {
            id = $(this).attr('data-idCR');

            $.ajax({
                url: "complaint/getDetailCR",
                type: 'post',
                dataType: 'json',
                data: {
                    "id": id,
                    "_token": "{{ csrf_token() }}"
                },

                success: function (result) {
                    console.log(result);
                    if (result.success) {
                        $('#viewModal').modal('show');
                        $('#nameMV').val(result.data.name);
                        $('#phoneMV').val(result.data.phone);
                        $('#towerMV').val(result.data.tower_name);
                        $('#floorMV').val(result.data.floor_number);
                        $('#unitMV').val(result.data.unit_number);
                        $('#messageMV').val(result.data.message);
                        $('#createdDateMV').val(result.data.created_date);
                        $('#assignMV').val(result.data.departement_name);
                    } else {
                        alert(result.error);
                        //location.reload();
                    }
                }
            });
        });

        $(document).on('click', '#deleteComplaint', function () {
            id = $(this).attr('data-idMD');

            $('#idMD').val(id);
        });

        $(document).on('click', '#deleteMD', function () {
            var id = $("#idMD").val();

            if (id != null && id !== "") {
                $.ajax({
                    url: "complaint/deleteComplaint",
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

        $(document).on('click', '#update', function () {
            id = $(this).attr('data-idCR');
            var mDate = $(this).attr('data-createdDateMU');

            $.ajax({
                url: "complaint/getFloor",
                type: 'post',
                dataType: 'json',
                data: {
                    "towerId": $(this).attr('data-towerMU'),
                    "_token": "{{ csrf_token() }}"
                },

                success: function (result) {
                    console.log(result);
                    if (result.success) {
                        for (var i = 0; i <= result.data.length; i++) {
                            if ($(this).attr('data-floorMU') == result.data[i].floor_id) {
                                $('#floorSelectMU').append('<option selected="true" value="' +
                                    result.data[i]
                                        .floor_id +
                                    '">' +
                                    result.data[i].floor_number + '</option>');
                            } else {
                                $('#floorSelectMU').append('<option value="' + result.data[i]
                                    .floor_id +
                                    '">' +
                                    result.data[i].floor_number + '</option>');
                            }

                        }
                    } else {
                        alert(result.error);
                        //location.reload();
                    }
                }
            });

            $.ajax({
                url: "complaint/getUnit",
                type: 'post',
                dataType: 'json',
                data: {
                    "floorId": $(this).attr('data-floorMU'),
                    "_token": "{{ csrf_token() }}"
                },

                success: function (result) {
                    console.log(result);
                    if (result.success) {
                        for (var i = 0; i <= result.data.length; i++) {
                            if ($(this).attr('data-unitMU') == result.data[i].unit_id) {
                                $('#unitSelectMU').append('<option selected="true"  value="' +
                                    result.data[i]
                                        .unit_id +
                                    '">' +
                                    result.data[i].unit_number + '</option>');
                            } else {
                                $('#unitSelectMU').append('<option value="' + result.data[i]
                                    .unit_id +
                                    '">' +
                                    result.data[i].unit_number + '</option>');
                            }

                        }
                    } else {
                        alert(result.error);
                        //location.reload();
                    }
                }
            });

            $('#idMU').val($(this).attr('data-idMU'));
            $('#nameMU').val($(this).attr('data-nameMU'));
            $('#phoneMU').val($(this).attr('data-phoneMU'));
            document.getElementById('towerSelectMU').value = $(this).attr('data-towerMU');
            document.getElementById('departementSelectMU').value = $(this).attr('data-assignMU');
            $('#messageMU').val($(this).attr('data-messageMU'));
        });

        $(document).on('click', '#updateProcess', function () {
            var id = $("#idMU").val();
            var name = $("#nameMU").val();
            var phone = $("#phoneMU").val();
            var tower = $("#towerSelectMU").val();
            var floor = $("#floorSelectMU").val();
            var unit = $("#unitSelectMU").val();
            var message = $("#messageMU").val();
            var departement = $("#departementSelectMU").val();
            var createdDate = $("#createdDateMU").val();
            console.log(id);

            var date = new Date(createdDate);

            // Date
            var dateStr = date.toLocaleDateString();

            // JAM
            var jam = date.toTimeString();
            jam = jam.slice(0, 8);

            var finalDate = dateStr + ' ' + jam;
            console.log(finalDate.length);

            if (id != null && id !== "") {
                if (name != null && name !== "") {
                    if (phone != null && phone !== "") {
                        if (tower != null && tower !== "" && floor != null && floor !== "" && unit !=
                            null &&
                            unit !== "") {
                            if (message != null && message !== "") {
                                if (departement != null && departement !== "" && departement !== "0") {
                                    if (finalDate != null && finalDate !== "" && finalDate.length == 19) {
                                        $.ajax({
                                            url: "complaint/updateComplaint",
                                            type: 'post',
                                            dataType: 'json',
                                            data: {
                                                "id": id,
                                                "name": name,
                                                "phone": phone,
                                                "tower": tower,
                                                "floor": floor,
                                                "unit": unit,
                                                "message": message,
                                                "departement": departement,
                                                "createdDate": finalDate,
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
                                        alert('Your date is empty, please fill it in first');
                                    }

                                } else {
                                    alert('Your assign is empty, please fill it in first');
                                }
                            } else {
                                alert('Your message is empty, please fill it in first');
                            }
                        } else {
                            alert('Your room number is empty, please fill it in first');
                        }
                    } else {
                        alert('Your phone number is empty, please fill it in first');
                    }
                } else {
                    alert('Your name is empty, please fill it in first');
                }
            } else {
                alert('Your Id Complaint is empty, please fill it in first');
            }

        });
    });
</script>