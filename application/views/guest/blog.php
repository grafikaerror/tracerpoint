<!-- Page Content -->
<div class="container container-margin">

<div class="row">


  <!-- Blog Entries Column -->
    <!-- <h1 class="my-4 text-danger"><b>News</b></h1> -->

<?php foreach($post as $p):?>
<div class="col-md-6">
    <!-- Blog Post -->
    <div class="card mb-4">
      <img class="card-img-top object-cover-img" src="<?= base_url('assets/img/blog/').$p['image']?>" alt="Card image cap">
      <div class="card-body">
        <h2><?= $p['title']?></h2>
        <p class="card-text"><?= word_limiter($p['content'],50)?></p>
        <a href="<?= base_url('guest/blogDetail/').$p['id']?>" class="btn btn-danger">Read More &rarr;</a>
      </div>
      <div class="card-footer text-muted">
        Posted on <?= date('d F Y', $p['date_created'])?>
      </div>
    </div>
</div>
<?php endforeach;?>
  </div>
</div>
<!-- /.row -->
<?php
    echo $this->pagination->create_links();
?>
</div>
<!-- /.container -->