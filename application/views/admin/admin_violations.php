<?php include_once('header1.php'); ?>

<?php include_once('nav1.php'); ?>

<!-- Main -->
<br>
<div class="container">
	
    <div class="col-sm-10 col-md-offset-1">
	   <div class="row">
			<div class="panel panel-Success">
			  <div class="panel-heading"><h4>Reported Posts</h4></div>
				<div class="panel-body">
				<?php
				if(!empty($list)){
					echo form_open('admin/violations').'<div class="table-responsive">
                                        <table class="table table-hover">
                                        <thead>
					<th>ID #</th>
					<th>Name</th>
					<th>Content</th>
					<th>Reporter</th>
					<th style="text-align:center;">Action</th>
                                        </thead>
                                        <tbody>';
					foreach($list as $row){
						echo '<tr><td>'.form_hidden('id',$row->newsfeedID).form_hidden('idno',$row->nfPostedBy).'<a href="'.base_url('admin/search/'.$row->nfPostedBy).'">'.$row->nfPostedBy.'</td><td>'
						.$row->nfPosterName.'</td><td>'
						.strip_tags($row->nfContent).'</td><td><a href="'.base_url('admin/search/'.$row->nfReportedBy).'">'.$row->nfReportedBy.'</a></td><td>
						<input type="submit" class="btn btn-primary" name="retain" value="&#10004; Retain&nbsp;&nbsp;&nbsp;"><br><input type="submit" class="btn btn-danger" name="delete" value="&#10006; Violated "></td></tr>'.form_close();
					}
					echo '</tbody></table></div>';
				} else {
					echo 'None at the moment.';
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