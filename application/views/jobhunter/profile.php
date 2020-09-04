  <div class="continer container-margin">  
    <section class="content">
      <div class="container-fluid">
        <div class="card card-danger card-outline">
          <div class="card-body">
            <div class="row">
              <div class="col-md-3 border-col" >
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" style="object-fit:cover;width:200px; height: 200px" src="<?= base_url('assets/')?>img/profile/<?= $user['image'] ?>" alt="User profile picture">
                </div>
                <h2 class="text-bold text-center text-capitalize mt-2"><?= $user['name'] ?></h2>
                <p class="text-muted text-center"><?php if($user['agency']==empty(1)):?>Job Hunter<?php else:?>Job Info<?php endif?></p>
              </div>
              <div class="col-md-9 px-4">
                <?php if(!$user):
                  if($user_data['skill']&&$user_data['address']&&$user_data['phone']==empty(1)):?>
                <h2>Complete your profile</h2>
                <form action="<?=base_url('jobhunter/updateProfil')?>" method="post" class="px-3 py-3">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" name="skill" placeholder="Skills">
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" name="address" placeholder="Address">
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                    </div>
                    <input type="number" class="form-control" name="phone" placeholder="Phone">
                  </div>
                  <button type="submit" class="btn btn-danger float-right">Save</button>
                </form>
                <hr class="mt-5">

                <?php endif;endif;?>
                <?php if(!$user):
                  if($user_data['skill']&&$user_data['address']&&$user_data['phone']!=empty(1)):?>
                  <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
  
                  <p class="text-muted"><?=$user_data['skill']?></p>
  
                  <hr>
                  <strong><i class="fas fa-phone-alt mr-1"></i> Phone</strong>

                  <p class="text-muted">
                    <?= $user_data['phone']?>
                  </p>

                  <hr>

                  <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>

                  <p class="text-muted"><?= $user_data['address']?></p>
                  <?php if($user['cv']!= null):?>)
                  <hr>
                  <strong><i class="far fa-file-alt mr-1"></i> Curriculum vitae</strong> <i class="fas fa-external-link-alt text-primary"></i>
                  <?php endif;?>
                  <hr>
                  <?php endif;endif;?>


                  <?php if($user):
                    if($user_data['skill']&&$user_data['address']&&$user_data['phone']!=empty(1)):?>
                  <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
  
                  <p class="text-muted"><?=$user_data['skill']?></p>
  
                  <hr>
                  <strong><i class="fas fa-phone-alt mr-1"></i> Phone</strong>

                  <p class="text-muted">
                    <?= $user_data['phone']?>
                  </p>

                  <hr>

                  <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>

                  <p class="text-muted"><?= $user_data['address']?></p>
                  <?php else:?>
                  <h2 class="text-center mt-5">Data profile not complete</h2>
                  <?php endif;?>
                  <?php if($user['cv']!= null):?>)
                  <hr>
                  <strong><i class="far fa-file-alt mr-1"></i> Curriculum vitae</strong> <i class="fas fa-external-link-alt text-primary"></i>
                  <?php endif;endif;?>
                <!-- Curriculum Vitae -->
                <?php 
                  if(!$user):
                  if($any_user['cv'] == null):
                ?>
                  <h2>Curriculum vitae</h2>
                  <?= form_open_multipart('user/uploadcv');?>
                    <div class="px-3 py-3">
                      <input type="hidden" name="id" value="<?= $user['id'] ?>">
                      <div class="custom-file ">
                        <input type="file" class="custom-file-input" id="customFile" name="cv">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div><br>
                      <button type="submit" class="mt-2 btn btn-danger float-right">Upload</button>
                    </div>
                  </form>
                <?php 
                endif;
                  endif;
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>  