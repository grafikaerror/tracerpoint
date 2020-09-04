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
              <a href="" class="btn btn-danger mb-3 " data-toggle="modal" data-target="#modalNewPost">Add New Post</a>  
          </div>
          <div class="card ">
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                      $no=1;
                    ?>
                  <?php foreach ($blog as $b): ?>
                  <tr>
                    <td><?= $no?><?php $no++ ?></td>
                    <td width="1000"><?= $b['title']?></td>
                    <td width="1000"><?= word_limiter($b['content'],22)?></td>
                    <td >
                      <img width="100" src="<?= base_url('assets/img/blog/').$b['image']?>" alt="">
                    </td>
                    <td width="200">
                      <a href="<?= base_url('blog/detailBlog/').$b['id']; ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                      <a href="<?= base_url('blog/deleteBlog/').$b['id']; ?>" class="btn btn-danger custom-btn-delete"><i class="fas fa-trash"></i></a>
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
    </section>
  </div>
  <!-- /.content-wrapper -->

<!-- Modal -->
<div class="modal fade d-example-modal-xl" id="modalNewPost">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <?php echo form_open_multipart('blog/upload');?>
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add post</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" name="title" class="form-control" id="title">
            </div>
            <div class="form-group">
              <label for="title">Content</label>
              <textarea name="content" id="summernote"></textarea>
            </div>
            <div class="custom-file col-sm-8">
              <input type="file" class="custom-file-input" id="customFile" name="image">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Post</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /.modal -->