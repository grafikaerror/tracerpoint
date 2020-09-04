<!-- Page Content -->
<div class="container container-margin">

  <!-- Page Heading -->
<h1 class="my-4 text-center title-content">Vacancy</h1>

  <!-- Default box -->
  <div class="card card-solid">
    <div class="card-body pb-0">
      <div class="row d-flex align-items-stretch">
        <?php foreach($vacancy as $v):
          if($v['date_upload']>time()):  
        ?>
        <div class="col-md-6 ">
          <div class="card bg-light">
            <!-- <div class="card-header text-muted border-bottom-0">
              Digital Strategist
            </div> -->
            <div class="card-body pt-3">
              <?= word_limiter($v['content'],40)?>
            </div>
            <!-- <div class="card-footer">
              <div class="text-right">
                <a href="#" class="btn btn-sm btn-primary">
                  <i class="fas fa-user"></i> View Profile
                </a>
              </div>
            </div> -->
          </div>
        </div>
        <?php endif;endforeach;?>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->


</div>
<!-- /.container -->