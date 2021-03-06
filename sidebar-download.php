<?php
/**
 * The Sidebar shown on single download pages
 */
?>

<?php do_action( 'shopfront_secondary_before' ); ?>

<div id="secondary" class="widget-area">

	<?php do_action( 'shopfront_secondary_start' ); ?>

	<aside id="single-download">
		<?php

			// hook for download button, download meta
			do_action( 'shopfront_single_download_aside' );

		?>	
	</aside>

	<?php if ( ! dynamic_sidebar( 'single-download' ) ) :  ?>

	<?php endif; // end sidebar widget area ?>

	<?php do_action( 'shopfront_secondary_end' ); ?>

</div>

<?php do_action( 'shopfront_secondary_after' ); ?>