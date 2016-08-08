<?php get_header(); ?>
		
		<div class="page">
			<div class="container">
				<div class="row">
					<?php if (have_posts()): while (have_posts()): the_post(); ?>
					<h1><?php the_title();?></h1>
					<div class="col-md-12 page-wrapper">
						<div class="one-page">
							<?php the_content(); ?>
						</div>
					</div>
					<?php endwhile; endif;?>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>	