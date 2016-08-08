<?php get_header(); ?>
		
		<!-- Блок новостей -->
		<div class="news">
			<div class="container">
				<div class="row">
					<h1></h1>
				</div>
				<div class="row">
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