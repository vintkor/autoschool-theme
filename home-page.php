<?php
/*
Template Name: Главная
*/
?>

<?php get_header(); ?>

	<div class="section1">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<?php if (have_posts()): while (have_posts()): the_post(); ?>
						<?php the_content(); ?>
						<?php the_post_thumbnail(); ?>
					<?php endwhile; endif;?>
				</div>
				<div class="col-md-4">
						<h3>Записатся на курсы</h3>
						<?php dynamic_sidebar('contact-form'); ?>
				</div>
			</div>
		</div>
	</div>

	<div class="section2">
		<div class="container">
			<div class="row">
				<h2>Наши преимущества</h2>
				<div class="col-md-3">
					<div class="why">
					</div>
				</div>
				<div class="col-md-3">
					<div class="why">
					<?php if ( have_posts() ) : query_posts('page_id=25'); while (have_posts()) : the_post(); ?>
						<a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
					</div>
					<h4><?php the_title();?></h4>
					<? endwhile; endif; wp_reset_query(); ?>
				</div>
				<div class="col-md-3">
					<div class="why">
					<?php if ( have_posts() ) : query_posts('p=98'); while (have_posts()) : the_post(); ?>
						<a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
					</div>
					<h4><?php the_title();?></h4>
					<? endwhile; endif; wp_reset_query(); ?>
				</div>
				<div class="col-md-3">
					<div class="why">
					<?php if ( have_posts() ) : query_posts('page_id=55'); while (have_posts()) : the_post(); ?>
						<a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
					</div>
					<h4><?php the_title();?></h4>
					<? endwhile; endif; wp_reset_query(); ?>
				</div>
				<h2>Наши филлиалы</h2>
				<div class="replace">
					<span id="a_maps" class="span-active">Карта</span>
					<span id="a_list">Список</span>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- _____________________________Yandex maps_____________________________ -->

<?php

	function wp_get_cat_postnum($id) {
	    $cat = get_category($id);
	    $count = (int) $cat->count;
	    $taxonomy = 'category';
	    $args = array(
	      'child_of' => $id,
	    );
	    $tax_terms = get_terms($taxonomy,$args);
	    foreach ($tax_terms as $tax_term) {
	        $count +=$tax_term->count;
	    }
	    return $count;
	}

	if ( have_posts() ) : query_posts('cat=4');

	$data_start = '{"type": "FeatureCollection","features": [';
	$data_finish = ']}';
	$count = wp_get_cat_postnum(4);
	$while_step = 0;

	while (have_posts()) : the_post();

		$coordinates = get_post_meta($post->ID, 'coordinates', true);

		$params = array(
			'geocode' => $coordinates,
			'format'  => 'json',
			'results' => 1,
			'key'     => 'AFSAqFcBAAAAdOHrSgQAlpg1P3Z8X0Lcl1xEerZ0NqkQShsAAAAAAAAAAAByyA86vNGafPUkAuPaJo5eG8BmLQ=='
		);
		$response = json_decode(file_get_contents('http://geocode-maps.yandex.ru/1.x/?' . http_build_query($params, '', '&')));
		if ($response->response->GeoObjectCollection->metaDataProperty->GeocoderResponseMetaData->found > 0)
			{
			$data = $response->response->GeoObjectCollection->featureMember[0]->GeoObject->Point->pos;
			$replace = explode(' ', $data);
			$coordinates = $replace[1] . ', ' . $replace[0];

		}

		$link = get_the_permalink();
		$title = get_the_title();
		$thumb_id = get_post_thumbnail_id();
		$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
		$img = $thumb_url[0];

		$json = '{"type": "Feature", "id": '
				. $id
				. ',  "geometry": {"type": "Point", "coordinates": ['
				. $coordinates
				.']}, "properties": {"balloonContent": "<a href=\''
				. $link
				. '\'>'
				. $title
				. '</a><div class=\'maps_img\'><img src=\''
				. $img
				. '\'></div>'
				.'", "clusterCaption": "Еще одна метка"}}';

		$while_step++;

		if ($while_step < $count) {
			$center[] = $json . ',';
		} else {
			$center[] = $json;
		}

	endwhile; endif; wp_reset_query();



	function get_json($array){
		global $data_base, $data_start, $data_finish;
		echo $data_start;
		foreach ($array as $key => $value) {
			echo $value;
		}
		echo $data_finish;
	}

?>

<script>

ymaps.ready(init);

function init () {
    var myMap = new ymaps.Map('yamaps', {
            center: [50.454827, 30.521014],
            zoom: 10
        }),
        objectManager = new ymaps.ObjectManager({
            // Чтобы метки начали кластеризоваться, выставляем опцию.
            clusterize: true,
            // ObjectManager принимает те же опции, что и кластеризатор.
            gridSize: 32
        });

    // Чтобы задать опции одиночным объектам и кластерам,
    // обратимся к дочерним коллекциям ObjectManager.
    objectManager.objects.options.set('preset', 'islands#blueDotIcon');
    objectManager.clusters.options.set('preset', 'islands#blueClusterIcons');
    myMap.geoObjects.add(objectManager);
    objectManager.add(<?php get_json($center) ?>);

}

</script>

<div id="yamaps"></div>
<div id="list" style="display: none;">
	<div class="container">
		<div class="row">
			<div class="col-md-12 our-filials">
				<ol>
					<?php if ( have_posts() ) : query_posts('cat=4');
						  while (have_posts()) : the_post();?>
					<li>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> - <?php echo get_post_meta($post->ID, 'coordinates', true); ?>
					</li>
					<?php endwhile; endif; wp_reset_query(); ?>
				</ol>
			</div>
		</div>
	</div>
</div>

<!-- _____________________________END Yandex maps_____________________________ -->

<?php get_footer(); ?>
