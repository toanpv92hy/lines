<?php

/*

 Template Name: Trang chủ

 */

get_header(); ?>
	<div class="container-fluid">
	    <!-- <div class="row menu-home-container"> -->
		    <div class="col-lg-12 col-md-12 col-sm-12 menu-home-container text-center">
			    <div class="col-lg-1 logo-home">
			    	
			    </div>
		    	<div class="col-lg-2 col-sm-3 col-md-3 col-xs-12 text-right">
			        <a href="<?php echo get_option('siteurl'); ?>">
				        <div style="width:245px;height:90px;" class="text-center">
				        	<img style="width:190px;margin-top:-30px;" src="<?php echo $smof_data['logo-id']; ?>" alt="Thiết kế">
				        </div>
			        </a>    
		        </div>

		        <div class="col-lg-9 col-sm-9 col-md-9 col-xs-12">

		            <nav class="st-menu st-effect-14" id="menu-14">

		                <ul>

		                    
		                    <?php

		                    $defaults = array(

		                        'theme_location'  => 'home',

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

		                    if ( has_nav_menu( 'home' ) ) {

		                        wp_nav_menu( $defaults );

		                    } ?>

		                </ul>

		            </nav><!-- end nav -->

		        </div>
		    </div>
	    <!-- </div> -->
		<div class="col-lg-12">
		<?php //if( function_exists('cyclone_slider') ) cyclone_slider(89); ?>
		</div>
	</div>
	
<?php get_footer(); ?>