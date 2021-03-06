<?php 
/**		
 * Index
*/
get_header(); 

 // Shows an alert with what download was added to the cart. Only shows when ajax is turned off
$download_id = isset( $_POST["download_id"] ) ? $_POST["download_id"] : '';

if( function_exists('edd_show_added_to_cart_messages') ) edd_show_added_to_cart_messages( $download_id );

?>

<?php 
/**		
 * If the 'download' custom post type exists (EDD adds it) we'll load our featured downloads, latest downloads etc
 * @since 1.0
*/
if( post_type_exists( 'download' ) ) : ?>

	<?php 

		/**
		 * Hook for:
		 * homepage button, latest downloads
		 * @since       1.0
		*/
		do_action( 'shopfront_index' );
	?>

<?php else : // load normal posts ?>

	<div id="primary">
		<div class="wrapper">

				<?php if ( have_posts() ) : ?>

						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'content', get_post_format() ); ?>
						<?php endwhile; ?>

						<?php shopfront_content_nav( 'nav-below' ); ?>

					<?php else : ?>

						<article id="post-0" class="post no-results not-found">

						<?php if ( current_user_can( 'edit_posts' ) ) :
					// Show a different message to a logged-in user who can add posts.
				?>
							<header class="entry-header">
								<h1 class="entry-title"><?php _e( 'No posts to display', 'shop-front' ); ?></h1>
							</header>

							<div class="entry-content">
								<p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', 'shop-front' ), admin_url( 'post-new.php' ) ); ?></p>
							</div><!-- .entry-content -->

						<?php else :
				// Show the default message to everyone else.
				?>
							<header class="entry-header">
								<h1 class="entry-title"><?php _e( 'Nothing Found', 'shop-front' ); ?></h1>
							</header>

							<div class="entry-content">
								<p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', 'shop-front' ); ?></p>
								<?php get_search_form(); ?>
							</div><!-- .entry-content -->
						<?php endif; // end current_user_can() check ?>

						</article><!-- #post-0 -->

					<?php endif; // end have_posts() check ?>
		</div>
	</div>
	<?php get_sidebar(); ?>

<?php endif; ?>

<?php get_footer(); ?>