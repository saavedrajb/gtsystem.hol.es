<?php include_once('header.php'); ?>

<div id="wrap">

<?php include_once('nav.php'); ?>
<div class="container">
<?php include_once('sidebar.php'); ?>
<div class="col-md-8" style="margin-left:310px; margin-top:2px;">
<div class="login-form" style="height:250px; padding-top:10%;  background: url(<?php echo base_url();?>images/56.jpg) no-repeat center; background-size:cover;">
<p style="text-align:center; font-size:4em; color:white;">Announcements</p>
<hr class="small">
</div>

<div class="panel panel-default" style="background:transparent;">

		<div class="panel-body">
			<div id="results"></div>
</div>

</div>

</div>
</div>

<script src="<?php echo base_url();?>assets2/scrolljs/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {
	
var total_record = 0;
var total_groups = <?php echo $total_data; ?>;

$('#results').load("<?php echo base_url();?>user/load_more", {'group_no':total_record}, function() {total_record++;});
$(window).scroll(function() {       
    if($(window).scrollTop() + $(window).height() == $(document).height())  
    {           
        if(total_record <= total_groups)
        {
            loading = true; 
            $('.loader_image').show(); 
            $.post('<?php echo base_url();?>user/load_more',{'group_no': total_record},
            function(data2){ 
                if (data2 != "") {                               
                    $("#results").append(data2);
                    $('.loader_image').hide();              
                    total_record++;
                }
            });     
        }
    }
});
});

</script>

<?php include_once('footer.php'); ?>