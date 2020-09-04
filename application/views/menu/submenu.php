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
          <?php if(validation_errors()):?>
            <div class=" alert alert-warning " role="alert">
                <?= validation_errors()?>
            </div>
          <?php endif;?>
        <?= form_error('menu','<div class="col-6 alert alert-warning text-center" role="alert">','</div>')?>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        <!-- <?= $this->session->flashdata('message');?> -->
            <a href="" class="btn btn-danger mb-3 " data-toggle="modal" data-target="#modalNewTable">Add New Submenu</a>
          <div class="card ">
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Menu</th>
                    <th>Url</th>
                    <!-- <th>Icon</th> -->
                    <th>Active</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                      $no=1;
                    ?>
                  <?php foreach ($subMenu as $sm): ?>
                  <tr>
                    <td><?= $no?><?php $no++ ?></td>
                    <td><?= $sm['title']?></td>
                    <td><?= $sm['menu']?></td>
                    <td><?= $sm['url']?></td>
                    <!-- <td><?= $sm['icon']?></td> -->
                    <td><?= $sm['is_active']?></td>
                    <td width="1000">
                      <a href="<?= base_url('menu/editSubMenu/').$sm['id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                      <a href="<?= base_url('menu/deleteSubMenu/').$sm['id']; ?>" class="btn btn-danger custom-btn-delete"><i class="fas fa-trash"></i></a>
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
              <h4 class="modal-title">Add New Submenu</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- form start -->
              <form action="<?= base_url('menu/submenu')?>" method="post">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="menuName">Title</label>
                        <input type="text" name="title" class="form-control  " id="menuName" placeholder="Enter title submenu name" required>
                      </div>
                        <div class="form-group">
                            <label>Menu</label>
                            <select name="menu_id" class="custom-select">
                              <option>-Select Menu-</option>
                              <?php foreach ($menu as $m):?>
                                <?php if ($m['menu'] == true) :?>
                                    <option value="<?= $m['id']?>"><?= $m['menu']?></option>
                                    <?php endif;?>
                                    <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="url">Url</label>
                            <input type="text" name="url" class="form-control  " id="url" placeholder="Enter url" required>
                        </div>
                        <div class="form-group">
                            <label for="icon">Icon</label>
                            <input type="hidden" name="icon" class="form-control" id="icon" value="fas fa-fw fa-code" >
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input name="is_active" class="custom-control-input" type="checkbox" id="is_active" value="1" checked >
                                <label for="is_active" class="custom-control-label">Active ?</label>
                            </div>
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
