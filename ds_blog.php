<?php
/*
Template Name: ds_blog
description: display blog page
autor: draftspot
*/
?>
<?php
get_header();
?>
<section class="ds_contact_section ds_archive_section_tax"  style="background-image:url(<?php echo get_field('slider_img');?>);">
	<img src="<?php echo get_field('slider_img_mobil');?>" alt="<?php echo get_field('title');?>" class="ds_archive_section_bg_m">
	<div class="container">
        <div class="ds_archive_section_wrap">
			<h1><?php echo get_field('title');?></h1>
		</div>
	</div>
</section>
<section class="ds_archive_section ds_archive_section_products ds_archive_blog_page">
	<div class="ds_lighthouse">
        <svg xmlns="http://www.w3.org/2000/svg" width="527" height="886" viewBox="0 0 527 886" fill="none">
            <path d="M202.304 859.236L217.423 811.957L239.443 793.207L253.42 773.385M593.334 557.039L642.088 602.677M593.334 557.039L582.291 561.873L575.569 570.879L550.323 569.907L543.002 579.072M593.334 557.039V581.081M642.088 602.677L660.963 670.347M642.088 602.677L635.873 627.579L629.89 638.465L631.524 662.413M660.963 670.347L678.267 690.807L684.558 764.769M660.963 670.347L650.017 708.138V762.152L642.088 782.158V842.027M684.558 764.769L725.45 811.978L733.541 852.49M684.558 764.769L681.971 783.883M543.002 579.072L513.524 578.652L498.552 583.639L488.618 572.773M543.002 579.072L535.687 622.048L522.688 639.697L519.438 663.385V712.972L509.692 732.152M488.618 572.773L457.164 582.216M488.618 572.773V593.578L485.611 605.474M457.164 582.216L404.955 648.317M457.164 582.216V627.607L446.672 652.572V672.311M404.955 648.317L366.842 631.004M404.955 648.317V672.311L397.821 684.675M366.842 631.004L296.067 644.594M366.842 631.004V664.947M296.067 644.594L267.755 668.771M296.067 644.594V701.426M267.755 668.771L252.026 708.138M267.755 668.771V699.066M252.026 708.138H238.413L231.306 702.387L223.52 708.138H209.56M252.026 708.138L253.306 772.243M209.56 708.138L190.38 696.405L177.689 683.697L170.323 684.134L152.936 673.494L119.907 708.138L86.5521 732.152L69.5746 785.229M209.56 708.138V734.591L193.717 750.44V799.016M69.5746 785.229L36.5457 811.957L28.683 859.236M69.5746 785.229L61.5316 811.048V833.771M296.067 701.426L284.663 726.63M296.067 701.426L336.619 675.75M150.397 676.159V707.721M120.302 707.721V726.339L109.29 740.619L106.929 772.243M478.907 774.221L474.974 806.918M474.974 806.918L456.103 830.707M474.974 806.918L507.548 838.883L516.42 841.104L525.612 863.532V883M456.103 830.707V863.532M456.103 830.707L441.661 816.725L424.628 810.84M253.306 771.456L255.567 819.456M257.277 830.707V859.236M403.523 31.7406L331.298 82.7602H475.744L403.523 31.7406ZM403.523 31.7406V23.8041M471.363 212.811C471.363 216.08 470.063 219.221 467.749 221.536C465.439 223.854 462.301 225.152 459.026 225.152H347.499C344.228 225.152 341.089 223.854 338.776 221.536C336.463 219.224 335.162 216.084 335.162 212.811M471.363 212.811C471.363 205.121 471.363 220.498 471.363 212.811ZM471.363 212.811C471.363 209.535 470.063 206.398 467.749 204.084C465.436 201.769 462.297 200.468 459.026 200.468H347.499C344.225 200.468 341.086 201.769 338.776 204.084C336.463 206.398 335.162 209.539 335.162 212.811M335.162 212.811C335.162 205.121 335.162 220.498 335.162 212.811ZM454.167 225.152L487.141 556.342M352.212 225.152L310.079 623.692M473.472 419.031H331.715M464.482 332.316H341.169M457.032 255.752H348.976M482.341 508.123H322.298M474.492 429.258H330.636M465.856 342.543H339.803M457.788 265.979H347.898M483.36 518.35H321.216M430.826 175.458V200.464M375.703 175.458V200.464M459.026 200.464V175.458H347.499V200.464M33.7467 828.795L15.3507 843.415L3.00002 863.962M593.334 581.081L601.353 595.424L607.443 644.594L606.139 692.088L609.621 704.279L608.314 713.856L619.194 755.225L624.851 797.458M593.334 581.081L578.535 607.382L577.418 633.853L569.34 656.983M593.334 744.776L599.751 785.271M599.751 785.271L598.443 811.398L609.091 833.604L616.967 868.97M599.751 785.271L583.637 819.408L576.537 828.819L574.203 849.113L567.12 868.97M676.376 814.955L676.428 838.82L685.949 861.592V881.907M446.672 708.134V732.152M424.628 810.84L417.892 794.987V770.415M424.628 810.84L415.676 828.541L407.567 833.618M557.721 737.912L552.966 766.094L542.669 780.364M542.669 780.364L539.894 794.238L532.767 806.918L525.612 830.707M542.669 780.364L520.076 761.777L518.29 749.767M397.821 684.675V749.767L379.994 786.728V800.564L375.1 816.631V852.34L370.664 863.532V879.023M397.821 684.675L366.269 703.973H346.465L335.075 737.912V755.496L312.549 778.035M312.549 816.149V863.865M312.549 840.007L288.7 816.149V795.199L283.522 790.015V754.573M361.247 769.728L337.479 805.797L331.541 840.007L312.549 863.532M227.214 803.621V778.035L217.423 768.242V757.491M170.874 868.841V845.601L154.431 829.149L145.101 808.549L144.088 773.385M144.647 792.673L124.836 811.957L122.196 834.389L103.706 848.655M72.6615 880.029V859.236L83.2329 848.655V820.664L92.424 799.016M566.212 673.348V688.569M358.892 723.99L354.997 734.813M150.397 723.99V745.12M140.498 846.378V859.947L133.038 867.415L133.142 878.398M702.999 838.244L710.616 876.275M499.703 622.662L487.932 648.116L446.672 663.527M462.738 175.458H343.791M462.738 187.961H343.791M403.263 175.458V200.464M433.656 95.2635H464.281V151.686H433.656M433.656 95.2635V151.686M433.656 95.2635H372.87M433.656 151.686H372.87M372.87 95.2635H342.244V151.686H372.87M372.87 95.2635V151.686M445.725 175.458V164.193M361.452 175.458V164.193M403.523 9.16664V3M439.108 583.663H423.313V552.403C423.313 548.18 424.992 544.13 427.975 541.142C430.961 538.154 435.008 536.478 439.229 536.478C443.45 536.478 447.498 538.154 450.484 541.142C453.467 544.13 455.142 548.18 455.142 552.403V569.092M727.506 822.284L774.055 844.799L789 866.235M763.969 839.92L751.261 769.512L739.243 761.496L727.506 717.004L718.014 704.764L712.003 682.531L700.388 690.148L694.776 704.764M694.776 704.764L680.365 715.467M694.776 704.764L698.525 721.057L696.219 734.393V752.866M739.174 761.225L730.07 776.352V793.287M712.107 741.438V761.225L709.294 769.967V793.287M459.026 82.7602H347.499V95.2635H459.026V82.7602ZM459.026 151.69H347.499V164.193H459.026V151.69ZM392.136 16.4854C392.136 14.5455 392.906 12.682 394.276 11.3078C395.646 9.93703 397.505 9.16664 399.448 9.16664H407.078C409.013 9.16664 410.876 9.9405 412.249 11.3078C413.623 12.682 414.389 14.5421 414.389 16.4854C414.389 18.4253 413.619 20.2888 412.249 21.663C410.876 23.0372 409.017 23.8042 407.078 23.8042H399.448C397.509 23.8042 395.646 23.0338 394.276 21.663C392.903 20.2888 392.136 18.4287 392.136 16.4854ZM415.922 462.746C415.922 459.626 417.16 456.635 419.363 454.431C421.565 452.224 424.555 450.985 427.673 450.985C430.787 450.985 433.777 452.227 435.983 454.431C438.189 456.635 439.424 459.622 439.424 462.746V485.823H415.919V462.746H415.922ZM411.347 376.798C411.347 371.568 415.586 367.331 420.812 367.331C426.039 367.331 430.274 371.572 430.274 376.798V395.388H411.344V376.798H411.347ZM409.055 296.923C409.055 293.175 412.09 290.139 415.832 290.139C419.574 290.139 422.609 293.175 422.609 296.923V310.239H409.051V296.923H409.055ZM351.38 552.403C351.38 548.18 353.059 544.13 356.041 541.142C359.028 538.154 363.075 536.478 367.296 536.478C371.517 536.478 375.565 538.154 378.551 541.142C381.534 544.13 383.209 548.18 383.209 552.403V583.663H351.376V552.403H351.38ZM367.102 462.746C367.102 459.626 368.34 456.635 370.542 454.431C372.748 452.224 375.735 450.985 378.853 450.985C381.967 450.985 384.957 452.227 387.163 454.431C389.369 456.635 390.603 459.622 390.603 462.746V485.823H367.098V462.746H367.102ZM376.248 376.798C376.248 371.568 380.49 367.331 385.709 367.331C390.936 367.331 395.175 371.572 395.175 376.798V395.388H376.244V376.798H376.248ZM383.916 296.923C383.916 293.175 386.951 290.139 390.693 290.139C394.436 290.139 397.474 293.175 397.474 296.923V310.239H383.916V296.923Z" stroke="#E1EAF0" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
	</div>
	<div class="container ds_blog_con d-flex">
		<div class="ds_filters d-flex ds_hide">
			<div class="ds_filters_wrap d-flex"></div>
			<button class="btn_outline ds_remove_all_filters"><span>Zrušit všechny filtry</span></button>
		</div>
        <div class="ds_blog_left">
			<?php
				echo ds_get_art();
			?>
		</div>
		<div class="ds_blog_right">
			<div class="ds_search_wrap">
				<div class="ds_search_input_wrap d-flex">
					<input type="text" class="ds_search_input" value="" placeholder="Vyhledat..." autocomplete="true">
					<button class="ds_search_submit"><img src="/wp-content/uploads/2024/03/lupa.svg" alt=""></button>
				</div>
			</div>
			<div class="ds_cats_wrap">
				<h3>Kategorie</h3>
				<?php
					$cats=get_terms(array(
						'taxonomy'=>'category',
						'parent'=>1,
						'hide_empty'=>false
					));
					foreach($cats as $c){
						?>
							<div class="ds_cats_row d-flex">
								<div class="ds_cats_name" data-id="<?php echo $c->term_id;?>"><?php echo $c->name;?></div>
								<div class="ds_cats_count"><?php echo $c->count;?></div>
							</div>
						<?php
					}
				?>
			</div>
			<div class="ds_news_wrap">
				<h3>Nejnovější</h3>
                    <?php
                        $posts=get_posts(array(
                            'post_type'=>'post',
                            'post_status'=>'publish',
                            'numberposts'=>3
                        ));
                        foreach($posts as $p){
                            ?>
                                <div class="ds_post_row">
                                    <a href="<?php get_the_permalink($p->ID);?>" alt="" class=" d-flex">
                                        <div class="ds_item_img"><?php echo get_the_post_thumbnail( $p->ID, 'thumbnail' );?></div>
                                        <div class="ds_item_wrap">
                                            <div class="ds_item_title"><?php echo $p->post_title;?></div>
                                            <div class="ds_item_date"><?php echo get_the_date('j.n Y',$p->ID);?></div>
                                        </div>
                                    </a>
                                </div>
                            <?php
                        }
                    ?>
			</div>
			<div class="ds_tags_wrap">
				<h3>Tagy</h3>
				<?php
					$tags=get_terms(array(
						'taxonomy'=>'post_tag',
						'hide_empty'=>false
					));
					foreach($tags as $c){
						?>
							<div class="ds_tag_wrap">
								<div class="ds_tag_name" data-id="<?php echo $c->term_id;?>"><?php echo $c->name;?></div>
							</div>
						<?php
					}
				?>
			</div>

		</div>
	</div>
</section>
<section class="ds_about_section ds_home_section ds_home_section_vawe ds_home_section_vawe2">
	<figure class="ds_home_section_vawe_w ds_home_section_vawe_1"><img src="/wp-content/uploads/2024/03/Vlnka-1.svg" alt="Vlnka"><img src="/wp-content/uploads/2024/03/Vlnka-1.svg" alt="Vlnka">
		
	</figure>
	<figure class="ds_home_section_vawe_w ds_home_section_vawe_2">
		<img src="/wp-content/uploads/2024/03/Vlnka-2.svg" alt="Vlnka"><img src="/wp-content/uploads/2024/03/Vlnka-2.svg" alt="Vlnka">
	</figure>
	<figure class="ds_home_section_vawe_w ds_home_section_vawe_3">
		<img src="/wp-content/uploads/2024/03/Vlnka-3.svg" alt="Vlnka"><img src="/wp-content/uploads/2024/03/Vlnka-3.svg" alt="Vlnka">
	</figure>
</section>

</section>
<?php get_template_part( 'template-parts/content', 'services');?>
<?php
get_footer();
?>
