<?php
add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup() {
load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'responsive-embeds' );
add_theme_support( 'automatic-feed-links' );
add_theme_support('custom-logo');
add_theme_support( 'html5', array( 'search-form', 'navigation-widgets' ) );
add_theme_support( 'appearance-tools' );
global $content_width;
if ( !isset( $content_width ) ) { $content_width = 1920; }
register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'blankslate' ) ) );
}

add_action( 'admin_notices', 'blankslate_notice' );
function blankslate_notice() {
$user_id = get_current_user_id();
$admin_url = ( isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http' ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$param = ( count( $_GET ) ) ? '&' : '?';
if ( !get_user_meta( $user_id, 'blankslate_notice_dismissed_11' ) && current_user_can( 'manage_options' ) )
echo '<div class="notice notice-info"><p><a href="' . esc_url( $admin_url ), esc_html( $param ) . 'dismiss" class="alignright" style="text-decoration:none"><big>' . esc_html__( 'Ⓧ', 'blankslate' ) . '</big></a>' . wp_kses_post( __( '<big><strong>🏆 Thank you for using BlankSlate!</strong></big>', 'blankslate' ) ) . '<p>' . esc_html__( 'Powering over 10k websites! Buy me a sandwich! 🥪', 'blankslate' ) . '</p><a href="https://github.com/bhadaway/blankslate/issues/57" class="button-primary" target="_blank"><strong>' . esc_html__( 'How do you use BlankSlate?', 'blankslate' ) . '</strong></a> <a href="https://opencollective.com/blankslate" class="button-primary" style="background-color:green;border-color:green" target="_blank"><strong>' . esc_html__( 'Donate', 'blankslate' ) . '</strong></a> <a href="https://wordpress.org/support/theme/blankslate/reviews/#new-post" class="button-primary" style="background-color:purple;border-color:purple" target="_blank"><strong>' . esc_html__( 'Review', 'blankslate' ) . '</strong></a> <a href="https://github.com/bhadaway/blankslate/issues" class="button-primary" style="background-color:orange;border-color:orange" target="_blank"><strong>' . esc_html__( 'Support', 'blankslate' ) . '</strong></a></p></div>';
}

add_action( 'admin_init', 'blankslate_notice_dismissed' );
function blankslate_notice_dismissed() {
$user_id = get_current_user_id();
if ( isset( $_GET['dismiss'] ) )
add_user_meta( $user_id, 'blankslate_notice_dismissed_11', 'true', true );
}

add_action( 'wp_enqueue_scripts', 'blankslate_enqueue' );
function blankslate_enqueue() {
wp_enqueue_style( 'blankslate-style', get_stylesheet_uri() );
wp_enqueue_script( 'jquery' );
}

add_action('after_setup_theme', 'my_custom_menus');
function my_custom_menus() {
    register_nav_menus(array(
        'primary'   => __('Menu Principal', 'header_menu'),
        'footer'    => __('Menu Pied de Page', 'footer_menu')
    ));
}


function register_custom_logo_2($wp_customize) {
    $wp_customize->add_setting('custom_logo_2', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_logo_2', array(
        'label'    => __('Secondary Logo', 'textdomain'),
        'section'  => 'title_tagline',
        'settings' => 'custom_logo_2',
    )));
}
add_action('customize_register', 'register_custom_logo_2');


class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = null) {
        $output .= '<ul class="sub-menu">';
    }
    function end_lvl(&$output, $depth = 0, $args = null) {
        $output .= '</ul>';
    }
}
// Ajout d'une section de contact dans le customizer
function my_custom_customize_register($wp_customize) {
    $wp_customize->add_section('contact_info', array(
        'title'    => __('Informations de Contact', 'mon-theme'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('contact_email', array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_email'
    ));

    $wp_customize->add_control('contact_email', array(
        'label'    => __('Adresse Email', 'mon-theme'),
        'section'  => 'contact_info',
        'type'     => 'email',
    ));

    $wp_customize->add_setting('contact_phone', array(
        'default'   => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control('contact_phone', array(
        'label'    => __('Numéro de Téléphone', 'mon-theme'),
        'section'  => 'contact_info',
        'type'     => 'text',
    ));


    // Ajouter une section pour les réseaux sociaux
    $wp_customize->add_section( 'social_media_section', array(
        'title'    => __( 'Réseaux Sociaux', 'mytheme' ),
        'priority' => 30,
    ) );

    // Ajouter un paramètre pour Facebook
    $wp_customize->add_setting( 'facebook_link', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url',
    ) );

    $wp_customize->add_control( 'facebook_link', array(
        'label'    => __( 'Lien Facebook', 'mytheme' ),
        'section'  => 'social_media_section',
        'type'     => 'url',
    ) );

    // Ajouter un paramètre pour Instagram
    $wp_customize->add_setting( 'instagram_link', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url',
    ) );

    $wp_customize->add_control( 'instagram_link', array(
        'label'    => __( 'Lien Instagram', 'mytheme' ),
        'section'  => 'social_media_section',
        'type'     => 'url',
    ) );

    // Ajouter un paramètre pour LinkedIn
    $wp_customize->add_setting( 'linkedin_link', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url',
    ) );

    $wp_customize->add_control( 'linkedin_link', array(
        'label'    => __( 'Lien LinkedIn', 'mytheme' ),
        'section'  => 'social_media_section',
        'type'     => 'url',
    ) );




}
add_action('customize_register', 'my_custom_customize_register');






function custom_login_logo() { ?>
    <style type="text/css">
        #login h1 a {
            background-image: url('http://localhost/znet/wp-content/uploads/2025/02/logo.png'); 
            background-size: contain;
            width: 320px;
            height: 84px;
        }
    </style>
<?php }
add_action('login_enqueue_scripts', 'custom_login_logo');



