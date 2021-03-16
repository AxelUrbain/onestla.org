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
            <?php 
                $custom_logo_id = get_theme_mod( 'custom_logo' );
                $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
            ?>
            <img class="mt-3" src="<?php echo $image[0]; ?>" height="150px" width="280px">
        </div>
</div>

<?php wp_body_open(); ?>
