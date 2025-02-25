<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product-cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woo.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     4.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$tax=get_queried_object();
$cat=$tax->term_id;
if(isset($tax->parent) && $tax->parent){
	$cat=$tax->parent;
}
if($cat==15){
	wc_get_template( 'ds_archive-product1.php' );
}elseif($cat==17){
	wc_get_template( 'ds_archive-product2.php' );
}elseif($cat==18){
	wc_get_template( 'ds_archive-product2.php' );
}elseif($cat==19){
	wc_get_template( 'ds_archive-product3.php' );
}else{
	wc_get_template( 'archive-product.php' );
}
