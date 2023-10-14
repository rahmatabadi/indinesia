<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Working Order</h4>

                        <div class="page-title-right">
                            <?php if ($access_create): ?>
                                <a href="<?= base_url('workingOrder/createWOInternal') ?>"
                                    class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-plus"></i>
                                    Create Work Order Internal</a>
                                <a href="<?= base_url('workingOrder/createWO') ?>"
                                    class="d-none d-sm-inline-block btn btn-primary shadow-sm"><i class="fas fa-plus"></i>
                                    Create Work Order CR</a>
                            <?php endif; ?>
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
                                        <th>ID Work Order</th>
                                        <th>ID Complaint Request</th>
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
                                                <?= $m['wo_id'] ?>
                                            </td>
                                            <td>
                                                <?= $m['id'] ?>
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
                                                <?php elseif ($m['status'] == 4): ?>
                                                    <span class="badge bg-success">
                                                        <?= $m['desc'] ?>
                                                    </span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <ul class="list-unstyled hstack gap-1 mb-0">
                                                    <li id="viewDetail" data-idCR="<?= $m['id'] ?>">
                                                        <a class="btn btn-sm btn-soft-primary"><i
                                                                class="mdi mdi-eye-outline"></i></a>
                                                    </li>
                                                    <?php if ($access_action): ?>
                                                        <?php if ($m['status'] == 1 && $employeeId == '0'): ?>
                                                            <li data-bs-toggle="modal" data-bs-target="#actionWOModal" id="actionWO"
                                                                data-idWOM="<?= $m['wo_id'] ?>" data-idCRM="<?= $m['id'] ?>">
                                                                <a class=" btn btn-sm btn-soft-info"><i
                                                                        class="mdi mdi-pencil-outline"></i></a>
                                                            </li>
                                                        <?php elseif ($m['status'] == 2 && $employeeId != '0'): ?>
                                                            <!-- Change To Start -->
                                                            <li data-bs-toggle="modal" data-bs-target="#actionWOStartModal"
                                                                id="actionWOStart" data-idWOM="<?= $m['wo_id'] ?>"
                                                                data-idCRM="<?= $m['id'] ?>">
                                                                <a class=" btn btn-sm btn-soft-info"><i
                                                                        class="mdi mdi-pencil-outline"></i></a>
                                                            </li>
                                                        <?php elseif ($m['status'] == 3 && $employeeId != '0'): ?>
                                                            <!-- Change To Finish -->
                                                            <li data-bs-toggle="modal" data-bs-target="#actionWODoneModal"
                                                                id="actionWODone" data-idWOM="<?= $m['wo_id'] ?>">
                                                                <a class=" btn btn-sm btn-soft-info"><i
                                                                        class="mdi mdi-pencil-outline"></i></a>
                                                            </li>

                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    <?php if ($access_create): ?>
                                                        <?php if ($m['status'] == 1): ?>
                                                            <!-- <li data-bs-toggle="modal" data-bs-target="#updateModal" id="update"
                                                                data-idWOMU="<?= $m['wo_id'] ?>" data-idCRMU="<?= $m['id'] ?>"
                                                                data-assignMU="<?= $m['assign'] ?>">
                                                                <a class="btn btn-sm btn-soft-info"><i
                                                                        class="mdi mdi-pencil-outline"></i></a>
                                                            </li> -->
                                                            <li data-bs-toggle="modal" data-bs-target="#deleteModal" id="deleteWO"
                                                                data-idMD="<?= $m['wo_id'] ?>">
                                                                <a class="btn btn-sm btn-soft-danger"><i
                                                                        class="mdi mdi-delete-outline"></i></a>
                                                            </li>
                                                        <?php endif; ?>
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

            <div class="modal fade" id="actionWOModal" tabindex="-1" aria-labelledby="actionWOLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="actionWOLabel">Assign To</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label">Category </label>
                                    <select class="form-select" id="categorySelectM">
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Name </label>
                                    <input type="hidden" class="form-control" id="idU" name="idU">
                                    <select class="form-select" id="employeeSelectM">
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="process">Assign</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="actionWOStartModal" tabindex="-1" aria-labelledby="actionWOLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="actionWOLabel">Start Work Order</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="idStartU" name="idStartU">
                            <form>
                                <div class="row mb-4">
                                    <label class="col-sm-3 col-form-label">Start Date</label>
                                    <div class="col-sm-9">
                                        <div class="input-group" id="datepicker2">
                                            <input type="text" class="form-control" placeholder="Start Date"
                                                data-date-format="yyyy-mm-dd" data-date-container='#datepicker2'
                                                data-provide="datepicker" data-date-autoclose="true" id="startDateM">

                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="startTime" class="col-sm-3 col-form-label">Start Time</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="startTimeM" placeholder="09:00">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="startAction">Start Work </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="actionWODoneModal" tabindex="-1" aria-labelledby="actionWOLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="actionWOLabel">Done Work Order</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="idDoneU" name="idDoneU">
                            <form>
                                <div class="row mb-4">
                                    <label class="col-sm-3 col-form-label">Finish Date</label>
                                    <div class="col-sm-9">
                                        <div class="input-group" id="datepicker3">
                                            <input type="text" class="form-control" placeholder="Finish Date"
                                                data-date-format="yyyy-mm-dd" data-date-container='#datepicker3'
                                                data-provide="datepicker" data-date-autoclose="true" id="finishDate">

                                            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="startTime" class="col-sm-3 col-form-label">Finish Time</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="finishTime" placeholder="09:00">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="finishClick">Finish </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MODAL DETAIL -->
            <div class="modal fade" id="detailWOModal" tabindex="-1" aria-labelledby="actionWOLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailWOLabel">Detail Work Order</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row mb-4">
                                    <label class="col-sm-3 col-form-label">Work Order </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="woD" disabled />
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-sm-3 col-form-label">Complaint Request</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="crD" disabled />
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-sm-3 col-form-label">Location </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="locationD" disabled />
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-sm-3 col-form-label">Name </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nameD" disabled />
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-sm-3 col-form-label">Phone </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="phoneD" disabled />
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-sm-3 col-form-label">Complaint Date </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="dateD" disabled />
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-sm-3 col-form-label">Assign To </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="assignD" disabled />
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-sm-3 col-form-label">Massage </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="messageD" disabled />
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-sm-3 col-form-label">Start Work </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="startD" disabled />
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-sm-3 col-form-label">End Work </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="endD" disabled />
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-sm-3 col-form-label">Remark Work </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="remarkD" disabled />
                                    </div>
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
                                <div class="row mb-4">
                                    <label class="col-sm-3 col-form-label">Work Order </label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="woMU" disabled />
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-sm-3 col-form-label">Complaint Request</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="crMU" disabled />
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
                            <button type="button" class="btn btn-primary" id="updateProcess">Update WO</button>
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
                            <h5 class="modal-title" id="deleteModalLabel">Delete Work Order</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="idMD">
                            <p>Are you sure you want to delete this work order?</p>
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
        $('#timepicker1').timepicker({
            showInputs: false
        });
        $(document).on('click', '#viewDetail', function () {
            id = $(this).attr('data-idCR');
            $.ajax({
                url: "WorkingOrder/getDetailWO",
                type: 'post',
                dataType: 'json',
                data: {
                    "id": id,
                    "_token": "{{ csrf_token() }}"
                },

                success: function (result) {
                    console.log(result);
                    if (result.success) {
                        $('#detailWOModal').modal('show');
                        $('#woD').val(result.data.wo_id);
                        $('#crD').val(result.data.complaint_id);
                        $('#locationD').val(result.data.location);
                        $('#nameD').val(result.data.name);
                        $('#messageD').val(result.data.message);
                        $('#phoneD').val(result.data.phone);
                        $('#assignD').val(result.data.departement_name + '/' + result.data
                            .employee_name);
                        $('#dateD').val(result.data.date);
                        $('#startD').val(result.data.start_date);
                        $('#enD').val(result.data.end_date);
                        $('#remarkD').val(result.data.remarkD);
                    } else {
                        alert(result.error);
                        //location.reload();
                    }
                }
            });
        });

        $(document).on('click', '#actionWO', function () {
            id = $(this).attr('data-idWOM');

            $('#idU').val(id);

            $.ajax({
                url: "WorkingOrder/getEmployee",
                type: 'post',
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}"
                },

                success: function (result) {
                    console.log(result);
                    if (result.success) {
                        $('#employeeSelectM').append(
                            '<option value="99" selected="true" disabled="disabled">Choose Employee</option>'
                        );
                        for (var i = 0; i <= result.data.length; i++) {
                            $('#employeeSelectM').append('<option value="' + result.data[i]
                                .employee_id +
                                '">' +
                                result.data[i].employee_name + '</option>');
                        }
                    } else {
                        alert(result.error);
                        //location.reload();
                    }
                }
            });

            //get Category
            $.ajax({
                url: "WorkingOrder/getCategoryComplaint",
                type: 'post',
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}"
                },

                success: function (result) {
                    console.log(result);
                    if (result.success) {
                        $('#categorySelectM').append(
                            '<option value="99" selected="true" disabled="disabled">Choose Category</option>'
                        );
                        for (var i = 0; i <= result.data.length; i++) {
                            $('#categorySelectM').append('<option value="' + result.data[i]
                                .category_complaint_id +
                                '">' +
                                result.data[i].category_complaint_name + '</option>');
                        }
                    } else {
                        alert(result.error);
                        //location.reload();
                    }
                }
            });
        });

        $(document).on('click', '#actionWODone', function () {
            id = $(this).attr('data-idWOM');

            $('#idDoneU').val(id);
        });

        $(document).on('click', '#actionWOStart', function () {
            id = $(this).attr('data-idWOM');

            $('#idStartU').val(id);
        });

        $(document).on('click', '#process', function () {
            id = $("#idU").val();
            employee_id = $("#employeeSelectM").val();
            category = $("#categorySelectM").val();

            if (employee_id != null && employee_id !== "" && category != null && category !== "") {
                $.ajax({
                    url: "WorkingOrder/updateWorker",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        "id": id,
                        "employee_id": employee_id,
                        "category": category,
                        "_token": "{{ csrf_token() }}"
                    },

                    success: function (result) {
                        console.log(result);
                        if (result.success) {
                            location.reload();
                        } else {
                            alert(result.error);
                        }
                    }
                });
            } else {
                alert('Please fill it in first');
            }
        });

        $(document).on('click', '#startAction', function () {
            console.log('Start Work');
            id = $("#idStartU").val();
            startDate = $("#startDateM").val();
            startTime = $("#startTimeM").val();

            if (id != null && id !== "" && startDate != null && startDate !== "" && startTime != null &&
                startTime !== "") {

                $.ajax({
                    url: "WorkingOrder/updateWorkerStart",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        "id": id,
                        "start_date": startDate + ' ' + startTime + ':00',
                        "_token": "{{ csrf_token() }}"
                    },

                    success: function (result) {
                        console.log(result);
                        if (result.success) {
                            location.reload();
                        } else {
                            alert(result.error);
                        }
                    }
                });
            } else {
                alert('Please fill it in first');
            }
        });

        $(document).on('click', '#finishClick', function () {
            id = $("#idDoneU").val();
            finishDate = $("#finishDate").val();
            finsihTime = $("#finishTime").val();
            console.log(id);
            console.log(finishDate);
            console.log(finsihTime);

            if (id != null && id !== "" && finishDate != null && finishDate !== "" && finsihTime != null &&
                finsihTime !== "") {

                $.ajax({
                    url: "WorkingOrder/updateWorkerDone",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        "id": id,
                        "finish_date": finishDate + ' ' + finsihTime + ':00',
                        "_token": "{{ csrf_token() }}"
                    },

                    success: function (result) {
                        console.log(result);
                        if (result.success) {
                            location.reload();
                        } else {
                            alert(result.error);
                        }
                    }
                });
            } else {
                alert('Please fill it in first');
            }
        });
        $(document).on('click', '#deleteWO', function () {
            id = $(this).attr('data-idMD');

            $('#idMD').val(id);
        });

        $(document).on('click', '#deleteMD', function () {
            var id = $("#idMD").val();
            console.log(id);

            if (id != null && id !== "") {
                $.ajax({
                    url: "WorkingOrder/deleteWO",
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
            $('#crMU').val($(this).attr('data-idCRMU'));
            $('#woMU').val($(this).attr('data-idWOMU'));

            console.log($(this).attr('data-idCRMU'));
            console.log($(this).attr('data-idWOMU'));
            document.getElementById('departementSelectMU').value = $(this).attr('data-assignMU');
        });

        $(document).on('click', '#updateProcess', function () {
            var idCR = $(this).attr('data-idCRMU');
            var idWO = $(this).attr('data-idWOMU');
            var departement = $("#departementSelectMU").val();

            if (idCR != null && idCR !== "") {
                if (idWO != null && idWO !== "") {
                    if (departement != null && departement !== "") {
                        $.ajax({
                            url: "WorkingOrder/updateWO",
                            type: 'post',
                            dataType: 'json',
                            data: {
                                "idCR": idCR,
                                "idWO": idWO,
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
                        alert('Your id WO is empty');
                    }
                } else {
                    alert('Your id WO is empty');
                }
            } else {
                alert('Your id CR is empty');
            }
        });
    });
</script>