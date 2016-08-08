 <!-- 
  __  __            _  _          ____                   _                        
 |  \/  |          | |(_)        / __ \                 (_)                       
 | \  / |  ___   __| | _   __ _ | |  | | _ __    ___     _  _ __     _   _   __ _ 
 | |\/| | / _ \ / _` || | / _` || |  | || '_ \  / _ \   | || '_ \   | | | | / _` |
 | |  | ||  __/| (_| || || (_| || |__| || | | ||  __/ _ | || | | | _| |_| || (_| |
 |_|  |_| \___| \__,_||_| \__,_| \____/ |_| |_| \___|(_)|_||_| |_|(_)\__,_| \__,_|

-->

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php the_title();?> - <?php echo get_bloginfo('name'); ?></title>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/app/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/app/css/main.css">
	<?php wp_head(); ?>
	<script src="//api-maps.yandex.ru/2.1/?lang=ru-RU" type="text/javascript"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/app/bower_components/jquery/dist/jquery.min.js"></script>
</head>
<body>
<div class="wrapper">
	<div class="content">
		<div class="header">
			<div class="container">
				<div class="row">
					<div class="col-md-3 logo">
						<div class="table">
							<div class="table-cell">
								<a href="/">
									<img src="<?php echo get_template_directory_uri(); ?>/app/img/logo.png" alt="<?php echo get_bloginfo('name'); ?>">
								</a>
							</div>
						</div>
					</div>
					<div class="col-md-6 desc">
						<div class="table">
							<div class="table-cell">
								<div class="name"><?php echo get_bloginfo('name'); ?></div>
								<div class="description"><?php echo get_bloginfo('description'); ?></div>
							</div>
						</div>				
					</div>
					<div class="col-md-3 phone">
						<div class="table">
							<div class="table-cell">
								<p><img src="<?php echo get_template_directory_uri(); ?>/app/img/kyivstar.png"> (097) 389-56-60</p>					
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="nav">
			<div class="top-menu">
				<?php wp_nav_menu( array(
					'theme_location' => 'main-menu'
				) ); ?>
			</div>
		</div>