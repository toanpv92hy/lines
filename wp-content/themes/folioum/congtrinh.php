<?php

/*

 * Template Name: Cong Trinh

 * */



get_header(); ?>

<?php global $smof_data; ?>



<div class="container">

    <div class="row" style="margin-bottom: 10px">

        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12" style="background: #25282b;">

            <div class="breadcrumbs">

                <?php if(function_exists('bcn_display'))

                {

                    bcn_display();

                }?>

            </div>

        </div>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="background: #25282b;">

            <div class="breadcrumbs text-right">

                <span class="hotline">

                <?php

                    echo __("Hotline: ").$smof_data['contact_hotline'];

                    ?>

                </span>

            </div>

        </div>

    </div>

</div>



<div class="container">

    <div class="row">

        <div id="congtrinh">

<!--            <h2>--><?php //echo __('CÔNG TRÌNH', 'folioum'); ?><!--</h2>-->

            <?php

                $args   =  array(

                    'orderby'       => 'id',

                    'order'         => 'ASC',

                    'hide_empty'    => false,

                    'exclude'       => array(),

                    'exclude_tree'  => array(),

                    'include'       => array(),

                    'number'        => '',

                    'fields'        => 'all',

                    'slug'          => '',

                    'parent'         => '',

                    'hierarchical'  => true,

                    'child_of'      => 0,

                    'get'           => '',

                    'name__like'    => '',

                    'pad_counts'    => false,

                    'offset'        => '',

                    'search'        => '',

                    'cache_domain'  => 'core'

                );



                $skins = get_terms('skin',$args);

                ?>



                <?php

                    foreach($skins as $key=>$skin){

                ?>

                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

                        <h3 class="text-center" style="font-size: 12px">

                        <a href="<?php echo get_term_link($skin); ?>">

                            <?php echo $skin->name; ?>

                        </a>

                        </h3>

                        <a href="<?php echo get_term_link($skin); ?>">

                            <img src="<?php echo z_taxonomy_image_url($skin->term_id); ?>" class="img-responsive" />

                        </a>



                    </div>

                <?php

                    }

                ?>





        </div>



    </div>

</div>





<?php get_footer(); ?>

