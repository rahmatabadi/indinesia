<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Create Work Order</h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-4">
                        <label class="col-sm-3 col-form-label">Complaint
                            Request</label>
                        <div class="col-sm-9">
                            <select class="form-select" id="CRSelect">
                                <option value="">Select</option>
                                <?php foreach ($complaint as $d): ?>
                                <option value="<?= $d['id'] ?>"><?= $d['id'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div id="detailCR">
                        <div class="row mb-4">
                            <label class="col-sm-3 col-form-label"><strong>Detail Complaint Request</strong></label>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-3 col-form-label">Location</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="crLocation" required disabled />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-3 col-form-label">Complaint By</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="crName" required disabled />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-3 col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="crPhone" required disabled />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-3 col-form-label">Complaint Date</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="crDate" required disabled />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-3 col-form-label">Complaint Message</label>
                            <div class="col-sm-9">
                                <textarea required class="form-control" rows="3" id="crMessage" disabled></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-3 col-form-label">Assign To</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="crAssign" required disabled />
                            </div>
                        </div>
                    </div>


                    <!-- <div class="row mb-4">
                        <label class="col-sm-3 col-form-label">Start Date</label>
                        <div class="col-sm-9">
                            <div class="input-group" id="datepicker2">
                                <input type="text" class="form-control" placeholder="Start Date"
                                    data-date-format="dd-mm-yyyy" data-date-container='#datepicker2'
                                    data-provide="datepicker" data-date-autoclose="true" id="startDate">

                                <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div>
                    </div> -->

                    <!-- <div class="row mb-4">
                        <label for="startTime" class="col-sm-3 col-form-label">Start Time</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="startTime" placeholder="09:00">
                        </div>
                    </div>-->
                    <div class="row mb-4">
                        <label for="startTime" class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <button type="button" class="btn btn-primary" id="createWO">Create Work Order</button>
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
    forDetailCR = document.getElementById("detailCR");
    forDetailCR.setAttribute("hidden", "hidden");

    $("#CRSelect").change(function() {
        var selected_option = $('#CRSelect').val();
        console.log(selected_option);
        forDetailCR.removeAttribute("hidden");

        $.ajax({
            url: "getDetailCR",
            type: 'post',
            dataType: 'json',
            data: {
                "cr": selected_option,
                "_token": "{{ csrf_token() }}"
            },

            success: function(result) {
                console.log(result);
                if (result.success) {
                    $('#crLocation').val(result.data.tower_name + '/' + result.data
                        .floor_number + '/' + result.data.unit_number);
                    $('#crName').val(result.data.name);
                    $('#crPhone').val(result.data.phone);
                    $('#crDate').val(result.data.date);
                    $('#crMessage').val(result.data.message);
                    $('#crAssign').val(result.data.departement_name);

                } else {
                    alert(result.error);
                }
            }
        });
    });

    $(document).on('click', '#createWO', function() {
        console.log('clicked');
        var CRSelect = $("#CRSelect").val();

        if (CRSelect != null && CRSelect !== "") {
            $.ajax({
                url: "insertWO",
                type: 'post',
                dataType: 'json',
                data: {
                    "CRSelect": CRSelect,
                    "_token": "{{ csrf_token() }}"
                },

                success: function(result) {
                    console.log(result);
                    if (result.success) {
                        window.location.href = "../workingOrder";
                    } else {
                        alert(result.error);
                        //location.reload();
                    }
                }
            });
        } else {
            alert('Please Select Complaint Request');
        }
    });
});
</script>