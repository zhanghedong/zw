<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header();


?>

		<div id="primary" class="primary">
			<div id="content" role="main" class="content">
				<?php get_template_part( 'content', 'contacts' ); ?>
				<div id="send-message" class="send-form-wrap">
				<?php comments_template( '', true ); ?>
                
<div class="c-info">

</div>
                              </div>
			</div><!-- #content -->
		</div><!-- #primary -->
	<?php //comments_template( '', true ); ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
