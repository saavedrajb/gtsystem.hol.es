 <?php include_once('header.php'); ?>

<div id="wrap">

<?php include_once('nav.php'); ?>
<div class="container">
<?php include_once('sidebar.php'); ?>
         
<div class="col-md-8" style="margin-left:310px; margin-top:2px;">
	<div class="panel panel-default" style="background:transparent;">
		
		<div class="panel-body">
		<div class="shadow" id="posts" style="background-color:white; padding:10px; padding-top:10px; padding-bottom:30px;">
			<h4>Share something:</h4>

<!-- .......................NEWSFEED POST FORM................... -->

<?php echo form_open('user/newsfeed') ; ?>
	<textarea name="newsfeed" id="post_txtarea" id="myForm" maxlength="200" width="100%" class="form-control" id="content" style="resize:none;" placeholder="What's new, <?php echo $firstname ?>?" onkeypress="charcount()" required autofocus></textarea>
	<br>
	<button class="btn btn-primary" type="submit" onclick="this.style.visibility = 'hidden'" class="button" style="float:right;"><span class="glyphicon glyphicon-edit"></span> Post</button>
	<span id="charcounter" class="help-block" style="margin-top:7px; margin-right:10px; float:right; color:#bbbbbb; font-size:14px;">Characters left: 200</span>
	<br>
	</div>
<?php echo form_close(); ?>
<hr>
			<?php 
			if(empty($list2)) {
				echo '<div class="shadow" style="background-color:#ffffff;padding-bottom:15px; text-align:center; margin-bottom:10px;">';
				echo "<br><h2>Oh no!</h2><br>The newsfeed is empty!<br><br>Why don't you try and break the ice and let other's see what you are up to!</div>";
			} else {
				echo '<div id="results1"></div>';
			}
			?>
		</div>
	</div>

</div>

</div>

</div>


<script type="text/javascript" language="javascript">

function charcount() {		
	document.getElementById('post_txtarea').onkeyup = function () {
	document.getElementById('charcounter').innerHTML = "Characters left: " + (200 - this.value.length);
	};
}

function editform(id,id1){
	document.getElementById(id).style.display="block";
	document.getElementById(id1).style.display="none";
}

function cancelEform(id,id1){	
	document.getElementById(id).style.display="none";
	document.getElementById(id1).style.display="block";
}

function deletenf(nfdel,nfdelid) {
	if(confirm("Are you sure you want to delete this post?")) {
		return true;
	} else {
		return false;
	}
}

function deletenfc(nfcdel) {
	if(confirm("Are you sure you want to delete this comment?")) {
		return true;
	} else {
		return false;
	}
}


</script>

<script src="<?php echo base_url();?>assets2/scrolljs/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {
	
var total_record = 0;
var total_groups = <?php echo $total_data; ?>;

$('#results1').load("<?php echo base_url();?>user/nf_load_more", {'group_no1':total_record}, function() {total_record++;});
$(window).scroll(function() {       
    if($(window).scrollTop() + $(window).height() == $(document).height())  
    {           
        if(total_record <= total_groups)
        {
            loading = true; 
            $('.loader_image').show(); 
            $.post('<?php echo base_url();?>user/nf_load_more',{'group_no1': total_record},
            function(data1){ 
                if (data1 != "") {                               
                    $("#results1").append(data1);                 
                    $('.loader_image').hide();
                    total_record++;
                }
            });     
        }
    }
});
});
</script>
<script src="<?php echo base_url();?>assets2/scrolljs/jquery.min.js"></script>
<script type="text/javascript">
	var fixed = $('#posts').offset().top;
$(window).scroll(function() {
    var currentScroll = $(window).scrollTop();
    if (currentScroll >= fixed) {
        $('#posts').css({
            position: 'relative',
            top: '0',


        });
    } else {
        $('#posts').css({
            position: 'relative'
        });
    }
});

</script>

<?php include_once('footer.php'); ?>