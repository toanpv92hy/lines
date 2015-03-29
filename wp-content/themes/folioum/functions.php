<?php

//Define Text Doimain

$theme_text_domain = 'folioum';

$lang = get_stylesheet_directory_uri() . '/languages';

load_theme_textdomain($theme_text_domain, $lang);



// Backend Options

require_once ('admin/index.php');



//Custom fields:

include dirname( __FILE__ ) . '/framework/Custom-Metaboxes/metabox-functions.php';



// Shortcode custom

require_once dirname( __FILE__ ) . '/framework/shortcode.php';



// Register post type

require_once dirname( __FILE__ ) . '/framework/posttype.php';





//Theme Set up:



// Create Sidebar column 1

$args = array(

    'name' => sprintf( __( 'Sidebar Footer 1' ), 'folioum' ),

    'id' => "sidebar-footer-1",

    'description' => __( 'Sidebar Footer 1', 'folioum' ),

    'class' => '',

    'before_widget' => '<div id="%1$s" class="widget %2$s">',

    'after_widget' => "</div>",

    'before_title' => '<h3 class="widget-title">',

    'after_title' => "</h3>",

);

register_sidebar( $args );

// End Create Sidebar column 1



// Create Sidebar column 2

$args = array(

    'name' => sprintf( __( 'Sidebar Footer 2' ), 'folioum' ),

    'id' => "sidebar-footer-2",

    'description' => __( 'Sidebar Footer 2', 'folioum' ),

    'class' => '',

    'before_widget' => '<div id="%1$s" class="widget %2$s">',

    'after_widget' => "</div>",

    'before_title' => '<h3 class="widget-title">',

    'after_title' => "</h3>",

);

register_sidebar( $args );

// End Create Sidebar column 2



// Create Sidebar column 3

$args = array(

    'name' => sprintf( __( 'Sidebar Footer 3' ), 'folioum' ),

    'id' => "sidebar-footer-3",

    'description' => __( 'Sidebar Footer 3', 'folioum' ),

    'class' => '',

    'before_widget' => '<div id="%1$s" class="widget %2$s">',

    'after_widget' => "</div>",

    'before_title' => '<h3 class="widget-title">',

    'after_title' => "</h3>",

);

register_sidebar( $args );

// End Create Sidebar column 3



function polioum_theme_setup() {

    /*

     * Makes Twenty Thirteen available for translation.

     *

     */

    load_theme_textdomain( 'polioum', get_template_directory() . '/languages' );



    // Adds RSS feed links to <head> for posts and comments.

    add_theme_support( 'automatic-feed-links' );



    // This theme styles the visual editor with editor-style.css to match the theme style.

    //add_editor_style();



    // Switches default core markup for search form, comment form, and comments

    // to output valid HTML5.

    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );



    /*

     * This theme supports all available post formats by default.

     * See http://codex.wordpress.org/Post_Formats

     */

    add_theme_support( 'post-formats', array(

        'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'

    ) );



    add_theme_support( 'post-thumbnails' );



    add_shortcode('gallery', '__return_false');

	

	add_image_size( 'thumbnail_80x60', '80', '60', true );

	add_image_size('thumbnail_230x185','230','185', true);

    add_image_size('thumbnail_230','230','', true);

	add_image_size('thumbnail_474','474','', false);

	add_image_size('thumbnail_310x200','310','200', true);	

	add_image_size('thumbnail_142x135','142','135', true);

	







    // This theme uses wp_nav_menu() in one location.

    register_nav_menu( 'primary', __( 'Menu Top', 'polioum' ) );

    register_nav_menu( 'footer', __( 'Menu Footer', 'polioum' ) );

    register_nav_menu( 'Dropdown', __( 'Menu Dropdown', 'polioum' ) );

    register_nav_menu( 'home', __( 'Menu home', 'polioum' ) );
    register_nav_menu( 'footer-left', __( 'Menu footer left', 'polioum' ) );




}

add_action( 'after_setup_theme', 'polioum_theme_setup' );



/**
 * Enqueues scripts and styles for front end.
 *
 */

