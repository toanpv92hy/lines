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
                HOTLINE: 0972 184 175
                
        </div>
        </div>
    </div>
</div>
<div class="container">

    <div class="row" >

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


<br>
<div class="container">

    <div class="row single-portfolio">
        <?php
        if(have_posts()): while(have_posts()): the_post();
        ?>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="right">
                    <div class="name"><?php the_title(); ?></div>
                    <div class="client"><span>Chủ đầu tư: </span><?php echo get_post_meta(get_the_ID(), '_cmb_project_chudautu', true); ?></div>
                     <?php the_post_thumbnail('full',array('class'=>'img-responsive','style'=>'width:100%;margin-top:10px;margin-bottom:10px')); ?>
                    <?php echo get_the_content(); ?>
                </div>

                <?php

                // Get galleries

                $galleries = get_post_gallery(get_the_ID(), false);

                if(isset($galleries['ids'])){

                    ?>

                    <div id="bigPic" class="">

                        <?php

                        $gallery_ids = $galleries['ids'];

                        $img_ids = explode(",",$gallery_ids);

                        $i=1;

                        foreach( $img_ids AS $img_id ){

                            $image_src = wp_get_attachment_image_src($img_id,'');

                            ?>

                            <a  class="fancybox" rel="gallery1" href="<?php echo $image_src['0']; ?>">

                            <img class="img-responsive" src="<?php echo $image_src['0']; ?>"  />

                            </a>

                        <?php

                        }

                        ?>

                    </div><!-- end gallery -->

                    <div style="clear: both"></div>

                    <ul id="thumbs">

                        <?php

                        $i=1;

                        $last = '';

                        foreach( $img_ids AS $img_id ){

                            $image_src = wp_get_attachment_image_src($img_id,'');

                            if(count($img_ids) == $i){ $last = 'last'; }

                            ?>

                            <li class='<?php if($i==1) echo 'active'; echo $last; ?>' rel="<?php echo $i; ?>"><img src="<?php echo $image_src['0']; ?>" alt="" width="100px" /></li>

                        <?php $i++;

                        }

                        ?>

                    </ul>



                <?php } ?>

            <!-- </div> -->

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



<?php 
    get_footer();
    get_sidebar();
 ?> 

