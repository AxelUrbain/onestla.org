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
                                <a class="btn-join" href="#join-campagne">Je participe</a>
                            </li>
                        </ul>
                    </div>
            </div>
        </nav>        
    </div>

    <div class="container">
        <div class="p-60">
        </div>
    </div>
</div>

<div class="linear-background"></div>


<?php wp_body_open(); ?>


<div class="img-article-highlighted">
    <div class="cont-img-article" style="background-image:url(<?php the_post_thumbnail_url('post-page-pres'); ?>)"></div>
</div>

<div id="article">
    <h2 class="title-article-page"><?php the_title(); ?></h2>
    <div class="article-info">
        <?php $categories = get_the_category(); ?>
        <?php if (!empty($categories)): 
               $category_id = get_cat_ID($categories[0]->name);
               $category_link = get_category_link( $category_id );
            ?>
            <a href="<?= esc_url($category_link) ?>" class="badge-article">
                <?= $categories[0]->name; ?>
            </a>
        <?php endif; ?>
        <span class="date date-article span-date">
            <?= get_the_date(); ?>
        </span>
    </div>

    <div id="content-article">
        <p> <?php the_content(); ?> </p>
    </div>
</div>

<?php get_footer(); ?>