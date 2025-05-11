<?php include include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/header.php'; ?>
<?php

$sql = "SELECT 
    p.*, 
    (
        SELECT m.tempat_rawat
        FROM medical_records m 
        WHERE m.patient_id = p.id 
        LIMIT 1
    ) AS tempat
FROM patients p;
";
$patient_result = $conn->query($sql);
$patients = [];

if ($patient_result->num_rows > 0) {
    while ($row = $patient_result->fetch_assoc()) {
        $patients[] = $row;
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
                    <h3 class="page-title"> Pasien </h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <!-- <li class="breadcrumb-item"><a href="#">Patient</a></li> -->
                            <li class="breadcrumb-item active" aria-current="page">Pasien</li>
                        </ol>
                    </nav>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <div class="wrapper d-flex align-items-center">
                                <h4 class="card-title">Data Pasien</h4>
                            </div>
                            <div class="wrapper ms-auto action-bar">
                                <button class="btn btn-sm btn-gradient-primary" onclick="window.location.href='patient_add.php'"><i class="fa fa-user me-1"></i> Tambah Pasien</button>
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
                                                        <th>ID Pasien</th>
                                                        <th>Tempat Rawat</th>
                                                        <th>Nama</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Berat</th>
                                                        <th>Tgl Lahir</th>
                                                        <th>Umur Hamil</th>
                                                        <th>Apgar</th>
                                                        <th>Lahir</th>
                                                        <th>Gol Darah</th>
                                                        <th>Rhesus</th>
                                                        <th>Etnis Ayah</th>
                                                        <th>Etnis Ibu</th>
                                                        <th>Rhesus Ibu</th>
                                                        <th>Gol Darah Ibu</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($patients as $index => $patient) { ?>
                                                        <tr>
                                                            <td><?php echo $index + 1 ?></td>
                                                            <td>
                                                                <a href="medical_record.php?id=<?php echo $patient['id'] ?>" class="btn btn-xs btn-outline btn-outline-success me-1" title="View History Rekam Medis">
                                                                    <i class="fa fa-book"></i>
                                                                </a>
                                                                <a href="patient_edit.php?id=<?php echo $patient['id'] ?>" class="btn btn-xs btn-outline btn-outline-info me-1" title="Edit">
                                                                    <i class="fa fa-pencil-square-o"></i>
                                                                </a>
                                                                <a href="#" class="btn btn-xs btn-outline btn-outline-danger me-1 btn-delete"
                                                                    title="Delete" data-id="<?= $patient['id'] ?>">
                                                                    <i class="fa fa-trash-o"></i>
                                                                </a>
                                                            </td>
                                                            <td><?php echo $patient['id'] ?></td>
                                                            <td><?php echo $patient['tempat'] ?></td>
                                                            <td><?php echo $patient['nama_pasien'] ?></td>
                                                            <td><?php echo $patient['jenis_kelamin'] ?></td>
                                                            <td><?php echo $patient['berat_lahir'] ?></td>
                                                            <td><?php echo $patient['tanggal_lahir'] ?></td>
                                                            <td><?php echo $patient['umur_kehamilan'] ?></td>
                                                            <td><?php echo $patient['skor_apgar'] ?></td>
                                                            <td><?php echo $patient['cara_lahir'] ?></td>
                                                            <td><?php echo $patient['golongan_darah'] ?></td>
                                                            <td><?php echo $patient['rhesus'] ?></td>
                                                            <td><?php echo $patient['etnis_ayah'] ?></td>
                                                            <td><?php echo $patient['etnis_ibu'] ?></td>
                                                            <td><?php echo $patient['rhesus_ibu'] ?></td>
                                                            <td><?php echo $patient['golongan_darah_ibu'] ?></td>
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

        $(document).on('click', '.btn-delete', function (e) {
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