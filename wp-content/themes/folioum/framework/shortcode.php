<?php

global $smof_data;



// Add shortcode intro

add_shortcode('intro', 'shortcode_intro');

function shortcode_intro($atts, $content = null) {



    $atts   = shortcode_atts(

        array(

            'title'=>'',

        ),$atts);



    $html   =   '';

    $html   .=  '<div class="landing ss-style-doublediagonal"><div class="container">';

    $html   .=  '<div class="site-header">';

    $html   .=  '<h1 class="general-title">'.$atts['title'].'</h1>';

    $html   .=  '<p class="general-desc">';

    $html   .=  do_shortcode($content);

    $html   .=  '</p>';

    $html   .=  '</div>';

    $html   .=  '</div></div>';



    return $html;

}

// End Add shortcode intro



// Add shortcode services

add_shortcode('services', 'shortcode_services');

function shortcode_services($atts, $content = null) {



    $atts   = shortcode_atts(

        array(

            'title'=>'',

            'subtitle'=>'',

        ),$atts);



    $html   =   '';

    $html   .=  '<section class="default-bg ss-style-triangles">';

    $html   .=      '<div class="container">';

    $html   .=          '<div class="row">';

    $html   .=              '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 block_title">';

    $html   .=                  '<h3>'.$atts['title'].'</h3>';

    $html   .=                  '<h1>'.$atts['subtitle'].'</h1>';

    $html   .=                      do_shortcode($content);

    $html   .=              '</div>'; // End block_title

    $html   .=          '</div>'; // End row

    $html   .=      '</div>'; // End container

    $html   .=  '</section>'; // End section



    return $html;

}

// End Add shortcode services



// Add shortcode item service

add_shortcode('item-service', 'shortcode_item_service');

function shortcode_item_service($atts, $content = null) {



    $atts   = shortcode_atts(

        array(

            'class'=>'',

            'effect'=>'',

            'title'=>'',

            'link'=>'',

        ),$atts);



    $html   =   '<div class="service-box col-lg-6 col-md-6 col-sm-12 col-xs-12">

                <i class="fa fa-2x '.$atts['class'].'" data-effect="'.$atts['effect'].'"></i>

                <h3>'.$atts['title'].'</h3>

                <p class="description">'.do_shortcode($content).'</p>

                <a class="readmore" href="'.$atts['link'].'">Learn more</a>

            </div>';



    return $html;

}

// End Add shortcode item service





// Add shortcode portfolio

add_shortcode('portfolio', 'shortcode_portfolio');

function shortcode_portfolio($atts, $content = null) {



    $atts   = shortcode_atts(

        array(

            'title'=>'',

            'intro'=>'',

        ),$atts);



    $html = '<section class="dark-bg dark-bg-style text-center">

			<div class="container">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 block_title">

                    <h3>'.$atts['title'].'</h3>

                    <h1>'.$atts['intro'].'</h1>

            	</div>

        	</div>

			<div id="gallery-1" class="royalSlider rsDefault visibleNearby">

			'.do_shortcode($content).'

            </div></section>';



    return $html;

}

// End Add shortcode portfolio



// Add shortcode item portfollio

add_shortcode('item_portfolio', 'shortcode_item_portfolio');

function shortcode_item_portfolio($atts, $content = null) {



    $atts   = shortcode_atts(

        array(

            'slug'=>'',

            'count'=>'',

        ),$atts);



        $args = array(

            'post_type' => 'portfolio',

            'tearm'     => $atts['slug'],

            'posts_per_page' => $atts['count']

        );





    $html ='';



        $the_query = new WP_Query ( $args );

        if($the_query->have_posts()){

            while($the_query->have_posts())  {

                $the_query->the_post();

                $thumbnail_large = wp_get_attachment_image_src( get_post_thumbnail_id($the_query->ID), 'large');

                $html .= '<a class="rsImg" href="'.$thumbnail_large['0'].'" data-rsw="930" data-rsh="500">

                    <h3>'.get_the_title().'</h3>

                    <span>'.get_the_content().'</span>

                </a>';

            }

        }

        $html   .= do_shortcode($content);









    return $html;

}

