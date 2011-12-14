<?php
/*
Template Name: Category List
*/
?>
<?php

get_header(); ?>
<div class="cat-list">
<?php

	global $wpdb;
        $catStr	= '';
        $sql = "SELECT t.term_id, t.name, tt.count FROM $wpdb->term_taxonomy tt, $wpdb->terms t, $wpdb->term_taxonomy tt2 WHERE tt.taxonomy = 'category' AND t.term_id = tt.term_id and  tt.count > 0  GROUP BY t.term_id ";
	$results=$wpdb->get_results($sql);
	foreach($results as $row)
	{
		//	$catStr = $catStr.$row->name . '<br />';
                $html = '<div class="cat-item">';               
		$html .= '<h2><a href="' . get_category_link( $row->term_id ) . '">' . $row->name . '</a><span class="count">' . $row->count . ' items</span></h2>';

		$args = array(
			'orderby' => 'date',
			'order' => 'DESC',
			'post_type' => 'post',
			'numberposts' => 6,
			'category__in' => $row->term_id
		); 
		$cat_posts = get_posts($args);
		$html .= '<ul class="product-link"> ';
		echo $html;
		foreach($cat_posts as $post) {
?>
	<li><a href="'<?php echo get_permalink($post->ID) ;?>'" title="'<?php echo wptexturize($post->post_title) ?>'"><?php the_post_thumbnail('thumbnail') ?></a></li><!--<?php //echo wptexturize($post->post_title); ?></a>-->
<?php
		}
		echo '</ul><div class="clear"></div></div>';

		//$out = '<ul class="cat_post">' . $out . '</ul>';

	}





?>
</div>


<div class="suggest-area">
<div class="new-product box-1">
  <h3>New products</h3>
  <ul>
     <li></li>
  </ul>
</div>
</div>
<div class="clear"></div>
<?php get_footer(); ?>

