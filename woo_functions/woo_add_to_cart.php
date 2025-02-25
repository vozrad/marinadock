<?php

    /**
     * Draftspot Theme header fragments
     * ajax
     *
    */

    function header_add_to_cart_fragment( $fragments ) {
        global $woocommerce;

        ob_start();

        ?>
        <a href="<?php echo wc_get_cart_url();?>" class="openCart">
            <svg id="Outline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><title>103 shopping cart</title><path d="M22.713,4.077A2.993,2.993,0,0,0,20.41,3H4.242L4.2,2.649A3,3,0,0,0,1.222,0H1A1,1,0,0,0,1,2h.222a1,1,0,0,1,.993.883l1.376,11.7A5,5,0,0,0,8.557,19H19a1,1,0,0,0,0-2H8.557a3,3,0,0,1-2.82-2h11.92a5,5,0,0,0,4.921-4.113l.785-4.354A2.994,2.994,0,0,0,22.713,4.077ZM21.4,6.178l-.786,4.354A3,3,0,0,1,17.657,13H5.419L4.478,5H20.41A1,1,0,0,1,21.4,6.178Z"/><circle cx="7" cy="22" r="2"/><circle cx="17" cy="22" r="2"/></svg>
            <span id="ds_cart_icon_content" class=" position-absolute"><?php echo WC()->cart->get_cart_contents_count();?></span>
            <span class="cart-sum"><?php echo WC()->cart->get_total();?></span>
        </a>
        <?php
        $fragments['a.openCart'] = ob_get_clean();

        return $fragments;
    }
    add_filter( 'woocommerce_add_to_cart_fragments', 'header_add_to_cart_fragment', 30, 1 );/**/

    /**
     * Draftspot Theme drawer fragments
     * ajax
     *
    */

    function drawer_cart_fragment( $fragments ) {
        ob_start();
        ?>
        <div class="ds_mc_wrapper ds">
            <div class="ds_mc_header">
                <h3 class="line_tit">Cart</h3>
                <button class="ds_mc_close btn_x_close"></button>
            </div>
            <div class="ds_mc_notice_wrapper opac0">
                <p class="ds_mc_notice"></p>
            </div>
            <?php if(WC()->cart->get_cart_contents_count()){ ?>
            <div class="ds_mc_item_wrapper">
                <?php
                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                    $product = $cart_item['data'];
                    $product_id = $cart_item['product_id'];
                    $quantity = $cart_item['quantity'];
                    $price = WC()->cart->get_product_price( $product );
                    $subtotal = WC()->cart->get_product_subtotal( $product, $cart_item['quantity'] );
                    $link = $product->get_permalink( $cart_item );
                    if($quantity){
                    ?>
                    <div class="ds_mc_item line_prod" data-id="<?php echo $product_id?>">
                        <button class="btn_cancel" data-id="<?php echo $product_id?>"></button>
                        <a class="line_prod_img_link" href="<?php echo $link?>">
                            <figure class="line_prod_img_wrap">
                                <?php echo $product->get_image();?>
                            </figure>
                        </a>
                        <div class="line_prod_details">
                            <a class="line_prod_title_link" href="<?php echo $link?>">
                                <p class="line_prod_title"><?php echo $product->get_name();?></p>
                            </a>
                        </div>
                        <div class="quantity_spinner">
                            <button class="quantity_spinner_minus"></button>
                            <input class="quantity_spinner_input" type="number" name="quantity_spinner_input" value="<?php echo $quantity?>"  data-id="<?php echo $product_id?>">
                             <button class="quantity_spinner_plus"></button>
                        </div>
                        <div class="line_prod_price">
                            <span class="p_mid"><?php echo $subtotal;?></span>
                        </div>
                    </div>
                <?php
                }
            }?>
            </div>
            <div class="ds_mc_bottom">
                <div class="ds_mc_total">
                    <span class="ds_mc_total_txt"><?php _e('Total:','draftspot_theme');?></span>
                    <span class="ds_mc_total_value"><?php echo wc_price(WC()->cart->subtotal);?></span>
                </div>
                <a href="<?php echo wc_get_checkout_url();?>" class="ds_mc_checkout_btn btn_big rn"><?php _e('Checkout','draftspot_theme');?></a>
                <div class="mc_btn_wrap">
                    <a href="<?php echo get_permalink( wc_get_page_id( 'cart' ) );?>" class="ds_mc_tocart_btn"><?php _e('View full cart','draftspot_theme');?></a>
                </div>
            </div>
            <?php }else{?>
                <div class="ds_mc_item_wrapper">
                    <p><?php _e('Your cart is empty.','draftspot_theme');?></p>
                </div>
                <div class="ds_mc_bottom">
                    <h3 class="line_tit">Try These</h3>
                    <div class="ds_mc_bottom_fp_wrapper row-small">
                        <?php
                        $feat_products=get_field('cart_drawer_featured_products','option');
                        $i=0;
                        global $product;
                        global $post;
                        $curr_product=$product;
                        $curr_post=$post;
                        foreach($feat_products as $item){
                             if($i<2){
                                $product=wc_get_product($item);
                                $post=get_post($item);
                                echo '<div class="col-6">';
                                wc_get_template_part( 'content', 'product' );
                                echo '</div>';
                            }
                            $i++;
                        }
                        ?>
                    </div>
                </div>
            <?php }?>
        </div>
        <?php
        $fragments['.ds_mc_wrapper'] = ob_get_clean();

        return $fragments;
    }
    add_filter( 'woocommerce_add_to_cart_fragments', 'drawer_cart_fragment', 30, 1 );

    /**
     * Draftspot Theme ajax add to cart
     * ajax
     *
    */

    function ds_woocommerce_ajax_add_to_cart() {
        $product_id = apply_filters('ql_woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
        $quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
        $variation_id = absint($_POST['variation_id']);
        $passed_validation = apply_filters('ql_woocommerce_add_to_cart_validation', true, $product_id, $quantity);
        $product_status = get_post_status($product_id);
        if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {
            do_action('ds_woocommerce_ajax_added_to_cart', $product_id);
                if ('yes' === get_option('ds_woocommerce_cart_redirect_after_add')) {
                    wc_add_to_cart_message(array($product_id => $quantity), true); /**/
                }
                WC_AJAX :: get_refreshed_fragments();
                } else {
                    $data = array(
                        'error' => true,
                        'product_url' => apply_filters('ds_woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));
                    echo wp_send_json($data);
                }
                wp_die();
            }
    add_action('wp_ajax_ds_woocommerce_ajax_add_to_cart', 'ds_woocommerce_ajax_add_to_cart');
    add_action('wp_ajax_nopriv_ds_woocommerce_ajax_add_to_cart', 'ds_woocommerce_ajax_add_to_cart');
?>
