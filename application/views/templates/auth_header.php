<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="<?= base_url('assets/dist/'); ?>img/logo.png">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/')?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets/')?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/')?>dist/css/style.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="my-login-page">
  <section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<a href="<?= base_url('guest'); ?>"><img src="<?= base_url('assets/dist/'); ?>img/logo.png" alt="logo"></a>
          </div>
          <div class="card fat">
						<div class="card-body">
            <?= $this->session->flashdata('message');?>
							<h4 class="card-title"><?= $title ?></h4>