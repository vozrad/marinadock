<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package draftspot_theme
 */

get_header(); ?>


	<?php
		$cat=get_queried_object();
		$cid=$cat->term_id;
		$tax= $cat->taxonomy;
		$terms=get_terms(array(
			'taxonomy'=>$tax,
			'hide_empty'=>false,
			'meta_key'=>'order',
			'orderby'=>'meta_value_num'
		));
	?>

	<section class="ds_page_header" data-tax="<?php echo $tax;?>" data-cid="<?php echo $cid;?>">
		<div class="container">
		<div class="ds_breadcrumb_wrapper ds">
			<?php echo get_breadcrumb();?>
		</div>
			<?php the_archive_title( '<h1 class="ds_page_title">', '</h1>' );?>
			<?php the_archive_description( '<div class="ds_archive_description">', '</div>' );?>
		</div>
	</section>
	<section class="ds_archive_filter">
		<div class="container">
			<div class="ds_archive_filter_cats d-flex">
				<?php
					foreach($terms as $t){
						$tid=$t->term_id;
						?>
							<div class="ds_archive_filter_cats_item <?php if($tid==$cid){echo 'active';}?>" data-cid="<?php echo $tid;?>"><span><?php if($tid==7){_e('Všechny články','draftspot_theme'); }else{echo $t->name;}?></span></div>
						<?php
					}
				?>
			</div>
		</div>
	</section>
	<section class="ds_archive_content_wrapper">
		<div class="container">
			<div class="ds_archive_content row">
				<?php
					echo ds_get_post($tax,$cid);
				?>
			</div>
		</div>
	</section>

<?php
get_footer();
