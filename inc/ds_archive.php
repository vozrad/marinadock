<?php

/**
 * Draftspot Theme get blog posts ajax
 * ajax
 * $tax,$cid,$page,$order,$orderby,$search
*/

function ds_get_post_function() {
    if(isset($_POST['tax'])){
        $tax=$_POST['tax'];
    }
    if(isset($_POST['cid'])){
        $cid=$_POST['cid'];
    }
    if(isset($_POST['page'])){
        $page=$_POST['page'];
    }
    if(isset($_POST['order'])){
        $order=$_POST['order'];
    }
    if(isset($_POST['orderby'])){
        $orderby=$_POST['orderby'];
    }
    ob_start();
    echo ds_get_post($tax,$cid,$page,$order,$orderby);
    echo ob_get_clean();

    wp_die();
}
add_action('wp_ajax_ds_get_post', 'ds_get_post_function');
add_action('wp_ajax_nopriv_ds_get_post', 'ds_get_post_function');

 /**
 * Draftspot Theme get blog posts
 * function
 * $tax,$cid,$page,$order,$orderby,$search
*/

function ds_get_post($tax='category',$cid=7,$page=1,$order='DESC',$orderby='date'){
    $args=array(
        'post_type'=>'post',
        'post_status'=>'publish',
        'post_type'=>'post',
        'orderby' => 'date',
        'order' => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => $tax,
                'field' => 'term_id',
                'terms' => $cid,
            ),
        ),
        'paged' => $page
    );
    //var_dump($args);
    $query=new WP_Query( $args );
    $pageSum=$query->max_num_pages;

    ob_start();
    if ( $query->have_posts() ){
        while ( $query->have_posts() ) :
            $query->the_post();
            echo '<div class="ds_post_item col-lg-3 col-sm-6">';
            get_template_part( 'template-parts/content', 'post' );
            echo '</div>';
        endwhile;
        if($page<$pageSum){
            echo '<div class="ds_btn_more_wrapper"><button class="ds_btn_more" data-page="'.($page+1).'">'.__('Další obsah','draftspot_theme').'</button></div>';
        }
    }else{
        echo '<p>'.__('Žádné články jsme nenalezli...','draftspot_theme').'</p>';
    }
    wp_reset_postdata();
    return ob_get_clean();
}
?>