function social_share_buttons() {
    $post_url = urlencode(get_permalink());
    $post_title = urlencode(get_the_title());

    $facebook_url = "https://www.facebook.com/sharer/sharer.php?u=$post_url";
    $twitter_url = "https://twitter.com/intent/tweet?text=$post_title&url=$post_url";
    $linkedin_url = "https://www.linkedin.com/sharing/share-offsite/?url=$post_url";
    $whatsapp_url = "https://api.whatsapp.com/send?text=$post_title - $post_url";

    echo '<div class="social-share">';
    echo '<a href="' . $facebook_url . '" target="_blank" class="facebook">Partager sur Facebook</a>';
    echo '<a href="' . $twitter_url . '" target="_blank" class="twitter">Partager sur Twitter</a>';
    echo '<a href="' . $linkedin_url . '" target="_blank" class="linkedin">Partager sur LinkedIn</a>';
    echo '<a href="' . $whatsapp_url . '" target="_blank" class="whatsapp">Partager sur WhatsApp</a>';
    echo '</div>';
}





function custom_comment_template($comment, $args, $depth) {
    ?>
    <div <?php comment_class('custom-comment'); ?> id="comment-<?php comment_ID(); ?>">
        <article class="comment-body">
            <div class="comment-avatar">
                <?php echo get_avatar($comment, 60); ?>
                <div class="comment-author">
                    <b><?php comment_author_link(); ?></b>
                    <span class="comment-date"><?php printf(__('on %1$s', 'textdomain'), get_comment_date()); ?></span>
                </div>
            </div>
            <div class="comment-details">
    
                <div class="comment-text">
                    <?php comment_text(); ?>
                </div>
                <div class="comment-reply">
                    <?php comment_reply_link(array_merge($args, array(
                        'depth'     => $depth,
                        'max_depth' => $args['max_depth'],
                        'reply_text' => __('Reply', 'textdomain')
                    ))); ?>
                </div>
            </div>
        </article>
                </div>
    <?php
}




// services panel 

function custom_services_post_type() {
    register_post_type('services', array(
        'labels'      => array(
            'name'          => __('Services'),
            'singular_name' => __('Service')
        ),
        'public'      => true,
        'has_archive' => true,
        'supports'    => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'taxonomies'  => array('service_category'),
        'menu_icon'   => 'dashicons-hammer',
        'template'    => array(
            array('core/paragraph', array(
                'placeholder' => 'Ajoutez la description du service ici...'
            )),
        )
    ));
}
add_action('init', 'custom_services_post_type');

// Enregistrer la taxonomie "Catégories de Services"
function create_service_category_taxonomy() {
    register_taxonomy('service_category', 'services', array(
        'labels' => array(
            'name'          => __('Catégories de Services'),
            'singular_name' => __('Catégorie de Service'),
        ),
        'hierarchical'      => true,
        'show_admin_column' => true,
        'show_ui'           => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'service-category'),
    ));
}
add_action('init', 'create_service_category_taxonomy');


// Ajouter un template personnalisé pour les services
function custom_services_template($template) {
    if (is_singular('services')) {
        $new_template = locate_template(array('single-service.php'));
        if (!empty($new_template)) {
            return $new_template;
        }
    }
    return $template;
}
add_filter('single_template', 'custom_services_template');


function register_service_sidebar() {
    register_sidebar(array(
        'name'          => __('Service Sidebar', 'textdomain'),
        'id'            => 'service-sidebar',
        'description'   => __('Sidebar affichée sur les pages de services', 'textdomain'),
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'register_service_sidebar');
?>