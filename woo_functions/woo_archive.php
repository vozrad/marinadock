<?php

function ds_archive_hero(){
    $tax=get_queried_object();
    //var_dump($tax);
}
add_action( 'ds_archive_hero', 'ds_archive_hero', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10 );
?>
