<!-- PreFooter -->
	<div class="pre-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<h3>Меню сайта</h3>
						<div class="col-md-6">
							<?php wp_nav_menu( array(
												'theme_location' => 'footer-menu-1'
											) ); ?>
						</div>
						<div class="col-md-6">
							<?php wp_nav_menu( array(
												'theme_location' => 'footer-menu-2'
											) ); ?>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<h3>Записатся на курсы</h3>
					<?php dynamic_sidebar('contact-footer'); ?>
				</div>
			</div>
		</div>
	</div>
<!-- Футер -->
	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<p><?php echo get_bloginfo('name'); ?> &copy; 20<?php the_date('y'); ?> <?php echo get_bloginfo('description'); ?></p>
				</div>
				<div class="col-md-6 create">
					Создание сайта 
					<a href="http://mediaone.in.ua" target="_blank">
						<img src="<?php echo get_template_directory_uri(); ?>/app/img/mediaone.svg" alt="">
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>

<script src="<?php echo get_template_directory_uri(); ?>/app/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/app/js/main.js"></script>
</body>
</html>