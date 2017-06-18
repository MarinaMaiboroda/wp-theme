<?php
/**
 * The template for displaying the footer
 *
 * @package WordPress
 * @subpackage akad
 * @since akad 1.0
 */
?>
<!-- FOOTER -->
<footer class="main-footer wow fadeInUp">
	<div class="container">
		<div class="col-md-8 col-sm-12">
				<div class="row">
					<nav class="footer-nav">
						<?php wp_nav_menu(array('theme_location' => 'footer', 'container' => '', 'menu_id' => 'footer-menu', 'menu_class' => '')); ?>
					</nav>
				</div>
			</div>

			<div class="col-md-4 col-sm-12" style="text-align:right">
				<div class="row">
					<div class="uppercase gray-text">
						<?php $date = date('Y');?> 
						created by akhouad &copy;<?php if ($date > 2016) : echo '2016 -'. date('Y');  else: echo '2016'; endif; ?>. all rights reserved.
					</div>
					<ul class="social-icons" style="margin-top:30px;float:right">
						<li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
						<li><a href="#"><i class="icon ion-social-twitter"></i></a></li>
						<li><a href="#"><i class="icon ion-social-youtube"></i></a></li>
						<li><a href="#"><i class="icon ion-social-linkedin"></i></a></li>
						<li><a href="#"><i class="icon ion-social-pinterest"></i></a></li>
						<li><a href="#"><i class="icon ion-social-instagram"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>