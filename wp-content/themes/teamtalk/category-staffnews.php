<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
  
<head>

  <?php wp_head(); ?>
  
<META http-equiv=Content-Type content="text/html; charset=us-ascii">
<META http-equiv=Content-Language content=en-us>
<STYLE type=text/css media=screen>
table#wrapper{border:1px solid #006E4D !important;background-color: white !important;}
* {margin:0 !important;padding:0 !important;border:none !important;align:left !important;font: Arial, Helvetica, sans-serif !important;}
img {border: none !important;margin: 0px !important;padding: 0px !important;float:right !important}
body{color: #000 !important;background-color:#FFF !important;font:100% Arial, Helvetica, sans-serif !important;text-align:left !important;padding:0px !important}
p {font-size: 0.8em !important;line-height: 1.5em !important;margin-bottom: 1em !important;color: #333333 !important;text-align:left !important}
div{text-align:left !important}
h1,h2,h3,h4{font-weight: bold !important;letter-spacing:-1px !important;margin-bottom:0.5em !important}
h1 {font-size: 150% !important;}
h2 {font-size: 130% !important;margin-bottom:0px !important;padding-bottom:0px !important}
h3 {font-size: 110% !important;color:#060 !important}
h4 {font-size: 100% !important}
.docHeadLink {text-decoration:none !important;color:#060 !important}
a {color:#060;text-decoration:underline !important}
tr.section{float:left !important;clear:both !important;width:100% !important;margin-bottom:10px !important;border-bottom:1px #006E4D !important}
div.section img{}

</STYLE>

<META content="MSHTML 6.00.6000.16674" name=GENERATOR></head>
<BODY>
<table width="100%" border="0" align="center"> 
  <tr>
    <td valign="top">
    
   <hr>
      <table id="wrapper" width="600"  align="center">
  <tr>
    <td valign="top">
    
    
    <table width="550" align="center">
      <tr>
        <td valign="top"  ><img src="http://cms.intra.blackburn.gov.uk/upload/img/ttl.jpg" alt="Blackburn with Darwen Council staff newsletter" width="550" height="159">
        </td>
      </tr>
    </table>
     

     
  <table border="0" align="center"  width="560" cellspacing=10 style="background:white">
			
            <?php if ( have_posts() ) : ?>          
					<tr class="section">
  <td valign="top"  ><div ><?php echo get_the_post_thumbnail(get_the_ID(),'thumbnail'); ?></div>
   </td>
  <td valign="top" ><div style="width:90%;float:right"> <h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
 <?php the_excerpt(); ?> </div>
</td></tr>

<?php endif; ?>
    
</table>    
              
</td>

</table>    
         
  

	