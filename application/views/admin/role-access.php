<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $title?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('admin/role'); ?>"><?= $title?></a></li>
              <li class="breadcrumb-item active"><?= $role['role']?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          
        <?= $this->session->flashdata('message');?>
          <div class="card">
            <div class="card-body ">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Menu</th>
                    <th>Access</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                      $no=1;
                    ?>
                  <?php foreach ($menu as $m): ?>
                  <tr>
                    <td><?= $no?><?php $no++ ?></td>
                    
                    <td><?= $m['menu']?></td>
                    
                    <td width="">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
                            </div>
                        </div>
                    </td>
                  </tr>
                  <?php endforeach;?>
                </tbody>
                
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  