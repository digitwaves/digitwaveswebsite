<!doctype html>
<html lang="en">	
<head>	
	<!-- Global site tag (gtag.js) - Google Analytics -->	
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120225500-1"></script>	
	<script>	  
	window.dataLayer = window.dataLayer || [];	  
	function gtag(){dataLayer.push(arguments);}	  
	gtag('js', new Date());	  
	gtag('config', 'UA-120225500-1');	
	</script><!-- Start of  Zendesk Widget script -->
<script>
	window.zESettings = {
		webWidget: {
			color: {
				theme: '#20aee8',
				launcher: '#18c9c3',
				launcherText: '#ffffff',
				button: '#18c9c3',
				resultLists: '#0097a7',
				header: '#18c9c3',
				articleLinks: '#0097a7'
			}
		}
	};
</script>
<script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=4852a129-47b9-4601-a079-2e5337721d30"> </script>
<script>
	window.addEventListener('load', function() {
		if (!window.zE) {
			return;
		}

		window.zE('webWidget', 'updateSettings', {
			webWidget: {
				color: {
					theme: '#20aee8',
					launcher: '#18c9c3',
					launcherText: '#ffffff',
					button: '#18c9c3',
					resultLists: '#0097a7',
					header: '#18c9c3',
					articleLinks: '#0097a7'
				}
			}
		});
	});
</script>
<!-- End of  Zendesk Widget script -->
	<!--https://www.taniarascia.com/developing-a-wordpress-theme-from-scratch/	http://hub51chicago.com/-->		
	<title><?php wp_title('|',true,'right');?>Digit Waves - Develops websites</title>			
	<meta name="viewport" content="width = device-width,user-scalable=no,initial-scale=1"></meta>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans|Roboto" rel="stylesheet">		
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">		
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">		
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Raleway:300" rel="stylesheet">		
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">		
	<link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() . '/images/favicon.png' ); ?>" />
	<?php wp_head();?>	
</head>	
<body <?php body_class();?>>	
	
<div id="wrapper">			
<header>				
	<div class="container2">					
	<div id="logo">
    <a href="/"><img src="https://digitwaves.com/wp-content/uploads/2026/05/logo-dw-octagon-white-inner-gradient.png" alt="Digit Waves logo"/></a>							
	</div>										
	<?php wp_nav_menu(array('theme_location' => 'primary'));?>
	
	</div><!--end container-->			
</header><!--end header-->
<div id="page">
    <?php if(is_front_page()):?>
        <!--<img style="width:100%;" src="<?php echo get_home_url();?>/wp-content/uploads/2021/08/ta2.jpg"/>-->
     <?php endif;?>
