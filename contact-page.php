<?php
/*
Template Name: Контакты
*/
?>

<?php
/*
Template Name: TEST
*/
?>

<?php get_header(); ?>


	
</div>


<?php 
  $params = array(
    'geocode' => 'Киев, ул.Спасская, 9а', // адрес
    'format'  => 'json',                          // формат ответа
    'results' => 1,                               // количество выводимых результатов
    'key'     => 'AFSAqFcBAAAAdOHrSgQAlpg1P3Z8X0Lcl1xEerZ0NqkQShsAAAAAAAAAAAByyA86vNGafPUkAuPaJo5eG8BmLQ==',                           // ваш api key
);
$response = json_decode(file_get_contents('http://geocode-maps.yandex.ru/1.x/?' . http_build_query($params, '', '&')));
 
if ($response->response->GeoObjectCollection->metaDataProperty->GeocoderResponseMetaData->found > 0)
{
    $data = $response->response->GeoObjectCollection->featureMember[0]->GeoObject->Point->pos;

    $replace = explode(' ', $data);

    $data = $replace[1] . ' ' . $replace[0];

	echo "<pre>";
	print_r($data);
	echo "</pre>";
}
else
{
    echo 'Ничего не найдено';
}

?> 

<div id="yamaps"></div>

<!-- _____________________________END Yandex maps_____________________________ -->

<?php get_footer(); ?>