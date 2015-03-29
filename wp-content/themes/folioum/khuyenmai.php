<?php
/*
 Template Name: Khuyến mại
 */
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
    <div class="row single-gioithieu">
        <?php
        if(have_posts()): while(have_posts()): the_post();
            ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 left">
                <?php the_content(); ?>
            </div>
        <?php
        endwhile;endif;
        ?>        
    </div>
</div>



<?php get_footer(); ?>
