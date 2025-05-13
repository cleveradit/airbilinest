<?php include include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/header.php'; ?>
<?php

$institution = $_SESSION['institution'];
$user_id = $_SESSION['user_id'];
$where = '';
if($_SESSION['role']=='Admin Institusi'){
    $where = "WHERE (role != 'Super Admin' OR role IS NULL) AND institution = '$institution'";
}
if($_SESSION['role']=='Dokter'){
    $where = "WHERE user_id = '$user_id'";
}

$sql = "SELECT w.*, u.username FROM worklist as w JOIN users as u ON u.id = w.user_id $where ORDER BY w.created_at DESC;
";
$worklist_result = $conn->query($sql);
$worklists = [];

if ($worklist_result->num_rows > 0) {
    while ($row = $worklist_result->fetch_assoc()) {
        $worklists[] = $row;
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
                    <h3 class="page-title"> Worklist </h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <!-- <li class="breadcrumb-item"><a href="#">Patient</a></li> -->
                            <li class="breadcrumb-item active" aria-current="page">Worklist</li>
                        </ol>
                    </nav>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <div class="wrapper d-flex align-items-center">
                                <h4 class="card-title">Worklist Pasien</h4>
                            </div>
                            <div class="wrapper ms-auto action-bar">
                                <button class="btn btn-sm btn-gradient-primary" onclick="window.location.href='worklist_px_add.php'"><i class="fa fa-user me-1"></i> Tambah Pasien</button>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-12">
                                <div id="order-listing_wrapper" class="">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="order-listing" class="table dataTable" style="font-size:small">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Aksi</th>
                                                        <th>ID Pasien</th>
                                                        <th>Nama Pasien</th>
                                                        <th>Nama Dokter</th>
                                                        <th>Alamat</th>
                                                        <th>Tempat Rawat</th>
                                                        <th>Tanggal Fototerapi</th>
                                                        <th>Waktu Fototerapi</th>
                                                        <th>Etnis Ayah</th>
                                                        <th>Etnis Ibu</th>
                                                        <th>Golongan Darah Ibu</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Berat Lahir</th>
                                                        <th>Tanggal Lahir</th>
                                                        <th>Umur Kehamilan</th>
                                                        <th>Skor Apgar</th>
                                                        <th>Cara Melahirkan</th>
                                                        <th>Golongan Darah</th>
                                                        <th>Rhesus</th>
                                                        <th>Berat Aktual</th>
                                                        <th>HR</th>
                                                        <th>RR</th>
                                                        <th>Eritma</th>
                                                        <th>Suhu Aksila</th>
                                                        <th>Status Hidrasi</th>
                                                        <th>Keaspadaan / GCS-I Skor</th>
                                                        <th>Hemoglobin</th>
                                                        <th>Hematokrit</th>
                                                        <th>Jumlah Sel Darah Merah</th>
                                                        <th>Jumlah Sel Darah Putih</th>
                                                        <th>Jumlah Trombosit</th>
                                                        <th>Hasil Darah</th>
                                                        <th>Hasil Bilinorm</th>
                                                        <th>Alat Fototerapi</th>
                                                        <th>Lama Fototerapi</th>
                                                        <th>Waktu Mulai</th>
                                                        <th>Waktu Lepas</th>
                                                        <th>Intensitas Fototerapi</th>
                                                        <th>TCB Sebelum Fototerapi</th>
                                                        <th>TSB Sebelum Fototerapi</th>
                                                        <th>TCB Sesudah Fototerapi</th>
                                                        <th>TSB Sesudah Fototerapi</th>
                                                        <th>Observasi Fototerapi</th>
                                                        <th>Catatan</th>
                                                    </tr>
                                                    <!-- <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th><input type="text" /></th>
                                                        <th><input type="text" /></th>
                                                        <th></th>
                                                        <th><input type="text"/></th>
                                                        <th><input type="text" /></th>
                                                        <th><input type="text" /></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th><input type="text" /></th>
                                                        <th></th>
                                                        <th><input type="text" /></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr> -->
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($worklists as $index => $worklist) { ?>
                                                        <tr>
                                                            <td><?= $index + 1 ?></td>
                                                            <td>
                                                                
                                                                <!-- view -->
                                                                <a href="worklist_px_view.php?id=<?= $worklist['id'] ?>" class="btn btn-xs btn-outline btn-outline-success me-1" title="View Detail">
                                                                    <i class="fa fa-book"></i>
                                                                </a>
                                                                <a href="worklist_px_edit.php?id=<?= $worklist['id'] ?>" class="btn btn-xs btn-outline btn-outline-info me-1" title="Edit">
                                                                    <i class="fa fa-pencil-square-o"></i>
                                                                </a>
                                                                <a href="#" class="btn btn-xs btn-outline btn-outline-danger me-1 btn-delete"
                                                                    title="Delete" data-id="<?= $worklist['id'] ?>">
                                                                    <i class="fa fa-trash-o"></i>
                                                                </a>
                                                            </td>
                                                            <td><?= $worklist['id'] ?></td>
                                                            <td><?= $worklist['nama_pasien'] ?></td>
                                                            <td><?= $worklist['username'] ?></td>
                                                            <td><?= $worklist['alamat'] ?></td>
                                                            <td><?= $worklist['tempat_rawat'] ?></td>
                                                            <td><?= $worklist['tanggal_ambil_data'] ?></td>
                                                            <td><?= $worklist['waktu_fototerapi'] ?></td>
                                                            <td><?= $worklist['etnis_ayah'] ?></td>
                                                            <td><?= $worklist['etnis_ibu'] ?></td>
                                                            <td><?= $worklist['golongan_darah_ibu'] ?></td>
                                                            <td><?= $worklist['jenis_kelamin'] ?></td>
                                                            <td><?= $worklist['berat_lahir'] ?></td>
                                                            <td><?= $worklist['tanggal_lahir'] ?></td>
                                                            <td><?= $worklist['umur_kehamilan'] ?></td>
                                                            <td><?= $worklist['skor_apgar'] ?></td>
                                                            <td><?= $worklist['cara_lahir'] ?></td>
                                                            <td><?= $worklist['golongan_darah'] ?></td>
                                                            <td><?= $worklist['rhesus'] ?></td>
                                                            <td><?= $worklist['berat_aktual'] ?></td>
                                                            <td><?= $worklist['hr'] ?></td>
                                                            <td><?= $worklist['rr'] ?></td>
                                                            <td><?= $worklist['eritema'] ?></td>
                                                            <td><?= $worklist['suhu_aksila'] ?></td>
                                                            <td><?= $worklist['status_hidrasi'] ?></td>
                                                            <td><?= $worklist['kewaspadaan'] ?></td>
                                                            <td><?= $worklist['hemoglobin'] ?></td>
                                                            <td><?= $worklist['hematokrit'] ?></td>
                                                            <td><?= $worklist['jumlah_sel_darah_merah'] ?></td>
                                                            <td><?= $worklist['jumlah_sel_darah_putih'] ?></td>
                                                            <td><?= $worklist['jumlah_trombosit'] ?></td>
                                                            <td><?= $worklist['hasil_darah'] ?></td>
                                                            <td><?= $worklist['hasil_bilinorm'] ?></td>
                                                            <td><?= $worklist['alat_fototerapi'] ?></td>
                                                            <td><?= $worklist['lama_fototerapi'] ?></td>
                                                            <td><?= $worklist['waktu_mulai_fototerapi'] ?></td>
                                                            <td><?= $worklist['waktu_lepas_fototerapi'] ?></td>
                                                            <td><?= $worklist['intensitas_fototerapi'] ?></td>
                                                            <td><?= $worklist['tcb_sebelum_fototerapi'] ?></td>
                                                            <td><?= $worklist['tsb_sebelum_fototerapi'] ?></td>
                                                            <td><?= $worklist['tcb_sesudah_fototerapi'] ?></td>
                                                            <td><?= $worklist['tsb_sesudah_fototerapi'] ?></td>
                                                            <td><?= $worklist['observasi'] ?></td>
                                                            <td><?= $worklist['catatan'] ?></td>
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
                            className: 'btn btn-xs btn btn-gradient-success', // Ganti dengan class yang kamu inginkan
                            exportOptions: {
                                // Hanya ekspor kolom yang visible KECUALI kolom Aksi (index 1)
                                columns: function (idx, data, node) {
                                    return idx !== 1;
                                }
                            }
                        }]
                    }
                },
                columnDefs: [
                    {
                        targets: [
                            0, 4, 8, 9, 10, 11, 13,
                            15, 16, 17, 18, 19,
                            20, 21, 22, 23, 24,
                            25, 26, 27, 28, 29,
                            30, 31, 32, 33, 34,
                            35, 36, 37, 38, 39,
                            40, 41, 42, 43, 44
                        ],
                        visible: false
                    }
                ],
                // initComplete: function () {
                //     // Cari baris kedua (baris filter)
                //     this.api().columns().every(function () {
                //         var column = this;
                //         $('input', column.header()).on('keyup change clear', function () {
                //             if (column.search() !== this.value) {
                //                 column.search(this.value).draw();
                //             }
                //         });
                //     });
                // }
            });

        })

        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault();
            const worklistId = $(this).data('id');

            Swal.fire({
                title: 'Are you sure you want to delete this patient?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, Delete!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect ke controller PHP atau AJAX
                    window.location.href = `worklist_px_delete.php?id=${worklistId}`;
                    // atau jika pakai AJAX, kirim request di sini
                }
            });
        });
    </script>