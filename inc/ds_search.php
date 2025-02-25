<?php
//search shortcode

function ds_search_section_function(){
	ob_start();
	?>
		<div class="ds_search_wrapper">
			<h3 class="ds_search_title"><?php _e('Hledat','cheerup')?></h3>
			<div class="ds_search_form_wrapper">
				<div class="ds_search_form ds_flex">
					<input type="text" class="ds_search_form_input" placeholder="<?php _e('Zeptejte se co hledáte','cheerup')?>" value="">
					<div class="ds_search_loader_icon ds_hide" ><div class="sbl-circ"></div></div>
					<button class="ds_search_form_submit" data-search=""><i class="fa fa-search"></i></button>
				</div>
			</div>
			<div class="ds_search_sugg ds_hide">
				<div class="ds_search_sugg_con"></div>
			</div>
		</div>
	<?php
	return ob_get_clean();
}
//add_shortcode('ds_search_section', 'ds_search_section_function');

//search ajax
function ds_get_sugg_function()
{
    $search = $_POST['search'];
	$res=[];
	$posts=get_posts(array(
		'post_type'=>'post',
		'post_status'=>'publish',
		'numberposts'=>-1
	));
	foreach($posts as $p){
		$title=strtolower($p->post_title);
		$search2=strtolower($search);
		//if(str_contains($p->post_title, $search) || str_contains($p->post_title, $search2) ){
		if(str_contains($title, $search2)){
			$res[]=$p;
		}
	}
    ob_start();


    foreach($res as $r){
		?>
			<div class="ds_sugg_item">
				<a href="<?php echo get_the_permalink($r->ID);?>" class="ds_sugg_item_link"><?php echo $r->post_title;?></a>
			</div>
		<?php
	}
    echo ob_get_clean();
    wp_die();
}
add_action('wp_ajax_ds_get_sugg', 'ds_get_sugg_function');
add_action('wp_ajax_nopriv_ds_get_sugg', 'ds_get_sugg_function');
?>
