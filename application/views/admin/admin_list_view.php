<?php include_once('header1.php'); ?>

<?php include_once('nav1.php'); ?>

<style>
   #gradlist:hover {
    background-color: #d3d3d3;
}
</style>

<!-- Main -->
<br>
<div class="container">
  
  <!-- upper section -->
  <div class="row">
	
    <div class="col-sm-10 col-md-offset-1">
	   <div class="row">
			<div class="panel panel-success">
                <div class="panel-heading"><h4>Overall List:</h4></div>
					<div class="panel-body">
					<form method="GET">
						<table border="0" style="border-collapse: separate; padding 10px; border-spacing: 10px 1px;"><tr>
						<td>Course:</td>
							<td><select name="c1" class="form-control form-width">
								<option value="1">BSICT</option>
							</select></td>
						<td>Year Graduated:</td>
						<td><select name="c2" class="form-control form-width">
						<option value="all">All</option>
							<?php if(!empty($list1)){
								foreach ($list1 as $row) {
								echo '<option value="'.$row->yeargraduated.'">'.$row->yeargraduated.'</option>';
								}
							} else {
								echo 'none';
							}?>			
						</select></td>
						<td><button type="submit" class="btn btn-success">Go</button></td>
						</table>
					</form>
					<hr>
                                        <div class="table-responsive">
					<table class="table table-hover" border='0' style="padding 10px; border-spacing: 1px 1px; width:100%;">
						<thead style="background-color:#d3d3d3; border-color:#fff; border-collapse: separate; ">
							<tr>
								<th>ID No.</th>
								<th>Surname</th>
								<th>Name</th>
								<th>Sex</th>
								<th>Last Update</th>
								<th>Account Status</th>
								<th><span style=" margin-left:12px;">Action</span></th>
							</tr>
						</thead>
						<tbody id="gradlist">
							<?php 
								$now = time();
								$units = 1;
								if( !empty($list) ) {
									foreach($list as $row) {
										echo '<tr>';
										echo '<td>'.$row->idnumber.'</td>';
										echo '<td>'.$row->lastname.'</td>';
										echo '<td>'.$row->firstname.'</td>';
										echo '<td>'.$row->sex.'</td>';
										if(timespan(strtotime($row->lastupdate),$now,$units) == timespan(strtotime('0000-00-00'),$now,$units)) {
											echo '<td>Not updated</td>';
										} else {
											echo '<td>'.timespan(strtotime($row->lastupdate),$now,$units).' ago</td>';
										}
                                                                                if ($row->userstatus == "enabled") {
										 echo '<td><strong style="color:green; margin-left:30px;">'.$row->userstatus.'</strong></td>';
                                                                                }
                                                                                elseif ($row->userstatus == "disabled") {
                                                                                 echo '<td><strong style="color:red;  margin-left:30px;">'.$row->userstatus.'</strong></td>';
                                                                                }
                                                                                elseif ($row->userstatus == " " OR empty($row->userstatus)) {
                                                                                 echo '<td>'.$row->userstatus.'</td>';
                                                                                }
										echo '<td><a href="'.base_url().'admin/edit/'.$row->idnumber.'">Edit</a>&nbsp; 
											  | &nbsp;<a href="'.base_url().'admin/search/'.$row->idnumber.'" style="color:green;">View</a></td>';
										echo '</tr>';
									}
								}
							?>
						</tbody>
					</table>
                                        </div>
					<hr>
					</div><!--/panel-body-->
			</div><!--/panel-->			
       </div><!--/row-->
  	</div><!--/col-span-9-->
  </div><!--/row-->
  <!-- /upper section -->
  
</div><!--/container-->
<!-- /Main -->


<?php include_once('footer1.php'); ?>