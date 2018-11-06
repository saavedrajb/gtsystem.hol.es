<?php include_once('header1.php'); ?>

<style>.canvasjs-chart-credit {display:none;}
.rleft{height:500px; width:500px; float:left; border-right:solid 2px}
.rright{margin-left:550px; height:500px; width:500px}
</style>

<div class="print-link avoid-this" style="position:fixed; float:left; padding: 5px; z-index:99;">
<ul style="list-style-type:none">
<li><h4>OPTIONS:</h4></li>
<li><button class="btn btn-submit btn-lg" onclick="$('body').print({noPrintSelector: ' .avoid-this'});"><i class="glyphicon glyphicon-print"></i> Generate Report</button></li>
</ul>
<ul style="list-style-type:none">
<li><a href="<?php echo base_url().'admin/report'; ?>" class="print-link avoid-this" ><button class="print-link avoid-this btn btn-submit"><i class="glyphicon glyphicon-circle-arrow-left"></i> Go Back</button></a></li>
</ul>
</div>

<div class="container print_div" id="print-div">
<center><div>
	<img src="<?php echo base_url('images/temp.png'); ?>">
</div></center>
<br>

<hr style="border:solid 1px">
	<h3><center><?php if(!empty($sy)) {
		foreach ($sy as $yrow) {
			echo 'Year '.$yrow->yeargraduated.' Profiling Reports';
			}
		} ?></h3></center>
		
<center><div>
	<hr style="border:solid 1px">
	<div id="preport1" class="rleft" style="float:none; border:none;"></div>
	<hr style="border:solid 1px; width: 75%">
	<div id="preport2" class="rleft" style="float:none; border:none;"></div>
</div></center><br>

<br><br><br>

<center><div style="margin:auto;">
	<hr style="border:solid 1px">
	<div id="preport4" class="rleft" ></div>
	<div id="preport5" class="rright"></div>
</div></center>

<center><div>
	<hr style="border:solid 1px">
	<div id="preport3" class="rleft" style="width:700px;float:none; border:none;"></div>
</div></center><br>

<div style="margin-top:350px;">
	<hr style="border:solid 1px">
		<h3><center><?php if(!empty($sy)) {
			foreach ($sy as $yrow) {
				echo 'Year '.$yrow->yeargraduated.' Graduates Tracer Survey Reports';
			}
		} ?></h3></center>
	<hr style="border:solid 1px">
</div>


<br><center><div style="margin:auto;">
	<div id="report1" class="rleft" ></div>
	<div id="report2" class="rright" ></div>
	<hr style="border:solid 1px">
</div></center>

<br>
	
<center><div style="margin:auto;">
		<div id="report3" class="rleft" ></div>
		<div id="report4" class="rright" ></div>
	<hr style="border:solid 1px">
	</div></center>
	
<center><div style="margin-top:350px; margin-bottom:850px;">
	<hr style="border:solid 1px">
	<div id="report5" class="rleft" style="width:700px;float:none; border:none;"></div>
	<hr style="border:solid 1px">
</div></center><br>
	
<div>
	<hr style="border:solid 1px">
		<br><center><div style="margin:auto;">
			<div id="report6" class="rleft" ></div>
			<div id="report7" class="rright" ></div>
		</div></center>
	<hr style="border:solid 1px">
</div>

<center><div style="margin:auto;">
	<div id="report8" class="rleft" style="width:700px;float:none; border:none;"></div>
</div></center>

