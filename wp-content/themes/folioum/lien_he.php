<?php

/*

 Template Name: Liên hệ

 */

get_header(); 
get_sidebar('top');
?>

<?php global $smof_data; ?>
<div class="container-fluid hidden-xs">
    <div class="rotate"></div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 menu-category">
        <div class="container">
            <div class="col-lg-9 text-left wraper-category">
            <ul>
                <!-- <li>dada</li>
                <li>dada</li>
                <li>dada</li>
                <li>dada</li> -->
            </ul>        
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-right hotline-category hidden-xs hidden-sm hidden-md">
                HOTLINE: 0972 184 175
                
        </div>
        </div>
    </div>
</div>
<div class="container">

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div style="padding: 0px;" class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="breadcrumbs">
                    <?php if(function_exists('bcn_display'))

                    {

                        bcn_display();

                    }?>
                    
                </div>
            </div>
        </div>

    </div>

</div>



<div class="container">

    <div class="row single-gioithieu">

        <?php

        if(have_posts()): while(have_posts()): the_post();

            ?>
            
            <div style="padding-right: 15px;" class="col-lg-9 col-md-9 col-sm-12 col-xs-12 left">
                <span style="font-size:20px;color:black"><?php the_title(); ?></span>
                <?php the_post_thumbnail('full', array('class'=>'img-responsive')); ?>

                <div class="content">
                    <div class="inner">
                        <div class="before-more">

                            <?php the_content(); ?>

                        </div>
                    </div>

                </div>
                <div style="color:black" class="col-lg-12"><br>
                        <div class="address">
                            <span><img src="<?php echo get_template_directory_uri().'/images/address.png' ?>">&nbsp;Địa chỉ :</span>  

                            <span><?php echo $smof_data['contact_address']; ?></span>

                        </div>
                        <div class="address">

                            <span><img src="<?php echo get_template_directory_uri().'/images/email.png' ?>">&nbsp;Email :</span> 

                            <a style="color:black" href="mailto:<?php echo $smof_data['contact_email']; ?>"><span><?php echo $smof_data['contact_email']; ?></span></a>

                        </div>
                        <div class="phone">

                            <span><img src="<?php echo get_template_directory_uri().'/images/phone.png' ?>">&nbsp;SĐT :</span>  

                            <span><?php echo $smof_data['contact_phone']; ?></span>

                        </div><br><br><br><br>
                </div>
            </div>

        <?php

        endwhile;endif;

        ?>

        <div style="padding-top: 0;" class="col-lg-3 newpost">
        <span style="font-size:20px;color:black"><?php echo __('Bài viết mới'); ?></span>
            <!--  <div class="newpost">

            <div class="content"> -->
                <ul style="margin-top:-2px">
                <?php
                        $args = array(

                            'post_type'         => 'post',

                            'posts_per_page'    => '6'

                        );
                        $query = new WP_Query($args);

                        $i=0;

                        if($query->have_posts()){

                            while($query->have_posts()): $query->the_post();

                                ?>
                                <?php

                                $url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
                                ?>

                                <li class="<?php if($i==0) echo 'first'; $i++; ?>">

                                    <!-- <img src="<?php // echo $url['0']; ?>"/> -->

                                    <?php the_post_thumbnail('thumbnail_80x60'); ?>

                                    <a href="<?php the_permalink(); ?>">

                                        <?php echo short_title(); ?>

                                    </a>

                                </li>

                            <?php

                            endwhile;

                        }

                        ?>

                </ul>

            <!-- </div>

        </div> -->
        </div>
        
        <div style="clear: both; margin-top:10px;"></div>

       

    </div>

</div>

<?php get_footer();
get_sidebar();
 ?>

