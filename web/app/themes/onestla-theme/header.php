<!doctype html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="pres-blog" style="background-image: linear-gradient(rgba(31,53,86, 0.75), rgba(31,53,86,0.5)), url(<?php the_post_thumbnail_url('post-page-pres'); ?>);">
    <div id="header-banner">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <?php 
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                ?>  

                    <a class="navbar-brand" href="<?php echo get_home_url(); ?>">
                        <img src="<?php echo $image[0]; ?>" height="135px" width="250px">
                        <p id="banner-rss">Élections régionales - 13 & 20 Juin 2021</p>
                    </a>
                    <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <?php              
                            wp_nav_menu([
                                'theme_location' => 'header',
                                'container' => false,
                                'menu_class' => 'navbar-nav ms-auto'
                            ])
                        ?>
                        <ul class="navbar-nav nav-btn-mobile">
                            <li class="nav-item">
                                <a class="btn-join" href="#join-campagne">
                                <?php if(is_front_page()):?>Je signe<?php else: ?>Je participe<?php endif; ?></a>
                            </li>
                        </ul>
                    </div>
            </div>
        </nav>        
    </div>
    
    <?php
        $current_page = get_permalink();
    ?>

    <?php if(!str_contains($current_page, 'event') && !str_contains($current_page, 'events')): ?>
        <div class="container">
            <div class="p-60">
                <div class="row">
                    <h2 class="text-left title-page">
                        <mark><?php echo the_title(); ?></mark>
                    </h2>
                </div>
            </div>
        </div>
    <?php endif; ?>

</div>

<?php if(!str_contains($current_page, 'event') && !str_contains($current_page, 'events')): ?>
    <div class="linear-background">
        <div id="img-soutiens">
        </div>
    </div>
<?php endif; ?>

<?php if(str_contains($current_page, 'event') || str_contains($current_page, 'events')): ?>
    <div class="container">
        <div class="p-actu-page">   
            <div class="row">
                <h2 class="text-left title-page">
                    <mark>Agenda</mark>
                </h2>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php wp_body_open(); ?>
