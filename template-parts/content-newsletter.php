<?php
/**
 * Template part for displaying newsletter form
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package draftspot_theme
 */

?>

<section class="container-fluid newsletter">
    <div class="container">
        <div class="newsletter_card">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <h3 class="line_tit"><?php echo get_field('newsletter_title', 'options'); ?></h3>
                    <p class="p_mid"><?php echo get_field('newsletter_text', 'options'); ?></p>
                </div>
                <div class="col-lg-6 col-12">
                    <?php echo do_shortcode('[contact-form-7 id="e156e77" title="Contact form 1"]'); ?>
                </div>
            </div>
        </div>

    </div>
</section>

