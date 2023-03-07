<?php
/**
* Template Name: Black video stage
 *
 * @package WordPress
* @subpackage Teamtalk
 * @since Teamtalk 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<title><?php the_title(); ?></title>
<style type="text/css">
body{background:#000;color:#FFF;font:Arial, Helvetica, sans-serif;text-align:center}
a:link,a:visited{color:#FFF;}
a:hover{color:#FC0}
h1,p{font-family:Arial, Helvetica, sans-serif !important}
h1{font-size:1.3em}
</style>
</head>

<body class="vidstage">
<main>
<section>
	<?php while ( have_posts() ) : the_post(); ?>
			  
			
              
				<?php the_content(); ?>
            
   
                
                
	<?php endwhile; // end of the loop. ?>
</section>
</main>


</div>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script><script type="text/javascript">
var pageTracker = _gat._getTracker("UA-667451-12");
pageTracker._trackPageview();
</script>
</body>
</html>
	
