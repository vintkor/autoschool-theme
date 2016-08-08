<?php
/*
Template Name: Контакты
*/
?>

<?php get_header(); ?>		
		<div class="page">
			<div class="container">
				<div class="row">
					<h1></h1>
				</div>
				<div class="row">
					<?php if (have_posts()): while (have_posts()): the_post(); ?>
					<div class="col-md-8 page-wrapper">
						<div class="one-page">
							<h1><?php the_title();?></h1>
							<?php the_content(); ?>						
						</div>						
					</div>
					<div class="col-md-4 page-wrapper">
						<div class="one-page">
							<div class="contact-form"><?php dynamic_sidebar('contact-form'); ?></div>				
						</div>						
					</div>					
					<?php endwhile; endif;?>
				</div>
			</div>
		</div>

	</div>
<div class="maps"><?php dynamic_sidebar('maps'); ?></div>	
<?php get_footer(); ?>