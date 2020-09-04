<!-- Page Content -->
<div class="container container-margin">


<!-- Content Row -->
<div class="row">
  <!-- Map Column -->
  <div class="col-lg-8 mb-4">
    <!-- Embedded Google Map -->
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.621314702789!2d112.66999711492954!3d-7.934559481217339!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6297419c2e4ad%3A0x7ac157a1e50df65!2sJl.%20Dipomanggolo%205%2C%20Sumber%20Bening%2C%20Tirtomoyo%2C%20Kec.%20Pakis%2C%20Malang%2C%20Jawa%20Timur%2065154!5e0!3m2!1sid!2sid!4v1584108169242!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
  </div>
  <!-- Contact Details Column -->
  <div class="col-lg-4 mb-4">
    <h3>Contact Details</h3>
    <p>
    Jl. Dipomanggolo 5
      <br> Sumber Bening, Tirtomoyo, Kec. Pakis, Malang, Jawa Timur 65154 
      <br>
    </p>
    <p>
      <abbr title="Email"><i class="text-danger fas fa-envelope"></i></abbr>
        tracerpointofficial@gmail.com
      </a>
    </p>
  </div>
</div>
<!-- /.row -->

<!-- Contact Form -->
<!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
<div class="row">
  <div class="col-lg-8 mb-4">
    <h3>Send us a Message</h3>
      <form action="<?= base_url('guest/sendemail'); ?>" method="post"></form>
      <div class="control-group form-group">
        <div class="controls">
          <label>Full Name:</label>
          <input type="text" class="form-control" name="name" id="name" required data-validation-required-message="Please enter your name.">
          <p class="help-block"></p>
        </div>
      </div>
      <div class="control-group form-group">
        <div class="controls">
          <label>Email Address:</label>
          <input type="email" class="form-control" name="email" id="email" required data-validation-required-message="Please enter your email address.">
        </div>
      </div>
      <div class="control-group form-group">
        <div class="controls">
          <label>Message:</label>
          <textarea rows="10" cols="100" class="form-control" name="message" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
        </div>
      </div>
      <div id="success"></div>
      <!-- For success/fail messages -->
      <button type="submit" class="btn btn-primary" id="sendMessageButton">Send Message</button>
    </form>
  </div>

</div>
<!-- /.row -->

</div>
<!-- /.container -->