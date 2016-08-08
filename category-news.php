<?php get_header(); ?>
		
		<!-- Блок новостей -->
		<div class="news">
			<div class="container">
				<div class="row">
					<h1><?php single_cat_title(); ?></h1>
					<div class="clearfix"></div>
					<?php if (have_posts()): while (have_posts()): the_post(); ?>
					<div class="col-md-6 news-wrapper">
						<div class="date-news"><?php echo get_the_date(); ?></div>
						<div class="one-news">
							<h2><a href="<?php the_permalink() ?>"><?php the_title();?></a></h2>
							<?php do_excerpt(get_the_excerpt(), 50); ?>
						</div>
					</div>					
					<?php endwhile; endif; ?>
				</div>
				<div class="navi"><?php wp_pagenavi(); ?></div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>	