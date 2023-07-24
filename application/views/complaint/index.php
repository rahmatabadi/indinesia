<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Create Complaint Request</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"></h4>

                            <div class="mb-3">
                                <label class="form-label">Name </label>
                                <input type="text" class="form-control" id="name" required
                                    placeholder="Type your name" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Phone Number</label>
                                <div>
                                    <input type="tel" class="form-control" id="phone" required
                                        placeholder="+6285865xxxxxx">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Room Number</label>
                                <div>
                                    <input type="number" class="form-control" id="room" required placeholder="101">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Message</label>
                                <div>
                                    <textarea required class="form-control" rows="3" id="message"></textarea>
                                </div>
                            </div>


                            <div class="d-flex flex-wrap gap-2">
                                <button type="button" class="btn btn-primary waves-effect waves-light" id="process">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect">
                                    Cancel
                                </button>
                            </div>

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
        $(document).on('click', '#process', function () {
            console.log('clicked');
            var name = $("#name").val();
            var phone = $("#phone").val();
            var room = $("#room").val();
            var message = $("#message").val();

            if (name != null && name !== "") {
                if (phone != null && phone !== "") {
                    if (room != null && room !== "") {
                        if (message != null && message !== "") {
                            $.ajax({
                                url: "complaint/createComplaint",
                                type: 'post',
                                dataType: 'json',
                                data: {
                                    "name": name,
                                    "phone": phone,
                                    "room": room,
                                    "message": message,
                                    "_token": "{{ csrf_token() }}"
                                },

                                success: function (result) {
                                    console.log(result)

                                }
                            });

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
            // var namaDebit = $("#akunDebit option:selected").text();
            // var nominalDebit = $("#nominalDebit").val().replace("Rp. ", "").replace(/\./g, '');
            // var akunKredit = $("#akunKredit").val();
            // var namaKredit = $("#akunKredit option:selected").text();
            // var nominalKredit = $("#nominalKredit").val().replace("Rp. ", "").replace(/\./g, '');

            // var showAlert = true;

            // if (akunDebit != null) {
            //     if (nominalDebit != null && nominalDebit !== "") {
            //         if (akunKredit != null) {
            //             if (nominalKredit != null && nominalKredit !== "") {
            //                 if (akunDebit !== akunKredit) {
            //                     if (nominalDebit > 0 || nominalKredit > 0) {
            //                         if (nominalDebit === nominalKredit) {
            //                             showAlert = false;

            //                             $.ajax({
            //                                 url: "jurnalmanual/doJurnalManual",
            //                                 type: 'post',
            //                                 data: {
            //                                     "akunDebit": akunDebit,
            //                                     "namaDebit": namaDebit,
            //                                     "nominalDebit": nominalDebit,
            //                                     "akunKredit": akunKredit,
            //                                     "namaKredit": namaKredit,
            //                                     "nominalKredit": nominalKredit,
            //                                     "_token": "{{ csrf_token() }}"
            //                                 },

            //                                 success: function(result) {
            //                                     console.log(result)
            //                                     if (result.success) {
            //                                         alert(result.data);
            //                                         window.location.href =
            //                                             "/jurnaldk"; // Redirect to the jurnaldk page
            //                                     } else {
            //                                         showAlert =
            //                                             true; // Set flag variable to true to indicate that an alert message needs to be shown
            //                                         alert(result.data);
            //                                     }
            //                                 },
            //                                 complete: function() {
            //                                     if (showAlert) {
            //                                         window.location.href =
            //                                             "/jurnaldk"; // Redirect to the jurnaldk page
            //                                     }
            //                                 }
            //                             });
            //                         } else {
            //                             alert('Nominal Debit & Nominal Kredit harus sama');
            //                         }
            //                     } else {
            //                         alert('Nominal Debit / Nominal Kredit harus > 0');
            //                     }
            //                 } else {
            //                     alert('Akun Debit & Akun Kredit tidak boleh sama');
            //                 }
            //             } else {
            //                 alert('Isi Nominal Kredit');
            //             }
            //         } else {
            //             alert('Pilih Akun Kredit');
            //         }
            //     } else {
            //         alert('Isi Nominal Debit');
            //     }
            // } else {
            //     alert('Pilih Akun Debit');
            // }
        });
    });
</script>