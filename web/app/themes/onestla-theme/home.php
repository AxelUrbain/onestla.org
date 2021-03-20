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
                        <p id="banner-rss">Élections régionales - Juin 2021</p>
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
                                <a class="btn-join" href="#join-campagne">Faire campagne</a>
                            </li>
                        </ul>
                    </div>
            </div>
        </nav>        
    </div>

    <div class="container">
        <div class="p-60">
            <div class="row">
                <h2 class="text-left title-page">
                    <mark>Actualités</mark>
                </h2>
            </div>
        </div>
    </div>
</div>

<div class="linear-background"></div>

<div id="articles">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="img_preview_cont"  style="background-color:#000"></div>
            </div>
            <div class="col-lg-6 col-md-12 pl-20">
                <div class="row pt-2">
                    <div class="col-3">
                        <a href="" class="badge">categorie</a>
                    </div>
                    <div class="col-9">
                        <span class="badge date span-date">03 Janvier 2021</span>
                    </div>
                </div>
                <h2 class="title-article">
                    <a href="">
                        Titre de l'article
                    </a>
                </h2>
                <div class="desc-article">
                    Content extrait...
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-4">
                <div class="card-article">
                    <div class="row">
                        <div class="pl-20">
                            <div class="row pt-2">
                                <div class="col-3">
                                <a href="" class="badge">Catégorie</a>
                                </div>
                                <div class="col-9">
                                    <span class="badge date span-date">05 Janvier 2020</span>
                                </div>
                            </div>
                            <h2 class="title-article">
                                <a href="">
                                    Titre de l'article
                                </a>
                            </h2>
                            <div class="desc-article">
                                Extrait de l'article
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php wp_body_open(); ?>

<?php get_footer(); ?>