// End Add shortcode item portfollio





// Add shortcode testimonial

add_shortcode('testimonial', 'shortcode_testimonial');

function shortcode_testimonial($atts, $content = null) {



    $atts   = shortcode_atts(

        array(

            'title'=>'',

            'intro'=>'',

        ),$atts);



    $html = '<section class="last-bg last-bg-style text-center">

			<div class="container">

				<div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 block_title">

                        <h3>'.$atts['title'].'</h3>

                        <h1>'.$atts['intro'].'</h1>

                    </div>



                    <div id="testimonials">

                    '.do_shortcode($content).'

                    </div></div></div></section>';



    return $html;

}

// End Add shortcode testimonial



// Add shortcode item testimonial

add_shortcode('item_testimonial', 'shortcode_item_testimonial');

function shortcode_item_testimonial($atts, $content = null) {



    $atts   = shortcode_atts(

        array(

            'slug'=>'',

            'count'=>'',

        ),$atts);



    $args = array(

        'post_type' => 'testimonial',

        'tearm'     => $atts['slug'],

        'posts_per_page' => $atts['count']

    );





    $html ='';



    $i=1;$d=1;

    $the_query = new WP_Query ( $args );

    if($the_query->have_posts()){

        while($the_query->have_posts())  {

            $the_query->the_post();

            $html .= '<div id="testimonial'.$i.'"

                    class="testimonial"><p>'.get_the_content().'</p> <span>'.get_the_title().'</span></div>';

            $i++;

        }

        $html .= '<div class="testimonial-nav-wrapper"><ul class="testimonial-nav">';

        while($the_query->have_posts())  {

            $the_query->the_post();

            $thumbnail_large = wp_get_attachment_image_src( get_post_thumbnail_id($the_query->ID), 'large');

            $html .= '<li data-effect="slide-bottom"><a href="#testimonial'.$d.'"><img src="'.$thumbnail_large['0'].'" class="img-thumbnail" width="88"><span></span></a></li>';

            $d++;

        }

        $html .= '</ul><div>';

    }

    $html   .= do_shortcode($content);



    return $html;

}

// End Add shortcode item testimonial



// Add shortcode contact

add_shortcode('contact', 'shortcode_contact');

function shortcode_contact($atts, $content = null) {



    $atts   = shortcode_atts(

        array(

            'title'=>'',

            'intro'=>'',

        ),$atts);







    $html = '<div class="row last-bg text-center bg-contact">

            <div class="container">

             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 block_title nopadding">

            <h3>'.$atts['title'].'</h3>

            <h1>'.$atts['intro'].'</h1>

            </div>

            <div class="contact-us">

            '.do_shortcode($content).'

            </div>

            </div>

            <svg id="clouds" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 100" preserveAspectRatio="none">

				<path d="M-5 100 Q 0 20 5 100 Z

						 M0 100 Q 5 0 10 100

						 M5 100 Q 10 30 15 100

						 M10 100 Q 15 10 20 100

						 M15 100 Q 20 30 25 100

						 M20 100 Q 25 -10 30 100

						 M25 100 Q 30 10 35 100

						 M30 100 Q 35 30 40 100

						 M35 100 Q 40 10 45 100

						 M40 100 Q 45 50 50 100

						 M45 100 Q 50 20 55 100

						 M50 100 Q 55 40 60 100

						 M55 100 Q 60 60 65 100

						 M60 100 Q 65 50 70 100

						 M65 100 Q 70 20 75 100

						 M70 100 Q 75 45 80 100

						 M75 100 Q 80 30 85 100

						 M80 100 Q 85 20 90 100

						 M85 100 Q 90 50 95 100

						 M90 100 Q 95 25 100 100

						 M95 100 Q 100 15 105 100 Z">

				</path>

			</svg>

            </div>';



    return $html;

}

// End Add shortcode contact





// Display a product

add_shortcode('project', 'shortcode_project');

