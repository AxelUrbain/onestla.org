<?php 

function onestla_supports()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');

    add_theme_support( 'custom-logo', array(
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ) );

    register_nav_menu('header', 'En tête du menu');
    register_nav_menu('footer', 'Pied de page');

    add_image_size('post-thumbnail', 350, 215, true);
    add_image_size('post-page-pres', 1920, 1080, true);
}

add_action('after_setup_theme', 'onestla_supports');

function onestla_register_assets()
{
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css', []);
    wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js', []);
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.2.1.slim.min.js', []);
    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js', ['popper', 'jquery']);

    
    wp_enqueue_style('bootstrap');
    wp_enqueue_script('bootstrap');

    
    wp_register_style('onestla', get_stylesheet_uri());
    wp_enqueue_style('onestla');

}

add_action('wp_enqueue_scripts', 'onestla_register_assets');

/**
 * Menu header
 */
function onestla_menu_class($classes)
{
    $classes[] = 'nav-item';
    return $classes;
}

function onestla_menu_link_class($attrs)
{
    $attrs['class'] = 'nav-link';
    return $attrs;
}
add_filter('nav_menu_css_class', 'onestla_menu_class');
add_filter('nav_menu_link_attributes', 'onestla_menu_link_class');

/**
 * Pagination article
 */
function onestla_pagination()
{
    $pages = paginate_links(['type' => 'array']);
    if ($pages === null) {
        return;
    }
    echo '<nav aria-label="Pagination" class="my-4">';
    echo '<ul class="pagination justify-content-end">';
    foreach ($pages as $page) {
        $active = strpos($page, 'current') !== false;
        $class = 'page-item';
        if ($active) {
            $class .= ' active';
        }
        echo '<li class="' . $class . '">';
        echo str_replace('page-numbers', 'page-link', $page);
        echo '</li>';
    }
    echo '</ul>';
    echo '</nav>';
}

/**
 * Signataire CPT
 */
