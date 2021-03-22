<!doctype html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="pres-blog" style="background-image: linear-gradient(rgba(31,53,86, 0.75), rgba(31,53,86,0.5)), url();">
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
                                <a class="btn-join" href="#join-campagne">Je participe</a>
                            </li>
                        </ul>
                    </div>
            </div>
        </nav>        
    </div>
</div>


<div class="container">
        <div class="p-actu-page">
            <div class="row">
                <h2 class="text-left title-page">
                    <mark>Actualités</mark>
                </h2>
            </div>
        </div>
    </div>

    <?php if (have_posts()): while (have_posts()): the_post(); ?>
    <div id="articles">
        <div class="container">
            <div class="content-article-page">
                <div class="card-article">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="img_preview_cont"  style="background-image:url(<?php the_post_thumbnail_url('post-page-pres'); ?>);"></div>
                        </div>
                        <div class="col-lg-8 col-md-12 pl-20">
                            <div class="row pt-2">
                                <div class="col-3">
                                <?php
                                $categories = get_the_category();
        
                                if (!empty($categories)):
                                    $category_id = get_cat_ID($categories[0]->name);
                                    $category_link = get_category_link( $category_id );
                                ?>
                                    <a href="<?php echo esc_url($category_link) ?>" class="badge">
                                        <?php echo $categories[0]->name; ?>
                                    </a>

                                <?php endif; ?>
                                </div>
                                <div class="col-9">
                                    <span class="badge date span-date"><?= get_the_date(); ?></span>
                                </div>
                            </div>
                            <h2 class="title-article">
                                <a href="<?php the_permalink() ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                            <div class="desc-article">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile;?>
        <div class="container">
            <div class="content-article-page">
                <?= onestla_pagination(); ?>
            </div>
        </div>
    <?php else: ?>
        <p>Aucun article :(</p>
    </div>
    <?php endif; ?>
</div>

<?php wp_body_open(); ?>

<div class="mt-5">
    <?php get_footer(); ?>
</div>