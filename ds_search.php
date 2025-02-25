<?php
/*
Template Name: ds_search
description: display search page
autor: draftspot
*/
?>
<?php
get_header();
?>

<?php
    $search='';
    if(isset($_GET['search'])){
        $search=$_GET['search'];
    }
    $res=ds_get_search($search);
?>
<section class="ds_page_header">
	<div class="container">
    <h1 class="ds_page_title"><?php echo __( 'Výsledky vyhledávání pro:', 'draftspot_theme' ).' <span>'.$search.'</span>'; ?></h1>
	</div>
</section>
<section class="ds_search_content_wrapper">
    <div class="container">
        <div class="ds_search_res_wrapper row">
            <?php
            if($res){
                global $post;
                $post_curr=$post;
                foreach($res as $r){
                    $post=$r;
                    ?>
                        <div class="ds_post_item col-lg-3 col-sm-6">
                            <?php get_template_part( 'template-parts/content', 'post' );?>
                        </div>
                    <?php
                }
                $post=$post_curr;
            }else{
                echo '<p>'.__( 'Pro daný výraz jsme žádné výsledky nenalezli...', 'draftspot_theme' ).'</p>';
            }
            ?>
        </div>
	</div>
</section>



<?php
get_footer();
?>
