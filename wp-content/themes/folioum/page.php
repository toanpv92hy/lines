<?php get_header(); ?>

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

<div>
    <?php if ( have_posts() ) : ?>
        <?php while(have_posts()) : the_post() ; ?>

            <?php
            if(get_post_meta(get_the_ID(), '_cmb_page_title', true)=='yes'){
                ?>
                <h1><?php the_title(); ?></h1>
            <?php } ?>
                <?php the_content(); ?>
        <?php endwhile; ?>
    <?php endif; ?>
    <!-- End Switch -->
</div>

</div><!-- dm-pusher -->

<?php get_footer(); ?>
