<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */
global $images_meta_key,$description_value,$showcase_cat_id;
get_header(); ?>
		<div id="primary" class="primary">
			<div id="content" role="main" class="content">
			<?php 

$showcase_cat_name = get_cat_name($showcase_cat_id);
$query = new WP_Query( array ( 'meta_key' => $imagesMetaKey, 'cat' => $showcase_cat_id , 'showposts' => 20 ) );
//var_dump ($query);//查看sql
if ( $query->have_posts() ) : ?>
				<?php /* Start the Loop */ ?>
				<div class="product-ct">
				<h2 class="title-nav"><a class="more" href="<?php echo get_category_link( $showcase_cat_id ); ?>">See more</a><?php echo $showcase_cat_name;?></h2>
                                  <ul class="product-list">
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<?php get_template_part( 'content-product', get_post_format() ); ?>
				<?php endwhile; ?>
                                  </ul>
<div class="clear"></div>
                                </div>
			<?php endif; ?>

<?php
$query = new WP_Query( array ( 'showposts' => 10, 'orderby' => 'post_modified', 'order' => 'desc'  ) );
//var_dump ($query);
if ( $query->have_posts() ) : ?>
				<?php /* Start the Loop */ ?>
				<div class="product-ct">
				<h2 class="title-nav">New Products</h2>
                                  <ul class="product-list">
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<?php get_template_part( 'content-product', get_post_format() ); ?>
				<?php endwhile; ?>
                                  </ul>
<div class="clear"></div>
                                </div>
			<?php endif; ?>




			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
