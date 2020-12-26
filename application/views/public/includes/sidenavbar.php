<div id="sidebar">

    <div class="sidebar-header">
        <h3>Student Dashboard</h3>
    </div>
    <?php
    $id = $_SESSION['loginid'];
    $user = $this->frontend_model->get_records('tbl_general_users', "status = '0' and id = '$id'")[0];
    ?>

    <div class="d-user-avater">
        <?php if (empty($user->image)) { ?>
            <img src="<?= base_url() ?>assets/front/img/user.png" class="img-fluid avater" >
        <?php } else { ?>
            <img src="<?= base_url() ?>uploads/common/<?= $user->image; ?>" class="img-fluid avater" >
        <?php } ?>
        <h4><?= $user->first_name ?> <?= $user->last_name ?></h4>
        <span><?= $user->address ?></span>
    </div>
    <ul class="list-unstyled components">

        <li class="active"><a href="<?= base_url() ?>student-dashboard"><i class="fa fa-th" aria-hidden="true"></i> Dashboard</a></li>
        <li class="active"><a href="<?= base_url() ?>my-profile"><i class="ti-user"></i>My Profile</a></li>
        <li class="active"><a href="<?= base_url() ?>my-courses"><i class="ti-heart"></i>Courses</a></li>
        <li class="active"><a href="<?= base_url() ?>other-courses"><i class="ti-heart"></i>Other Courses</a></li>
        <li class="active"><a href="<?= base_url() ?>my-order"><i class="ti-shopping-cart"></i>My Order</a></li>
        <li class="active"><a href="<?= base_url() ?>change-password"><i class="ti-lock"></i>Change Password</a></li>
        <li class="active"><a href="<?= base_url() ?>reviews"><i class="ti-comment-alt"></i>Reviews</a></li>
        <li class="active"><a href="<?= base_url() ?>dashboard-faq"><i class="ti-comment-alt"></i>FAQ's</a></li>
        <li class="active"><a href="<?= base_url() ?>support"><i class="ti-comment-alt"></i>Support</a></li>
        <li class="active"><a href="logout"><i class="ti-power-off"></i>Log Out</a></li>


    </ul>


</div>