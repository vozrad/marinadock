<?php
/**
 * Draftspot theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package draftspot_theme
 */

if ( ! function_exists( 'ds_draftspot_theme_setup' ) ){
    function ds_draftspot_theme_setup() {
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary', 'draftspot_theme' ),
        ) );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'custom-logo' );
        add_theme_support( 'woocommerce' );
        //add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
        }
    add_action( 'after_setup_theme', 'ds_draftspot_theme_setup' );
}

function ds_flashrad_theme_scripts(){
	/*bootstrap*/
    wp_enqueue_style( 'ds_bootstrap_css', get_template_directory_uri().'/assets/css/bootstrap.css' );
	/*main*/
    wp_enqueue_style( 'ds_flashrad_theme', get_stylesheet_uri() );
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'ds_front_js',get_template_directory_uri().'/assets/js/ds_front.js');
    wp_enqueue_style( 'ds_front_css', get_template_directory_uri() . '/assets/css/ds_front.css' );
    if(1/*is_product() || is_single()*/){
        wp_enqueue_script( 'ds_lightbox_js',get_template_directory_uri().'/assets/js/lightboxed.js');
        wp_enqueue_style( 'ds_lightbox_css', get_template_directory_uri() . '/assets/css/lightboxed.css' );
    }
    /*swiper*/
    wp_enqueue_style('ds_swiper_style', 'https://unpkg.com/swiper/swiper-bundle.min.css"');
    wp_enqueue_script('ds_swiper_js', "https://unpkg.com/swiper/swiper-bundle.min.js");

    /*lightbox*/

}
add_action( 'wp_enqueue_scripts', 'ds_flashrad_theme_scripts' );

function ds_enqueue_admin_script(){
	wp_register_style( 'ds_admin_css', get_template_directory_uri() . '/assets/css/ds_admin.css', false, '1.0.0' );
	wp_enqueue_style( 'ds_admin_css' );

	wp_register_script( 'ds_admin_js', get_template_directory_uri() . '/assets/js/ds_admin.js', array('jquery-core'), false, true );
	wp_enqueue_script( 'ds_admin_js' );

}
add_action( 'admin_enqueue_scripts', 'ds_enqueue_admin_script' );

/**
 * Draftspot Theme ajax address to js
 * ajax
 *
*/

function myplugin_ajaxurl() {
    echo '<script type="text/javascript">
           var ajax_url = "' . admin_url('admin-ajax.php') . '";
         </script>';
}
add_action( 'admin_head', 'myplugin_ajaxurl' );
add_action('wp_head', 'myplugin_ajaxurl');

/**
 * Draftspot Theme require files
 *
 *
*/

if ( ! class_exists( 'wp_bootstrap_navwalker' )) {
    require_once(get_template_directory() . '/inc/wp_bootstrap_navwalker.php');
	require_once(get_template_directory() . '/inc/BootstrapBasicMyWalkerNavMenu.php');
}
require_once(get_template_directory() . '/inc/ds_search.php');
//require_once(get_template_directory() . '/inc/ds_archive.php');
//require_once(get_template_directory() . '/woo_functions/woo_single.php');
//require_once(get_template_directory() . '/woo_functions/woo_add_to_cart.php');

/**
 * Draftspot Theme redirects
 *
 *
*/

add_action('wp_logout','auto_redirect_after_logout');
function auto_redirect_after_logout(){
  wp_safe_redirect( home_url() );
  exit;
}

/**
 * Draftspot Theme remove unused things
 *
 *
*/

add_action( 'wp_print_styles', 'ds_dequeue_styles' );
function ds_dequeue_styles() {
    if ( ! is_user_logged_in() ) {
        wp_dequeue_style( 'dashicons' );
        wp_deregister_style( 'dashicons' );
    }
}
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

remove_action('wp_head', 'wp_generator');
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Draftspot Theme theme settings
 *
 *
*/

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));



}

/**
 * Draftspot Theme breadcrumbs
 *
 *
*/