</div><!--/container-->
<div style="clear:both;"></div>
<script type="text/javascript">
  window.onload = function () {

    var chart1 = new CanvasJS.Chart("report1",
    {
      title:{
        text: "Employment Rate within 6 months after graduation",
		fontSize:30,
      },
      animationEnabled: false,
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "bottom", fontSize:16, fontFamily: "Arial"
      },
      
      data: [

      {        
        type: "pie",  
        showInLegend: true, 
        verticalAlign: "left",
		
		indexLabelPlacement: "inside",
		indexLabelFontColor: "white",
        indexLabel: "#percent% - ({y})",
		indexLabelFontSize: 18,
        dataPoints: [
		<?php if(!empty($reports)) {
			foreach ($reports as $row1) {
				if($row1->questionID=='1'){
				echo '{y: '.$row1->Total.', name: "'.$row1->choice_desc.'", },';
				}
				
				
			}
			}
		
		?>  
        ]
      }   
      ]
    });

	

    chart1.render();
	
	var chart2 = new CanvasJS.Chart("report2",
    {
      title:{
        text: "Course related to Job ratio",
		fontSize:30,
      },
      animationEnabled: false,
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "bottom", fontSize:16, fontFamily: "Arial"
      },
     
      data: [

      {        
        type: "pie",  
        showInLegend: true, 
       
		
		indexLabelPlacement: "inside",
		indexLabelFontColor: "white",
        indexLabel: "#percent% - ({y})",
		indexLabelFontSize: 18,
        dataPoints: [
		<?php if(!empty($reports)) {
			foreach ($reports as $row1) {
				if($row1->questionID=='2'){
				echo '{y: '.$row1->Total.', name: "'.$row1->choice_desc.'", },';
				}
				
				
			}
			}
		
		?>  
        ]
      }   
      ]
    });

	

    chart2.render();
	
	var chart3 = new CanvasJS.Chart("report3",
    {
      title:{
        text: "Ways of how they attained their first job",
		fontSize:30,
      },
      animationEnabled: false,
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "bottom", fontSize:16, fontFamily: "Arial"
      },
      
      data: [

      {        
        type: "pie",  
        showInLegend: true, 
        
		
		indexLabelPlacement: "inside",
		indexLabelFontColor: "white",
        indexLabel: "#percent% - ({y})",
		indexLabelFontSize: 18,
        dataPoints: [
		<?php if(!empty($reports)) {
			foreach ($reports as $row1) {
				if($row1->questionID=='3'){
				echo '{y: '.$row1->Total.', name: "'.$row1->choice_desc.'", },';
				}
				
				
			}
			}
		
		?>  
        ]
      }   
      ]
    });

	

    chart3.render();
	
	
	var chart4 = new CanvasJS.Chart("report4",
    {
      title:{
        text: "Age upon first employment",
		fontSize:30,
      },
      animationEnabled: false,
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "bottom", fontSize:16, fontFamily: "Arial"
      },
      
      data: [

      {        
        type: "pie",  
        showInLegend: true, 
        
		
		indexLabelPlacement: "inside",
		indexLabelFontColor: "white",
        indexLabel: "#percent% - ({y})",
		indexLabelFontSize: 18,
        dataPoints: [
		<?php if(!empty($reports)) {
			foreach ($reports as $row1) {
				if($row1->questionID=='4'){
				echo '{y: '.$row1->Total.', name: "'.$row1->choice_desc.'", },';
				}
				
				
			}
			}
		
		?>  
        ]
      }   
      ]
    });

	

    chart4.render();
	
	var chart5 = new CanvasJS.Chart("report5",
    {
      title:{
        text: "First Job - Position Description",
		fontSize:30,
      },
      animationEnabled: false,
      legend: {
        verticalAlign: "center",
        horizontalAlign: "left", fontSize:16, fontFamily: "Arial"
      },
      
      data: [

      {        
        type: "pie",  
        showInLegend: true, 
       
		
		indexLabelPlacement: "inside",
		indexLabelFontColor: "white",
        indexLabel: "#percent%",
		indexLabelFontSize: 18,
        dataPoints: [
		<?php if(!empty($reportsfjob4)) {
			foreach ($reportsfjob4 as $row4) {
				if($row4->questionID=='5'){
				echo '{y: '.$row4->Total.', name: "'.$row4->position_desc.'", },';
				}
				
				
			}
			}
		
		?>  
        ]
      }   
      ]
    });

	

    chart5.render();
	
	var chart6 = new CanvasJS.Chart("report6",
    {
      title:{
        text: "First Job - Approx. Monthly Salary",
		fontSize:30,
      },
      animationEnabled: false,
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "bottom", fontSize:16, fontFamily: "Arial"
      },
      
      data: [

      {        
        type: "pie",  
        showInLegend: true, 
      
		
		indexLabelPlacement: "inside",
		indexLabelFontColor: "white",
        indexLabel: "#percent% - ({y})",
		indexLabelFontSize: 18,
        dataPoints: [
		<?php if(!empty($reports)) {
			foreach ($reports as $row1) {
				if($row1->questionID=='6'){
				echo '{y: '.$row1->Total.', name: "'.$row1->choice_desc.'", },';
				}
				
				
			}
			}
		
		?>  
        ]
      }   
      ]
    });

	

    chart6.render();
	
	var chart7 = new CanvasJS.Chart("report7",
    {
      title:{
        text: "First Job - Length of Stay",
		fontSize:30,
      },
      animationEnabled: false,
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "bottom", fontSize:16, fontFamily: "Arial"
      },
      
      data: [

      {        
        type: "pie",  
        showInLegend: true, 
       
		
		indexLabelPlacement: "inside",
		indexLabelFontColor: "white",
        indexLabel: "#percent% - ({y})",
		indexLabelFontSize: 18,
        dataPoints: [
		<?php if(!empty($reports)) {
			foreach ($reports as $row1) {
				if($row1->questionID=='7'){
				echo '{y: '.$row1->Total.', name: "'.$row1->choice_desc.'", },';
				}
				
				
			}
			}
		
		?>  
        ]
      }   
      ]
    });

	

    chart7.render();
	
	var chart8 = new CanvasJS.Chart("report8",
    {
      title:{
        text: "First Job - Place of Work",
		fontSize:30,
      },
      animationEnabled: false,
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "bottom", fontSize:16, fontFamily: "Arial"
      },
      
      data: [

      {        
        type: "pie",  
        showInLegend: true, 
       
		
		indexLabelPlacement: "inside",
		indexLabelFontColor: "white",
        indexLabel: "#percent% - ({y})",
		indexLabelFontSize: 18,
        dataPoints: [
		<?php if(!empty($reports)) {
			foreach ($reports as $row1) {
				if($row1->questionID=='8'){
				echo '{y: '.$row1->Total.', name: "'.$row1->choice_desc.'", },';
				}
				
				
			}
			}
		
		?>  
        ]
      }   
      ]
    });

	

    chart8.render();
	

	var chart9 = new CanvasJS.Chart("preport3",
    {
      title:{
        text: "Job Position Distribution",
		fontSize:30,
      },
      animationEnabled: false,
      legend: {
        verticalAlign: "center",
        horizontalAlign: "left", fontSize:16, fontFamily: "Arial"
      },
      
      data: [

      {        
        type: "pie",  
        showInLegend: true, 
      
		
		indexLabelPlacement: "inside",
		indexLabelFontColor: "white",
        indexLabel: "#percent% - ({y})",
		indexLabelFontSize: 18,
        dataPoints: [
		<?php if(!empty($preport_jobpos)) {
			foreach ($preport_jobpos as $row7) {
				
				echo '{y: '.$row7->Total.', name: "'.$row7->empPosition.'", },';
				
				
				
			}
			}
		
		?>  
        ]
      }   
      ]
    });

	

    chart9.render();
	
	var chart10 = new CanvasJS.Chart("preport4",
    {
      title:{
        text: "Approx. Monthly Salary Distribution",
		fontSize:30,
      },
      animationEnabled: false,
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "bottom", fontSize:16, fontFamily: "Arial"
      },
     
      data: [

      {        
        type: "pie",  
        showInLegend: true, 
       
		
		indexLabelPlacement: "inside",
		indexLabelFontColor: "white",
        indexLabel: "#percent% - ({y})",
		indexLabelFontSize: 18,
        dataPoints: [
		<?php if(!empty($preport_ams)) {
			foreach ($preport_ams as $row11) {
				
				echo '{y: '.$row11->Total.', name: "'.$row11->choice_desc.'", },';
				
				
				
			}
			}
		
		?>  
        ]
      }   
      ]
    });

	

    chart10.render();
	
	var chart11 = new CanvasJS.Chart("preport5",
    {
      title:{
        text: "Overall Place of Work",
		fontSize:30,
      },
      animationEnabled: false,
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "bottom", fontSize:16, fontFamily: "Arial"
      },
     
      data: [

      {        
        type: "pie",  
        showInLegend: true, 
       
		
		indexLabelPlacement: "inside",
		indexLabelFontColor: "white",
        indexLabel: "#percent% - ({y})",
        dataPoints: [
		<?php if(!empty($preport_pow)) {
			foreach ($preport_pow as $row10) {
				
				echo '{y: '.$row10->Total.', name: "'.$row10->choice_desc.'", },';

			}
			}
		
		?>  
        ]
      }   
      ]
    });

	

    chart11.render();
	
	var chart12 = new CanvasJS.Chart("preport1",
    {
      title:{
        text: "Gender Distribution",
		fontSize:30,
      },
      animationEnabled: false,
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "bottom", fontSize:16, fontFamily: "Arial"
      },
     
      data: [

      {        
        type: "pie",  
		legendText: "{name}",
        showInLegend: true, 
        
		indexLabelPlacement: "inside",
		indexLabelFontColor: "white",
        indexLabel: "#percent% - ({y})",
		indexLabelFontSize: 18,
        dataPoints: [
		<?php if(!empty($preports1)) {
			foreach ($preports1 as $row1) {
				
				echo '{y: '.$row1->Total.', name: "'.$row1->sex.'", },';

				}
			}
		
		?>  
        ]
      }   
      ]
    });

	

    chart12.render();
	
	var chart13 = new CanvasJS.Chart("preport2",
    {
      title:{
        text: "Civil Status Distribution",
		fontSize:30,
      },
      animationEnabled: false,
      legend: {
        verticalAlign: "bottom",
        horizontalAlign: "bottom", fontSize:16, fontFamily: "Arial"
      },
     
      data: [

      {        
        type: "pie",  
        showInLegend: true, 
       
		
		indexLabelPlacement: "inside",
		indexLabelFontColor: "white",
        indexLabel: "#percent% - ({y})",
		indexLabelFontSize: 18,
        dataPoints: [
		<?php if(!empty($preports2)) {
			foreach ($preports2 as $row2) {
				
				echo '{y: '.$row2->Total.', name: "'.$row2->civilstatus.'", },';

			}
			}
		
		?>  
        ]
      }   
      ]
    });

	

    chart13.render();
	
  }
  </script>


<script type="text/javascript" src="<?php echo base_url();?>assets1/js/canvasjs.min.js"></script>

<script>
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-43091346-1', 'devzone.co.in');
    ga('send', 'pageview');
</script>

<?php include('footer1.php'); ?>