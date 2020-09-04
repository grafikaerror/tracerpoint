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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
          
            <?= form_open_multipart('user/edit');?>
              <div class="card card-danger">
                <div class="card-body">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="text" class="form-control" value="<?= $user['email'] ?>" name="email" readonly>
                  </div>    
                  <?= form_error('name','<small class="text-danger ">','</small>') ?>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" style="text-transform:capitalize" value="<?= $user['name'] ?>" name="name">
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-3">
                        <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                      </div>
                      <div class="col-sm-9">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" name="image">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-danger float-right">Submit</button>    
                </div>
                <!-- /.card-body -->
              </div>
            </form>
          </div>
          <!-- /.col -->

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

