          <div class="footer">
						Copyright &copy; 2020 &mdash; Tracerpoint
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- jQuery -->
<script src="<?= base_url('assets/')?>plugins/jquery/jquery.slim.min.js"></script>
<script src="<?= base_url('assets/')?>plugins/jquery/jquery.min.js"></script>
<!-- Popper -->
<script src="<?= base_url('assets/'); ?>plugins/popper/umd/popper.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/')?>plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- myscript -->
<script src="<?= base_url('assets/')?>dist/js/myscript.js"></script>
<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("slow");
  });
});

</script>
</body>
</html>
