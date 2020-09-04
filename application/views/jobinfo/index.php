<!-- Page Content -->
<div class="container container-margin">
<div class="card">
    <div class="card-header p-2">
      <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Your Vacancy</a></li>
        <li class="nav-item"><a class="nav-link" href="#post" data-toggle="tab">Post</a></li>
      </ul>
    </div><!-- /.card-header -->
    <div class="card-body">
      <div class="tab-content">
        <div class="tab-pane active" id="activity">
          <?php
            $id_user = $user['id'];
            $vacancy = $this->db->query("SELECT * FROM user_vacancy WHERE id_user = $id_user")->result_array();
        
          ?>
          <?php if($vacancy == empty(1)):?>
          <div class="post">
            <div class="user-block text-center">
            You have not posted a vacancy
            </div>
          </div>
          <?php endif?>
          <?php  foreach($vacancy as $vc):?>
          <!-- Post -->
          <div class="post">
            <div class="user-block">
              <img class="img-circle img-bordered-sm" style="object-fit:cover;width:40px; height: 40px" src="<?= base_url('assets/')?>img/profile/<?= $user['image'] ?>" alt="user image">
              <span class="username">
                <a href="#"><?=$user['name']?></a>
                <a href="#" class="float-right btn-tool"></i></a>
              </span>
              <span class="description">Status - 
                <?php if($vc['date_upload']>time()):?>
                  <div class="badge badge-pil badge-success">Active</div>
                <?php else:?>
                  <div class="badge badge-pil badge-danger">Not active</div>
                <?php endif;?>
              </span>
              <?php $tot=$vc['date_upload']-time();;
                $int=$tot/(60*60*24);
                if($int>0):
              ?>
                <span class="description">Expired <?php echo round($int) ?> Day</span>
              <?php endif;?>
            </div>
            <!-- /.user-block -->
            <?= word_limiter($vc['content'],22)?><br><a id="detail" href="" data-toggle="modal" data-target="#modal-detail" data-content="<?= $vc['content'] ?>">Read more</a>
          </div>
          <!-- /.post -->
          <?php 
            endforeach;
          ?>
        </div>
        <!-- /.tab-pane -->
        

        <div class="tab-pane" id="post">
          <h1 class="text-danger text-bold">Post Your Vancancy</h1>
          <form action="jobinfo/post" method="post">
            <textarea name="content" id="summernote"></textarea>
            <div class="form-group">
              <label for="exampleFormControlInput1">For how many days?</label>
              <input name="day"type="number" class="form-control" id="exampleFormControlInput1" min="1" value="1" max="30">
            </div>
            <button type="submit" class="btn btn-danger btn-lg float-right">Upload</button>
          </form>
        </div>
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div><!-- /.card-body -->
  </div>
  <!-- /.nav-tabs-custom -->
</div>
<!-- /.container -->