function get_breadcrumb() {
    echo '<div class="breadcrumb">';
    echo '<a href="'.home_url().'"  rel="nofollow">Home</a>';
    if (is_category() || is_single()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        the_category(' &bull; ');
            if (is_single()) {
                echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
                the_title();
            }
    } elseif (is_page()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
    echo '</div>';
}

/**
 * Draftspot Theme single post template
 *
 *
*/

function ds_single_template($single){
    global $wp_query, $post;
    return TEMPLATEPATH . '/template-parts/single.php';
}
add_filter('single_template', 'ds_single_template');

/**
 * Draftspot Theme single post related
 * by category
 * $pid
*/

function ds_get_related($pid){
    $cats=get_the_terms($pid,'category');
    $cat=[];
    if($cats){
       $count=count($cats);
        if($cats[$count-1]->count){
            $cat[]=$cats[$count-1]->term_id;
        }
        if($cats[$count-2] && $cats[$count-1]->count<4 ){
            $cat[]=$cats[$count-2]->term_id;
        }
    }
    $rels=get_posts(array(
        'post_type'=>'post',
        'post_status'=>'publish',
        'numberposts'=>10,
        'post__not_in'=>array($pid),
        'tax_query'=>array(
            array(
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' => $cat,
            ),
        ),
    ));
    return $rels;

}

/**
 * Draftspot Theme add metafield to query
 * products
 * $query
*/
function handle_custom_query_var( $query, $query_vars ) {
	if ( ! empty( $query_vars['pouzite'] ) ) {
		$query['meta_query'][] = array(
			'key' => 'pouzite',
			'value' => esc_attr( $query_vars['pouzite'] ),
            'compare' => '='
		);
	}

	return $query;
}
add_filter( 'woocommerce_product_data_store_cpt_get_products_query', 'handle_custom_query_var', 10, 2 );

/**
 * Draftspot Theme get search res
 * posts
 * $search
*/

function ds_get_search($search){
    $res=get_posts(array(
        'post_type'=>'post',
        'post_status'=>'publish',
        'numberposts'=>-1,
        's'=>$search
    ));
    return $res;
}
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10 );

/**
 * Draftspot Theme ajax get products
 * products
 * ajax
*/
function ds_refresh_products_function(){
    $cat=$_POST['cat'];
    $state=$_POST['state'];
    $page=$_POST['page'];
    ob_start();
    echo ds_get_products($cat,$page,$state);
    echo ob_get_clean();
    wp_die();
}
add_action( 'wp_ajax_ds_refresh_products', 'ds_refresh_products_function' );
add_action( 'wp_ajax_nopriv_ds_refresh_products', 'ds_refresh_products_function' );

/**
 * Draftspot Theme get product by cat
 * products
 * $cats,$page
*/
function ds_get_products($cats,$page=1,$state=0){
    $args=array(
        'post_type' => 'product',
		'post_status' => 'publish',
		'meta_key'=>'_price',
        'orderby' => 'meta_value_num',
        'order' => 'DESC',
        'posts_per_archive_page'=>6,
        'paged'  => $page,
        'tax_query' => array(
            array(
            'taxonomy' => 'product_cat',
            'field' => 'term_id',
            'terms' => $cats,
            ),
        ),
		'meta_query' => array(
			'relation' => 'OR',
		)
    );
    if($state){
		$aa=array(
            'key' => 'state',
            'value' => $state,
            'compare' => '=',
        );
        array_push($args['meta_query'],$aa);
    }
    //var_dump($args);
    $query = new WP_Query( $args );
    ob_start();
    global $product;
    $i=1;
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            $product=wc_get_product(get_the_id());
            //echo get_field('state',get_the_id());
            get_template_part( 'template-parts/content', 'cardLarge', array('item'=>$product,'type'=>$i) );
            $i++;
        }
        if( $query->max_num_pages > 1){
            echo ds_get_pag($query,$page);
        }
        echo '<div class="ds_pag_sum">'.$query->post_count.' z '.$query->found_posts.' produktů</div>';
    } else {
        ?>
            <div class="ds_no_products">Omlouváme se, žádný produkt neodpovídá zadaným kritériím.</div>
        <?php
    }
    wp_reset_postdata();
    return ob_get_clean();
}

