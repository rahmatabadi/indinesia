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
                                            <?= $m['phone'] ?>
                                        </td>
                                        <td>
                                            <?= $m['name'] ?>
                                        </td>
                                        <td>
                                            <?= $m['message'] ?>
                                        </td>
                                        <td>
                                            <?= $m['departement_name'] ?>
                                        </td>
                                        <td>
                                            <?= $m['date'] ?>
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
                                        <option value="<?= $d['tower_id'] ?>"><?= $d['tower_name'] ?></option>
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
                                    <label class="form-label">Assign To</label>

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
                            <button type="button" class="btn btn-primary" id="process">Create Complaint</button>
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
    forFloor = document.getElementById("forFloorM");
    forUnit = document.getElementById("forUnitM");
    forFloor.setAttribute("hidden", "hidden");
    forUnit.setAttribute("hidden", "hidden");
    //forCash = document.getElementById("forCash");
    // forCash.setAttribute("hidden", "hidden");
    // forCash.removeAttribute("hidden");
    $(document).on('click', '#process', function() {
        console.log('clicked');
        var name = $("#nameM").val();
        var phone = $("#phoneM").val();
        var tower = $("#towerSelectM").val();
        var floor = $("#floorSelectM").val();
        var unit = $("#unitSelectM").val();
        var message = $("#messageM").val();
        var departement = $("#departementSelectM").val();

        if (name != null && name !== "") {
            if (phone != null && phone !== "") {
                if (tower != null && tower !== "" && floor != null && floor !== "" && unit != null &&
                    unit !== "") {
                    if (message != null && message !== "") {
                        if (departement != null && departement !== "" && departement !== "0") {
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
    $("#towerSelectM").change(function() {
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

            success: function(result) {
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

    $("#floorSelectM").change(function() {
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

            success: function(result) {
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
});
</script>