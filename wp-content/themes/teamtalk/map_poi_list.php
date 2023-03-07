<ul>
	<?php foreach($map->pois as $poi) : ?>
		<?php if ($poi->type == 'kml') continue; ?>
  <li>
		
				<?php echo $poi->get_icon(); ?>
		
					<?php echo $poi->get_open_link(); ?>
				
				
					<?php echo $poi->get_links('poi_list'); ?>
				
		</li>
	<?php endforeach; ?>

</ul>