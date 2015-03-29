<?php  
get_header(); 
get_sidebar('top');
global $smof_data;
?>
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

            <div class="breadcrumbs">

                <?php if(function_exists('bcn_display'))

                {
                    bcn_display();

                }?>

            </div>

        </div>

    </div>

</div>



<div class="container">

    <div class="row blog">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <?php

            if(have_posts()): while(have_posts()): the_post(); ?>

                    <div style="margin-bottom: 10px;padding-right: 15px" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <div class="blog-item">
                            <a class="title-news"  href="<?php the_permalink(); ?>"><span><?php echo the_title(); ?></span></a>
                            <div class="date">Bài đăng: <?php the_date(); ?></div>
                            <a href="<?php the_permalink(); ?>">
                            <div class="col-lg-12" style="max-height:400px;overflow: hidden;padding:0;float:left">
                                <?php the_post_thumbnail('thumbnail_474',array('class'=>'img-responsive','style'=>'width:100%')); ?>
                            </div>
                            </a>
                            <div class="content-single"><?php //echo short_content(); ?></div>
                        </div>

                    </div>

            <?php endwhile;endif;?> 
        </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 newpost">
            <div style="font-size:20px;color:black"><?php echo __('Bài viết mới'); ?></div>
                <!--  <div class="newpost">

                <div class="content"> -->
                    <ul>
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
       
    </div>

</div>

<div class="container">

    <div class="row">

        <?php global $wp_query; ?>

        <?php if( $wp_query->max_num_pages>1){ ?>

            <div class="pagination text-center clearfix">

                <?php folioum_pagination($prev = '&laquo;', $next = '&raquo;', $pages=$wp_query->max_num_pages); ?>

            </div>

        <?php } ?>

    </div>

</div>
<?php get_footer();
get_sidebar();
?>

