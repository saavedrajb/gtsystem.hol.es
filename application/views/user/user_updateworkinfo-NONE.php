<?php include_once('header.php'); ?>

<div id="wrap">

<?php include_once('nav.php'); ?>

<style>
  th, td {
    text-align:center;
  }
</style>


<div class="container">
	<h3>Update your Work Information</h3>
	<hr>
	<div class="col-md-20">
		<div class="panel panel-default">
			<div class="panel-body">
			<?php 
				if(validation_errors()){
			?>
				<strong><?php echo validation_errors(); ?></strong>
			<?php
				}
			?>
			<form method="post" action="updatewrkinfo" name="data_register">
			<?php
				$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash()
				);
			?>
			<input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />

			<!--......ADD EmpHistory BUTTON.......-->
				<div style="position:relative; float:right;">
					<a href="addemphs" class="btn" style="font-size:16px;"><span class="btn btn-success">Add &nbsp;<span class="glyphicon glyphicon-plus"></span></span></a>
				</div>

			<h3><strong>Employment History</strong></h3><br>
			
			<!--.......TABLE START.........-->
			<div class="table-responsive">
			<table class="table table-hover" border="0px" style="margin-left:auto; margin-right:auto;">
			<thead>
				<tr>
					<th class="hidden">EmpID</th>
					<th>Work Period</th>
					<th>Position</th>
					<th>Company Name</th>
					<th>Company Address</th>
					<th style="color:#bbbbbb;">Edit</th>
					<th style="color:#bbbbbb;">Delete</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if(!empty($winfo)) {
						foreach ($winfo as $wrow) { 
						
						//-----Variables for the Dates
						$startDateformat = $wrow->empStartDate;
						$newStartDateformat = date("m/d/Y", strtotime($startDateformat));
						$endDateformat = $wrow->empEndDate; 

							//-----IF empEndDate is NOT NULL,
							if($endDateformat == '0000-00-00') {
								//Display the string 'Present'
								$newEndDateformat = 'Present';
							} else {
								//-----THEN display and change the format to MM-DD-YYYY
								$newEndDateformat = date("m/d/Y", strtotime($endDateformat));
							}

							$editform = "empEditForm";
							$editform1 = $editform.$wrow->empID; 
							$empContent = "empresultID".$wrow->empID; 
							$emphsModal = 'emphsModal';
							$emphsModal1 = $emphsModal.$wrow->empID;                        

							//-------EMPLOYMENT HISTORY RESULTS
							echo '<tr id="'.$empContent.'">';
							echo '<td class="hidden">'.$wrow->empID.'</td>
							<td class="empContent"><strong>'.$newStartDateformat.'</strong>&nbsp; to &nbsp;<strong>'.$newEndDateformat.'</strong</td>
							<td class="empContent">'.$wrow->empPosition.'</td>            
							<td class="empContent">'.$wrow->empCompName.'</td>
							<td class="empContent">'.$wrow->empCompAddr.'</td>';
							echo '<td><a href="#" data-toggle="modal" data-target="#editModal'.$emphsModal1.'" class="btn btn-link glyphicon glyphicon-pencil"></span></td>';
							echo "<td><span onclick=empdel('".$empContent."') class='btn glyphicon glyphicon-remove'></span></td>
							</tr>";

							echo form_open('user/updateemphistory',array('id' => $emphsModal1));
							echo form_hidden('empeditID', $wrow->empID);
							
							//-------Modal
							echo '<div class="modal fade" id="editModal'.$emphsModal1.'" tabindex="-1" role="dialog">
							<div class="modal-dialog">
							<div class="modal-content">
							<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Edit Employee History</h4>
							</div>
							<div class="modal-body">';
							echo '<div class="form-group">
							<label>Position:</label>';
							echo form_input('empPosition',$wrow->empPosition,'class="form-control" placeholder="Position"');
							echo '</div>';

							echo '<div class="form-group">
							<label>Company Name:</label>';
							echo form_input('empCompName',$wrow->empCompName,'class="form-control" placeholder="Company Name"');
							echo '</div>';

							echo '<div class="form-group">
							<label>Company Address:</label>';
							echo form_input('empCompAddr',$wrow->empCompAddr,'class="form-control" placeholder="Company Address"');
							echo '</div>';

							echo '<div class="form-group">
							<label>Date of Starting Work:</label>';
							echo '<input name="empStartDate" type="date" value="'.$wrow->empStartDate.'" class="form-control" placeholder="Date of Starting Work"';
							echo '</div>';

							echo '<div class="form-group">
							<label>Date of Ending Work:</label>';
							echo '<input name="empEndDate" type="date" value="'.$wrow->empEndDate.'" class="form-control" placeholder="Date of Resignation"';
							echo '</div>';
							echo '</div>
							<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
							echo form_submit('','Save Changes','class="btn btn-info"');
							echo '</div>';
							echo '</div>'; //-----modal-content
							echo '</div>'; //------modal-dialog
							echo '</div>'; //------modal

							echo form_close();
					}
					}
				?> 
			</tbody>
			</table>
			</div>
			</form>
			</div>	
	</div>
</div>

</div>
</div>

<script>
  function empdel(empdelID) {
    if(confirm("Are you sure you want to delete this post?")) {
        document.getElementsByName('empdelID')[0].value = empdelID;
        document.getElementById("empdel").submit();
        document.getElementById("empContent").hide(empdelID);
      return true;
    } else {
      return false;
    }
  }  

</script>

<?php include_once('footer.php'); ?>