<?php include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/header.php'; ?>
<?php

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;



require $_SERVER['DOCUMENT_ROOT'] . 'PHPMailer/src/Exception.php';

require $_SERVER['DOCUMENT_ROOT'] . 'PHPMailer/src/PHPMailer.php';

require $_SERVER['DOCUMENT_ROOT'] . 'PHPMailer/src/SMTP.php';


?>
<div class="jq-toast-single jq-has-icon jq-icon-success" style="text-align: left; display: none;">
    <span class="jq-toast-loader jq-toast-loaded" style="-webkit-transition: width 2.6s ease-in; -o-transition: width 2.6s ease-in; transition: width 2.6s ease-in; background-color: #f96868;"></span>
    <span class="close-jq-toast-single">×</span>
    <h2 class="jq-toast-heading">Success</h2>
</div>
<div class="jq-toast-wrap top-right">
    <div class="jq-toast-single jq-has-icon jq-icon-error" style="text-align: left; display: none;"><span class="jq-toast-loader jq-toast-loaded" style="-webkit-transition: width 2.6s ease-in;                       -o-transition: width 2.6s ease-in;                       transition: width 2.6s ease-in;                       background-color: #f2a654;"></span><span class="close-jq-toast-single">×</span>
        <h2 class="jq-toast-heading">Danger</h2>
    </div>
</div>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="row flex-grow">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left p-5">
                        <div class="brand-logo">
                            <img src="<?php echo base_url() ?>assets/airbilinest_logo.png">
                        </div>
                        <h4>New here?</h4>
                        <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                        <form method="POST" action="">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="name" name="username" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" name="email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg" id="exampleInputPassword2" placeholder="Confirm Password" name="confirm_password" required>
                            </div>
                            <div class="form-group">
                                <select class="form-select form-select-lg" id="profession" name="profession">
                                    <option>Profession</option>
                                    <option value="Fresh Parent">Fresh Parent</option>
                                    <option value="Parent">Parent</option>
                                    <option value="Doctor">Doctor</option>
                                    <option value="Nurse">Nurse</option>
                                    <option value="Lecture">Lecture</option>
                                    <option value="Pharmacist">Pharmacist</option>
                                    <option value="Investor">Investor</option>
                                    <option value="Medical Student">Medical Student</option>
                                    <option value="Other Graduate Student">Other Graduate Student</option>
                                    <option value="Other Undergraduate Students">Other Undergraduate Students</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="form-group" id="form-other-profession">
                                <input type="text" class="form-control form-control-lg" id="other_profession" placeholder="Profession" name="profession_other">
                            </div>
                            <div class="form-group">
                                <select class="form-select form-select-lg" id="institution" name="institution">
                                    <option>Institution</option>
                                    <option value="PT Medika Karya Airlangga">PT Medika Karya Airlangga</option>
                                    <option value="RS UNIVERSITAS AIRLANGGA">RS UNIVERSITAS AIRLANGGA</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <div class="form-check">
                                    <label class="form-check-label text-muted">
                                        <input type="checkbox" class="form-check-input" required> I agree to all Terms & Conditions </label>
                                </div>
                            </div>
                            <div class="mt-3 d-grid gap-2">
                                <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                            </div>
                            <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="login.php" class="text-primary">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/footer.php'; ?>
<script>
    $(document).ready(function() {
        $('#form-other-profession').hide()

        $("#profession").on("change", function() {
            toggleProfesiLainnya()
        });

    });

    function toggleProfesiLainnya() {

        if ($('#profession').val() == 'Other') {
            $('#form-other-profession').show()
            $('#other_profession').attr('required', true)
        } else {
            $('#form-other-profession').hide()
            $('#other_profession').removeAttr('required')
        }
    }
</script>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];

    $email = $_POST['email'];

    $password = $_POST['password'];

    $confirm_password = $_POST['confirm_password'];

    //$password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash password

    // Ambil profesi dari dropdown atau input teks

    $profession = ($_POST['profession'] === 'Other') ? $_POST['other_profession'] : $_POST['profession'];

    //$profession = $_POST['profession']; // Ambil data profesi dari form

    $institution = $_POST['institution'];



    // Validasi password dan konfirmasi password

    if ($password != $confirm_password) {

        echo "<script>showDangerToast('Error: Password tidak sama!');</script>;";
    } else {

        $hashed_password = password_hash($password, PASSWORD_BCRYPT);



        // Cek apakah email sudah terdaftar

        $check_email_sql = "SELECT * FROM users WHERE email='$email'";

        $check_email_result = $conn->query($check_email_sql);



        if ($check_email_result->num_rows > 0) {

            // Jika email sudah terdaftar, tampilkan pesan error

            echo '<div class="error-message">Email sudah terdaftar. Silakan gunakan email lain.</div>';
        } else {

            // Jika email belum terdaftar, simpan data pengguna baru

            $sql = "INSERT INTO users (username, email, password, profession, institution) VALUES ('$username', '$email', '$hashed_password', '$profession', '$institution')";



            if ($conn->query($sql)) {

                echo "<script>
                        showSuccessToast('Register berhasil, silahkan login');
                        setTimeout(function() {
                            window.location.href = 'login.php';
                        }, 2600); // 2.6 detik = 2600 ms
                    </script>;";
            } else {

                echo "<script>
                            showDangerToast('Error:' " . $conn->error . ");
                        </script>;";
            }
        }
    }
}
?>
