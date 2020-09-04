<!doctype html>
<html lang="en">

<head>
  <link rel="icon" href="<?= base_url('assets/dist/'); ?>img/logo.png">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="title" content="Tracerpoint - An online marketplace for Job Info, Creative Services & Marketing Influencer.">
  <meta name="description" content="Tracerpoint - An online marketplace for Job Seeker, Job Info, Job Vacancy, Creative Services & Marketing Influencer." />
  <meta name="keywords" content="Job Info, Job Hunter, Loker, Lowongan Kerja, influencer, influencer marketing, platform, market place, buzzer, instagram, blogger, youtube, twitter, brandbuzz" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/')?>plugins/fontawesome-free/css/all.min.css">
  <!-- Summernote -->
  <link rel="stylesheet" href="<?= base_url('assets/')?>plugins/summernote/summernote-bs4.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('assets/')?>dist/css/adminlte.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/dist/'); ?>css/style.css">
  

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Viga" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <title><?= $title ?></title>
</head>

<body>


  <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" style="border-bottom:1px solid #dedede">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="<?= base_url('assets/dist/'); ?>img/nav-logo.png" height="50" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <?php foreach($queryNav as $qn):?>
          <?php if ($title == $qn['title']):?>
            <li class="nav-item">
              <a href="<?= base_url($qn['url'])?>" class="nav-link active">
                <?php else:?>
                  <li class="nav-item">
                    <a href="<?= base_url($qn['url'])?>" class="nav-link">
          <?php endif;?>
                      <?= $qn['title']?>
                    </a>
                  </li>
        <?php endforeach;?>
      </ul>
      <?php if($user == ''):?>
        <a href="<?= base_url('auth')?>">
          <button class=" btn btn-danger btn-sm my-2 my-sm-0 btn-login" style="">Login</button>
        </a>
      <?php endif;?>
      <?php if($user != ''):?>
        <div class="dropdown my-2 my-sm-0 mx-2" >
          <a class="dropdown" style="color:#6c757d ; text-decoration:none" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="<?= base_url('assets/img/profile/').$user['image']?>" width="30" height="30" class="img-circle" alt=""> <?= $user['name']?>
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="<?php if($user['agency']== empty(1)){
              echo base_url('jobhunter/profile/').$user['username'];
            }else{
              echo base_url('jobinfo/profile/').$user['username'];
            }?>"><i class="fas fa-user"></i> Profile</a>
            <a class="dropdown-item" href="<?php if($user['agency']== empty(1)){
              echo base_url('jobhunter/setting');
            }else{
              echo base_url('jobinfo/setting');
            }?>"><i class="fas fa-cog"></i> Setting</a>
            <?php if($user['agency'] != empty(1)):?>
              <?php if($this->uri->segment(1)=='jobinfo'):?>
                <a class="dropdown-item" href="<?= base_url('jobhunter')?>"><i class="fas fa-sync"></i> Switch</a>
              <?php else:?>
                <a class="dropdown-item" href="<?= base_url('jobinfo')?>"><i class="fas fa-sync"></i> Switch</a>
              <?php endif;?>
            <?php endif;?>
            <a class="dropdown-item" href="<?= base_url('auth/logout')?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
          </div>
        </div>
      <?php endif?>
    </div>
  </div>
</nav>
  <!-- akhir Navbar -->