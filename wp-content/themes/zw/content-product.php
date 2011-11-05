<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<li class="product-item">
<?php if(false && is_category()){?>
<p class="checkbox"><input name="chkproductids" title="<?php echo $product_name ;?>"  value="<?php echo $curr_post_ID;?>" type="checkbox"></p>
<?php } ?>
<a href="<?php echo the_permalink(); ?>" class="product-photo" target="_blank"><?php the_post_thumbnail('thumbnail');?></a>
<a href="<?php echo the_permalink(); ?>" class="product-title" target="_blank"><?php echo  the_title() ;?></a>
</li>

