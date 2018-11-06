<!DOCTYPE HTML>
<html lang="en">
<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

	<?php echo meta('description','ICT Alumni Portal');
	$meta = array(
		array('name' => 'robots', 'content' => 'no-cache'),
		array('name' => 'keywords', 'content' => 'PHP, mysqli, oop, MVC'),
		array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type'=>'equiv')
		);
	echo meta($meta);
	?>
	<link rel="shortcut icon" type="image/ico" href="<?=base_url()?>/images/ctu.png">
	<link href="<?php echo base_url();?>assets2/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets2/css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets2/css/morphext.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets2/css/stylish-portfolio.css">

	<title><?php echo isset($title) ? $title : 'ICT Alumni Portal' ; ?></title>
	
	<!-- Bootstrap Core CSS -->
    
	<style>
		.body-container {
			margin: auto;
			width:60%;
		}
		
		.form-width{
			width: 170%;
		}
		textarea{
			resize: none;
		}
		
		.specdiv {
			background-color:white;
			padding: 25px;
			word-wrap: break-word;
			box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
		}
	</style>
	
	
	
	
</head>
<body style="background: url(<?php echo base_url();?>images/56.jpg) no-repeat center center scroll; background-attachment:fixed;">

    <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle" data-toggle="tooltip" title="Navigation"><i class="fa fa-bars"></i></a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
            <li class="sidebar-brand">
                <a href="#top" onclick=$("#menu-close").click();>ICT Alumni Portal</a>
            </li>
            <li>
                <a href="<?php echo base_url();?>" onclick=$("#menu-close").click();>Back to Homepage</a>
            </li>
        </ul>
    </nav>

	<div class="body-container">
	<br>
	<header id="top" class="header">
        <div class="text-vertical-center">
            <h1 style="color:#f1f1f1">ICT ALUMNI PORTAL</h1>
            <h3 style="color:#f1f1f1"><span id="js-rotating">Connect to your fellow Alumnus, Update your Status, See their posts and updates, Search your fellow ICT Alumni, Take the Graduates Tracer Survey</span></h3>
            <br>
			
        </div>
    </header>
	<br>
	<div class="panel panel-default" style="box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23); background-color:#f3f3f3 opacity:0.8;">
		<div class="panel-heading" style="background-color:#00695c;"><center><h1 style="color:white;">Announcements</h1></center></div>
		<div class="panel-body">
			<div id="results"></div>
		</div>
</div>

	</div>
	
	 <footer id="contact" style="background-color:#f1f1f1;">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h4><strong>CTU-MC ICT Department Alumni Office</strong>
                    </h4>
                    <p>Cebu Technological University - Main Campus
                        <br>M.J. Cuenco Ave., R.Palma St., Cebu City, 6000</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-phone fa-fw"></i> (123) 456-7890</li>
                        <li><i class="fa fa-envelope-o fa-fw"></i> <a href="mailto:name@example.com">ctu@edu.ph.com</a>
                        </li>
                    </ul>
                    <br>
                    <ul class="list-inline">
                        <li>
                            <a href="#"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dribbble fa-fw fa-3x"></i></a>
                        </li>
                    </ul>
                    <hr class="small">
                    <p class="text-muted">Copyright &copy; ICT Alumni Portal 2017</p>
                </div>
            </div>
        </div>
        <a id="to-top" href="#top" class="btn btn-dark btn-lg"><i class="fa fa-chevron-up fa-fw fa-1x"></i></a>
    </footer>	
	
	
	
	



		<script src="<?= base_url(); ?>assets2/js/jquery.min.js"></script>
		<script src="<?= base_url(); ?>assets2/js/jquery-3.1.1.js"></script>
		<script type="text/javascript" src="<?= base_url(); ?>assets2/js/bootstrap.min.js"></script>
		
		<script src="<?php echo base_url();?>assets2/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
		<script src="<?php echo base_url();?>assets2/js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#],[data-toggle],[data-target],[data-slide])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    //#to-top button appears after scrolling
    var fixed = false;
    $(document).scroll(function() {
        if ($(this).scrollTop() > 250) {
            if (!fixed) {
                fixed = true;
                // $('#to-top').css({position:'fixed', display:'block'});
                $('#to-top').show("slow", function() {
                    $('#to-top').css({
                        position: 'fixed',
                        display: 'block'
                    });
                });
            }
        } else {
            if (fixed) {
                fixed = false;
                $('#to-top').hide("slow", function() {
                    $('#to-top').css({
                        display: 'none'
                    });
                });
            }
        }
    });
    // Disable Google Maps scrolling
    // See http://stackoverflow.com/a/25904582/1607849
    // Disable scroll zooming and bind back the click event
    var onMapMouseleaveHandler = function(event) {
        var that = $(this);
        that.on('click', onMapClickHandler);
        that.off('mouseleave', onMapMouseleaveHandler);
        that.find('iframe').css("pointer-events", "none");
    }
    var onMapClickHandler = function(event) {
            var that = $(this);
            // Disable the click handler until the user leaves the map area
            that.off('click', onMapClickHandler);
            // Enable scrolling zoom
            that.find('iframe').css("pointer-events", "auto");
            // Handle the mouse leave event
            that.on('mouseleave', onMapMouseleaveHandler);
        }
        // Enable map zooming with mouse scroll when the user clicks the map
    $('.map').on('click', onMapClickHandler);
    </script>
	
	<script src="<?php echo base_url();?>assets2/scrolljs/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {
	
var total_record = 0;
var total_groups = <?php echo $total_data; ?>;

$('#results').load("<?php echo base_url();?>welcome/load_more", {'group_no':total_record}, function() {total_record++;});
$(window).scroll(function() {       
    if($(window).scrollTop() + $(window).height() == $(document).height())  
    {           
        if(total_record <= total_groups)
        {
            loading = true; 
            $('.loader_image').show(); 
            $.post('<?php echo base_url();?>welcome/load_more',{'group_no': total_record},
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

<script type="text/javascript" src="<?php echo base_url();?>assets2/js/jquery.min.css"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets2/js/morphext.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets2/js/morphext.js"></script>
