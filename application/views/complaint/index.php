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
                                        <th>Room</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Complaint</th>
                                        <th>Assign</th>
                                        <th>Status</th>
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
                                            <?= $m['departement_name'] ?>
                                        </td>
                                        <td>
                                            <span class="badge bg-info">
                                                <?= $m['desc'] ?>
                                            </span>
                                        </td>
                                        <td>
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
                                    <label class="form-label">Room Number</label>
                                    <div>
                                        <input type="number" class="form-control" id="roomM" required placeholder="101">
                                    </div>
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
    $(document).on('click', '#process', function() {
        console.log('clicked');
        var name = $("#nameM").val();
        var phone = $("#phoneM").val();
        var room = $("#roomM").val();
        var message = $("#messageM").val();
        var departement = $("#departementSelectM").val();

        if (name != null && name !== "") {
            if (phone != null && phone !== "") {
                if (room != null && room !== "") {
                    if (message != null && message !== "") {
                        if (departement != null && departement !== "" && departement !== "0") {
                            $.ajax({
                                url: "complaint/createComplaint",
                                type: 'post',
                                dataType: 'json',
                                data: {
                                    "name": name,
                                    "phone": phone,
                                    "room": room,
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
    $("#departementSelectM").change(function() {
        console.log('AAAA');
        // var selected_option = $('#akunSourceModal').val();
        // console.log(selected_option);

        // $.ajax({
        //     url: "beban/getSaldo",
        //     type: 'get',
        //     data: {
        //         "account_id": selected_option,
        //         "_token": "{{ csrf_token() }}"
        //     },
        //     success: function(result) {
        //         if (result.success) {
        //             $("#saldoSourceModal").val('Rp. ' + commaSeparateNumber(result.data[0]
        //                 .balance));
        //         } else {
        //             alert('Gagal Memuat Saldo');
        //         }
        //     }
        // });
    });
});
</script>