<?php include $_SERVER['DOCUMENT_ROOT'] . '/hcp/template/header.php'; ?>
<?php 
 
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
                        <h4>Hello! let's get started</h4>
                        <h6 class="font-weight-light">Sign in to continue.</h6>
                        <form class="pt-3" method="POST" action="">
                            <div class="form-group">
                                <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" name="email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password" required>
                            </div>
                            <div class="mt-3 d-grid gap-2">
                                <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                            </div>
                            <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="register.php" class="text-primary">Create</a>
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

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];

    $password = $_POST['password'];



    // Query untuk mencari user berdasarkan email

    $sql = "SELECT * FROM users WHERE email='$email'";

    $result = $conn->query($sql);


    if ($result->num_rows > 0) {

        $user = $result->fetch_assoc(); // Ambil data user

        // Verifikasi password

        if (password_verify($password, $user['password'])) {

            // Jika password cocok, simpan user ID dan username di session

            $_SESSION['user_id'] = $user['id'];

            $_SESSION['username'] = $user['username'];

            echo "<script>
                        showSuccessToast('Login success!');
                        setTimeout(function() {
                            window.location.href = '".base_url()."hcp/dashboard/home/home.php';
                        }, 2600); // 2.6 detik = 2600 ms
                    </script>;";

        } else {

            echo "<script>
                        showDangerToast('The Password is Incorrect!');
                    </script>;";

        }

    } else {

        echo "<script>
                        showDangerToast('Email Could not be Found!');
                    </script>;";

    }

}
?>