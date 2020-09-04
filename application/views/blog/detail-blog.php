  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blog</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blog</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main Content -->
    <section class="content">
        <div class="row">
          <div class="col-12">
              <?= form_error('post','<div class="col-6 alert alert-warning text-center" role="alert">','</div>')?>
              <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
          </div>
          <div class="col-md-10 ml-auto mr-auto">
            <div class="card mb-4">
              <img class="card-img-top" src="<?=base_url('assets/img/blog/').$detail['image']?>" alt="Card image cap">
              <div class="card-body">
                <h2 class=""><?= $detail['title']?></h2><br>
                <p class="card-text"><?= $detail['content']?></p>
              </div>
              <div class="card-footer text-muted">
                Posted on <?= date('d F Y', $detail['date_created'])?>
                <!-- <a href="#">Start Bootstrap</a> -->
              </div>
            </div>
          </div>
        </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
