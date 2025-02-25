<?php
/*
Template Name: ds_pages
description: display contents pages
autor: draftspot
*/
?>
<?php
get_header();
?>
<section class="ds_page_header">
	<div class="container">
		<?php the_title( '<h1 class="ds_page_title">', '</h1>' );?>
	</div>
</section>
<section class="ds_contacs_content_wrapper">
    <div class="container">
        <?php the_content();?>
	</div>
</section>
<style>
	h2{
		margin-top:1em;
	}
</style>


<?php
get_footer();
?>
