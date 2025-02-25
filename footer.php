<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package draftspot_theme
 */

?>
</main>

<div class="dot-preloader-overlay d-none">
    <div class="dot-preloader">
        <div class="dot-flashing"><img src="/wp-content/uploads/2024/03/Kormidlo.svg" class="ds_preloader"></div>
    </div>
</div>

<?php //get_template_part( 'template-parts/content', 'newsletter' );?>

<footer class="ds_footer_futon">

    <section class="ds_footer_wrapper container-fluid">
        <div class="container">
            <div class="row">
                <div class="ds_footer_col">
                    <img src="<?php echo get_field('footer_column_1_logo', 'options'); ?>" class="" alt="logo">
                    <p><?php echo get_field('footer_column_1_text', 'options'); ?></p>
                    <p><?php echo get_field('kontakty_sidlo', 'options'); ?></p>
                    <p><?php echo 'IČ: '.get_field('kontakty_ic', 'options'); ?></p>
                    <div><img src="/wp-content/uploads/2024/03/apl.webp" alt=""></div>
                </div>
                <div class="ds_footer_col">
                    <h3 class="ds_footer_col_title"><?php echo get_field('footer_column_2_title', 'options'); ?></h3>
                    <?php
                        wp_nav_menu(array(
                            'menu'    => 'Offer',
                            'container'       => 'div',
                            'container_id'    => 'shop-nav',
                            'container_class' => 'ds_footer_menu_wrapper',
                            'menu_id'         => false,
                            'menu_class'      => 'ds_footer_menu_inner',
                            'depth'           => 3
                        ));
                    ?>
                </div>

                <div class="ds_footer_col">
                    <h3 class="ds_footer_col_title"><?php echo get_field('footer_column_3_title', 'options'); ?></h3>
                    <?php
                        wp_nav_menu(array(
                            'menu'    => 'Info',
                            'container'       => 'div',
                            'container_id'    => 'menu-nav',
                            'container_class' => 'ds_footer_menu_wrapper',
                            'menu_id'         => false,
                            'menu_class'      => 'ds_footer_menu_inner',
                            'depth'           => 3
                        ));
                    ?>
                </div>

                <div class="ds_footer_col">
                    <h3 class="ds_footer_col_title"><?php echo get_field('footer_column_4_title', 'options'); ?></h3>
                    <div class="ds_footer_contacts">
                        <div class="ds_footer_contacts_box">
                            <h5 class="ds_footer_contacts_title">Kancelář</h3>
                            <div class="ds_footer_contacts_line">
                                <?php echo get_field('kontakty_kancelar_adresa', 'options'); ?>
                            </div>
                            <div class="ds_footer_contacts_line">
                                <svg width="22" height="24" viewBox="0 0 22 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.58982 1.322L5.4339 0L9.47501 7.89002L6.74993 9.23102C6.21192 10.49 8.90899 15.52 10.047 15.603C10.137 15.545 12.7181 14.275 12.7181 14.275L16.8282 22.2071C16.8282 22.2071 14.0641 23.5611 13.9741 23.6031C6.11292 27.1941 -5.12739 5.34501 2.58982 1.322ZM4.51987 2.59601L3.49685 3.10001C-1.7973 5.86201 7.67396 24.2851 13.1451 21.7861L14.1161 21.3121L11.8451 16.929L10.819 17.429C7.65596 18.976 2.55682 9.21002 5.76391 7.49102L6.77094 6.99402L4.51987 2.59601ZM15.2692 11.115L12.3521 10.245L13.2211 7.32902C13.9671 7.55102 14.6302 8.05902 15.0292 8.79802C15.4292 9.53602 15.4922 10.368 15.2692 11.115ZM14.1561 4.18601C15.7072 4.64801 17.0822 5.70201 17.9122 7.23702C18.7433 8.77302 18.8723 10.5 18.4103 12.05L16.6152 11.515C16.9402 10.424 16.8482 9.20902 16.2632 8.12802C15.6802 7.04702 14.7122 6.30602 13.6201 5.98201L14.1561 4.18601ZM20.8353 5.65601C19.5693 3.31201 17.4712 1.705 15.1062 1L14.5571 2.84101C16.4522 3.40501 18.1322 4.69301 19.1483 6.57002C20.1623 8.44602 20.3203 10.557 19.7563 12.452L21.5963 13C22.3014 10.634 22.1044 7.99902 20.8353 5.65601Z" fill="rgba(0, 0, 0, 0.7)"/>
                                </svg>
                                <a href="tel:<?php echo get_field('kontakty_kancelar_telefon', 'options'); ?>" class="ds_footer_contact_line">
                                    <span class="ds_footer_contact_line_text"><?php echo get_field('kontakty_kancelar_telefon', 'options'); ?></span>
                                </a>
                            </div>
                            <div class="ds_footer_contacts_line">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.99 0L0 8.723V24H24V8.723L11.99 0ZM11.991 2.472L21.784 9.585L15.049 14.173L12 11.703L8.951 14.174L2.214 9.585L11.991 2.472ZM7.329 15.488L2 11.858V19.806L7.329 15.488ZM2.474 22L12 14.277L21.526 22H2.474ZM16.671 15.489L22 19.806V11.858L16.671 15.489Z" fill="rgba(0, 0, 0, 0.7)"/>
                                </svg>
                                <a href="mailto:<?php echo get_field('kontakty_kancelar_e-mail', 'options'); ?>" class="ds_footer_contact_line">
                                    <span class="ds_footer_contact_line_text"><?php echo get_field('kontakty_kancelar_e-mail', 'options'); ?></span>
                                </a>
                            </div>
                        </div>
                        <div class="ds_footer_contacts_box">
                            <h5 class="ds_footer_contacts_title">Marina</h3>
                            <div class="ds_footer_contacts_line">
                                <?php echo get_field('kontakty_marina_adresa', 'options'); ?>
                            </div>
                            <div class="ds_footer_contacts_line">
                                <svg width="22" height="24" viewBox="0 0 22 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.58982 1.322L5.4339 0L9.47501 7.89002L6.74993 9.23102C6.21192 10.49 8.90899 15.52 10.047 15.603C10.137 15.545 12.7181 14.275 12.7181 14.275L16.8282 22.2071C16.8282 22.2071 14.0641 23.5611 13.9741 23.6031C6.11292 27.1941 -5.12739 5.34501 2.58982 1.322ZM4.51987 2.59601L3.49685 3.10001C-1.7973 5.86201 7.67396 24.2851 13.1451 21.7861L14.1161 21.3121L11.8451 16.929L10.819 17.429C7.65596 18.976 2.55682 9.21002 5.76391 7.49102L6.77094 6.99402L4.51987 2.59601ZM15.2692 11.115L12.3521 10.245L13.2211 7.32902C13.9671 7.55102 14.6302 8.05902 15.0292 8.79802C15.4292 9.53602 15.4922 10.368 15.2692 11.115ZM14.1561 4.18601C15.7072 4.64801 17.0822 5.70201 17.9122 7.23702C18.7433 8.77302 18.8723 10.5 18.4103 12.05L16.6152 11.515C16.9402 10.424 16.8482 9.20902 16.2632 8.12802C15.6802 7.04702 14.7122 6.30602 13.6201 5.98201L14.1561 4.18601ZM20.8353 5.65601C19.5693 3.31201 17.4712 1.705 15.1062 1L14.5571 2.84101C16.4522 3.40501 18.1322 4.69301 19.1483 6.57002C20.1623 8.44602 20.3203 10.557 19.7563 12.452L21.5963 13C22.3014 10.634 22.1044 7.99902 20.8353 5.65601Z" fill="rgba(0, 0, 0, 0.7)"/>
                                </svg>
                                <a href="tel:<?php echo get_field('kontakty_marina_telefon', 'options'); ?>" class="ds_footer_contact_line">
                                    <span class="ds_footer_contact_line_text"><?php echo get_field('kontakty_marina_telefon', 'options'); ?></span>
                                </a>
                            </div>
                            <div class="ds_footer_contacts_line">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.99 0L0 8.723V24H24V8.723L11.99 0ZM11.991 2.472L21.784 9.585L15.049 14.173L12 11.703L8.951 14.174L2.214 9.585L11.991 2.472ZM7.329 15.488L2 11.858V19.806L7.329 15.488ZM2.474 22L12 14.277L21.526 22H2.474ZM16.671 15.489L22 19.806V11.858L16.671 15.489Z" fill="rgba(0, 0, 0, 0.7)"/>
                                </svg>
                                <a href="mailto:<?php echo get_field('kontakty_marina_e-mail', 'options'); ?>" class="ds_footer_contact_line">
                                    <span class="ds_footer_contact_line_text"><?php echo get_field('kontakty_marina_e-mail', 'options'); ?></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="ds_footer_bottom_line container-fluid">
        <div class="ds_footer_bottom_line_pack container">
            <div class="ds_footer_copyright">
                <span><?php echo get_field('footer_copyright_text', 'options'); ?></span>
            </div>
            <a href="/zasady-ochrany-osobnich-udaju" class="" alt="Zásady GDPR">Zásady GDPR</a>
            <div class="ds_footer_madeby">
                <span><?php echo get_field('footer_cp_right_text', 'options'); ?> <a href="<?php echo get_field('footer_cp_right_link', 'options'); ?>" target="_blank"><?php echo get_field('footer_cp_right_text_bold', 'options'); ?></a></span>
            </div>
        </div>
    </section>
</footer>
<?php wp_footer(); ?>

</body>

</html>
