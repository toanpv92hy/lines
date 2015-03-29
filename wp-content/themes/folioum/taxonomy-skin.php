<?php

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

    <div class="row">

        <div id="taxonomy">

            <?php if(have_posts()): while(have_posts()): the_post(); 
                $custom_link=get_post_meta( get_the_ID(), '_cmb_project_linkcustom', TRUE );
                $link=get_permalink();
                if(isset($custom_link)&& !empty($custom_link)){
                $link=$custom_link;
                }
            ?>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 img_taxo">
                    <a href="<?php echo $link; ?>" >
                        <?php the_post_thumbnail('thumbnail_310x200',array('class'=>'img-responsive')); ?>
                    </a>
                    <a href="<?php echo $link; ?>" >
                    <br><span class="title-single"> <?php the_title(); ?></span><br>
                    </a>
                    <span class="client"><?php echo  "Chủ đầu tư: ".get_post_meta(get_the_iD(),'_cmb_project_chudautu', true); ?></span>
                    
                </div>

            <?php endwhile;endif; ?>

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
<?php 
    get_footer();
    get_sidebar();
 ?>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery(".img_taxo").hover(function(e){
            jQuery(e.currentTarget).children("a").children(".title-single").css('color','#ec9d19');
        },function(e){
            jQuery(e.currentTarget).children("a").children(".title-single").css('color','black');
        });

    });
</script>