function shortcode_project($atts, $content = null) {



    $atts   = shortcode_atts(

        array(

            'id'=>'',

            'width'=> '',

            'height'=> '',

        ),$atts);

    $args = array(

        'post_type' => 'portfolio',

        'p'   => $atts['id'],

    );

    $query = new WP_Query($args);





    if($query->have_posts()){

        while($query->have_posts()): $query->the_post();

            $meta = get_post_meta( get_the_ID(), '_cmb_project_kieuanh', TRUE );
            $custom_link=get_post_meta( get_the_ID(), '_cmb_project_linkcustom', TRUE );
            $link=get_permalink();
            if(isset($custom_link)&& !empty($custom_link)){
                $link=$custom_link;
            }

//            if($meta == 'small'){ $width_img = 'width="230" height="185"';}

//            if($meta == 'medium'){ $width_img = '"width="474""';}

            $width = $atts['width']+10;

            $height = $atts['height'];

            $meta = 'width="'.$width.'" height="'.$height.'"';

            $html = '';

            $html   .= '<div class="element-item item '.$meta.' ">';

            $url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $meta );

            $html   .= '<a class="corver" href="'.$link.'"><img src="'.$url['0'].'" width="'.$atts['width'].'" height="'.$atts['height'].'" />

                        <div class="intro">

                            <div class="content">

                                <div class="inner-content">

                                    <span class="name">'.get_the_title().'</span>

                                    ';
                            if(get_post_meta(get_the_iD(),'_cmb_project_chudautu', true)){

                                    $html .= '<span class="client"> CĐT: '.get_post_meta(get_the_iD(),'_cmb_project_chudautu', true).'</span>';

                                    }

            $html .= '</div>

                            </div>

                        </div></a>';

            $html   .= '</div>';

        endwhile;

    }









    return $html;

}

// End Display a product





// Team

add_shortcode('team','shortcode_team');

function shortcode_team($atts, $content = null){

    $atts = shortcode_atts(

        array(

            "image" => '',

            "name"  => '',

            "chuc_danh" => ''

        ),$atts

    );



    $html ='<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 team">

                <div class="content">

                    <img src="'.$atts['image'].'" class="img-responsive" />

                    <div class="mask">

                        <div class="inner">

                            <div class="wrapp">

                             <div class="name">'.$atts['name'].'</div>

                             <div class="chuc_danh">'.$atts['chuc_danh'].'</div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>';

    return $html;

}

// Team



add_shortcode('image','shortcode_image');

function shortcode_image($atts, $content = null){

    $atts = shortcode_atts(

        array(

            "image" => '',

            "link"  => ''

        ),$atts

    );



    $html ='<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 dichvu">

                <div class="content">

                    <a href="'.$atts['link'].'">

                        <img src="'.$atts['image'].'" class="img-responsive" />

                    </a>

                </div>

            </div>';

    return $html;

}





// Display a small banner

add_shortcode('small_banner', 'shortcode_smallbanner');

function shortcode_smallbanner($atts, $content = null) {



    $atts   = shortcode_atts(

        array(

            'id'=>''

        ),$atts);

    $args = array(

        'post_type' => 'portfolio',

        'p'   => $atts['id'],

    );

    $query = new WP_Query($args);





    if($query->have_posts()){

        while($query->have_posts()): $query->the_post();

            $meta = get_post_meta( get_the_ID(), '_cmb_project_kieuanh', TRUE );

            $html = '';

            $html   .= '<div class="item '.$meta.' ">';

            $url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );

            $html   .= '<a class="corver" href="'.get_permalink().'"><img src="'.$url['0'].'" width="'.$url['1'].'" height="'.$url['2'].'" />

                        <div class="intro">

                            <div class="content">

                                <div class="inner-content">

                                    <span class="name">'.get_the_title().'</span>

                                    ';



            if(get_post_meta(get_the_iD(),'_cmb_project_chudautu', true)){

                $html .= '<span class="client"> CĐT: '.get_post_meta(get_the_iD(),'_cmb_project_chudautu', true).'</span>';

            }

            $html .= '</div>

                            </div>

                        </div></a>';

            $html   .= '</div>';

        endwhile;

    }









    return $html;

}

// End Display a small banner