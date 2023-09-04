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
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <ul class="list-unstyled hstack gap-1 mb-0">
                                                    <li data-bs-toggle="modal" data-bs-target="#viewCategoryModal"
                                                        id="detailCategory"
                                                        data-nameMV="<?= $m['category_complaint_name'] ?>"
                                                        data-descMV="<?= $m['category_complaint_desc'] ?>"
                                                        data-tnameMV="<?= $m['departement_name'] ?>">
                                                        <a class="btn btn-sm btn-soft-primary"><i
                                                                class="mdi mdi-eye-outline"></i></a>
                                                    </li>
                                                    <?php if ($access_action): ?>
                                                        <?php if ($m['status'] == 1): ?>
                                                            <li data-bs-toggle="modal" data-bs-target="#actionWOModal" id="actionWO"
                                                                data-idWOM="<?= $m['wo_id'] ?>" data-idCRM="<?= $m['id'] ?>">
                                                                <a class=" btn btn-sm btn-soft-info"><i
                                                                        class="mdi mdi-pencil-outline"></i></a>
                                                            </li>
                                                        <?php elseif ($m['status'] == 2): ?>
                                                            <li data-bs-toggle="modal" data-bs-target="#actionWODoneModal"
                                                                id="actionWODone" data-idWOM="<?= $m['wo_id'] ?>"
                                                                data-idCRM="<?= $m['id'] ?>">
                                                                <a class=" btn btn-sm btn-soft-info"><i
                                                                        class="mdi mdi-pencil-outline"></i></a>
                                                            </li>
                                                        <?php endif; ?>
                                                    <?php endif; ?>

                                                    <!-- <li data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                        id="deleteEmployee" data-idMD="<?= $m['category_complaint_id'] ?>">
                                                        <a class="btn btn-sm btn-soft-danger"><i
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
                                <!-- <div class="mb-3">
                                    <label class="form-label">Is it Paid? </label>
                                    <select class="form-select" id="paidSelectM">
                                        <option value="99" selected="true" disabled="disabled">Choose Paid or Not
                                        </option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div> -->
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="process">Assign</button>
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
                                <!-- <div class="mb-3">
                                    <label class="form-label">Is it Paid? </label>
                                    <select class="form-select" id="paidSelectM">
                                        <option value="99" selected="true" disabled="disabled">Choose Paid or Not
                                        </option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div> -->
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="process">Assign</button>
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

        $(document).on('click', '#actionWO', function () {
            id = $(this).attr('data-idWOM');

            $('#idU').val(id);
        });

        $(document).on('click', '#process', function () {
            id = $("#idU").val();
            employee_id = $("#employeeSelectM").val();
            category = $("#categorySelectM").val();

            if (employee_id != null && employee_id !== "") {
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



    });
</script>