<?php global $smof_data;
//var_dump($smof_data);
 ?>
<div class="fotter-top">
    <div class="container">
            <div class="row">
            <div class="col-lg-12">
                <h4 style="font-size:20px">Sơ đồ trang</h4>
            </div>
                <div class="col-lg-1 col-md-12 col-sm-12 col-xs-12 footer-left">
                    <?php

                            $defaults = array(

                                'theme_location'  => 'footer-left',

                                'menu'            => '',

                                'container'       => 'nav',

                                'container_class' => 'nine columns',

                                'container_id'    => 'nav',

                                'menu_class'      => '',

                                'menu_id'         => 'navigation',

                                'echo'            => true,

                                'fallback_cb'     => 'wp_page_menu',

                                'before'          => '',

                                'after'           => '',

                                'link_before'     => '',

                                'link_after'      => '',

                                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',

                                'depth'           => 0,

                                'walker'          => new My_Walker_Nav_Menu()

                            );
                            if ( has_nav_menu( 'footer-left' ) ) {

                                wp_nav_menu( $defaults );

                            } ?>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 menu-footer">

                            <?php

                            $defaults = array(

                                'theme_location'  => 'footer',

                                'menu'            => '',

                                'container'       => 'nav',

                                'container_class' => 'nine columns',

                                'container_id'    => 'nav',

                                'menu_class'      => '',

                                'menu_id'         => 'navigation',

                                'echo'            => true,

                                'fallback_cb'     => 'wp_page_menu',

                                'before'          => '',

                                'after'           => '',

                                'link_before'     => '',

                                'link_after'      => '',

                                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',

                                'depth'           => 0,

                                'walker'          => new My_Walker_Nav_Menu()

                            );
                            if ( has_nav_menu( 'footer' ) ) {

                                wp_nav_menu( $defaults );

                            } ?>
                </div>
                
                <div class="col-lg-3 text-center">
                    <br><br>
                    <a target="facebookfaneco" href="<?php echo $smof_data['fan_facebook'] ; ?>"><img src="<?php bloginfo('template_url'); ?>/images/facebooklogo.png"/></a>
                    <h4>Hotline: <?php echo $smof_data['contact_hotline']; ?></h4>
                </div>
                    <input type="hidden" value="Website develop by Toanpv toanpv92hy@gmail.com" /> 
            </div>
    </div>

</div>
<div class="container">
    <div class="col-lg-12 text-center copyright-footer">
       <?php echo $smof_data['footer_text']; ?>
    </div>
</div>
<script type="text/javascript">
/* var bcf_settings = { buttonText:'Contact Us', buttonTop:'30%', language:'en_US' }; // Better Contact Form Settings */
(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0]; js = d.createElement(s); js.id = id;
    js.src = "https://bettercontactform.com/contact/media/8/c/8c0027332deb2432f51515c88487170685c8ab3d.js";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, "script", "bcf-render"));</script>
<a id="bcf_trigger" href="http://bettercontactform.com" rel="bcf_trigger">Contact Form</a>