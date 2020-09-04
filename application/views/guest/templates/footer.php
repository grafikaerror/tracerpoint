 <!-- Footer -->
 <footer class="mt-5 pt-5 pb-5" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 mt-2 mb-4">
          <h5 class="mb-4 font-weight-bold">Tracerpoint</h5>
          <p class="mb-4">Tracerpoint - An online marketplace for Job Seeker, Job Info, Job Vacancy, Creative Services & Marketing Influencer.</p>   
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 mt-2 mb-4">
          <h5 class="mb-4 font-weight-bold">Contact me</h5>
          <form action="<?= base_url('guest/sendemail'); ?>" method="post">
            <div class="control-group form-group">
              <div class="controls">
                <label>Full Name:</label>
                <input type="text" class="form-control" id="name" name="name" required data-validation-required-message="Please enter your name.">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Email Address:</label>
                <input type="email" class="form-control" id="email" name="email" required data-validation-required-message="Please enter your email address.">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Message:</label>
                <textarea rows="3" cols="100" class="form-control" name="message" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
              </div>
            </div>
            <div id="success"></div>
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-danger " id="sendMessageButton">Send Message</button>
          </form>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 mt-2 mb-4">
          <h5 class="mb-4 font-weight-bold">Social Media</h5>
         
              <h2><a href="https://www.youtube.com/channel/UCiX5VZLjzaxikcfKh_X-hQA"><i class="mr-3 fab fa-youtube"></i></a>
              <a href="https://twitter.com/tracerpoint"><i class="fab fa-twitter mr-3"></i></a>
              <a href=""><i class="fab fa-instagram mr-3"></i></a>
              
              </h2>
        </div>
      </div>
    </div>
  </footer>
  <!-- Copyright -->
  <section class="copyright">
    <div class="container">
      <div class="row">
        <div class="col-md-12 ">
          <div class="text-center text-white">
            &copy; 2020 Tracerpoint. All Rights Reserved.
          </div>
        </div>
      </div>
    </div>
  </section>





  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.slim.min.js"></script>
  <script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.collapser.min.js"></script>
  <!-- Popper -->
  <script src="<?= base_url('assets/'); ?>plugins/popper/umd/popper.min.js"></script>
  
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.min.js"></script>
  <!-- Summernote -->
  <script src="<?= base_url('assets/'); ?>plugins/summernote/summernote-bs4.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets/'); ?>dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url('assets/'); ?>dist/js/demo.js"></script>
  <!-- Script -->
  <script>
      $('#summernote').summernote({
        toolbar: [
          // [groupName, [list of button]]
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['font', ['strikethrough', 'superscript', 'subscript']],
          ['fontsize', ['fontsize']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['height', ['height']]
        ],
        placeholder: ' ',
        tabsize: 2,
        height: 350,
        focus:true
      });
      $(document).ready(function() {
        $(document).on('click', '#detail', function(){
          var content = $(this).data('content');
          $('#content').html(content);
        })
      })
      $('.custom-file-input').on('change', function(){
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
      });
    </script>
</body>

</html>