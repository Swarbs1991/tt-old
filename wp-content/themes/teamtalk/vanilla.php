<?php
/**
* Template Name: Vanilla
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
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
  
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
   <!--fix IE8 whitespace on Wordpress Popular Posts sidebar lists--> 
       <!--[if lt IE 9]>
<style type="text/css">
  .wpp-list li {margin-top:-3px !important;}
</style>
<![endif]-->
    
  <link href='http://fonts.googleapis.com/css?family=Roboto:100,400,700' rel='stylesheet' type='text/css'>
 <link href='http://fonts.googleapis.com/css?family=Arimo:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
 
    <?php wp_head(); ?>
</head>

<body class="flu" style="background:#eee;padding:1.5em">
	<?php while ( have_posts() ) : the_post(); ?>
			  
			
              
				<?php the_content(); ?>
            
   
                
                
	<?php endwhile; // end of the loop. ?>




<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script><script type="text/javascript">
var pageTracker = _gat._getTracker("UA-667451-12");
pageTracker._trackPageview();
</script>
</body>
</html>
	
