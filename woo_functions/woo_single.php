<?php
    /* hooks */
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
    add_action( 'woocommerce_before_main_content', 'ds_main_wrapper_start', 5, 0 );//container start
    add_action( 'woocommerce_after_main_content', 'ds_main_wrapper_end', 99, 0 );//container end
    add_action( 'woocommerce_single_product_summary', 'ds_single_sku', 7 );//add sku

    add_action( 'woocommerce_single_product_summary', 'ds_variants_sel', 25 );
    add_action( 'woocommerce_before_quantity_input_field', 'ds_price', 5 );//price and stock
    add_action( 'woocommerce_before_quantity_input_field', 'ds_quantity_spinner', 10 );//quantity spinner
    add_action( 'woocommerce_after_quantity_input_field', 'ds_add_to_cart', 10 );//add to cart button
    /* functions for hooks */

    function  ds_main_wrapper_start(){
        echo '<div class="container">';
    }

    function  ds_main_wrapper_end(){
        echo '</div>';
    }

    function ds_single_sku(){
        global $product;

        ?>
            <div class="ds_single_sku"><?php echo __('SKU','draftspot_theme').': <span>'.$product->get_sku();?></span></div>
        <?php
    }

    function ds_variants_sel(){
        global $product;
        if($product->is_type( 'variable' )){
          $d_attributes=  $product->get_default_attributes();
           $attrs=$product->get_attributes();
           foreach($attrs as $attr){
               $attr_data=$attr->get_data();
               if($attr_data['variation']){
                   $attr_name = get_taxonomy( $attr_data['name'] )->labels->singular_name;

                   $attr_label= strtolower($attr_name);
                    ?>
                    <div class="ds_attribute_block ds_attribute_block_<?php echo $attr_label;?>">
                        <h5 class="line_tit"><?php echo $attr_name;?></h5>
                        <div class="ds_attribute_list ds_attribute_list_<?php echo $attr_label;?> d-flex">
                            <?php
                            $items=$attr->get_terms();
                            $items_attr=$attr_data['options'];
                            $items=get_terms( $attr_data['name'], array(
                                'hide_empty' => true,

                            ) );
                            $i=0;
                            foreach($items as $item){
                                if(in_array($item->term_id,$items_attr)){
                                    if($attr_data['name']!='pa_color'){
                                        ?>
                                        <div class="shop_sort_item shop_<?php echo $attr_label;?>_item shop_nocolor_item <?php if($d_attributes[$attr_data['name']]==$item->slug){echo 'active';}?>">
                                            <div class="ds_single_attr_input_<?php echo $attr_label;?> <?php echo $attr_data['name'];?> ds_single_attr_input" data-tax="<?php echo $attr_data['name'];?>" data-slug="<?php echo $item->slug;?>" data-id="<?php echo $item->term_id;?>" style="width: 40px;height: 40px;">
                                                <?php echo  $item->name;?>
                                            </div>
                                        </div>
                                        <?php
                                        $i++;
                                    }else{
                                        $ds_color_img=get_field('icon',$item);
                                        $ds_color_spec = get_field('color',$item);
                                        ?>
                                        <div class="shop_sort_item shop_color_item <?php if(strtolower($d_attributes[$attr_data['name']])==strtolower($item->slug)){echo 'active';}?>">
                                            <div class="ds_single_attr_input_color <?php echo $attr_data['name'];?> ds_single_attr_input d-flex" data-tax="<?php echo $attr_data['name'];?>" data-slug="<?php echo $item->slug;?>" data-id="<?php echo $item->term_id;?>">
                                                <?php
                                                    if($ds_color_img){
                                                        ?>
                                                            <div class="ds_single_attr_input_color_value" style="width: 40px;height: 40px;"><img src="<?php echo $ds_color_img;?>"></div>
                                                        <?php
                                                    }else{
                                                        ?>
                                                            <div class="ds_single_attr_input_color_value" title="<?php echo $item->name;?>" alt="<?php echo $item->name;?>" style="background-color:<?php echo $ds_color_spec;?>;width: 40px;height: 40px;"></div>
                                                        <?php
                                                    }
                                                ?>
                                                <!--
                                                <div class="shop_sort_check_txt"><?php echo $item->name;?></div>
                                                -->
                                            </div>
                                        </div>
                                        <?php
                                        $i++;
                                    }
                                }
                            }
                            /*if($attr_data['name']=='pa_size'){
                                echo '<div><a href="#" class="ds_singleTabSize">Tabulka velikostí</a></div>';
                            }*/
                            ?>
                        </div>
                    </div>
                    <?php
               }
               ?>
                <input type="hidden" class="ds_defaultAttr" value='<?php echo json_encode($d_attributes);?>'>
               <?php
           }
        }

    }
    function ds_price(){
        global $product;
        $price=$product->get_price_html();
        $stock=$product->get_stock_quantity();

        if($product->is_type('variable')){
            $available_variations = $product->get_available_variations();
            $selVar=0;
            foreach ( $available_variations as $variation ){
                $res=false;
                foreach($product->get_default_attributes() as $key=>$val){
                    if($variation['attributes']['attribute_'.$key]==$val){
                        $res=true;
                    }
                }
                if($res){
                    $selVar=$variation;
                }
            }
            $price=$selVar['price_html'];
            $stock=$selVar['max_qty'];
        }
        ?>
            <div class="ds_price_wrapper">
                <div class="ds_addToCartPrice">
                   <?php echo $price;?>
                </div>
                <div class="ds_addToCartStock">
                    <?php
                        $text=__('Není skladem','draftspot_theme');
                        if($stock){
                            $text=sprintf( __( 'Na skladě %s ks', 'draftspot_theme' ),$stock);
                        }
                        echo $text;
                    ?>
                </div>
            </div>
        <?php
    }
    function ds_quantity_spinner(){
        ?>
            <div class="quantity_spinner">
                <button class="quantity_spinner_minus quantity_btn btn_outline">-</button>
                <input class="quantity_spinner_input" type="number"name="quantity_spinner_input" min="1" max="" value="1">
                <button class="quantity_spinner_plus quantity_btn btn_outline">+</button>
            </div>
        <?php
    }
    function ds_add_to_cart(){
        global $product;
        if( $product->is_type( 'simple' ) ){
            ?>
                <div class="ds_loop_add_to_cart_btn button" data-id="<?php echo $product->get_id();?>" data-qty="1"><?php _e('Do košíku','draftspot_theme');?></div>
            <?php
        } elseif( $product->is_type( 'variable' ) ){
            ?>
                <div class="ds_loop_add_to_cart_btn button " data-id="<?php echo $product->get_id();?>" data-type="<?php if($product->is_type( 'variable' )){echo 'variable';}?>" data-varid="" data-qty="1"><?php _e('Do košíku','draftspot_theme');?></div>
            <?php
        }
    }
?>
