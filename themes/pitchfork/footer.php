<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="footer">

	<?php get_sidebar( 'footerfull' ); ?>

	<div id="innovation-bar">
	  <div class="container">
	    <div class="row">
	      <div class="col-md-10 space-top-sm space-bot-sm">
	        <a href="http://yourfuture.asu.edu/rankings" target="_blank" id="asu-is-number-1-for-innovation">ASU is #1 in the U.S. for Innovation</a>
	      </div>
	      <div class="hidden-sm hidden-xs col-md-2 innovation-footer-image-wrapper">
	         <a href="http://yourfuture.asu.edu/rankings" target="_blank" id="best-colleges-us-news-bage-icon">
	          <img src="<?php echo get_template_directory_uri() ?>/assets/asu-web-standards/img/footer/best-colleges-us-news-badge.png" alt="Best Colleges U.S. News Most Innovative 2016">
	        </a>
	      </div>
	    </div>
	  </div>
	</div><!-- /#innovation-bar -->
	<div class="little-foot">
	  <div class="container">
	    <div class="row">
	      <div class="col-md-12">
	        <div class="little-foot__right">
	          <ul class="little-foot-nav">
	            <li><a href="http://www.asu.edu/copyright/" id="copyright-trademark-legal-footer">Copyright &amp; Trademark</a></li>
	            <li><a href="http://www.asu.edu/accessibility/" id="accessibility-legal-footer">Accessibility</a></li>
	            <li><a href="http://www.asu.edu/privacy/" id="privacy-legal-footer">Privacy</a></li>
	            <li><a href="http://www.asu.edu/asujobs" id="jobs-legal-footer">Jobs</a></li>
	            <li><a href="https://cfo.asu.edu/emergency" id="emergency-legal-footer">Emergency</a></li>
	            <li><a href="https://contact.asu.edu/" id="contact-asu-legal-footer">Contact ASU</a></li>
	          </ul>
	        </div>
	      </div>
	    </div><!-- /.row -->
	  </div><!-- /.container -->
	</div><!-- /.little-foot -->

	</div><!-- end .footer -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

