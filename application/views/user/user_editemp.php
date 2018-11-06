<?php include_once('header.php'); ?>

<div id="wrap">

<?php include_once('nav.php'); ?>


<!-- Contains the body -->
<div class="body-container">
  <!-- upper section -->
  <div class="row" style="background-color:#fff">

  <!-- /span-3 -->
    <div class="body-container">
        
      <!-- column 2 --> 
     <div class="row">
        <h3>Edit Company/Employment History</h3>
      <hr>
            <!-- center left--> 
          <div class="col-md-7">
      
      <div class="panel panel-default">
          <div class="panel-body">
          <?php 
          if(validation_errors()){
          ?>
            <strong style="color:red;"><?php echo validation_errors(); ?></strong>
            <?php
          }
          ?>
          
          <?php
          echo '<form method="post" action="updateemphs'.$empeditID.'" name="editwork">';
            
            $csrf = array(
              'name' => $this->security->get_csrf_token_name(),
              'hash' => $this->security->get_csrf_hash()
            );
          ?>
          
          <?php   
            if(!empty($winfo))
              foreach ($winfo as $wrow) { 
          ?>
                  echo '<input type="hidden" name="'.$csrf["name"].'" value="'.$csrf["hash"].'" />';
                  echo '<label for="Name">Company Name</label>';
                    echo '<input type="text" class="form-control" name="empCompName" value="'.$wrow->empCompName.'">';
                  echo '<br>';
                  
                  echo '<label>Company Address</label>';
                    echo '<input type="text" class="form-control" name="empCompAddr" value="'.$wrow->empCompAddr.'">';
                  echo '<br>';
                  
                  echo '<label>Position</label>';
                    echo '<input type="text" class="form-control" name="empPosition" value="'.$wrow->empPosition.'">';
                  echo '<br>';
                  
                  echo '<label>Date of Starting Work</label>';
                    echo '<input type="date" class="form-control" name="empStartDate" value="'.$wrow->empStartDate.'">';
                  echo '<br>';
                  
                  echo '<label>Date of Resignation</label>';
                    echo '<input type="date" class="form-control" name="empEndDate" value="'.$wrow->empEndDate.'">';
                  echo '<br>';

                  echo '<br>';
                  echo '<button type="submit" class="btn btn-info pull-right">Save Changes</button>';
                  echo '<br><br>';
          echo '</form>';
              }
            }
           ?>
    
          </div><!--/panel-body-->
              </div><!--/panel-->
      </div><!--/col-->
         
            <!--center-right-->
          <div class="col-md-5">
              
        <div class="well">
        <strong>Note:</strong><br><br>
          Please provide your exact working details to let us keep in track of your employment progress.<br><br>.
        </div>
              
      </div><!--/col-span-6-->
     
       </div><!--/row-->
    </div><!--/col-span-9-->
    
  </div><!--/row-->
  <!-- /upper section -->
</div>
</div>

<?php include_once('footer.php'); ?>
