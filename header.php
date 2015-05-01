<!DOCTYPE html>
<html>
	<head>
		<title><?php bloginfo( 'name' ) ?></title>
		<meta charset="utf-8">
      
    <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<meta name="robots" content="index,follow"/>
		<meta name="description" content="Rebecca Lothian Fashion Print and Pattern Design portfolio"/>
		<meta name="keywords" content="Pattern Designer, patterns, childrenswear, womenswear, fashion" />
    <meta name="viewport" content="width=device-width">

		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/styles.css"></link>
        
    <script type="text/javascript" src="//use.typekit.net/ocq2iep.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

    <!-- TweenMax -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/utils/Draggable.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/plugins/ScrollToPlugin.min.js"></script>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!-- jQuery UI -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>

    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/production-min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.history.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/App-min.js"></script>

    
    <script type="text/javascript" id="sourcecode"> //<![CDATA[  
			$(document).ready(function(){
				var app = new App();
			});
    //]]></script>
     
    <?php wp_head(); ?>

    <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-10737615-2']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>
         
	</head>

  <body class = "desktop">

    <nav>
      <section id = "main-logo-navigation">
        <h1><a href="<?php echo home_url('/'); ?>">Rebecca Lothian</a></h1>
        <ul>
          <li><a href="<?php echo get_category_link(7); ?>">Childrenswear</a></li>
          <li><a href="<?php echo get_category_link(21); ?>">Illustration</a></li>
          <li><a href="<?php echo get_category_link(12); ?>">Prints</a></li>
        </ul>
      </section>
      <section id = "sub-about-navigation">
        <button class = "internal" href = "<?php echo get_permalink( get_page_by_title( 'Profile' ) ); ?>" data-target="<?php echo get_permalink( get_page_by_title( 'Profile' ) ); ?>" data-title = "About">About</button>
        <a id = "email-address" href = "mailto:rebecca@rebecca-lothian.co.uk">Email</a>
      </section>
    </nav>