/**
 * Draftspot Theme ajax get products
 * engines
 * ajax
*/
function ds_refresh_eng_function(){
    $cat=$_POST['cat'];
    $power=$_POST['power'];
    $page=$_POST['page'];
    ob_start();
    echo ds_get_engs($cat,$page,$power);
    echo ob_get_clean();
    wp_die();
}
add_action( 'wp_ajax_ds_refresh_eng', 'ds_refresh_eng_function' );
add_action( 'wp_ajax_nopriv_ds_refresh_eng', 'ds_refresh_eng_function' );

/**
 * Draftspot Theme get engines by cat
 * $power,$cat,$page
 * $cats,$page
*/
function ds_get_engs($cats,$page=1,$power=0){
    $args=array(
        'post_type' => 'product',
        'orderby' => 'date',
        'order' => 'DESC',
        'status' => 'publish',
        'posts_per_archive_page'=>9,
        'paged'  => $page,
        'tax_query' => array(
            'relation' => 'AND',
        ),
    );
    if($cats){
        $aa=array(
            'taxonomy' => 'product_cat',
            'field' => 'term_id',
            'terms' => $cats,
        );
        array_push($args['tax_query'],$aa);
    }
    $query = new WP_Query( $args );
    ob_start();
    global $product;
    $i=1;
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            $product=wc_get_product(get_the_id());
            //echo get_field('state',get_the_id());
            ?>
                <div class="col-lg-4 col-sm-6 col-12" data-id="<?php echo $product->get_id();?>">
                    <a href="<?php echo get_permalink( $product->get_id() );?>" alt="<?php echo $product->get_name();?>">
                        <h5><?php echo $product->get_name();?></h5>
                        <figure>
                            <img src="<?php echo get_field('card_image',$product->get_id());?>" class="ds_card_img" alt="<?php echo $product->get_name();?>">
                        </figure>
                    </a>
                </div>
            <?php
            $i++;
        }
        if( $query->max_num_pages > 1){
            echo ds_get_pag($query,$page);
        }
        echo '<div class="ds_pag_sum">'.$query->post_count.' z '.$query->found_posts.' produktů</div>';
    } else {
        ?>
        <div class="ds_no_products">Omlouváme se, žádný produkt neodpovídá zadaným kritériím.</div>
        <?php
    }
    wp_reset_postdata();
    return ob_get_clean();
}

/**
 * Draftspot Theme ajax get pagination
 * $query,$page
 *
*/
function ds_get_pag($res,$page){
    //if( is_singular() ){return;}
    if( $res->max_num_pages <= 1 ){return;}
    $paged = $page;
    $max   = intval( $res->max_num_pages );
    /** Add current page to the array */
    if ( $paged >= 1 )
    $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
    $links[] = $paged - 1;
    $links[] = $paged - 2;
    }

    if ( ( $paged + 2 ) <= $max ) {
    $links[] = $paged + 2;
    $links[] = $paged + 1;
    }
    ob_start();
    echo '<div class="ds_paginationWrap" data-page="'.$page.'"><div>' . "\n";

    /** Previous Post Link */
    if ( $page!=1 )
    printf( '<span class="ds_pagNum ds_pagNum_prev" data-page="%s">%s</span>' . "\n", $page-1,'<img src="/wp-content/uploads/2024/03/Path.svg" alt="Šipka vpravo">' );
	if ( $page==1 )
    printf( '<span class="ds_pagNum ds_pagNum_prev no_aval" data-page="%s">%s</span>' . "\n", $page-1,'<img src="/wp-content/uploads/2024/03/Path.svg" alt="Šipka vpravo">' );

    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
    $class = 1 == $paged ? 'active' : '';

    printf( '<span class="ds_pagNum %s" data-page="%s">%s</span>' . "\n", $class, '1', '1' );

    if ( ! in_array( 2, $links ) )
        echo '<span>…</span>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
    $class = $paged == $link ? 'active' : '';
    printf( '<span class="ds_pagNum %s" data-page="%s">%s</span>' . "\n", $class, $link, $link );
    }

    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
    if ( ! in_array( $max - 1, $links ) )
        echo '<span>…</span>' . "\n";

    $class = $paged == $max ? 'active' : '';
    printf( '<span class="ds_pagNum %s" data-page="%s">%s</span>' . "\n", $class,$max,$max );
    }

    /** Next Post Link */
    if ( $page!=$res->max_num_pages ){
		printf( '<span class="ds_pagNum ds_pagNum_next" data-page="%s">%s</span>' . "\n",$page+1, '<img src="/wp-content/uploads/2024/03/Path.svg" alt="Šipka vpravo">' );
	}else{
		printf( '<span class="ds_pagNum ds_pagNum_next no_aval" data-page="%s">%s</span>' . "\n",$page+1, '<img src="/wp-content/uploads/2024/03/Path.svg" alt="Šipka vpravo">' );
	}


    echo '</div></div>' . "\n";
    return ob_get_clean();
}

