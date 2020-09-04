  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $title ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

    <div class="flash-data-error" data-flashdataerror="<?= $this->session->flashdata('error'); ?>"></div>

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <form action="<?= base_url('user/changepassword'); ?>" method="post">
          <!-- <?= form_error('currentPassword','<small class="text-danger ">','</small>') ?> -->
          <div class="input-group mb-3 col-lg-6">
            <input type="password" class="form-control" required name="currentPassword" placeholder="Current password">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-lock"></i></span>
            </div>
          </div>
          <?= form_error('newPassword','<small class="text-danger ">','</small>') ?>
          <div class="input-group mb-3 col-lg-6">
            <input type="password" class="form-control" required name="newPassword" placeholder="New password">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-lock"></i></span>
            </div>
          </div>
          <?= form_error('confirmPassword','<small class="text-danger ">','</small>') ?>
          <div class="input-group mb-3 col-lg-6">
            <input type="password" class="form-control" required name="confirmPassword" placeholder="Confirm password">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-lock"></i></span>
            </div>
          </div>
          <div class="input-group mb-3 col-lg-6">
            <button type="submit" class="btn btn-danger">Change Password</button>
          </div>
        </form>
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->

