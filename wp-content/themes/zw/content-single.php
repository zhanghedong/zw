<?php

global $images_meta_key,$query,$wpdb;


$curr_post_ID = get_the_ID();
$attached_file_value = '';
$description_value ='';
$item_value ='';
$unit_value ='';
$size_value = '';
$pack_value = '';
$cbm_value = '';
$qty_value = '';

function   txtToHtml($str) 
{ 

	$str   =   ereg_replace( "\n", " <br /> ",$str); 

return   $str; 
} 


	$sql = 'SELECT * FROM  ' . $wpdb->prefix . 'postmeta WHERE post_id = ' . $curr_post_ID;
	$data = $wpdb->get_results($sql);
	foreach ($data as $entry){
                if( 'attached_file_value' == $entry->meta_key )
		$attached_file_value = trim($entry->meta_value);
                if( 'unit_value' == $entry->meta_key )
		$unit_value = $entry->meta_value;
                if( 'description_value' == $entry->meta_key )
		$description_value = $entry->meta_value;
                if( 'item_value' == $entry->meta_key )
		$item_value = $entry->meta_value;
                if( 'size_value' == $entry->meta_key )
		$size_value = txtToHtml($entry->meta_value);
                if( 'pack_value' == $entry->meta_key )
		$pack_value = $entry->meta_value;
                if( 'cbm_value' == $entry->meta_key )
		$cbm_value = $entry->meta_value;
                if( 'qty_value' == $entry->meta_key )
		$qty_value = $entry->meta_value;
	}
?>

<article id="post-<?php the_ID(); ?>" class="post-detail">
	<header class="entry-header">
	
	</header><!-- .entry-header -->
	<div class="entry-content">
	    <div class="entry-photo">
	    <?php 

 if ( has_post_thumbnail()) {
   $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'large');
   echo '<a target="_blank" href="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" >';
   echo the_post_thumbnail('medium'); 
   echo '</a>';
 }
	?>
     </div>
	    <div class="entry-info">
<h1 class="entry-title"><?php echo $description_value;?></h1>
               <h4>Product Details</h4>
               <ul>
                 <li><label>Item#：</label><strong><?php the_title(); ?></strong></li>
		 <li><label>Unit：</label><strong><?php echo $unit_value;?></strong></li>
		 <li><label>Size(cm)：</label><strong><?php echo $size_value;?></strong></li>
		 <li><label>Pack/CTN：</label><strong><?php echo $pack_value;?></strong></li>
		 <li><label>CBM(m3)：</label><strong><?php echo $cbm_value;?></strong></li>
		 <li><label>Qty./40'ft：</label><strong><?php echo $qty_value;?></strong></li>
                 <li><label>Shipping Post：</label><strong>Fuzhou</strong></li>
               </ul>
            </div>
<div class="clear"></div>
	</div><!-- .entry-content -->
	<footer class="entry-comments">
                <?php comments_template( '', true ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
