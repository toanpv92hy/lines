<?php global $smof_data; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12 logo" style="padding: 0px;">
            <a href="<?php echo get_option('siteurl'); ?>">
                <div style="width:205px;height:145px;line-height: 145px;">
                    <img style="width:180px;" src="<?php echo $smof_data['logo-id']; ?>" alt="Thiết kế">
                </div>
            </a>    
        </div>

        <div class="col-lg-10 col-sm-10 col-md-10 col-xs-12">

            <nav class="st-menu st-effect-14" id="menu-14">

                <ul>

                    
                    <?php

                    $defaults = array(

                        'theme_location'  => 'primary',

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

                    if ( has_nav_menu( 'primary' ) ) {

                        wp_nav_menu( $defaults );

                    } ?>

                </ul>

            </nav><!-- end nav -->

        </div>
    </div>
    

</div>
<script type="text/javascript">
    jQuery(document).ready(function() {
       getMenuActive();
        if(jQuery(".menu-category").length){
            jQuery(".mega_dropdown").css('display','none');
            jQuery(".mega_main_menu_ul li").hover(function(e){
                //jQuery("#mega_main_menu.primary > .menu_holder > .menu_inner > ul > li.current-menu-item").children("a").children("span").css('border','none');
                var top=jQuery(".wraper-category ul").offset().top;
                var leftLi=jQuery(e.currentTarget).offset().left;
                var widthSpan=jQuery(e.currentTarget).children("a").children("span").width();
                var ulLenght=jQuery(e.currentTarget).children(".mega_dropdown").length;
                if(ulLenght != 0){
                	var admin=jQuery("#wpadminbar").length;
                	if(admin != 0){
                		jQuery(".rotate").css('top',top-185);	
                	}else{
                		jQuery(".rotate").css('top',top-153);
                	}
                    
                    jQuery(".rotate").css('display','block');
                    jQuery(".rotate").css('left',leftLi+(widthSpan/2));

                    var liItem=jQuery(e.currentTarget).children("ul").html();
                    jQuery(".wraper-category ul").html(liItem);
                    jQuery("i").remove();
                }

            },function(e){
                
                setTimeout(function(){
                        getMenuActive();
                },10000);
            });
            
        }

    });
    function getMenuActive(){
        //jQuery("#mega_main_menu.primary > .menu_holder > .menu_inner > ul > li.current-menu-item").children("a").children("span").css('border','1px solid black');
        var top=jQuery(".wraper-category ul").offset().top;
        var check=jQuery("#mega_main_menu.primary > .menu_holder > .menu_inner > ul > li.current-menu-item");
        if(check.length != 0 && jQuery("#mega_main_menu.primary > .menu_holder > .menu_inner > ul > li.current-menu-item").children("ul").length != 0){
            var liItemActive = jQuery("#mega_main_menu.primary > .menu_holder > .menu_inner > ul > li.current-menu-item").children("ul").html();
            var leftLi=jQuery("#mega_main_menu.primary > .menu_holder > .menu_inner > ul > li.current-menu-item").offset().left;
            var widthSpan=jQuery("#mega_main_menu.primary > .menu_holder > .menu_inner > ul > li.current-menu-item").children("a").children("span").width();
            
            jQuery(".wraper-category ul").html(liItemActive);
            jQuery("i").remove();
            var admin=jQuery("#wpadminbar").length;
        	if(admin != 0){
        		jQuery(".rotate").css('top',top-185);	
        	}else{
        		jQuery(".rotate").css('top',top-153);
        	}
            jQuery(".rotate").css('display','block');
            jQuery(".rotate").css('left',leftLi+(widthSpan/2));
        }else{
            jQuery(".rotate").css('display','none');
            jQuery(".wraper-category ul").html();
        }
        
    }
</script>