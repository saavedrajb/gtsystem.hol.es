<?php echo doctype('html'); ?>
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
	 <link href="<?php echo base_url().'assets1/css/bootstrap.css';?>" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="<?php echo base_url().'assets1/css/font-awesome.css';?>" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="<?php echo base_url().'assets1/css/style.css';?>" rel="stylesheet" />
	<title><?php echo isset($title) ? $title : 'ICT Alumni Portal | Admin' ; ?></title>
	
	<!-- Bootstrap Core CSS -->
 
	
	
	
	<style>
		.body-container {
			margin: auto;
			width: 80%;
		}
		th {
			font-size: 16px;
		}
		td {
			font-size: 14px;
		}
		*{
			border-radius:2px;
		}
		.pan-green{
		background-color: #fcf8e3;
		border-color;#faf2cc;
		border-radius: 3px;
		color: #8a6d3b;
	}
	</style>
	
<script>
        $(document).ready(function() {
            $(".print_div").find('button').on('click', function() {

                var dv_id = $(this).parents(".print_div").attr('id');

                //Print ele4 with custom options
                $('#' + dv_id).print({
                    //Use Global styles
                    globalStyles: false,
                    //Add link with attrbute media=print
                    mediaPrint: false,
                    //Custom stylesheet
                    stylesheet: "/css/font.css",
                    //Print in a hidden iframe
                    iframe: true,
                    //Don't print this
                    noPrintSelector: ".avoid-this"
                });
            });
        });
</script>
</head>
<body>