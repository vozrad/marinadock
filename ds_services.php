<?php
/*
Template Name: ds_services
description: display service detail
autor: draftspot
*/
?>
<?php
get_header();
$ser=get_field('sluzba');
$heroImg=get_field('pozadi');
$heroImgM=get_field('pozadi_mobil');
?>
<section class="ds_archive_section ds_archive_section_tax container-fluid" style="background-image:url(<?php echo $heroImg;?>);">
		<img src="<?php echo $heroImgM;?>" alt="<?php echo get_field('title');?>" class="ds_archive_section_bg_m">
	<div class="container">
		<div class="ds_archive_section_tax_wrap">
			<p><?php echo get_field('horni_text');?></p>
			<h1><?php echo get_field('title');?></h1>
		</div>
	</div>
</section>
<section class="ds_contacs_content_wrapper container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <?php echo get_the_content();?>
            </div>
            <div class="col-4">
                <?php get_template_part( 'template-parts/content', 'formS');?>
            </div>
        </div>

	</div>
</section>



<?php
get_footer();
?>
