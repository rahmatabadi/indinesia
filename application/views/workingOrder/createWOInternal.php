<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Create Work Order Internal</h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-4">
                        <label class="col-sm-3 col-col-sm-3 col-form-label">Name </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nameM" required placeholder="Type your name" />
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label">Phone Number</label>
                        <div class="col-sm-9">
                            <input type="tel" class="form-control" id="phoneM" required placeholder="+6285865xxxxxx">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label">Tower</label>
                        <div class="col-sm-9">
                            <select class="form-select" id="towerSelectM">
                                <option value="">Select</option>
                                <?php foreach ($tower as $d): ?>
                                <option value="<?= $d['tower_id'] ?>"><?= $d['tower_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4" id="forFloorM">
                        <label class="col-sm-3 col-form-label">Floor</label>

                        <div class="col-sm-9">
                            <select class="form-select" id="floorSelectM">
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4" id="forUnitM">
                        <label class="col-sm-3 col-form-label">Unit</label>

                        <div class="col-sm-9">
                            <select class="form-select" id="unitSelectM">
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label">Message</label>

                        <div class="col-sm-9">
                            <div>
                                <textarea required class="form-control" rows="3" id="messageM"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label">Assign To</label>


                        <div class="col-sm-9">
                            <select class="form-select" id="departementSelectM">
                                <option value="0">Select</option>
                                <?php foreach ($departement as $d): ?>
                                <option value="<?= $d['id'] ?>"><?= $d['departement_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label">Start Date</label>
                        <div class="col-sm-9">
                            <div class="input-group" id="datepicker2">
                                <input type="text" class="form-control" placeholder="Start Date"
                                    data-date-format="dd-mm-yyyy" data-date-container='#datepicker2'
                                    data-provide="datepicker" data-date-autoclose="true" id="startDate">

                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="startTime" class="col-sm-3 col-form-label">Start Time</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="startTime" placeholder="09:00">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="startTime" class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <button type="button" class="btn btn-primary" id="createWOInternal">Create Work
                                Order</button>
                            <div class="row justify-content-end">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
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

    $("#towerSelectM").change(function() {
        var selected_option = $('#towerSelectM').val();
        forFloor.removeAttribute("hidden");
        $('#floorSelectM').html('');

        $.ajax({
            url: "getFloor",
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
            url: "getUnit",
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


    $(document).on('click', '#createWOInternal', function() {
        console.log('clicked');
        var name = $("#nameM").val();
        var phone = $("#phoneM").val();
        var tower = $("#towerSelectM").val();
        var floor = $("#floorSelectM").val();
        var unit = $("#unitSelectM").val();
        var message = $("#messageM").val();
        var departement = $("#departementSelectM").val();
        var startDate = $("#startDate").val();
        var startTime = $("#startTime").val();

        if (name != null && name !== "") {
            if (phone != null && phone !== "") {
                if (tower != null && tower !== "" && floor != null && floor !== "" && unit != null &&
                    unit !== "") {
                    if (message != null && message !== "") {
                        if (departement != null && departement !== "" && departement !== "0") {
                            if (startDate != null && startDate !== "" && startTime != null &&
                                startTime !== "") {

                                $.ajax({
                                    url: "createWOIn",
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
                                        "startDate": startDate,
                                        "startTime": startTime,
                                        "_token": "{{ csrf_token() }}"
                                    },

                                    success: function(result) {
                                        console.log(result);
                                        if (result.success) {
                                            // location.reload();
                                            window.location.href = "../workingOrder";
                                        } else {
                                            alert(result.error);
                                            //location.reload();
                                        }
                                    }
                                });

                            } else {
                                alert('Your Start Date is empty, please fill it in first');
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
});
</script>