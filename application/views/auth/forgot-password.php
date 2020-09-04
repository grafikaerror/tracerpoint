<form action="<?= base_url('auth/forgotpassword'); ?>" method="post">
								<div class="form-group">
									<label for="email">Email</label>
									<input id="email" type="text" class="form-control" name="email" autofocus >
									<?= form_error('email','<small class="text-danger">','</small>')?>
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-danger btn-block">
										Reset Password
									</button>
								</div>
							</form>
						</div>
					</div>