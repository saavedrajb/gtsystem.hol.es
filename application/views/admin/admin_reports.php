<?php include_once('header1.php'); ?>

<?php include_once('nav1.php'); ?>

<!-- Main -->
<br>
<div class="container">
  
  <!-- upper section -->
  <div class="row">
	
         	<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-Success">
                  <div class="panel-heading"><h4>GTS Reports</h4></div>
					  <div class="panel-body">
						<?php
						if(!empty($list)){
							echo 'Show reports for year:<br><ul>';
							foreach($list as $row){
								echo '<li><a href="'.base_url().'admin/report/'.$row->yearID.'">'.$row->yeargraduated.'</a></li>';
							}
						}
						?>
					  </div><!--/panel-body-->
              </div><!--/panel-->
			</div><!--/col-->
			
        	
			
    
  </div><!--/row-->
  <!-- /upper section -->
  
</div><!--/container-->
<!-- /Main -->

<?php include_once('footer1.php'); ?>