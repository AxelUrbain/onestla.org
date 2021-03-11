<!doctype html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="header-banner">
        <div class="text-center">
            <h1 class="title-site">
                <?= get_bloginfo('name'); ?> <span> !</span>
            </h1>
            <h2 class="subtitle-site">
                <mark><?= get_bloginfo('description'); ?></mark>
            </h2>
        </div>
</div>

<?php 
wp_nav_menu([
    'theme_location' => 'header',
    'container' => false,
    'menu_class' => 'navbar-nav mr-auto'
 ]);
?>

<?php wp_body_open(); ?>
