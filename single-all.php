<?php get_header(); ?>
		
		<div class="news">
			<div class="container">
				<div class="row">
					<?php if (have_posts()): while (have_posts()): the_post(); ?>
					<div class="col-md-12 news-wrapper">
						<div class="date-news"><?php echo get_the_date(); ?></div>
						<div class="one-news">
							<h1><?php the_title();?></h1>
							<?php the_content(); ?>
						</div>
					</div>
					<?php endwhile; endif;?>
				</div>
			</div>
		</div>
	</div>
	
<?php get_footer(); ?>	