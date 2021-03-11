<?php get_header(); ?>
<div class="container">
    <div class="content-front-page">
        <h2 class="title-page">
            <mark><?php echo the_title(); ?></mark>
        </h2>
        
        <?= the_post_thumbnail(); ?>
        <div class="page-content-text">
            <?= the_content(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>