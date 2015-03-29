<?php
get_header(); 
get_sidebar('top');
?>

<?php global $smof_data; ?>
<!-- Modal -->
<div class="modal fade bs-example-modal-lg text-center" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body">
        <img src="" class="fancybox-image">
      </div>
    </div>
  </div>
</div>
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
                HOTLINE: <?php echo $smof_data['contact_hotline']; ?>
                
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

    <div class="row single-portfolio">
        <?php
        if(have_posts()): while(have_posts()): the_post();
        ?>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="right">
                    <div class="name"><?php the_title(); ?></div>
                     <?php the_post_thumbnail('full',array('class'=>'img-responsive','style'=>'width:100%')); ?>
                     <?php echo the_content(); ?>
                </div>
            </div>

        <?php

        endwhile;endif;

        ?>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 baivietmoi">

        <div class="newpost">

            <div class="content">

            <div class="name"><?php echo __('Bài viết mới'); ?></div>

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

            </div>

        </div>

        </div>
    </div>

</div>

<div id="fb-root"></div>
<script type="text/javascript">
     jQuery(document).ready(function() {
        jQuery('.right img').click(function(e){
            jQuery('#myModal').modal('show');
            var img=e.currentTarget.src;
            jQuery(".modal-body img").attr('src',img);
            jQuery("#myModal").click(function(){
                jQuery('#myModal').modal('hide');
            });
        });
    });
    
</script>

    <script>(function(d, s, id) {

    var js, fjs = d.getElementsByTagName(s)[0];

    if (d.getElementById(id)) return;

    js = d.createElement(s); js.id = id;

    js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1&appId=1465494103676873";

    fjs.parentNode.insertBefore(js, fjs);

}(document, 'script', 'facebook-jssdk'));</script>

<?php get_footer();
get_sidebar();
 ?>

