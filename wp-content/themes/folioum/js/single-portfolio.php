<?php

get_header(); ?>
<?php global $smof_data; ?>

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
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 left">
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
                            <img class="img-responsive" src="<?php echo $image_src['0']; ?>"  />
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
                            <li class='<?php if($i==1) echo 'active'; echo $last; ?>' rel="<?php echo $i; ?>"><img src="<?php echo $image_src['0']; ?>" alt="" width="100pxs" /></li>
                        <?php $i++;
                        }
                        ?>
                    </ul>

                <?php } ?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <div class="right">
                    <div class="name"><?php the_title(); ?></div>
                    <div class="client"><span>Chủ đầu tư: </span><br/><?php echo get_post_meta(get_the_ID(), '_cmb_project_chudautu', true); ?></div>
                    <div class="address"><span>Địa chỉ: </span><br/><?php echo get_post_meta(get_the_ID(), '_cmb_project_diachi', true); ?></div>
                    <div class="area"><span>Diện tích: </span><br/><?php echo get_post_meta(get_the_ID(), '_cmb_project_dientich', true); ?></div>
                    <div class="time_design"><span>Thời gian thiết kế: </span><?php echo get_post_meta(get_the_ID(), '_cmb_project_thoigianthietke', true); ?></div>
                    <div class="time_action"><span>Thời gian thi công: </span><?php echo get_post_meta(get_the_ID(), '_cmb_project_thoigianthicong', true); ?></div>
                    <div class="content"><?php the_content(); ?></div>
                </div>
            </div>
        <?php
        endwhile;endif;
        ?>
    </div>
</div>

<div class="container" style="margin-top: 5px; margin-bottom: 10px">
<div class="row">
    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
        <div class="another_project">
        <h3><?php echo __('MỘT SỐ CÔNG TRÌNH KHÁC'); ?></h3>

                <?php
                global $wp_query;
                $post = $wp_query->post;

                $args = array(
                    'post_type'         => 'portfolio',
                    'posts_per_page'    => '8',
                    'post_no_in'        => array($post->iD),
                    ''
                );
                $query = new WP_Query($args);

                if($query->have_posts()){
                    while($query->have_posts()): $query->the_post();
                        $meta = get_post_meta( get_the_ID(), '_cmb_project_kieuanh', TRUE );
                    ?>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <?php
                                $url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
                            ?>
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo $url['0']; ?>" style="width: 100%"/>
                            </a>
                        </div>
                    <?php
                    endwhile;
                }
                ?>

        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 baivietmoi">
        <div class="newpost">
            <div class="content">
            <h3><?php echo __('BÀI VIẾt MỚI'); ?></h3>
                <ul>
                <?php

                        $args = array(
                            'post_type'         => 'post',
                            'posts_per_page'    => '3'
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
                                    <img src="<?php echo $url['0']; ?>"/>
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

<div class="container">
    <div class="row">
        <div class="menu-congtrinh">
            <select name="new">
                <option value="">Menu</option>
                <option value="">Kiến trúc công trình</option>
                <option value="">Nội thất gia đình</option>
                <option value="">Nội thất văn phòng</option>
                <option value="">Bar-karaoke-cafe</option>
            </select>
        </div>
    </div>
</div>



<script type="text/javascript">
    var currentImage;
    var currentIndex = -1;
    var interval;
    function showImage(index){
        if(index < jQuery('#bigPic img').length){
            var indexImage = jQuery('#bigPic img')[index]
            if(currentImage){
                if(currentImage != indexImage ){
                    jQuery(currentImage).css('z-index',2);
                    clearTimeout(myTimer);
                    jQuery(currentImage).fadeOut(250, function() {
                        myTimer = setTimeout("showNext()", 3000);
                        jQuery(this).css({'display':'none','z-index':1})
                    });
                }
            }
            jQuery(indexImage).css({'display':'block', 'opacity':1});
            currentImage = indexImage;
            currentIndex = index;
            jQuery('#thumbs li').removeClass('active');
            jQuery(jQuery('#thumbs li')[index]).addClass('active');
        }
    }

    function showNext(){
        var len = jQuery('#bigPic img').length;
        var next = currentIndex < (len-1) ? currentIndex + 1 : 0;
        showImage(next);
    }

    var myTimer;
	
	var setHight = function(){
		var heightimg = jQuery('#bigPic>img:first-child').outerHeight();
		jQuery('#bigPic').css({height:heightimg});
	}

    jQuery(document).ready(function() {
        myTimer = setTimeout("showNext()", 3000);
        showNext(); //loads first image
        jQuery('#thumbs li').bind('click',function(e){
            var count = jQuery(this).attr('rel');
            showImage(parseInt(count)-1);
        });
		setHight();
    });
	jQuery(window).resize(function(){
		setHight();
	});


</script>

<?php get_footer(); ?>
