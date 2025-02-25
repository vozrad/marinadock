<?php
$title='Máte zájem?';
$pid=get_queried_object_id();
$name=get_field('nadpis_formulare',$pid);
if($name){
    $title=$name;
}
?>
<div  id="ds_orderForm" class="ds_form_side">
    <div class="ds_form_side_header">
        <h3><?php echo $title;?></h3>
        <p>Kontaktujte nás skrze formulář níže nebo nám zavolejte!</p>
    </div>
    <div class="ds_form_side_body">
        <form id="orderForm" action="#" method="POST">
            <label>
                <input type="text" name="name" class="ds_form_side_input ds_form_name ds_required" placeholder="Vaše jméno" autocomplete="true" value="">
            </label>
            <label>
                <input type="text" name="email" class="ds_form_side_input ds_form_email ds_required" placeholder="Váš e-mail" autocomplete="true" value="">
            </label>
            <label>
                <input type="text" name="phone" class="ds_form_side_input ds_form_phone ds_required" placeholder="Váš telefon" autocomplete="true" value="">
            </label>
            <textarea  name="msg"class="ds_form_side_input ds_form_name" rows="10" placeholder="Vaše zpráva" value=""></textarea>
            <label class="ds_checkbox">
                <input type="checkbox" id="gdpr" class=" ds_required" name="gdpr">
                <span class="checkmark"></span>
                <span for="gdpr">Souhlasím se <a href="/ochrana-osobnich-udaju" title="Přejít na Zásady zpracování osobních údajů">Zásadami zpracování osobních údajů</a></span>
            </label>
            <div class="ds_submit_wraper">
                <div class="ds_submit_div btn"><span>Odeslat</span></div>
            </div>
            <div class="ds_form_footer">
                <p>Potřebujete <a href="/administrativa-a-financovani/#finance" alt="">financování</a> nebo <a href="/administrativa-a-financovani/#pojisteni" alt="">pojištění</a>?</p>
            </div>
        </form>
    </div>
</div>
