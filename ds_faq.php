<?php
/*
Template Name: ds_faq
description: display Faq pages
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
        <div class="accordion_wrapper">
            <?php
            $faqs=get_field('items');
            $i=0;
            foreach($faqs as $f){
                ?>
                <div class="accordion_item">
                    <button class="accordion_header" data-target="<?php echo $i; ?>"><?php echo $f['question']; ?></button>
                    <div class="accordion_body" data-target="<?php echo $i; ?>">
                        <div class="accordion_panel" data-target="<?php echo $i; ?>">
                            <p><?php echo $f['answer']; ?></p>
                        </div>
                    </div>
                </div>
                <?php
                $i++;
            }
            ?>
        </div>
	</div>
</section>



<?php
get_footer();
?>
