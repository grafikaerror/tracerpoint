

  <!-- Jumbotron -->
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h4 class="display-4-header">Welcome to Tracerpoint!</h4>
      <h1 class="display-4"><span> An online marketplace for Job Info, Creative Services & Marketing Influencer</span></h1>
      <a href="#" class="btn btn-danger btn-lg tombol">Lets Start!</a>
    </div>
  </div>
  <!-- akhir Jumbotron -->


  <!-- container -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="">News
          <!-- <small>Secondary Text</small> -->
        </h1>

        <?php foreach ($post as $p):?>
        <!-- Blog Post -->
        <div class="card mb-4">
          <img class="card-img-top" src="<?=base_url('assets/img/blog/').$p['image']?>" alt="Card image cap">
          <div class="card-body">
            <h2 class=""><?=$p['title']?></h2><br>
            <p class="card-text"><?= word_limiter($p['content'],50)?><a href="<?= base_url('guest/blogdetail/').$p['id']?>">Read more</a></p>
          </div>
          <div class="card-footer text-muted">
            Posted on <?= date('d F Y', $p['date_created'])?>
          </div>
        </div>
        <?php endforeach;?>


      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">
        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header ">Our Partners</h5>
          <div class="card-body">
            <div class="ml-5">
              <a href="http://alifkecil.com/"  target="_blank"><img class="img-thumbnail mr-2 mb-2" style="width:100px;height;100px" src="http://alifkecil.com/wp-content/uploads/2019/11/cropped-asdfg.png" alt=""></a>
              <a href="http://kopi17an.com/" target="_blank"><img class="img-thumbnail mr-2 mb-2" style="width:100px;height;100px" src="<?= base_url('assets/dist/img/kopi17an.png')?>" alt=""></a>
              <a href="http://kalijagatour.com/" target="_blank"><img class="img-thumbnail mr-2 mb-2" style="width:100px;height;100px" src="<?= base_url('assets/dist/img/kalijaga.png')?>" alt=""></a>
              <a href="https://www.instagram.com/luciddream_co/" target="_blank"><img class="img-thumbnail mr-2 mb-2" style="width:100px;height;100px" src="https://scontent-sin6-1.cdninstagram.com/v/t51.2885-15/e35/s150x150/78927306_106183690798117_7283594674530157428_n.jpg?_nc_ht=scontent-sin6-1.cdninstagram.com&_nc_cat=101&_nc_ohc=xHhachMSlBYAX8rD8Pi&oh=f09e78d867f042ef845734f99143ebc1&oe=5EA363F2" alt=""></a>
              <a href="http://smkn12malang.sch.id/in/" target="_blank"><img class="img-thumbnail mr-2 mb-2" style="width:100px;height;100px" src="http://smkn12malang.sch.id/in/wp-content/uploads/2018/10/cropped-logo.jpg" alt=""></a>
            </div>  
          </div>
        </div>
      </div>

    </div>
    <!-- /.row -->

    <div class="row">
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center">NEEDED IMMEDIATELY</h5>
            <p class="card-text">A large company in the construction field requires immediately a secretary who
              experienced.
              <br>DIRECTOR'S SECRETARY
              <br>Requested candidates:
              <ul>
                <li>secretary academy graduate.</li>
                <li>Placed in Jakarta.</li>
                <li>Minimum 2 years experience.</li>
                <li>Fluent in English and Mandarin.</li>
              </ul>
            </p>
            <a href="#" class="btn btn-danger">Go somewhere</a>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center">NEEDED IMMEDIATELY</h5>
            <p class="card-text">A large company in the construction field requires immediately a secretary who
              experienced.
              <br>DIRECTOR'S SECRETARY
              <br>Requested candidates:
              <ul>
                <li>secretary academy graduate.</li>
                <li>Placed in Jakarta.</li>
                <li>Minimum 2 years experience.</li>
                <li>Fluent in English and Mandarin.</li>
              </ul>
            </p>
            <a href="#" class="btn btn-danger">Go somewhere</a>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card mb-3">
          <img src="<?=base_url('assets/dist/img/')?>ourteam.jpg" style="object-fit:cover;" class="card-img-top" width="100%" height="250" alt="...">

          <div class="card-body">
            <h1 class="">Our team</h1>
            <p>Each member of our team is a specialist in his or her field. Together, we make sure you’re investing where the best returns are while building loyalty across every touchpoint.</p>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- akhir container -->

 