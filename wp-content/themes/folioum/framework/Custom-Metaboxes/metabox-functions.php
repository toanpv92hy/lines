<?php

/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */



add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );

/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */

function cmb_sample_metaboxes( array $meta_boxes ) {



	// Start with an underscore to hide fields from custom fields list

	$prefix = '_cmb_';



    $meta_boxes[] = array(

        'id'         => 'project_options',

        'title'      => 'Thông tin công trình',

        'pages'      => array('post','portfolio'), // Post type

        'context'    => 'normal',

        'priority'   => 'high',

        'show_names' => true, // Show field names on the left

        'fields'     => array(

            array(

                'name' => 'Chủ đầu tư',

                'desc' => 'Điền thông tin chủ đầu tư: Nguyễn Thị Nhung',

                'id'   => $prefix . 'project_chudautu',

                'type' => 'text',

            ),

            array(

                'name' => 'Địa chỉ',

                'desc' => 'Điền địa chỉ: Láng Hòa Lạc, Hà Nội',

                'id'   => $prefix . 'project_diachi',

                'type' => 'text',

            ),

            array(

                'name' => 'Diện tích',

                'desc' => 'Điền diện tích: 300m2x2',

                'id'   => $prefix . 'project_dientich',

                'type' => 'text',

            ),

            array(

                'name' => 'Thời gian thiết kế',

                'desc' => 'Điền thời gian thiết kế: 2012',

                'id'   => $prefix . 'project_thoigianthietke',

                'type' => 'text',

            ),

            array(

                'name' => 'Thời gian thi công',

                'desc' => 'Điền thời gian thi công: 2013',

                'id'   => $prefix . 'project_thoigianthicong',

                'type' => 'text',

            ),

            array(

                'name' => 'Lựa chọn kiểu hiển thị ảnh trong trang chủ',

                'desc' => '',

                'id'   => $prefix . 'project_kieuanh',

                'type' => 'select',

                'options' => array(

                    array('name' => 'Ảnh nhỏ', 'value' => 'small'),

                    array('name' => 'Ảnh trung bình', 'value' => 'medium')

                )

            ),
            array(

                'name' => 'Link custom',

                'desc' => 'Link đến một trang bất kỳ thay vì vào Portfolio',

                'id'   => $prefix . 'project_linkcustom',

                'type' => 'text'

            )

        ),

    );



    $meta_boxes[] = array(

        'id'         => 'banner',

        'title'      => 'ID của công trình',

        'pages'      => array('page'), // Post type

        'context'    => 'normal',

        'priority'   => 'high',

        'show_names' => true, // Show field names on the left

        'fields'     => array(

            array(

                'name' => 'ID của banner',

                'desc' => 'Điền ID của sản phẩm để hiển thị ảnh nhỏ cạnh banner. Ví dụ: 40,39',

                'id'   => $prefix . 'banner',

                'type' => 'text',

            ),
            array(

                'name' => 'ID của Skin INTRO',

                'desc' => 'Điền ID Skin INTRO(Trùng với ID Skin hiển thị Intro Menu) Ví dụ: 40',

                'id'   => $prefix . 'intromenu',

                'type' => 'text',

            )

        ),

    );



    $meta_boxes[] = array(

        'id'         => 'post_options',

        'title'      => 'Post Options',

        'pages'      => array('post'), // Post type

        'context'    => 'normal',

        'priority'   => 'high',

        'show_names' => true, // Show field names on the left

        'fields'     => array(

            array(

                'name' => 'oEmbed Post format Video',

                'desc' => 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.',

                'id'   => $prefix . 'embed_video',

                'type' => 'oembed',

            ),

        ),

    );

    

	$meta_boxes[] = array(

		'id'         => 'seo_fields',

		'title'      => 'SEO Fields',

		'pages'      => array( 'page', 'post','portfolio'), // Post type

		'context'    => 'normal',

        'priority'   => 'high',

        'show_names' => true, // Show field names on the left

		//'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox

		'fields' => array(

            array(

                'name' => 'SEO Keywords',

                'desc' => 'SEO keywords (optional)',

                'id'   => $prefix . 'seo_keywords',

                'type' => 'text',

            ),

            array(

                'name' => 'SEO Description',

                'desc' => 'SEO description (optional)',

                'id'   => $prefix . 'seo_description',

                'type' => 'text',

            ),

            array(

                'name' => 'SEO title',

                'desc' => 'Title for SEO (optional)',

                'id'   => $prefix . 'seo_title',

                'type' => 'text',

            ),

		)

	);

    

    

	// Add other metaboxes as needed



	return $meta_boxes;

}



add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );

/**
 * Initialize the metabox class.
 */

function cmb_initialize_cmb_meta_boxes() {



	if ( ! class_exists( 'cmb_Meta_Box' ) )

		require_once 'init.php';



}

