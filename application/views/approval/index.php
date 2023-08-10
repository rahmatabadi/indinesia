<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Approval</h4>

                        <!-- <div class="page-title-right">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Create Complaint</button>
                        </div> -->
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
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Complaint</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        <!-- <th>Detail</th> -->
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

                                        <td>
                                            <?php if ($m['status'] == 1): ?>
                                            <button type="button" id="assign"
                                                class="btn btn-primary btn-sm waves-effect waves-light"
                                                data-bs-toggle="modal" data-bs-target="#assignModal"
                                                data-idC="<?= $m['id'] ?>">Asign
                                                To</button>
                                            <?php elseif ($m['status'] == 2): ?>
                                            <!-- <button type="button" id="done" data-idC="<?= $m['id'] ?>"
                                                class="btn btn-primary btn-sm waves-effect waves-light">Done</button> -->
                                            <button type="button" id="assignDone"
                                                class="btn btn-primary btn-sm waves-effect waves-light"
                                                data-bs-toggle="modal" data-bs-target="#doneModal"
                                                data-idC="<?= $m['id'] ?>">Done
                                            </button>
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
            <div class="modal fade" id="assignModal" tabindex="-1" aria-labelledby="assignModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="assignModalLabel">Assign To</h5>
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
                                <div class="mb-3">
                                    <label class="form-label">Is it Paid? </label>
                                    <select class="form-select" id="paidSelectM">
                                        <option value="99" selected="true" disabled="disabled">Choose Paid or Not
                                        </option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
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

            <div class="modal fade" id="doneModal" tabindex="-1" aria-labelledby="doneModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="doneModalLabel">Done Complaint</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form><input type="hidden" class="form-control" id="idDM">
                                <div class="mb-3">
                                    <label class="form-label">Description </label>
                                    <input type="text" class="form-control" id="descDM" required
                                        placeholder="Type description" />
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="processDone">Done</button>
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
    //get Employee
    $.ajax({
        url: "approval/getEmployee",
        type: 'post',
        dataType: 'json',
        data: {
            "_token": "{{ csrf_token() }}"
        },

        success: function(result) {
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
        url: "approval/getCategoryComplaint",
        type: 'post',
        dataType: 'json',
        data: {
            "_token": "{{ csrf_token() }}"
        },

        success: function(result) {
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

    $(document).on('click', '#assign', function() {
        id = $(this).attr('data-idC');

        $('#idU').val(id);
    });

    $(document).on('click', '#done', function() {
        id = $(this).attr('data-idC');
        console.log(id);
        if (confirm("Has this complaint been resolved?")) {
            $.ajax({
                url: "approval/updateDone",
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
        }
    });
    $(document).on('click', '#process', function() {
        id = $("#idU").val();
        employee_id = $("#employeeSelectM").val();
        paid = $("#paidSelectM").val();
        category = $("#categorySelectM").val();

        if (employee_id != null && employee_id !== "" &&
            paid != null && paid !== "") {
            $.ajax({
                url: "approval/updateWorker",
                type: 'post',
                dataType: 'json',
                data: {
                    "id": id,
                    "employee_id": employee_id,
                    "paid": paid,
                    "category": category,
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
            alert('Please fill it in first');
        }
    });

    $(document).on('click', '#assignDone', function() {
        id = $(this).attr('data-idC');

        $('#idDM').val(id);
    });
    $(document).on('click', '#processDone', function() {
        id = $("#idDM").val();
        desc = $("#descDM").val();

        if (id != null && id !== "" &&
            desc != null && desc !== "") {
            $.ajax({
                url: "approval/updateProcessDone",
                type: 'post',
                dataType: 'json',
                data: {
                    "id": id,
                    "desc": desc,
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
            alert('Please fill it in first');
        }
    });
});
</script>