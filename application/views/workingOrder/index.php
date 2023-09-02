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
                                                    <li data-bs-toggle="modal" data-bs-target="#updateCategoryModal"
                                                        id="updateCategory" data-idMU="<?= $m['category_complaint_id'] ?>"
                                                        data-nameMU="<?= $m['category_complaint_name'] ?>"
                                                        data-descMU="<?= $m['category_complaint_desc'] ?>"
                                                        data-didMU="<?= $m['id'] ?>">
                                                        <a class="btn btn-sm btn-soft-info"><i
                                                                class="mdi mdi-pencil-outline"></i></a>
                                                    </li>
                                                    <li data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                        id="deleteEmployee" data-idMD="<?= $m['category_complaint_id'] ?>">
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
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


</div>
<!-- end main content-->

<script>
    $(document).ready(function ($) {

    });
</script>