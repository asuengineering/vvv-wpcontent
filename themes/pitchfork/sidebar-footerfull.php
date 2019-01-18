<?php
/**
 * Sidebar setup for footer full.
 *
 * @package understrap
 */

$container   = get_theme_mod( 'understrap_container_type' );

?>

<!-- ******************* Super Footer, Branded Area + Flex Area ******************* -->

<div class="wrapper big-foot">

	<div class="<?php echo esc_attr( $container ); ?>" id="footer-full-content" tabindex="-1">

		<div class="row">

			<?php if ( is_active_sidebar( 'footer-branded' ) ) : ?>
				
				<div id="footer-branded-area" class="col-md-4">
					
				<?php dynamic_sidebar( 'footer-branded' ); ?>

				</div>

			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footer-flex' ) ) : ?>

				<?php dynamic_sidebar( 'footer-flex' ); ?>

			<?php endif; ?>

		</div>

	</div>

</div><!-- .wrapper .big-foot -->
