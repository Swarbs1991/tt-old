 <?php $attachments = new Attachments( 'my_attachments' ); /* pass the instance name */ ?>
	<?php if( $attachments->exist() ) : ?>
 	<div class="downloads">
    <div class="download-attachments">
    <h3>Downloads</h3>
    <ul>
    <?php  while( $attachments->get() ) : ?>
    <?php $subtype=$attachments->subtype(); ?>           
    <?php $ext_path="<?php echo site_url(); ?>/wp-content/themes/teamtalk/images/ext/"; ?>  
 	<?php
		if ($subtype == "pdf"):
  			$subtype="pdf";
    
		elseif (($subtype == "msword")||($subtype == 			"vnd.openxmlformats-officedocument.wordprocessingml.document")):
  		$subtype="doc";
  
 		elseif (($subtype == "vnd.ms-excel")):
  		$subtype="xls"; 
  
  		elseif (($subtype == "vnd.ms-powerpoint")):
  		$subtype="ppt"; 
  
		else:
    	endif;
?>
                              
<?php $icon_path=$ext_path.$subtype.".gif" ?>
                             
<li><img src="<?php echo $icon_path; ?>" class="attachment-icon" /><a href="<?php echo $attachments->url(); ?>"> <?php echo $attachments->field( 'title' ); ?> (<?php echo $attachments->filesize(); ?>)</a></li>
<?php endwhile; ?>
  </ul>
  </div>
</div>
<?php endif; ?>

