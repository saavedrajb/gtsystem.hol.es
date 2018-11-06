<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/ico" href="<?=base_url()?>/images/ctu.png">
    <link rel="stylesheet" href="<?php echo base_url();?>assets2/css/morphext.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets2/css/animate.css">
    <title>ICT Alumni Portal</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets2/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets2/css/style.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets2/css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>assets2/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	
    <style type="text/css">
        .checknow{
            -webkit-animation-delay:1s;
            -webkit-animation-iteration-count: infinite;
        }
       .vision{
        background: rgba(9, 97, 76, 1);
        color: white;
        padding: 30px;
        margin-bottom: 20px;
            word-wrap: break-word;
            box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
            
       }
       .mission{
         background: rgba(9, 97, 76, 1);
        color: white;
        padding: 30px;
        margin-bottom: 20px;

            word-wrap: break-word;
            box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
           
       }
       
       .goals{
        background: rgba(9, 97, 76, 1);
        color: white;
        padding: 30px;
        margin-bottom: 20px;
            word-wrap: break-word;
            box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
           
       }
       .objectives{
         background: rgba(9, 97, 76, 1);
        color: white;
        
        padding: 30px;
        
            word-wrap: break-word;
            box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
            
       }
    </style>

</head>

<body>

    <!-- Navigation -->
    <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle" data-toggle="tooltip" title="Navigation"><i class="fa fa-bars" tool></i></a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
            <li class="sidebar-brand">
                <a href="<?php echo base_url();?>" onclick=$("#menu-close").click();>ICT Alumni Portal</a>
            </li>
            <li>
                <a href="#top" onclick=$("#menu-close").click();>Home</a>
            </li>
            <li>
                <a href="#about" onclick=$("#menu-close").click();>About</a>
            </li>
            <li>	
                <a href="#login" onclick=$("#menu-close").click();>Login</a>
            </li>
			<li>
                <a href="<?php echo base_url().'index_announcements';?>" onclick=$("#menu-close").click();>Announcements</a>
            </li>
            <li>
                <a href="#contact" onclick=$("#menu-close").click();>Contact Us</a>
            </li>
			
        </ul>
    </nav>

    <!-- Header -->
    <header id="top" class="header" style="background: url(<?php echo base_url();?>images/56.jpg) no-repeat center center scroll; background-attachment:fixed;">
        <div class="text-vertical-center">
            <h1 style="color:#f1f1f1" class="animated fadeIn">ICT ALUMNI PORTAL</h1>
            <h3 style="color:#f1f1f1"><span id="js-rotating">Connect to your fellow Alumnus, Update your Status, See their posts and updates, Search your fellow ICT Alumni, Take the Graduates Tracer Survey</span></h3>
            <br>
            <a href="#services" class="animated fadeIn btn btn-dark btn-lg">Learn More</a>
        </div>
    </header>

    <!-- About -->

    <!-- Services -->
    <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
    <section id="services" class="services bg-primary">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
                <div class="wow zoomIn" data-wow-offset="0" data-wow-delay="0.4s">
                    <h1>ICT Alumni Portal</h1>
                    <hr class="small">
                    </div>
                    <div class="row">
				
                        <div class="wow fadeInLeft col-md-3 col-sm-6" data-wow-offset="0" data-wow-delay="0.4s">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-mortar-board fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Graduates Tracer Survey</strong>
                                </h4>
                                <p>Take the survey for Graduates Tracer Study and Accreditation.</p>
                                
                            </div>
                        </div>
                        <div class="wow fadeInLeft col-md-3 col-sm-6" data-wow-offset="0" data-wow-delay="0.4s">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-bars fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Announcements</strong>
                                </h4>
                                <p>Admin announcements/bulletin board for ICT Alumni.</p>
                                
                            </div>
                        </div>
                        <div class="wow fadeInRight col-md-3 col-sm-6" data-wow-offset="0" data-wow-delay="0.4s">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-comments-o fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Alumni Newsfeed</strong>
                                </h4>
                                <p>Newsfeed/shoutout from your fellow ICT Alumni.</p>
                                
                            </div>
                        </div>
						<div class="wow fadeInRight col-md-3 col-sm-6" data-wow-offset="0" data-wow-delay="0.4s">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-search fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Alumni Newsfeed</strong>
                                </h4>
                                <p>Search your fellow ICT Alumni.</p>
                                
                            </div>
                        </div>
                        
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.col-lg-10 -->
            </div>
            </div>
        <!-- /.container -->
    </section>
        <section id="about" style="background: url(<?php echo base_url();?>images/56.jpg) no-repeat center center scroll; background-attachment:fixed;">
        
        <br>
        <center>
                <div class="wow rollIn" data-wow-offset="0" data-wow-delay="0.4s">
               <h1 style="color:white;">ICT Department</h1>
               <br>
               
               </center>
               </div>
               <div class="container">
        <div class="col-lg-15 col-lg-offset-3">
            <div class="row">



        <div class="wow fadeInLeft vision col-md-8 col-sm-3" data-wow-offset="0" data-wow-delay="0.4s">
        <center><h2>Vision</h2>
        <hr class="small" style="border-color: gold">
        <p>Migrating individuals to the digital realm of Information and Communications Technology experience</p></center>
        </div>
        
        <div class="wow fadeInRight mission col-md-8 col-sm-3" data-wow-offset="0" data-wow-delay="0.4s">
        <center><h2>Mission</h2>
         <hr class="small" style="border-color: gold">
        <p>Embracing Information and Communications Technology to provide relevant curriculum, research and community services.</p></center>
        </div>
        
        <div class="wow fadeInLeft goals col-md-8 col-sm-3" data-wow-offset="0" data-wow-delay="0.4s">
       <center> <h2>Goals</h2></center>
         <hr class="small" style="border-color: gold">
        <p><ol>
			<li>Outcomes-based and quality-oriented Information and Communications Technology instruction delivered to student-customers;</li>
			<li>Information and Communications Technology market kept more satisfied;</li>
			<li>Holistic development of faculty members and students in Information and Communications Technology</li>
			</ol></p>
        </div>
        
        <div class="wow fadeInRight objectives col-md-8 col-sm-3" data-wow-offset="0" data-wow-delay="0.4s">
        <center><h2>Objectives</h2></center>
        <hr class="small" style="border-color: gold">
        <p><ol>
			<li>Students are equipped with equitable ICT skills and proficiences required by the industry.</li>
			<li>Research outputs contributed to ICT advancement of students, faculty, commmunity and stakeholders.</li>
			<li>Extension services benefit the deprived, depressed, and underserved sectors of the society.</li>
			<li>Sustained commitment to be the sufficient source of competent ICT professionals, managers and executive.</li>
			<li>Maintained local and international linkages towards mutually beneficial collaboration.</li>
			</ol></p>
        
        </div>
                </div>
            </div>
            </div>
            <!-- /.row --><br><br> 
        </section>
	
	    <section id="login" class="about" style="padding:5px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="wow fadeIn box" data-wow-offset="0" data-wow-delay="0.4s">
  <div id="header">
  <h1 style="margin-left:0px;">Alumni Login</h1>
  </div> 
  
  <?php
				echo form_open('/panel').'<div class="group">';
				echo form_input('idno','','class="inputMaterial" style="width:87.5%;" placeholder="ID number"') .'</div><div class="group">';

				echo form_password('password','','class="inputMaterial" style="width:87.5%;" placeholder="Password"') . '</div>';
				echo '<button id="buttonlogintoregister" type="submit" name="panel">Login</button><br><a href="recover" >Forgot account?</a><br><br>';
				//echo form_submit('panel','Log In','id="buttonlogintoregister" style="background-color:blue; color:white; width:50%;"');
				echo form_close();
			?>
  <div id="footer-box"><p class="footer-text">Not a member? <a href="#contact" class="sign-up">Contact your Admin/OJT coordinator</a></p></div>
</div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
	
	

    <!-- Callout -->
    

    <!-- Portfolio -->
   

    <!-- Call to Action -->
    <aside class="call-to-action bg-primary" style="background: url(<?php echo base_url();?>images/56.jpg) no-repeat center center scroll; background-attachment:fixed;">
        <div class="container">
            <center>
            <h3>See Announcements Here!</h3><a href="<?php echo base_url().'index_announcements';?>" class="checknow animated pulse btn btn-dark btn-lg">Check Now</a>
            </center>   
        </div>
    </aside>

    <!-- Map -->

    <!-- Footer -->
    <footer id="contact">
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

    <!-- jQuery -->
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

    <script type="text/javascript" src="<?php echo base_url();?>assets2/js/wow.min.js"></script>
    <script type="text/javascript">
        /*global jQuery:false */
(function ($) {

    wow = new WOW(
      {
        animateClass: 'animated',
        offset:       0
      }
    );
    wow.init();

})(jQuery);


    </script>
	
    <script src="<?php echo base_url();?>assets2/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets2/js/morphext.min.js"></script>
    <script src="<?php echo base_url();?>assets2/js/morphext.js"></script>
	

 

</body>

</html>