/**
 * Draftspot Theme ajax get boat
 * products
 * ajax
*/
function ds_refresh_boat_function(){
    $cat=$_POST['cat'];
    ob_start();
    echo ds_get_products_boat($cat);
    echo ob_get_clean();
    wp_die();
}
add_action( 'wp_ajax_ds_refresh_boat', 'ds_refresh_boat_function' );
add_action( 'wp_ajax_nopriv_ds_refresh_boat', 'ds_refresh_boat_function' );

/**
 * Draftspot Theme get boat by cat
 * products
 * $cats,$page
*/
function ds_get_products_boat($cats){
    $args=array(
        'limit' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
        'product_category_id' => array( $cats ),
    );
    $products = wc_get_products( $args );
    $terms=get_terms(array(
        'taxonomy'=>'product_cat',
        'parent'=>$cats,
        'hide_empty' => false,
    ));
    $res=[];
    foreach($terms as $t){
        $res[$t->term_id]=[];
        foreach($products as $p){
            if(has_term( $t->term_id, 'product_cat', $p->get_id() )){
                array_push($res[$t->term_id],$p);
            }
        }
    }
    ob_start();
	//var_dump($terms);
	if($res){
        foreach($res as $key=>$t){
            $cat=get_term_by('id', $key, 'product_cat');
            ?>
            <div class="ds_boat_cat_wrapper" data-cat="<?php echo $key;?>">
            <span class="ds_underline"></span>
                <h3 class="ds_products_list_name ds_big"><?php echo $cat->name;?></h3>
                <p><?php echo $cat->description;?></p>
                <div class="row ds_boat_list">
                    <?php
                    if($products){
                        foreach($t as $p){
                            ?>
                                <div class="col-lg-4 col-sm-6 col-12" data-id="<?php echo $p->get_id();?>">
                                    <a href="<?php echo get_permalink( $p->get_id() );?>" alt="<?php echo $p->get_name();?>">
                                        <h5><?php echo $p->get_name();?></h5>
                                        <figure>
                                            <img src="<?php echo get_field('card_image',$p->get_id());?>" class="" alt="<?php echo $p->get_name();?>">
                                        </figure>
                                    </a>
                                </div>
                            <?php
                        }
                    }else{
                        ?>
                            <div class="ds_no_products">Omlouváme se, žádný produkt neodpovídá zadaným kritériím.</div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
        }
	}else{
		$cat=get_term_by('id', $cats, 'product_cat');
        ?>
            <div class="ds_boat_cat_wrapper" data-cat="<?php echo $cats;?>">
            <span class="ds_underline"></span>
                <h3 class="ds_products_list_name ds_big"><?php echo $cat->name;?></h3>
                <p><?php echo $cat->description;?></p>
                <div class="row ds_boat_list">
                    <?php
                    if($products){
                        foreach($products as $p){
                            ?>
                                <div class="col-lg-4 col-sm-6 col-12" data-id="<?php echo $p->get_id();?>">
                                    <a href="<?php echo get_permalink( $p->get_id() );?>" alt="<?php echo $p->get_name();?>">
                                        <h5><?php echo $p->get_name();?></h5>
                                        <figure>
                                            <img src="<?php echo get_field('card_image',$p->get_id());?>" class="" alt="<?php echo $p->get_name();?>">
                                        </figure>
                                    </a>
                                </div>
                            <?php
                        }
                    }else{
                        ?>
                            <div class="ds_no_products">Omlouváme se, žádný produkt neodpovídá zadaným kritériím.</div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
	}
    return ob_get_clean();
}

/**
 * Draftspot Theme ajax get jet
 * products
 * ajax
*/
function ds_refresh_jet_function(){
    $cat=$_POST['cat'];
    ob_start();
    echo ds_get_products_jet($cat);
    echo ob_get_clean();
    wp_die();
}
add_action( 'wp_ajax_ds_refresh_jet', 'ds_refresh_jet_function' );
add_action( 'wp_ajax_nopriv_ds_refresh_jet', 'ds_refresh_jet_function' );

/**
 * Draftspot Theme get boat by cat
 * products
 * $cats,$page
*/
function ds_get_products_jet($cats){
    $args=array(
        'limit' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
        'product_category_id' => array( $cats ),
    );
    $products = wc_get_products( $args );
    $terms=get_terms(array(
        'taxonomy'=>'product_cat',
        'parent'=>$cats,
        'hide_empty' => false,
    ));
    $res=[];
    foreach($terms as $t){
        $res[$t->term_id]=[];
        foreach($products as $p){
            if(has_term( $t->term_id, 'product_cat', $p->get_id() )){
                array_push($res[$t->term_id],$p);
            }
        }
    }
    ob_start();
    if($res){
    foreach($res as $key=>$t){
        $cat=get_term_by('id', $key, 'product_cat');
        ?>
        <div class="ds_boat_cat_wrapper" data-cat="<?php echo $key;?>">
             <h3 class="ds_products_list_name ds_big"><?php echo $cat->name;?></h3>
             <p><?php echo $cat->description;?></p>
             <div class="row ds_boat_list">
                 <?php
                    if($products){
                     foreach($t as $p){
                        ?>
                             <div class="col-lg-4 col-sm-6 col-12" data-id="<?php echo $p->get_id();?>">
                                 <a href="<?php echo get_permalink( $p->get_id() );?>" alt="<?php echo $p->get_name();?>">
                                     <h5><?php echo $p->get_name();?></h5>
                                     <figure>
                                         <img src="<?php echo get_field('card_image',$p->get_id());?>" class="" alt="<?php echo $p->get_name();?>">
                                     </figure>
                                 </a>
                             </div>
                        <?php
                     }
                    }else{
                        ?>
                            <div class="ds_no_products">Omlouváme se, žádný produkt neodpovídá zadaným kritériím.</div>
                        <?php
                    }
                 ?>
             </div>
         </div>
        <?php
     }
	}else{
        $cat=get_term_by('id', $cats, 'product_cat');
        ?>
        <div class="ds_boat_cat_wrapper ds" data-cat="<?php echo $cats;?>">
             <h3 class="ds_products_list_name ds_big"><?php echo $cat->name;?></h3>
             <p><?php echo $cat->description;?></p>
             <div class="row ds_boat_list">
                 <?php
                    if($products){
                     foreach($products as $p){
                        ?>
                             <div class="col-lg-4 col-sm-6 col-12" data-id="<?php echo $p->get_id();?>">
                                 <a href="<?php echo get_permalink( $p->get_id() );?>" alt="<?php echo $p->get_name();?>">
                                     <h5><?php echo $p->get_name();?></h5>
                                     <figure>
                                         <img src="<?php echo get_field('card_image',$p->get_id());?>" class="" alt="<?php echo $p->get_name();?>">
                                     </figure>
                                 </a>
                             </div>
                        <?php
                     }
                    }else{
                        ?>
                            <div class="ds_no_products">Omlouváme se, žádný produkt neodpovídá zadaným kritériím.</div>
                        <?php
                    }
                 ?>
             </div>
         </div>
        <?php
    }
    return ob_get_clean();
}

/**
 * Draftspot Theme ajax get articles
 * post
 * ajax
*/
function ds_refresh_art_function(){
    $cat=$_POST['cat'];
    $tag=$_POST['tag'];
    $page=$_POST['page'];
    $search=$_POST['search'];
    ob_start();
    echo ds_get_art($cat,$tag,$search,$page);
    echo ob_get_clean();
    wp_die();
}
add_action( 'wp_ajax_ds_refresh_art', 'ds_refresh_art_function' );
add_action( 'wp_ajax_nopriv_ds_refresh_art', 'ds_refresh_art_function' );

/**
 * Draftspot Theme get articles by cat
 * posts
 *
*/
function ds_get_art($cats=0,$tag=0,$search='',$page=1){
    $args=array(
        'post_type' => 'post',
        'post_status'=>'publish',
        'orderby' => 'date',
        'order' => 'DESC',
        'status' => 'publish',
        'posts_per_page'=>3,
        'paged'  => $page,
        'tax_query' => array(
            'relation' => 'AND',
        ),
    );
    if($cats){
        $aa=array(
            'taxonomy' => 'category',
            'field' => 'term_id',
            'terms' => $cats,
        );
        array_push($args['tax_query'],$aa);
    }
    if($tag){
        $aa=array(
            'taxonomy' => 'post_tag',
            'field' => 'term_id',
            'terms' => $tag,
        );
        array_push($args['tax_query'],$aa);
    }
    if($search){
        $args['s']=$search;
    }
    $query = new WP_Query( $args );
    ob_start();
    $i=1;
    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            ?>
                <div class="ds_art_item" data-id="<?php echo get_the_id();?>">
                    <a href="<?php echo get_permalink( get_the_id() );?>" alt="<?php echo get_the_title();?>">
                        <figure>
                            <?php echo get_the_post_thumbnail( get_the_id(), 'large' );?>
                        </figure>
                        <div class="ds_art_date"><?php echo get_the_date('j. F Y');?></div>
                        <h3><?php echo get_the_title();?></h3>
                        <div class="ds_art_excerpt"><?php echo get_the_excerpt();?></div>
                    </a>
                    <div class="ds_art_author d-flex">
                        <div class="ds_art_author_gravatar">
                            <img src="<?php echo get_avatar_url( get_the_author_meta( 'ID' ) ); ?>" alt="">
                        </div>
                        <div class="ds_art_author_name">
                            <?php echo get_the_author(); ?>
                        </div>
                        <div class="ds_art_tags">
                            <?php
                            $posttags = get_the_tags();
                            $i = 1;
                            if ($posttags) {
                                $count = count($posttags);
                                foreach($posttags as $tag) {
                                    echo '<span class="ds_tag">'.$tag->name . '</span> ';
                                    if($i < $count){
                                        echo '<span class="ds_separator"></span>';
                                    }
                                    $i++;
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php
            $i++;
        }
        if( $query->max_num_pages > 1){
            echo ds_get_pag($query,$page);
        }
    } else {
        esc_html_e( 'Omlouváme se, žádný produkt neodpovídá zadaným kritériím.' );
    }
    wp_reset_postdata();
    return ob_get_clean();
}

/**
 * Draftspot Theme send form
 * ajax
 * $data
*/

function ds_send_form_function() {
    $data=stripslashes($_REQUEST['data']);
    $arrData=json_decode($data,true);
    $arr=[];
    foreach($arrData as $a){
        $arr[$a['name']]=$a['value'];
    }
    $subject='Poptávka';
    $headers = array('Content-Type: text/html; charset=UTF-8;','Bcc: '.$res['email']);
    $admin='radek@draftspot.net';
    $content=ds_get_dotaznik_body($arr);
    $res=wp_mail($admin, $subject, $content,$headers);/**/
    ob_start();
    var_dump($arr);
    echo '<p class="ds_form_notice">Vaše zpráva byla odeslána.</p>';
    echo ob_get_clean();
    wp_die();
}
add_action('wp_ajax_ds_send_form', 'ds_send_form_function');
add_action('wp_ajax_nopriv_ds_send_form', 'ds_send_form_function');

/**
 * Draftspot Theme get mail content
 * data
 * $arr
*/
function ds_get_dotaznik_body($res){
    ob_start();
	?>
		<table id="maildot">
       <tbody>
        <tr><td><h2 style="font-size: 28px;margin-bottom: 5px;">Kontaktní údaje</h2></td></tr>
        <tr><td>Jméno a příjmení:</td><td style="padding-left: 20px;"><?php echo $res['name'];?></td></tr>
        <tr><td>E-mail:</td><td style="padding-left: 20px;"><?php echo $res['email'];?></td></tr>
        <tr><td>Telefon:</td><td style="padding-left: 20px;"><?php echo $res['phone'];?></td></tr>
        <tr><td><h2 style="font-size: 28px;margin-bottom: 5px;">Zpráva</h2></td></tr>
        <tr><td colspan="2" style="padding-left: 20px;"><?php echo $res['msg'];?></td></tr>
       </tbody>
    </table>
    <?php
    return ob_get_clean();
}

/**
 * Draftspot Theme get html price by input price typ
 * product
 * $product,$type,$vat
*/
function ds_get_price_html($product,$type,$vat=''){
    $html='';
    if($vat=='VAT'){
        if($type=='s DPH'){
            //return 3;
            $prR=intval($product->get_price());
            $prR=number_format($prR, 0, ',', ' ');
            $html='<span class="woocommerce-Price-amount amount"><bdi>'.$prR.'&nbsp;<span class="woocommerce-Price-currencySymbol">Kč</span></bdi></span>';
            if($product->is_on_sale()){
                $prR=intval($product->get_regular_price());
                $prR=number_format($prR, 0, ',', ' ');
                $prS=intval($product->get_sale_price());
                $prS=number_format($prS, 0, ',', ' ');
                $html='<del aria-hidden="true"><span class="woocommerce-Price-amount amount"><bdi>'.$prR.'&nbsp;<span class="woocommerce-Price-currencySymbol">Kč</span></bdi></span></del>';
                $html.='<ins><span class="woocommerce-Price-amount amount"><bdi>'.$prS.'&nbsp;<span class="woocommerce-Price-currencySymbol">Kč</span></bdi></span></ins>';
             }
            return $html;
        }else{
            //return 4;
            $pr=(intval($product->get_price()))*1.21;
            $html=wc_price($pr);
            if($product->is_on_sale()){
               $prR=intval($product->get_regular_price())*1.21;
               $prR=number_format($prR, 0, ',', ' ');
               $prS=intval($product->get_sale_price())*1.21;
               $prS=number_format($prS, 0, ',', ' ');
            	$html='<del aria-hidden="true"><span class="woocommerce-Price-amount amount"><bdi>'.$prR.'&nbsp;<span class="woocommerce-Price-currencySymbol">Kč</span></bdi></span></del>';
            $html.='<ins><span class="woocommerce-Price-amount amount"><bdi>'.$prS.'&nbsp;<span class="woocommerce-Price-currencySymbol">Kč</span></bdi></span></ins>';
            }
            return $html;
        }
    }else{
        if($type=='s DPH'){
            //return 1;
            $pr=(intval($product->get_price()))/1.21;
            $html=wc_price($pr);
            if($product->is_on_sale()){
               $prR=intval($product->get_regular_price())/1.21;
               $prR=number_format($prR, 0, ',', ' ');
               $prS=intval($product->get_sale_price())/1.21;
               $prS=number_format($prS, 0, ',', ' ');
               $html='<del aria-hidden="true"><span class="woocommerce-Price-amount amount"><bdi>'.$prR.'&nbsp;<span class="woocommerce-Price-currencySymbol">Kč</span></bdi></span></del>';
               $html.='<ins><span class="woocommerce-Price-amount amount"><bdi>'.$prS.'&nbsp;<span class="woocommerce-Price-currencySymbol">Kč</span></bdi></span></ins>';
            }
            return $html;
        }else{
            //return 2;
            $prR=intval($product->get_price());
            $prR=number_format($prR, 0, ',', ' ');
            $html='<span class="woocommerce-Price-amount amount"><bdi>'.$prR.'&nbsp;<span class="woocommerce-Price-currencySymbol">Kč</span></bdi></span>';
            if($product->is_on_sale()){
                $prR=intval($product->get_regular_price());
                $prR=number_format($prR, 0, ',', ' ');
                $prS=intval($product->get_sale_price());
                $prS=number_format($prS, 0, ',', ' ');
                $html='<del aria-hidden="true"><span class="woocommerce-Price-amount amount"><bdi>'.$prR.'&nbsp;<span class="woocommerce-Price-currencySymbol">Kč</span></bdi></span></del>';
                $html.='<ins><span class="woocommerce-Price-amount amount"><bdi>'.$prS.'&nbsp;<span class="woocommerce-Price-currencySymbol">Kč</span></bdi></span></ins>';
             }
            return $html;
        }
    }
    return $html;
}
