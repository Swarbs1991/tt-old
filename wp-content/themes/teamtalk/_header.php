 <?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
* @subpackage Teamtalk
 * @since Teamtalk 1.0
 */
?><!DOCTYPE html>
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
</head>

<body <?php body_class(); ?> >

<!-- #header -->
  <header>
	
<div class="wrapper"><div class="innerwrap">
<div class="headcol first">
<div class="logo"><a href="<?php echo site_url(); ?>"><img src="<?php echo site_url(); ?>/wp-content/uploads/xmaslogo.png" alt="Blackburn with Darwen Council news"></a></div>
</div>

<div class="headcol third">
	<div class="search">
   <form role="search" method="get" class="search-form" action="<?php echo site_url(); ?>/">
	  <!--s-->
		<div class="search-inputs">  
        <label for "s"><span class="screen-reader-text">Search:</span></label>
	<input type="text" class="search-field" value="<?php the_search_query(); ?>" name="s" id="s" />
     
    </div>

<div class="search-submit">
				  <input type="submit" class="search-submit" id="searchsubmit" value="Search" /></div>
		
		</form>
        
       
    
	  </div>
    <!--  <div class="loginout">
	  
	  <p><a href="<?php echo site_url(); ?>/help-how-do-i-find/">Help! How do i find...?</a></div>
      </div> -->
	</div> 
<!--<div class="headcol second">
<div class="crest"><img src="<?php echo site_url(); ?>/wp-content/uploads/crest.gif" alt="BwD Crest"></div>
</div>-->

	
	<nav id="core-nav">
			<div class="corenav">
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'Teamtalk' ); ?>"><?php _e( 'Skip to content', 'Teamtalk' ); ?></a>
				</div>
				<ul>

<li id="home" ><a href="<?php echo site_url(); ?>/">Home</a></li>
<li id="news" ><a href="<?php echo site_url(); ?>/category/news/">News</a></li>
<li id="contact" ><a href="http://directory.admmxi.blackburn.gov.uk/DirectorySearch/" title="Phone numbers and email addresses">Contacts</a></li>
				  <li id="people"><a title="Human Resources" href="<?php echo site_url(); ?>/human-resources">HR</a></li>
				  <li id="index"><a title="Finance & procurement" href="<?php echo site_url(); ?>/finance">Finance</a></li>
<li id="about"><a title="A-Z index" href="<?php echo site_url(); ?>/it/">IT</a></li>
</ul>
			</div>
       
   
		</nav>
        
   <nav class="azmenu">

<ul>
<span class="index1"><li><a href="<?php echo site_url(); ?>/a-z/a/">A</a></li>
<li><a href="<?php echo site_url(); ?>/a-z/b/">B</a></li>
<li><a href="<?php echo site_url(); ?>/a-z/c/">C</a></li>
<li><a href="<?php echo site_url(); ?>/a-z/d/">D</a></li>
<li><a href="<?php echo site_url(); ?>/a-z/e/">E</a></li>
<li><a href="<?php echo site_url(); ?>/a-z/f/">F</a></li>
<li><a href="<?php echo site_url(); ?>/a-z/g/">G</a></li>
<li><a href="<?php echo site_url(); ?>/a-z/h/">H</a></li>
<li><a href="<?php echo site_url(); ?>/a-z/i/">I</a></li>
<li><a href="<?php echo site_url(); ?>/a-z/j/">J</a></li>
<li><a href="<?php echo site_url(); ?>/a-z/k/">K</a></li>
<li><a href="<?php echo site_url(); ?>/a-z/l/">L</a></li>
<li><a href="<?php echo site_url(); ?>/a-z/m/">M</a></li></span>
<span class="index2">
<li><a href="<?php echo site_url(); ?>/a-z/n/">N</a></li>
<li><a href="<?php echo site_url(); ?>/a-z/o/">O</a></li>
<li><a href="<?php echo site_url(); ?>/a-z/p/">P</a></li>
<li><a href="<?php echo site_url(); ?>/a-z/q/">Q</a></li>
<li><a href="<?php echo site_url(); ?>/a-z/r/">R</a></li>
<li><a href="<?php echo site_url(); ?>/a-z/s/">S</a></li>
<li><a href="<?php echo site_url(); ?>/a-z/t/">T</a></li>
<li><a href="<?php echo site_url(); ?>/a-z/u/">U</a></li>
<li><a href="<?php echo site_url(); ?>/a-z/v/">V</a></li>
<li><a href="<?php echo site_url(); ?>/a-z/w/">W</a></li>
<li><a href="<?php echo site_url(); ?>/a-z/x/">X</a></li>
<li><a href="<?php echo site_url(); ?>/a-z/y/">Y</a></li>
<li><a href="<?php echo site_url(); ?>/a-z/z/">Z</a></li></span>

</ul></nav>
 </div>
  
  </header>
  
<div class="ticker"><?php if(function_exists('ditty_news_ticker')){ditty_news_ticker(574);} ?></div>
<!-- #header -->

