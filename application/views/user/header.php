<!DOCTYPE HTML>
<html lang="en">
<head>
	<?php echo meta('description','ICT Alumni Portal');
	$meta = array(
		array('name' => 'robots', 'content' => 'no-cache'),
		array('name' => 'keywords', 'content' => 'PHP, mysqli, oop, MVC'),
		array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type'=>'equiv')
		);
	echo meta($meta);
	?>
	<link rel="shortcut icon" type="image/ico" href="<?=base_url()?>/images/ctu.png">
	<link href="<?php echo base_url();?>assets2/css/stylish-portfolio.css" rel="stylesheet">
	<title><?php echo isset($title) ? $title : 'ICT Alumni Portal' ; ?></title>
	
	<!-- Bootstrap Core CSS -->
    <?php echo link_tag('assets2/css/bootstrap.min.css'); ?>
	<?php echo link_tag('assets2/css/styles.css'); ?>
	<?php echo link_tag('assets2/dist/sweetalert.css'); ?>
	<?php echo link_tag('assets2/font-awesome/css/font-awesome.css'); ?>
	<script src="<?php echo base_url();?>assets2/dist/sweetalert.min.js"></script>

	
	<style>
		.container {
			margin: auto;
		}
		
		.shadow {
			box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
		}

		.form-width{
			width: 170%;
		}
		textarea{
			resize: relative;
		}
		
		body {
			background-color: #EAEBEF;
		}
		
		#about {
		display:none;
	}
	
	#workinfo {
		display:none;
	}

	.table {
		border-top-style:none;
		border-top:0px;
	}

	th, td {
	    text-align:center;
	}
		
		*{
			border-radius:2px;
		}
		
		.specdiv {
			background-color:white;
			padding: 25px;
			word-wrap: break-word;
			box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
		}
		.login-form {
    padding-top: 4%;
    width: 100% !important;
    background-image: linear-gradient(bottom, #337ab7 60%, #ffffff 50%);
	background-image: -o-linear-gradient(bottom, #337ab7 60%, #ffffff 50%);
	background-image: -moz-linear-gradient(bottom, #337ab7 60%, #ffffff 50%);
	background-image: -webkit-linear-gradient(bottom, #337ab7 60%, #ffffff 50%);
	background-image: -ms-linear-gradient(bottom, #337ab7 60%, #ffffff 50%);
    height: 330px;
    margin-bottom: 0%;
    margin-left: auto;
    margin-right: auto;
    box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
    display: block;
	}
	

	.pan-green{
		background-color: #4cae4c;
		border-radius: 3px;
		color: #ffffff;
		border: solid 2px white;
	}
	
	.pan-red{
		background-color: #d60a0a;
		border-radius: 3px;
		color: #ffffff;
		border: solid 2px white;
	}
	.pan-blue{
		background-color: #337ab7;
		border-radius: 3px;
		color: #ffffff;
		border: solid 2px white;

	}
	
	.login-form h1, a{
		font-family: sans-serif;
		text-decoration: none;
		
		color: #646464;

	}
	
	.logo{
		margin-top: -120px;
		text-align:center;
		
	}
	
	.btn-nav-bar {
		display: inline-block;
		width:33.1%;
		height: 70px;
		box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
		background: white;
		border-radius: 0px;
	}
	.upperdiv{
	padding-top: 0%;
    width: 250px !important;
    background-color: #f5ae2d;
	height: 145px;
	margin-bottom: 2%;
	margin-right: 0px;
    box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
    font-family: Raleway-medium;
    display: block;
	}
	.lowerdiv{
		padding-top: 0px;
		width: 100% !important;
		background-color: #EAEBEF;
		height: 95px;
		border-bottom: solid 1px #d4d2d2;
		margin-bottom: 0%;
		font-family: sans-serif;
		display: block;
		margin-top: -28%;
	}
	.lowernavdiv{
		padding-left: 20px;
		padding-right: 20px;
		width: 100%;
		background-color: #EAEBEF;
		height: 350px;
		font-family: arial;
		margin-top: 5%;
		display: block;
	}
	.lowernavdiv a{
		font-family: sans-serif;
		color: #337ab7;
	}
	</style>
</head>
<body>