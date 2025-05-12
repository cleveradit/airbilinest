<!-- partial:../../partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="<?php echo base_url() ?>hcp/assets/images/faces/face1.jpg" alt="profile" />
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2"><?php echo $user['username'] ?></span>
                    <span class="text-secondary text-small"><?php echo $user['profession'] ?></span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>hcp/dashboard/home/home.php">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>hcp/dashboard/worklist_px.php">
                <span class="menu-title">Worklist</span>
                <i class="fa fa-users menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>hcp/dashboard/patient/patient.php">
                <span class="menu-title">Patient</span>
                <i class="fa fa-users menu-icon"></i>
            </a>
        </li>
        <?php if (in_array($_SESSION['role'], ['Super Admin', 'Admin Institusi'])) { ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>hcp/dashboard/role/role.php">
                <span class="menu-title">Assign Role</span>
                <i class="fa fa-shield menu-icon"></i>
            </a>
        </li>
        <? } ?>
    </ul>
</nav>