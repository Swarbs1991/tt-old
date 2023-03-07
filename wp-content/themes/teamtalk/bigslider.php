<?php

 /*
Template Name: Slider tester
*/

?>

<!doctype html>
<html lang="en">
  
<head>
  <meta http-equiv="x-ua-compatible" content="IE=Edge"/> 
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
  
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
    	<script src="<?php echo get_template_directory_uri(); ?>/js/placeholders.min.js"></script>
    
      
	<![endif]-->

 

 <link href='http://fonts.googleapis.com/css?family=Arimo:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

 <!--[if IE]>
 <link href="http://fonts.googleapis.com/css?family=Arimo" rel="stylesheet">
 <link href="http://fonts.googleapis.com/css?family=Arimo:400" rel="stylesheet">
 <link href="http://fonts.googleapis.com/css?family=Arimo:700" rel="stylesheet">
 <link href="http://fonts.googleapis.com/css?family=Arimo:400italic" rel="stylesheet">
 <link href="http://fonts.googleapis.com/css?family=Arimo:700italic" rel="stylesheet">
 <link href="http://fonts.googleapis.com/css?family=Arimo" rel="stylesheet">

 <![endif]-->


<?php wp_head(); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-62917572-1', 'auto');
  ga('send', 'pageview');

</script>
</head>

<body <?php body_class(); ?> >


<!--page-->




<?php while ( have_posts() ) : the_post();
?>

<?php the_content();?>


	<?php endwhile;
// end of the loop. ?>






<?php wp_footer(); ?>

</body>

</html>


