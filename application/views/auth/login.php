							<form action="<?= base_url('auth')?>" method="post">
								<div class="form-group">
									<label for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="email" value="" required autofocus>
									<?= form_error('email','<small class="text-danger">','</small>')?>
								</div>

								<div class="form-group">
									<label for="password">Password
										<a href="<?= base_url('auth/forgotpassword'); ?>" class="float-right">
											Forgot Password?
										</a>
									</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
									<?= form_error('password','<small class="text-danger">','</small>')?>
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-danger btn-block">
										Login
									</button>
								</div>
								<div class="mt-4 text-center">
									Don't have an account? <a href="<?= base_url('auth/registration')?>">Create One</a>
								</div>
							</form>
						</div>
					</div>
					