function signataire_cpt() {
	$labels = array(
		'name'                => _x('Signataires', 'Post Type General Name', 'textdomain'),
		'singular_name'       => _x('signataire', 'Post Type Singular Name', 'textdomain'),
		'menu_name'           => __('Signataires', 'textdomain'),
		'name_admin_bar'      => __('Signataires', 'textdomain'),
		'parent_item_colon'   => __('Parent Item:', 'textdomain'),
		'all_items'           => __('Les signataires', 'textdomain'),
		'edit_item'           => __('Modifier le signataire', 'textdomain'),
		'update_item'         => __('Modifier', 'textdomain'),
		'view_item'           => __('Voir le signataire', 'textdomain'),
		'search_items'        => __('Rechercher un signataire', 'textdomain'),
		'not_found'           => __('Pas trouvé', 'textdomain'),
		'not_found_in_trash'  => __('Pas trouvé dans la corbeille', 'textdomain'),
	);
	$rewrite = array(
		'slug'                => _x('signataire', 'signataire', 'textdomain'),
		'with_front'          => false,
		'pages'               => false,
		'feeds'               => false,
	);
	$args = array(
		'label'               => __('signataire', 'textdomain'),
		'description'         => __('signataires', 'textdomain'),
		'labels'              => $labels,
		'supports'            => array('custom-fields'),
		'hierarchical'        => false,
		'public'              => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-clipboard',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => false,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => false,
		'query_var'           => 'signataire',
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type('signataire', $args);	
}

add_action('init', 'signataire_cpt', 10);

/**
 * ACF Admin colums - signataires administration view
 */

function add_acf_signataire_columns($columns){
	$columns = array(
		'prenom' =>'Prenom',
		'nom' => 'Nom',
		'email' => 'Mail',
		'telephone_portable' => 'Telephone portable',
		'postalcode' => 'Code postal',
        'activist_field' => 'Militant',
        'rgpd_field' => 'RGPD'
	);

	return $columns;
 }

 add_filter('manage_signataire_posts_columns', 'add_acf_signataire_columns');

 /**
 * Add columns to signataire CPT
 */
function signataire_custom_column( $column, $post_id ) {
	switch ( $column ) {
	  case 'prenom':
		echo get_post_meta ( $post_id, 'prenom', true );
		break;
	  case 'nom':
		echo get_post_meta ( $post_id, 'nom', true );
		break;
	  case 'email':
		echo get_post_meta ( $post_id, 'email', true );
		break;
	  case 'telephone_portable':
		echo get_post_meta($post_id, 'telephone_portable', true);
	  	break;
	  case 'postalcode':
		echo get_post_meta ( $post_id, 'postalcode', true );			
		break;
      case 'activist_field':
        echo get_post_meta ( $post_id, 'activist_field', true);
        break;
      case 'rgpd_field':
        echo get_post_meta($post_id, 'rgpd_field', true);
        break;
	}
 }
 add_action ( 'manage_signataire_posts_custom_column', 'signataire_custom_column', 10, 2 );

 /*
 * Add admin Sortable columns POST TYPE : Signataire
 */
function my_column_register_sortable( $columns ) {
	$columns['prenom'] = 'prenom';
	$columns['nom'] = 'nom';
	$columns['email'] = 'email';
    $columns['activist_field'] = 'activist_field';
	return $columns;
}
add_filter('manage_edit-signataire_sortable_columns', 'my_column_register_sortable' );

/**
 * Export signataire csv
 */
function admin_post_list_add_export_button( $which ) {
    global $typenow;
  
    if ('signataire' === $typenow && 'top' === $which) {
        ?>
        <input type="submit" name="export_all_signataires" class="button button-primary" value="<?php _e('Exporter'); ?>" />
        <?php
    }
}
 
add_action( 'manage_posts_extra_tablenav', 'admin_post_list_add_export_button', 20, 1 );


function func_export_all_signataires() {
    if(isset($_GET['export_all_signataires'])) {
        $arg = array(
            'post_type' => 'signataire',
            'post_status' => 'publish',
            'posts_per_page' => -1,
        );
  
        global $post;
		$arr_post = get_posts($arg);

        if ($arr_post) {
  
            header('Content-type: text/csv');
            header('Content-Disposition: attachment; filename="wp-fichier-signataire-'. date("Y-m-d-H:i:s") .'.csv"');
            header('Pragma: no-cache');
            header('Expires: 0');
  
            $file = fopen('php://output', 'w');
  
			fputcsv($file, array('Nom', 'Prenom', 'Email', 'Telephone portable', 'Code postal', 'Militant','RGPD'));
										
            foreach ($arr_post as $post) {
                setup_postdata($post);
                $post_tags = get_post_meta($post->ID);

				$tags = array();
				
                if (!empty($post_tags)) {
                    foreach ($post_tags as $tag) {
						if(!is_array($tag)){
							$tags[] = $tag;
						}
						else{
							$tags[] = implode(" | ", $tag); 
						}
                    }
				}
				
            	fputcsv($file, array(implode(",", $tags)));
			}
			
            exit();
        }
    }
}
 
add_action( 'init', 'func_export_all_signataires' );


/**
 * Page wp-admin
 */
add_filter('edit_signataire_per_page', 'se337791_signataire_posts_per_page');
function se337791_signataire_posts_per_page( $posts_per_page )
{
    return 20;
}

function treatment_form_add_signature() {

	if (isset($_POST['signature-send'])){
        if(!empty(htmlspecialchars($_POST['name'])) && !empty(htmlspecialchars($_POST['firstname'])) 
        && !empty( htmlspecialchars($_POST['email'])) && !empty(htmlspecialchars($_POST['postalcode']))
        && htmlspecialchars($_POST['rgpd_field']) == true){
            //verifier si l'adresse mail est déjà utilisée
            $email = $_POST['email'];

            $users_query = new WP_Query( array(
                'post_type' => 'signataire',
                'meta_query' => array(
                    array(
                        'key'     => 'email',
                        'value'   => $email,
                        'compare' => '=',
                    ),
                ),));

            if($users_query->have_posts()){
                $variable_to_send = '2';
                wp_redirect(home_url().'?error_signature='.$variable_to_send );
                exit; 
            }
            else{
                $my_cptpost_args = array(                 
                    'post_type' => 'signataire',
                    'post_status' => 'publish',
                );

                $cpt_id = wp_insert_post($my_cptpost_args);

                update_post_meta($cpt_id, 'prenom', $_POST['firstname']);
                update_post_meta($cpt_id, 'nom', $_POST['name']);
                update_post_meta($cpt_id, 'email', $_POST['email']);
                update_post_meta($cpt_id, 'telephone_portable', $_POST['portable']);
                update_post_meta($cpt_id, 'postalcode', $_POST['postalcode']);
                update_post_meta($cpt_id, 'activist_field', $_POST['activist_field']);
                update_post_meta($cpt_id, 'rgpd_field', $_POST['rgpd_field']);

                $variable_to_send = '1';
                wp_redirect(home_url().'?success_signature='.$variable_to_send);
                exit;
            }
        }
        else{
            $variable_to_send = '1';
            wp_redirect(home_url().'?error_signature='.$variable_to_send );
            exit; 
        }
	}
}
add_action('template_redirect', 'treatment_form_add_signature');