    <p class="text-muted">Change your password for <?= $this->session->userdata('reset_email'); ?></p>
    <form action="<?= base_url('auth/changepassword'); ?>" method="post">
      <div class="form-group">
        <label for="new-password">New Password</label>
        <input id="new-password" type="password" class="form-control" name="password1" autofocus data-eye>
        <?= form_error('password1','<small class="text-danger">','</small>')?>
      </div>
      <div class="form-group">
        <label for="new-password">Confirm Password</label>
        <input id="new-password" type="password" class="form-control" name="password2" autofocus data-eye>
        <?= form_error('password2','<small class="text-danger">','</small>')?>
      </div>

      <div class="form-group m-0">
        <button type="submit" class="btn btn-danger btn-block">
          Change Password
        </button>
      </div>
    </form>
  </div>
</div>