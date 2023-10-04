<?php
// Register Custom Post Type
function post_type_camnang()
{

	$labels = array(
		'name'                  => _x('Cẩm nang', 'Post Type General Name', 'blog'),
		'singular_name'         => _x('Cẩm nang', 'Post Type Singular Name', 'blog'),
		'menu_name'             => __('Cẩm nang', 'blog'),
		'name_admin_bar'        => __('Cẩm nang', 'blog'),
		'archives'              => __('Item Archives', 'blog'),
		'attributes'            => __('Item Attributes', 'blog'),
		'parent_item_colon'     => __('Parent Item:', 'blog'),
		'all_items'             => __('Tất cả Cẩm nang', 'blog'),
		'add_new_item'          => __('Thêm Cẩm nang', 'blog'),
		'add_new'               => __('Thêm Cẩm nang', 'blog'),
		'new_item'              => __('Cẩm nang mới', 'blog'),
		'edit_item'             => __('Sửa Cẩm nang', 'blog'),
		'update_item'           => __('Cập nhập Cẩm nang', 'blog'),
		'view_item'             => __('Xem Cẩm nang', 'blog'),
		'view_items'            => __('Xem Cẩm nang', 'blog'),
		'search_items'          => __('Tìm kiếm Cẩm nang', 'blog'),
		'not_found'             => __('Không tìm thấy Cẩm nang nào', 'blog'),
		'not_found_in_trash'    => __('Không tìm thấy Cẩm nang nào', 'blog'),
		'featured_image'        => __('Ảnh đại diện', 'blog'),
		'set_featured_image'    => __('Đặt ảnh đại diện', 'blog'),
		'remove_featured_image' => __('Xoá ảnh đại diện', 'blog'),
		'use_featured_image'    => __('Use as featured image', 'blog'),
		'insert_into_item'      => __('Insert into item', 'blog'),
		'uploaded_to_this_item' => __('Uploaded to this item', 'blog'),
		'items_list'            => __('Items list', 'blog'),
		'items_list_navigation' => __('Items list navigation', 'blog'),
		'filter_items_list'     => __('Filter items list', 'blog'),
	);
	$args = array(
		'label'                 => __('Cẩm nang', 'blog'),
		'description'           => __('Cẩm nang', 'blog'),
		'labels'                => $labels,
		'supports'              => array('title', 'editor', 'thumbnail', 'excerpt'),
		'taxonomies'            => array('danh-muc-cam-nang'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-book',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'       => true,
	);
	register_post_type('cam-nang', $args);
}
add_action('init', 'post_type_camnang', 0);

// Register Custom Taxonomy
function taxonomy_camnang_category()
{

	$labels = array(
		'name'                       => _x('Danh mục Cẩm nang', 'Taxonomy General Name', 'blog'),
		'singular_name'              => _x('Danh mục Cẩm nang', 'Taxonomy Singular Name', 'blog'),
		'menu_name'                  => __('Danh mục Cẩm nang', 'blog'),
		'all_items'                  => __('Tất cả danh mục', 'blog'),
		'parent_item'                => __('Danh mục cha', 'blog'),
		'parent_item_colon'          => __('Parent Item:', 'blog'),
		'new_item_name'              => __('Thêm danh mục', 'blog'),
		'add_new_item'               => __('Thêm danh mục', 'blog'),
		'edit_item'                  => __('Sửa danh mục', 'blog'),
		'update_item'                => __('Cập nhập danh mục', 'blog'),
		'view_item'                  => __('Xem danh mục', 'blog'),
		'separate_items_with_commas' => __('Separate items with commas', 'blog'),
		'add_or_remove_items'        => __('Add or remove items', 'blog'),
		'choose_from_most_used'      => __('Choose from the most used', 'blog'),
		'popular_items'              => __('Popular Items', 'blog'),
		'search_items'               => __('Tìm kiếm', 'blog'),
		'not_found'                  => __('Not Found', 'blog'),
		'no_terms'                   => __('No items', 'blog'),
		'items_list'                 => __('Items list', 'blog'),
		'items_list_navigation'      => __('Items list navigation', 'blog'),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'       => true,
	);
	register_taxonomy('danh-muc-cam-nang', array('cam-nang'), $args);
}
add_action('init', 'taxonomy_camnang_category', 0);
