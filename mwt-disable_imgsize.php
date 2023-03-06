<?php
/**
 * Plugin Name: MWT-Disable image size
 * Plugin URI: https://www.minwt.com
 * Description: 關閉媒體庫上傳圖片，自動生成多個圖片尺寸
 * Version: 1.0
 * Author: minwt
 * Author URI: https://www.minwt.com/
 * License: GPLv3
 */
function shapeSpace_disable_image_sizes($sizes) {
	unset($sizes['thumbnail']);    // disable thumbnail size
	unset($sizes['medium']);       // disable medium size 
	unset($sizes['large']);        // disable large size 
	unset($sizes['medium_large']); // disable medium-large size 
	unset($sizes['1536x1536']);    // disable 2x medium-large size 
	unset($sizes['2048x2048']);    // disable 2x large size return $sizes;
}
add_action('intermediate_image_sizes_advanced', 'shapeSpace_disable_image_sizes');
add_filter('big_image_size_threshold', '__return_false');

function shapeSpace_disable_other_image_sizes() {
	remove_image_size('post-thumbnail');
	remove_image_size('another-size');
}
add_action('init', 'shapeSpace_disable_other_image_sizes');
?>