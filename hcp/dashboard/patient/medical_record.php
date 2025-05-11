<?php include include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/header.php'; ?>
<?php



$patient_id = $_GET['id'];

$sql = "SELECT * FROM patients WHERE id='$patient_id'";

$result_patient = $conn->query($sql);

$patient = $result_patient->fetch_assoc();

$sql = "SELECT m.*, p.nama_pasien, u.username as nama_dokter FROM medical_records AS m JOIN patients AS p ON p.id = m.patient_id JOIN users AS u ON u.id = m.user_id WHERE m.patient_id='$patient_id'";
$result_medical_record = $conn->query($sql);
$medical_records = [];

if ($result_medical_record->num_rows > 0) {
    while ($row = $result_medical_record->fetch_assoc()) {
        $medical_records[] = $row;
    }
}

?>
<div class="container-scroller">
    <!-- Sidebar -->
    <?php include include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/navbar.php'; ?>

    <div class="container-fluid page-body-wrapper">
        <!-- Navbar -->
        <?php include include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/sidebar.php'; ?>

        <!-- Main Content Start -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title"> Pasien : <?php echo $patient['nama_pasien'] ?> </h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="patient.php">Pasien</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Rekam medis</li>
                        </ol>
                    </nav>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <div class="wrapper d-flex align-items-center">
                                <h4 class="card-title">Data Rekam Medis</h4>
                            </div>
                            <div class="wrapper ms-auto action-bar">
                                <button class="btn btn-sm btn-gradient-primary" onclick="window.location.href='medical_record_add.php?id=<?php echo $patient['id'] ?>'"><i class="fa fa-book me-1"></i> Tambah Rekam Medis</button>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-12">
                                <div id="order-listing_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="order-listing" class="table dataTable no-footer display responsive nowrap" aria-describedby="order-listing_info" style="font-size:small">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Aksi</th>
                                                        <th>Tanggal</th>
                                                        <th>Pasien</th>
                                                        <th>Dokter</th>
                                                        <th>Bilinorm</th>
                                                        <th>Lama Fototerapi</th>
                                                        <th>Intensitas</th>
                                                        <th>Sebelum Fototerapi</th>
                                                        <th>Sesudah Fototerapi</th>
                                                        <th>Observasi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($medical_records as $index => $medical_record) { ?>
                                                        <tr>
                                                            <td><?php echo $index + 1 ?></td>
                                                            <td>
                                                                <!-- <a href="detail_rekam_medis.php?id=<?php echo $medical_record['id'] ?>" class="text-success" title="View Rekam Medis">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                                <a href="#" class="text-danger" title="Delete" data-toggle="modal" data-target="#deleteMedicalRecordModal" data-id="<?= $medical_record['id'] ?>">
                                                                    <i class="fa fa-trash-o"></i>
                                                                </a> -->
                                                            </td>
                                                            <td><?php echo $medical_record['tanggal_ambil_data'] ?></td>
                                                            <td><?php echo $medical_record['nama_pasien'] ?></td>
                                                            <td><?php echo $medical_record['nama_dokter'] ?></td>
                                                            <td><?php echo $medical_record['hasil_bilinorm'] ?></td>
                                                            <td><?php echo $medical_record['lama_fototerapi'] ?></td>
                                                            <td><?php echo $medical_record['intensitas_fototerapi'] ?></td>
                                                            <td>
                                                                TCB <?php echo $medical_record['tcb_sebelum_fototerapi'] ?>;
                                                                TSB<?php echo $medical_record['tsb_sebelum_fototerapi'] ?>
                                                            </td>
                                                            <td>
                                                                TCB<?php echo $medical_record['tcb_sesudah_fototerapi'] ?>;
                                                                TSB<?php echo $medical_record['tsb_sesudah_fototerapi'] ?>
                                                            </td>
                                                            <td><?php echo $medical_record['observasi'] ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2025 <a href="#">GP</a>. All rights reserved.</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted &amp; made with <i class="mdi mdi-heart text-danger"></i></span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>

    <?php include include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/footer.php'; ?>

    <script>
        $(document).ready(function() {

            new DataTable('#order-listing', {
                layout: {
                    topStart: {
                        buttons: [{
                            extend: 'excel',
                            text: '<i class="fa fa-file-excel-o me-1"></i> Excel',
                            className: 'btn btn-xs btn btn-gradient-success' // Ganti dengan class yang kamu inginkan
                        }]
                    }
                },
                responsive: true
            });

        })

        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault();
            const patientId = $(this).data('id');

            Swal.fire({
                title: 'Are you sure you want to delete this patient?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect ke controller PHP atau AJAX
                    window.location.href = `patient_delete.php?id=${patientId}`;
                    // atau jika pakai AJAX, kirim request di sini
                }
            });
        });
    </script>