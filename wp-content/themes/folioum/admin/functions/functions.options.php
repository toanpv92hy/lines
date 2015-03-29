<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
	
		//Testing 
		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		//Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		            	natsort($bg_images); //Sorts the array into a natural order
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

$of_options[] = array( 	"name" 		=> "Logo, Banner, Footer",
						"type" 		=> "heading"
				);
        $of_options[] = array(  "name"      => "Upload ảnh logo",
                        "type"      => "media",
                        "id"        => "logo-id"
                );
        
        $of_options[] = array( 	"name" 		=> "Địa chỉ Email gần Footer",
            "desc" 		=> "Điền địa chỉ email",
            "id" 		=> "footer_email",
            "std" 		=> "Email: thietkehanoimoi@gmail.com",
            "type" 		=> "text"
        );

        $of_options[] = array( 	"name" 		=> "Điền thông tin footer",
            "desc" 		=> "You can use the following shortcodes in your footer text: [wp-link] [theme-link] [loginout-link] [blog-title] [blog-link] [the-year]",
            "id" 		=> "footer_text",
            "std" 		=> "&lt;p&gt;Copyright @ 2013&lt;/p&gt;",
            "type" 		=> "textarea"
        );

$of_options[] = array( 	"name" 		=> "Thông Tin Trang Liên hệ",
    "type" 		=> "heading"
);

        $of_options[] = array(  "name"         => "Địa chỉ",
            "desc"         => "Điền địa chỉ",
            "id"         => "contact_address",
            "std"         => "",
            "type"         => "textarea"
        );
        $of_options[] = array(  "name"         => "Số điện thoại liên hệ",
            "desc"         => "Điền số điện thoại trong trang liên hệ",
            "id"         => "contact_phone",
            "std"         => "",
            "type"         => "text"
        );
        $of_options[] = array(  "name"         => "Số hotline",
            "desc"         => "Điền số hotline",
            "id"         => "contact_hotline",
            "std"         => "",
            "type"         => "text"
        );
        $of_options[] = array(  "name"         => "Email hiển thị trong trang liên hệ",
            "desc"         => "Email",
            "id"         => "contact_email",
            "std"         => "",
            "type"         => "text"
        );
        $of_options[] = array(  "name"         => "Facebook Fanpage",
            "desc"         => "Điền địa chỉ facebook fanpage: ví dụ: http://www.facebook.com/FacebookDevelopers",
            "id"         => "fan_facebook",
            "std"         => "",
            "type"         => "text"
        );

$of_options[] = array( 	"name" 		=> "Seo",
    "type" 		=> "heading"
);

        $of_options[] = array(  "name"         => "SEO Description",
            "desc"         => "Paste your SEO Description. This will be added into the meta tag description in header.",
            "id"         => "seo_des",
            "std"         => "",
            "type"         => "textarea"
        );
        $of_options[] = array(  "name"         => "SEO Keywords",
            "desc"         => "Paste your SEO Keywords. This will be added into the meta tag keywords in header.",
            "id"         => "seo_keywords",
            "std"         => "",
            "type"         => "textarea"
        );


        $of_options[] = array(     "name"         => "Google Analytics Account ID",
            "desc"         => "Type your Google Analytics Account ID here. This will be added into the footer template of your theme.",
            "id"         => "google_analytics",
            "std"         => "",
            "type"         => "text"
        );

        $of_options[] = array(     "name"         => "Custom Favicon",
            "desc"         => "Upload your Favicon.",
            "id"         => "favicon",
            //Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
            "std"         => "",
            "type"         => "upload"
        );
        $of_options[] = array(   "name"         => "Apple touch icon ",
            "desc"         => "Upload your Apple touch icon.",
            "id"         => "app_icon",
            //Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
            "std"         => "",
            "type"         => "upload"
        );
        $of_options[] = array(  "name"         => "Apple touch icon 72x72",
            "desc"         => "Upload your Apple touch icon 72x72.",
            "id"         => "app_icon72",
            //Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
            "std"         => "",
            "type"         => "upload"
        );
        $of_options[] = array(  "name"         => "Apple touch icon 114x114",
            "desc"         => "Upload your Apple touch icon 114x114.",
            "id"         => "app_icon114",
            //Use the shortcodes [site_url] or [site_url_secure] for setting default URLs
            "std"         => "",
            "type"         => "upload"
        );


//$of_options[] = array( 	"name" 		=> "Social",
//    "type" 		=> "heading",
//    "icon"        => ADMIN_IMAGES . "icon-social.png"
//);
//
//        $of_options[] = array( 	"name" 		=> "Feeds",
//            "desc" 		=> "Add your Feeds url.",
//            "id" 		=> "feeds_social",
//            "std" 		=> "http://feeds2.feedburner.com",
//            "type" 		=> "text"
//        );
//
//        $of_options[] = array( 	"name" 		=> "Twitter",
//            "desc" 		=> "Add your Twitter url.",
//            "id" 		=> "twitter_social",
//            "std" 		=> "http://www.twitter.com",
//            "type" 		=> "text"
//        );
//        $of_options[] = array( 	"name" 		=> "Facebook",
//            "desc" 		=> "Add your Facebook url.",
//            "id" 		=> "facebook_social",
//            "std" 		=> "http://www.facebook.com",
//            "type" 		=> "text"
//        );
//        $of_options[] = array( 	"name" 		=> "Google Plus",
//            "desc" 		=> "Add your Plus Google url.",
//            "id" 		=> "google_plus_social",
//            "std" 		=> "https://plus.google.com",
//            "type" 		=> "text"
//        );
//        $of_options[] = array( 	"name" 		=> "Github",
//            "desc" 		=> "Add your Github url.",
//            "id" 		=> "github_social",
//            "std" 		=> "https://github.com",
//            "type" 		=> "text"
//        );
//        $of_options[] = array( "name" => __('Set your flickr ID ', 'stylos'),
//            "desc" => __('Set your flickr ID here.', 'stylos'),
//            "id" => "flickr",
//            "std" => "52617155@N08",
//            "type" => "text");
//        $of_options[] = array( "name" => __('Set Your order number photo stream', 'stylos'),
//            "desc" => __('Set Your order number flickr photo stream.', 'stylos'),
//            "id" => "flickr_number",
//            "std" => "6",
//            "type" => "text");


//        $of_options[] = array( 	"name" 		=> "Blog",
//            "type" 		=> "heading",
//            "icon"        => ADMIN_IMAGES . "icon-docs.png"
//        );
//
//        $of_options[] = array( 	"name" 		=> "intro",
//            "desc" 		=> "Add Blog Intro.",
//            "id" 		=> "blog_intro",
//            "std" 		=> "",
//            "type" 		=> "textarea"
//        );

				

				
	}//End function: of_options()
}//End chack if function exists: of_options()
?>
