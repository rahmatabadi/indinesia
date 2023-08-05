<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">
                            <?= $title ?>
                        </h4>

                        <div class="page-title-right">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Create Employee</button>
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
                                        <th>Employee</th>
                                        <th>Departement</th>
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
                                                <?= $m['employee_name'] ?>
                                            </td>
                                            <td>
                                                <?= $m['departement_name'] ?>
                                            </td>
                                            <td>
                                                <ul class="list-unstyled hstack gap-1 mb-0">
                                                    <li data-bs-toggle="modal" data-bs-target="#viewEmployeeModal"
                                                        id="detailEmployee" data-nameMV="<?= $m['employee_name'] ?>"
                                                        data-phoneMV="<?= $m['employee_phone'] ?>"
                                                        data-addressMV="<?= $m['employee_address'] ?>"
                                                        data-tnameMV="<?= $m['departement_name'] ?>">
                                                        <a class="btn btn-sm btn-soft-primary"><i
                                                                class="mdi mdi-eye-outline"></i></a>
                                                    </li>
                                                    <li data-bs-toggle="modal" data-bs-target="#updateEmployeeModal"
                                                        id="updateEmployee" data-idMU="<?= $m['employee_id'] ?>"
                                                        data-nameMU="<?= $m['employee_name'] ?>"
                                                        data-phoneMU="<?= $m['employee_phone'] ?>"
                                                        data-addressMU="<?= $m['employee_address'] ?>"
                                                        data-didMU="<?= $m['id'] ?>">
                                                        <a class="btn btn-sm btn-soft-info"><i
                                                                class="mdi mdi-pencil-outline"></i></a>
                                                    </li>
                                                    <li data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                        id="deleteEmployee" data-idMD="<?= $m['employee_id'] ?>">
                                                        <a class="btn btn-sm btn-soft-danger"><i
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
                            <h5 class="modal-title" id="exampleModalLabel">Create Departement</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label">Employee Name </label>
                                    <input type="text" class="form-control" id="employeeNameM" required
                                        placeholder="Type employee name" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Employee Phone </label>
                                    <input type="tel" class="form-control" id="employeePhoneM" required
                                        placeholder="Type employee phone" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Employee Address </label>
                                    <input type="text" class="form-control" id="employeeAddressM" required
                                        placeholder="Type employee address" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Departement </label>
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
                            <button type="button" class="btn btn-primary" id="process">Create Employee</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- updateEmployeeModal -->
            <div class="modal fade" id="updateEmployeeModal" tabindex="-1" aria-labelledby="updateEmployeeLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateEmployeeLabel">Update Employee</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <input type="hidden" class="form-control" id="employeeIdMU">
                                <div class="mb-3">
                                    <label class="form-label">Employee Name </label>
                                    <input type="text" class="form-control" id="employeeNameMU" required
                                        placeholder="Type employee name" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Employee Phone </label>
                                    <input type="tel" class="form-control" id="employeePhoneMU" required
                                        placeholder="Type employee phone" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Employee Address </label>
                                    <input type="text" class="form-control" id="employeeAddressMU" required
                                        placeholder="Type employee address" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Departement </label>
                                    <select class="form-select" id="departementSelectMU">
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
                            <button type="button" class="btn btn-primary" id="updateProcess">Update Employee</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- viewDepartementModal -->
            <div class="modal fade" id="viewEmployeeModal" tabindex="-1" aria-labelledby="viewEmployeeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewEmployeeModalLabel">Detail Employee</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label class="form-label">Employee Name</label>
                                    <input type="text" class="form-control" id="employeeNameMV" disabled />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Employee Phone</label>
                                    <input type="text" class="form-control" id="employeePhoneMV" disabled />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Employee Address</label>
                                    <input type="text" class="form-control" id="employeeAddressMV" disabled />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Departement Name</label>
                                    <input type="text" class="form-control" id="departementNameMV" disabled />
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
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
                            <h5 class="modal-title" id="deleteModalLabel">Delete Employee</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" class="form-control" id="idMD">
                            <p>Are you sure you want to delete this data employee?</p>
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
        $(document).on('click', '#process', function () {
            var name = $("#employeeNameM").val();
            var phone = $("#employeePhoneM").val();
            var address = $("#employeeAddressM").val();
            var departement = $("#departementSelectM").val();

            if (name != null && name !== "") {
                if (phone != null && phone !== "") {
                    if (address != null && address !== "") {
                        if (departement != null && departement !== "") {
                            $.ajax({
                                url: "masterEmployee/createEmployee",
                                type: 'post',
                                dataType: 'json',
                                data: {
                                    "name": name,
                                    "phone": phone,
                                    "address": address,
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
                            alert('Your departement is empty, please fill it in first');
                        }
                    } else {
                        alert('Your employee address is empty, please fill it in first');
                    }
                } else {
                    alert('Your employee phone is empty, please fill it in first');
                }
            } else {
                alert('Your employee name is empty, please fill it in first');
            }
        });

        $(document).on('click', '#detailEmployee', function () {
            name = $(this).attr('data-nameMV');
            phone = $(this).attr('data-phoneMV');
            address = $(this).attr('data-addressMV');
            tname = $(this).attr('data-tnameMV');

            $('#employeeNameMV').val(name);
            $('#employeePhoneMV').val(phone);
            $('#employeeAddressMV').val(address);
            $('#departementNameMV').val(tname);
        });

        $(document).on('click', '#updateEmployee', function () {
            id = $(this).attr('data-idMU');
            name = $(this).attr('data-nameMU');
            phone = $(this).attr('data-phoneMU');
            address = $(this).attr('data-addressMU');
            departementId = $(this).attr('data-didMU');

            $('#employeeIdMU').val(id);
            $('#employeeNameMU').val(name);
            $('#employeePhoneMU').val(phone);
            $('#employeeAddressMU').val(address);
            document.getElementById('departementSelectMU').value = departementId;
        });

        $(document).on('click', '#updateProcess', function () {
            var id = $('#employeeIdMU').val();
            var name = $("#employeeNameMU").val();
            var phone = $("#employeePhoneMU").val();
            var address = $("#employeeAddressMU").val();
            var departementId = $("#departementSelectMU").val();

            if (name != null && name !== "") {
                if (phone != null && phone !== "") {
                    if (address != null && address !== "") {
                        if (departementId != null && departementId !== "") {
                            $.ajax({
                                url: "masterEmployee/updateEmployee",
                                type: 'post',
                                dataType: 'json',
                                data: {
                                    "id": id,
                                    "name": name,
                                    "phone": phone,
                                    "address": address,
                                    "departementId": departementId,
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
                            alert('Your departement is empty, please fill it in first');
                        }
                    } else {
                        alert('Your employee address is empty, please fill it in first');
                    }
                } else {
                    alert('Your employee phone is empty, please fill it in first');
                }
            } else {
                alert('Your employee name is empty, please fill it in first');
            }
        });

        $(document).on('click', '#deleteEmployee', function () {
            id = $(this).attr('data-idMD');

            $('#idMD').val(id);
        });

        $(document).on('click', '#deleteMD', function () {
            var id = $("#idMD").val();

            if (id != null && id !== "") {
                $.ajax({
                    url: "masterEmployee/deleteEmployee",
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
    });
</script>