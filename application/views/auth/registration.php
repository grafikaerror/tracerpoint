<form method="post" action="<?= base_url('auth/registration')?>" method="post">
								<div class="form-group">
									<label for="name">Name</label>
									<input id="name" type="text" class="form-control" value="<?= set_value('name');?>" name="name"   autofocus>
									<?= form_error('name', '<small class="text-danger">', '</small>');?>
								</div>
								<div class="form-group">
									<label for="username">Username</label>
									<input id="username" type="text" class="form-control" value="<?= set_value('username');?>" name="username">
									<?= form_error('username', '<small class="text-danger">', '</small>');?>
								</div>

								<div class="form-group">
									<label for="email">E-Mail Address</label>
									<input id="email" type="email" value="<?= set_value('email');?>" class="form-control" name="email"  >
									<?= form_error('email', '<small class="text-danger">', '</small>');?>
								</div>

								<div class="form-group">
									<label for="password">Password</label>
									<input id="password" type="password" class="form-control" name="password1"   data-eye>
									<?= form_error('password1', '<small class="text-danger">', '</small>');?>
								</div>

								<div class="form-group">
									<label for="password">Confirm Password</label>
									<input id="password" type="password" class="form-control" name="password2"   data-eye>
									<?= form_error('password2', '<small class="text-danger">', '</small>');?>
								</div>

								<div class="form-group">
									<a class="text-primary" id="flip">If you have an agency <i class="fa fa-chevron-right fa-sm"></i></a>
								</div>

								<div class="form-group" id="panel">
									<label for="agency">Name Agency</label>
									<input id="agency" type="text" class="form-control" value="<?= set_value('agency');?>" name="agency">
									<?= form_error('agency', '<small class="text-danger">', '</small>');?>
								</div>

								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="agree" id="agree" class="custom-control-input" required>
										<label for="agree" class="custom-control-label">I agree to the <a href="#">Terms and Conditions</a></label>
									</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-danger btn-block btn-sm">
										Register
									</button>
								</div>
								<div class="mt-4 text-center">
									Already have an account? <a href="<?= base_url('auth'); ?>">Login</a>
								</div>
							</form>
						</div>
					</div>