function mint_theme_scripts_styles() {



    // Adds JavaScript to pages with the comment form to support sites with

    wp_enqueue_script("jquery");



    wp_enqueue_script("bootstrap_js", get_stylesheet_directory_uri()."/assets/js/bootstrap.min.js",array(),false,true);

//    wp_enqueue_script("masory_js", get_stylesheet_directory_uri()."/assets/js/jquery.masonry.min.js",array(),false,true);

    wp_enqueue_script("isotope_js", get_stylesheet_directory_uri()."/assets/js/isotope-docs.min.js",array(),false,true);

    wp_enqueue_script("fancybox_js", get_stylesheet_directory_uri()."/assets/js/jquery.fancybox.pack.js",array(),false,true);

    wp_enqueue_script("custom_js", get_stylesheet_directory_uri()."/assets/js/custom.js",array(),false,true);





    // Loads our main stylesheet.



    wp_enqueue_style( 'bootstrap-css', get_stylesheet_directory_uri().'/assets/css/bootstrap.css');

    wp_enqueue_style( 'style-css', get_stylesheet_directory_uri().'/assets/css/style.css');

//    wp_enqueue_style( 'isotop-css', get_stylesheet_directory_uri().'/assets/css/isotope-docs.css');

    wp_enqueue_style( 'slide-css', get_stylesheet_directory_uri().'/assets/css/slide.css');

    wp_enqueue_style( 'fancybox-css', get_stylesheet_directory_uri().'/assets/css/jquery.fancybox.css');







    wp_enqueue_style( 'theme-style', get_stylesheet_uri(), array(), '2013-12-20' );

}

add_action( 'wp_enqueue_scripts', 'mint_theme_scripts_styles' );

//Ajax



//For IE

function cams_script_ie() {

    echo '

   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

   <!--[if lt IE 9]>

   <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>

   <script src="'.get_stylesheet_directory_uri().'/js/respond.min.js"></script>

   <![endif]-->

  ';

}

add_action( 'wp_head', 'cams_script_ie' );





//Fix shortcode

if( !function_exists('qshop_fix_shortcodes') ) {

    function qshop_fix_shortcodes($content){

        $array = array (

            '<p>['        => '[',

            ']</p>'        => ']',

            ']<br />'    => ']'

        );

        $content = strtr($content, $array);

        return $content;

    }

    add_filter('the_content', 'qshop_fix_shortcodes');

}



//page navegation

function folioum_pagination($prev = 'Prev', $next = 'Next', $pages='') {

    global $wp_query, $wp_rewrite;

    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

    if($pages==''){

        global $wp_query;

        $pages = $wp_query->max_num_pages;

        if(!$pages)

        {

            $pages = 1;

        }

    }

    $pagination = array(

        'base' => @add_query_arg('paged','%#%'),

        'format' => '',

        'total' => $pages,

        'current' => $current,

        'prev_text' => __($prev,'folioum'),

        'next_text' => __($next,'folioum'),

        'type' => 'list'

    );

    if( $wp_rewrite->using_permalinks() )

        $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );



    if( !empty($wp_query->query_vars['s']) )

        $pagination['add_args'] = array( 's' => get_query_var( 's' ) );

    //var_dump($pagination);

    echo paginate_links( $pagination );

}





function bootstrap_pagination($pages = '', $range = 2)

{

    $showitems = ($range * 2)+1;



    global $paged;

    if(empty($paged)) $paged = 1;



    if($pages == '')

    {

        global $wp_query;

        $pages = $wp_query->max_num_pages;

        if(!$pages)

        {

            $pages = 1;

        }

    }



    if(1 != $pages)

    {

        echo "<ul class='pagination'>";

        if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'>&laquo;</a></li>";

        if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a></li>";



        for ($i=1; $i <= $pages; $i++)

        {

            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))

            {

                echo ($paged == $i)? "<li class='active'><span class='current'>".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";

            }

        }



        if ($paged < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a></li>";

        if ($paged < $pages-1 && $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'>&raquo;</a></li>";

        echo "</ul>\n";

    }

}

// Limit Post Title by amount of characters

function short_title() {

    $mytitleorig = get_the_title();

    $title = html_entity_decode($mytitleorig, ENT_QUOTES, "UTF-8");



    $limit = "50";

    $pad="...";



    if(strlen($title) >= ($limit+3)) {

        $title = mb_substr($title, 0, $limit) . $pad; }

    echo $title;

}



function short_content() {

    $mytitleorig = get_the_content();

    $title = html_entity_decode($mytitleorig, ENT_QUOTES, "UTF-8");



    $limit = "160";

    $pad="...";



    if(strlen($title) >= ($limit+3)) {
        $title = mb_substr($title,0, $limit) . $pad; 
    }

    echo $title;

}




