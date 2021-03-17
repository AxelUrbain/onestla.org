<!doctype html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="pres-blog" style="background-image:url(<?php the_post_thumbnail_url('post-page-pres'); ?>);">
    <div id="header-banner">
        <div class="container">
          <?php 
                $custom_logo_id = get_theme_mod( 'custom_logo' );
                $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
            ?>  
            <div class="row">
                <a href="<?php echo get_home_url(); ?>">
                    <img src="<?php echo $image[0]; ?>" height="115px" width="200px">
                </a>
                <div class="ml-auto">
                    <div class="menu-align">
                       <a class="btn-join" href="#join-campagne">Faire campagne</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <p id="banner-rss">Élections régionales - Juin 2021</p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="p-60">
            <div class="row">
                <h2 class="text-left title-page">
                    <mark><?php echo the_title(); ?></mark>
                </h2>
            </div>
        </div>
    </div>
</div>

<div class="linear-background"></div>


<?php wp_body_open(); ?>
