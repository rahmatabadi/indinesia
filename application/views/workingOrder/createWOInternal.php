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
    $(document).ready(function ($) {
        $(document).on('click', '#createWO', function () {
            console.log('clicked');
            var startDate = $("#startDate").val();
            var startTime = $("#startTime").val();
            var CRSelect = $("#CRSelect").val();

            if (CRSelect != null && CRSelect !== "") {
                if (startDate != null && startDate !== "") {
                    if (startTime != null && startTime !== "") {
                        $.ajax({
                            url: "insertWO",
                            type: 'post',
                            dataType: 'json',
                            data: {
                                "CRSelect": CRSelect,
                                "startDate": startDate,
                                "startTime": startTime,
                                "_token": "{{ csrf_token() }}"
                            },

                            success: function (result) {
                                console.log(result);
                                if (result.success) {
                                    //location.reload();
                                } else {
                                    alert(result.error);
                                    //location.reload();
                                }
                            }
                        });
                    } else {
                        alert('Your start time is empty, please fill it in first');
                    }
                } else {
                    alert('Your start date is empty, please fill it in first');
                }
            } else {
                alert('Please Select Complaint Request');
            }
        });
    });
</script>