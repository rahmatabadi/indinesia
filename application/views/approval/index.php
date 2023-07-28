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
                                        <th>Room</th>
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
                                            <?= $m['room'] ?>
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
                                            <button type="button" id="done" data-idC="<?= $m['id'] ?>"
                                                class="btn btn-primary btn-sm waves-effect waves-light">Done</button>
                                            <?php endif; ?>

                                        </td>

                                        <!-- <td>
                                            <ul class="list-unstyled hstack gap-1 mb-0">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="View">
                                                    <a href="job-details.html" class="btn btn-sm btn-soft-primary"><i
                                                            class="mdi mdi-eye-outline"></i></a>
                                                </li>
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit">
                                                    <a href="#" class="btn btn-sm btn-soft-info"><i
                                                            class="mdi mdi-pencil-outline"></i></a>
                                                </li>
                                                <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                    aria-label="Delete">
                                                    <a href="#jobDelete" data-bs-toggle="modal"
                                                        class="btn btn-sm btn-soft-danger"><i
                                                            class="mdi mdi-delete-outline"></i></a>
                                                </li>
                                            </ul>
                                        </td> -->
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
                                    <label class="form-label">Name </label>
                                    <input type="hidden" class="form-control" id="idU" name="idU">
                                    <input type="text" class="form-control" id="nameM" required
                                        placeholder="Type your name" />
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


        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


</div>
<!-- end main content-->

<script>
$(document).ready(function($) {
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
        name = $("#nameM").val();

        if (name != null && name !== "") {
            $.ajax({
                url: "approval/updateWorker",
                type: 'post',
                dataType: 'json',
                data: {
                    "id": id,
                    "name": name,
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
            alert('Your name is empty, please fill it in first');
        }
    });
});
</script>