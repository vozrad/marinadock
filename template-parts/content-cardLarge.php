<?php
$product=$args['item'];
$i=$args['type'];
$class='';
if(!fmod($i,2)){
    $class='reverse';
}
$image=$product->get_image_id();
$image=$product->get_image($size = 'woocommerce_single');
$price_typ=get_field('cena',$product->get_id());
$price=ds_get_price_html($product,$price_typ,'VAT');
$action=get_field('akce',$product->get_id());
$state=get_field('state',$product->get_id());
?>
<article class="ds_product_cards_large_wrap <?php echo $class;?>">
    <div class="ds_product_cards_image_wrap ds">
        <figure>
            <a href="<?php echo get_permalink( $product->get_id() );?>" alt="<?php echo $product->get_title(); ?>">
            <?php echo $image;?>
            </a>
        </figure>
        <div class="ds_tags <?php if($action){echo 'ds_both';};?>">
            <?php
                if($action){
                    echo '<div class="ds_tag_action">Akce</div>';
                }
                if($state=='Nové'){
                    echo '<div class="ds_tag_state">Nové</div>';
                }else{
                    echo '<div class="ds_tag_state">Bazarové</div>';
                }
                $tags=$product->get_tag_ids();
                foreach($tags as $tag) {
                    echo '<div class="ds_tag_state">'.get_term($tag)->name.'</div>';
                }
            ?>
        </div>

    </div>
    <div class="ds_product_cards_content_wrap">
        <h3 class="ds_big"><a href="<?php echo get_permalink( $product->get_id() );?>" alt="<?php echo $product->get_title(); ?>"><?php echo $product->get_name();?></a></h3>
        <div class="ds_product_cards_conten_short"><?php echo $product->get_short_description();?></div>
        <div class="ds_product_cards_meta">
            <?php
                $params=get_field('parametry',$product->get_id());
                $i=0;
                if($params){
                    foreach($params as $p){
                        if($p['card_view'] && $i<3){
                            ?>
                                <div class="ds_product_cards_meta_item">
                                    <img src="<?php echo $p['icon'];?>" loading="lazy" alt="<?php echo $p['label'];?>">
                                    <span><?php echo $p['value'];?></span>
                                </div>
                            <?php
							$i++;
                        }

                    }
                }
            ?>
        </div>
        <div class="d-flex ds_product_cards_price">
            <div class="ds_product_cards_price_box">
                <?php
                if(get_field('cena_na_vyzadani',$product->get_id())){
                    echo 'Aktuální cena na vyžádání.';
                }else{
                    echo $price.'<span class="ds_dph">cena včetně DPH</span></div>';
                }
                ?>
            <div class="ds_product_show_detail"><a href="<?php echo get_permalink( $product->get_id() );?>" alt="<?php echo $product->get_title;?>">Detail produktu</a></div>
        </div>
    </div>
</article>
