<br><br>

<div class="navbar-bright navbar-fixed-bottom" style="display:block; height:30px; font-color: white; padding: 5px">
<div class="container">

<!-- UNDER CONSTRUCTION -->
	<p style="text-align:center">GTS Copyright © 2016 - <?php echo date('Y'); ?></p>
</div>
</div>

	<!-- script references
	
			https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js
			
		-->
		<script src="<?= base_url(); ?>assets2/js/jquery.min.js"></script>
		<script src="<?= base_url(); ?>assets2/js/jquery-3.1.1.js"></script>
		<script type="text/javascript" src="<?= base_url(); ?>assets2/js/bootstrap.min.js"></script>

		<script>
    		$(document).ready(function(){
      			$("#navPwd_List").hover(function(){
          			$(this).css("background-color", "#16558c");
          			$(this).css("color", "#16558c");
          			$("#navPwd_Link").css("background-color", "#16558c");
          			$("#navPwd_Link").css("color", "#ffffff");
          				}, function(){
          					$(this).css("background-color", "#16558c");
          					$(this).css("color", "#595959");
          					$("#navPwd_Link").css("background-color", "#ffffff");
        					$("#navPwd_Link").css("color", "#595959");
     						});
      			$("#navSeq_List").hover(function(){
          			$(this).css("background-color", "#16558c");
          			$(this).css("color", "#ffffff");
          			$("#navSeq_Link").css("background-color", "#16558c");
          			$("#navSeq_Link").css("color", "#ffffff");
          				}, function(){
          					$(this).css("background-color", "#ffffff");
          					$(this).css("color", "#595959");
          					$("#navSeq_Link").css("background-color", "#ffffff");
        					$("#navSeq_Link").css("color", "#595959");
     						});
      			$("#navLgOut_List").hover(function(){
          			$(this).css("background-color", "#16558c");
          			$(this).css("color", "#ffffff");
          			$("#navLgOut_Link").css("background-color", "#16558c");
          			$("#navLgOut_Link").css("color", "#ffffff");
          				}, function(){
          					$(this).css("background-color", "#ffffff");
          					$(this).css("color", "#595959");
          					$("#navLgOut_Link").css("background-color", "#ffffff");
        					$("#navLgOut_Link").css("color", "#595959");
     						});
    		});
		</script>

		<script>
		$('#length').hide();
		$('input[name=empEndDate_first_job]').change(function(){
			if($(this).val().length) {
				$('#yeah').show();
				$('#length').show();
			} else {
			  	$('#yeah').hide();
				$('#length').hide();
			}});
		</script>

	</body>
</html>

