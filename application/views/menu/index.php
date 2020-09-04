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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><?= $title?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          
        <?= form_error('menu','<div class="col-6 alert alert-warning text-center" role="alert">','</div>')?>
        <!-- <?= $this->session->flashdata('message');?> -->
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
            <a href="" class="btn btn-danger mb-3 " data-toggle="modal" data-target="#modalNewTable">Add New Menu</a>
          <div class="card">
            <div class="card-body ">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Menu</th>
                    <th>Action</th>
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
                      <a href="<?= base_url('menu/editMenu/').$m['id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                      <a href="<?= base_url('menu/deleteMenu/').$m['id']; ?>" class="btn btn-danger custom-btn-delete"><i class="fas fa-trash"></i></a>
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


  <div class="modal fade" id="modalNewTable">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add New Menu</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- form start -->
              <form action="<?= base_url('menu')?>" method="post">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="menuName">Menu name</label>
                        <input type="text" name="menu" class="form-control text-capitalize" id="menuName" placeholder="Enter menu name">
                      </div>
                
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Add</button>
                </div>
              </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
                  </div>
      <!-- /.modal -->
