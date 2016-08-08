<?php get_header(); ?>
		
		<div class="news">
			<div class="container">
				<div class="row">
					<?php if (have_posts()): while (have_posts()): the_post(); ?>
					<h1><?php the_title();?></h1>
					<div class="col-md-12 news-wrapper">
						<div class="fillial-img"
												style="background: url(<?php $thumb_id = get_post_thumbnail_id();
				  								$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
												echo $thumb_url[0];
											?>) center bottom; background-size: cover;">
						</div>
						<div class="one-news">
							
							<?php the_content(); ?>
						</div>
					</div>					
					<?php endwhile; endif; ?>
				</div>
			</div>
		</div>
	</div>
	
<?php get_footer(); ?>	