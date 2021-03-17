<?php get_header(); ?>

<div class="container">
    <div class="content-front-page">
        <?php if(isset($_GET['error_signature']) && $_GET['error_signature'] == '1'): ?>
            <div class="alert alert-danger" role="alert">
                Une erreur s'est produite, votre signature n'a pas été prise en compte.
            </div>
        <?php endif; ?>

        <?php if(isset($_GET['error_signature']) && $_GET['error_signature'] == '2'): ?>
            <div class="alert alert-warning" role="alert">
                Vous soutenez déjà notre appel ;) 
            </div>
        <?php endif; ?>

        <?php if(isset($_GET['success_signature']) == '1'): ?>
            <div class="alert alert-success" role="alert">
                Merci, votre signature a été prise en compte !
            </div>
        <?php endif; ?>

        <div class="page-content-text">
            <?= the_content(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>