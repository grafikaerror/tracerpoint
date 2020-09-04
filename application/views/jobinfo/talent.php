<!-- Page Content -->
<div class="container container-margin">

  <!-- Page Heading -->
  <h1 class="my-4">Talent</h1>

  <!-- Default box -->
  <div class="card card-solid">
    <div class="card-body pb-0">
      <div class="row d-flex align-items-stretch">
        <?php 
          foreach($alluser as $au):
        ?>
          <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
            <div class="card bg-light">
              <div class="card-body pt-3">
                <div class="row">
                  <div class="col-7">
                    <h2 class="lead text-capitalize"><b><?= $au['name'] ?></b></h2>
                    <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                    <ul class="ml-4 mb-0 fa-ul text-muted">
                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                    </ul>
                  </div>
                  <div class="col-5 text-center">
                    <img src="<?= base_url('assets/')?>img/profile/<?= $au['image'] ?>" alt="" class="img-circle img-fluid" style="object-fit:cover;width:80px; height: 80px">
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="text-right">
                  <a href="<?= base_url('jobhunter/profile/').$au['username']?>" class="btn btn-sm btn-primary">
                    <i class="fas fa-user"></i> View Profile
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php 
          endforeach;
        ?>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->


</div>
<!-- /.container -->