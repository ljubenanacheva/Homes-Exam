<footer class="site-footer">

			<p><?php echo get_bloginfo( 'title' ) ?> &copy; Copyright <?php echo date( 'Y' ); ?> </p>

            <div class="footer-nav-menu">
				<?php
				if ( has_nav_menu( 'footer_menu' ) ) {
						wp_nav_menu(
								array(
										'theme_location' => 'footer_menu',
									 )
					);
				}
				?>
		</div>
		</footer>
	</div>

    <?php wp_footer(); ?>

</body>
</html>