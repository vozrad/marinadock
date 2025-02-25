<?php
/*
Template Name: ds_about
description: display about us
autor: draftspot
*/
?>
<?php
get_header();
?>
<section class="ds_about_section ds_archive_section_tax"  style="background-image:url(<?php echo get_field('slider_img');?>);">
	<img src="<?php echo get_field('slider_img_mobil');?>" alt="<?php echo get_the_title();?>" class="ds_archive_section_bg_m">
	<div class="container">
        <div class="ds_about_section_wrap">
			<h1><?php echo get_the_title();?></h1>
		</div>
	</div>
</section>
<section class="ds_about_section ds_about_section_content container-fluid">
	<div class="container">
        <?php the_content();?>
	</div>
</section>
<section class="ds_about_section ds_about_section_gal">

	<div class="ds_lighthouse">
            <svg xmlns="http://www.w3.org/2000/svg" width="527" height="886" viewBox="0 0 527 886" fill="none">
                <path d="M202.304 859.236L217.423 811.957L239.443 793.207L253.42 773.385M593.334 557.039L642.088 602.677M593.334 557.039L582.291 561.873L575.569 570.879L550.323 569.907L543.002 579.072M593.334 557.039V581.081M642.088 602.677L660.963 670.347M642.088 602.677L635.873 627.579L629.89 638.465L631.524 662.413M660.963 670.347L678.267 690.807L684.558 764.769M660.963 670.347L650.017 708.138V762.152L642.088 782.158V842.027M684.558 764.769L725.45 811.978L733.541 852.49M684.558 764.769L681.971 783.883M543.002 579.072L513.524 578.652L498.552 583.639L488.618 572.773M543.002 579.072L535.687 622.048L522.688 639.697L519.438 663.385V712.972L509.692 732.152M488.618 572.773L457.164 582.216M488.618 572.773V593.578L485.611 605.474M457.164 582.216L404.955 648.317M457.164 582.216V627.607L446.672 652.572V672.311M404.955 648.317L366.842 631.004M404.955 648.317V672.311L397.821 684.675M366.842 631.004L296.067 644.594M366.842 631.004V664.947M296.067 644.594L267.755 668.771M296.067 644.594V701.426M267.755 668.771L252.026 708.138M267.755 668.771V699.066M252.026 708.138H238.413L231.306 702.387L223.52 708.138H209.56M252.026 708.138L253.306 772.243M209.56 708.138L190.38 696.405L177.689 683.697L170.323 684.134L152.936 673.494L119.907 708.138L86.5521 732.152L69.5746 785.229M209.56 708.138V734.591L193.717 750.44V799.016M69.5746 785.229L36.5457 811.957L28.683 859.236M69.5746 785.229L61.5316 811.048V833.771M296.067 701.426L284.663 726.63M296.067 701.426L336.619 675.75M150.397 676.159V707.721M120.302 707.721V726.339L109.29 740.619L106.929 772.243M478.907 774.221L474.974 806.918M474.974 806.918L456.103 830.707M474.974 806.918L507.548 838.883L516.42 841.104L525.612 863.532V883M456.103 830.707V863.532M456.103 830.707L441.661 816.725L424.628 810.84M253.306 771.456L255.567 819.456M257.277 830.707V859.236M403.523 31.7406L331.298 82.7602H475.744L403.523 31.7406ZM403.523 31.7406V23.8041M471.363 212.811C471.363 216.08 470.063 219.221 467.749 221.536C465.439 223.854 462.301 225.152 459.026 225.152H347.499C344.228 225.152 341.089 223.854 338.776 221.536C336.463 219.224 335.162 216.084 335.162 212.811M471.363 212.811C471.363 205.121 471.363 220.498 471.363 212.811ZM471.363 212.811C471.363 209.535 470.063 206.398 467.749 204.084C465.436 201.769 462.297 200.468 459.026 200.468H347.499C344.225 200.468 341.086 201.769 338.776 204.084C336.463 206.398 335.162 209.539 335.162 212.811M335.162 212.811C335.162 205.121 335.162 220.498 335.162 212.811ZM454.167 225.152L487.141 556.342M352.212 225.152L310.079 623.692M473.472 419.031H331.715M464.482 332.316H341.169M457.032 255.752H348.976M482.341 508.123H322.298M474.492 429.258H330.636M465.856 342.543H339.803M457.788 265.979H347.898M483.36 518.35H321.216M430.826 175.458V200.464M375.703 175.458V200.464M459.026 200.464V175.458H347.499V200.464M33.7467 828.795L15.3507 843.415L3.00002 863.962M593.334 581.081L601.353 595.424L607.443 644.594L606.139 692.088L609.621 704.279L608.314 713.856L619.194 755.225L624.851 797.458M593.334 581.081L578.535 607.382L577.418 633.853L569.34 656.983M593.334 744.776L599.751 785.271M599.751 785.271L598.443 811.398L609.091 833.604L616.967 868.97M599.751 785.271L583.637 819.408L576.537 828.819L574.203 849.113L567.12 868.97M676.376 814.955L676.428 838.82L685.949 861.592V881.907M446.672 708.134V732.152M424.628 810.84L417.892 794.987V770.415M424.628 810.84L415.676 828.541L407.567 833.618M557.721 737.912L552.966 766.094L542.669 780.364M542.669 780.364L539.894 794.238L532.767 806.918L525.612 830.707M542.669 780.364L520.076 761.777L518.29 749.767M397.821 684.675V749.767L379.994 786.728V800.564L375.1 816.631V852.34L370.664 863.532V879.023M397.821 684.675L366.269 703.973H346.465L335.075 737.912V755.496L312.549 778.035M312.549 816.149V863.865M312.549 840.007L288.7 816.149V795.199L283.522 790.015V754.573M361.247 769.728L337.479 805.797L331.541 840.007L312.549 863.532M227.214 803.621V778.035L217.423 768.242V757.491M170.874 868.841V845.601L154.431 829.149L145.101 808.549L144.088 773.385M144.647 792.673L124.836 811.957L122.196 834.389L103.706 848.655M72.6615 880.029V859.236L83.2329 848.655V820.664L92.424 799.016M566.212 673.348V688.569M358.892 723.99L354.997 734.813M150.397 723.99V745.12M140.498 846.378V859.947L133.038 867.415L133.142 878.398M702.999 838.244L710.616 876.275M499.703 622.662L487.932 648.116L446.672 663.527M462.738 175.458H343.791M462.738 187.961H343.791M403.263 175.458V200.464M433.656 95.2635H464.281V151.686H433.656M433.656 95.2635V151.686M433.656 95.2635H372.87M433.656 151.686H372.87M372.87 95.2635H342.244V151.686H372.87M372.87 95.2635V151.686M445.725 175.458V164.193M361.452 175.458V164.193M403.523 9.16664V3M439.108 583.663H423.313V552.403C423.313 548.18 424.992 544.13 427.975 541.142C430.961 538.154 435.008 536.478 439.229 536.478C443.45 536.478 447.498 538.154 450.484 541.142C453.467 544.13 455.142 548.18 455.142 552.403V569.092M727.506 822.284L774.055 844.799L789 866.235M763.969 839.92L751.261 769.512L739.243 761.496L727.506 717.004L718.014 704.764L712.003 682.531L700.388 690.148L694.776 704.764M694.776 704.764L680.365 715.467M694.776 704.764L698.525 721.057L696.219 734.393V752.866M739.174 761.225L730.07 776.352V793.287M712.107 741.438V761.225L709.294 769.967V793.287M459.026 82.7602H347.499V95.2635H459.026V82.7602ZM459.026 151.69H347.499V164.193H459.026V151.69ZM392.136 16.4854C392.136 14.5455 392.906 12.682 394.276 11.3078C395.646 9.93703 397.505 9.16664 399.448 9.16664H407.078C409.013 9.16664 410.876 9.9405 412.249 11.3078C413.623 12.682 414.389 14.5421 414.389 16.4854C414.389 18.4253 413.619 20.2888 412.249 21.663C410.876 23.0372 409.017 23.8042 407.078 23.8042H399.448C397.509 23.8042 395.646 23.0338 394.276 21.663C392.903 20.2888 392.136 18.4287 392.136 16.4854ZM415.922 462.746C415.922 459.626 417.16 456.635 419.363 454.431C421.565 452.224 424.555 450.985 427.673 450.985C430.787 450.985 433.777 452.227 435.983 454.431C438.189 456.635 439.424 459.622 439.424 462.746V485.823H415.919V462.746H415.922ZM411.347 376.798C411.347 371.568 415.586 367.331 420.812 367.331C426.039 367.331 430.274 371.572 430.274 376.798V395.388H411.344V376.798H411.347ZM409.055 296.923C409.055 293.175 412.09 290.139 415.832 290.139C419.574 290.139 422.609 293.175 422.609 296.923V310.239H409.051V296.923H409.055ZM351.38 552.403C351.38 548.18 353.059 544.13 356.041 541.142C359.028 538.154 363.075 536.478 367.296 536.478C371.517 536.478 375.565 538.154 378.551 541.142C381.534 544.13 383.209 548.18 383.209 552.403V583.663H351.376V552.403H351.38ZM367.102 462.746C367.102 459.626 368.34 456.635 370.542 454.431C372.748 452.224 375.735 450.985 378.853 450.985C381.967 450.985 384.957 452.227 387.163 454.431C389.369 456.635 390.603 459.622 390.603 462.746V485.823H367.098V462.746H367.102ZM376.248 376.798C376.248 371.568 380.49 367.331 385.709 367.331C390.936 367.331 395.175 371.572 395.175 376.798V395.388H376.244V376.798H376.248ZM383.916 296.923C383.916 293.175 386.951 290.139 390.693 290.139C394.436 290.139 397.474 293.175 397.474 296.923V310.239H383.916V296.923Z" stroke="#E1EAF0" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
	</div>
	<div class="ds_krmidlo">
				<svg width="462" height="462" viewBox="0 0 462 462" fill="none" xmlns="http://www.w3.org/2000/svg">
					<g clip-path="url(#clip0_2017_105)">
						<path d="M231.002 365.936C267.046 365.936 300.931 351.9 326.421 326.41C351.905 300.926 365.941 267.041 365.941 230.997C365.941 194.953 351.905 161.064 326.421 135.579C300.931 110.095 267.046 96.0586 231.002 96.0586C194.959 96.0586 161.074 110.095 135.584 135.579C110.1 161.064 96.0637 194.953 96.0637 230.997C96.0637 267.041 110.1 300.926 135.584 326.41C161.074 351.9 194.959 365.936 231.002 365.936ZM102.594 245.261H185.649C186.491 247.937 187.571 250.515 188.852 252.969L130.16 311.661C115.225 293.037 105.342 270.208 102.594 245.261ZM101.808 230.997C101.808 228.135 101.901 225.294 102.087 222.473H184.229C183.727 225.237 183.464 228.089 183.464 230.997C183.464 233.906 183.727 236.752 184.229 239.516H102.087C101.901 236.701 101.808 233.859 101.808 230.997ZM231.002 101.798C233.865 101.798 236.706 101.891 239.527 102.077V184.218C236.763 183.717 233.911 183.454 231.002 183.454C228.094 183.454 225.242 183.717 222.478 184.218V102.077C225.299 101.891 228.14 101.798 231.002 101.798ZM311.671 130.15L252.974 188.847C250.525 187.561 247.947 186.486 245.271 185.639V102.583C270.218 105.332 293.047 115.22 311.671 130.15ZM328.141 145.912L270.084 203.968C266.829 199.262 262.738 195.17 258.032 191.911L316.093 133.854C320.371 137.604 324.395 141.634 328.141 145.912ZM360.197 230.997C360.197 233.859 360.104 236.701 359.918 239.516H277.776C278.278 236.752 278.541 233.906 278.541 230.997C278.541 228.089 278.278 225.237 277.776 222.473H359.918C360.104 225.294 360.197 228.135 360.197 230.997ZM245.271 359.406V276.351C247.947 275.503 250.525 274.429 252.974 273.142L311.671 331.84C293.047 346.77 270.218 356.658 245.271 359.406ZM231.002 360.191C228.14 360.191 225.299 360.098 222.478 359.912V277.771C225.242 278.272 228.094 278.536 231.002 278.536C233.911 278.536 236.763 278.272 239.527 277.771V359.912C236.706 360.098 233.865 360.191 231.002 360.191ZM191.719 245.261C191.037 243.401 190.49 241.485 190.082 239.516C189.508 236.768 189.209 233.916 189.209 230.997C189.209 228.079 189.508 225.227 190.087 222.473C190.49 220.505 191.043 218.588 191.719 216.729C192.143 215.566 192.618 214.419 193.14 213.309C193.987 211.495 194.964 209.759 196.054 208.101C199.205 203.307 203.312 199.195 208.106 196.043C209.765 194.953 211.5 193.977 213.314 193.13C214.424 192.608 215.571 192.133 216.734 191.709C218.593 191.032 220.51 190.48 222.478 190.077C225.232 189.498 228.084 189.198 231.002 189.198C233.921 189.198 236.773 189.498 239.527 190.077C241.495 190.48 243.411 191.032 245.271 191.709C246.434 192.133 247.581 192.608 248.691 193.13C250.505 193.977 252.24 194.953 253.899 196.043C258.693 199.195 262.8 203.307 265.951 208.101C267.041 209.759 268.018 211.495 268.865 213.309C269.387 214.419 269.862 215.566 270.286 216.729C270.962 218.588 271.515 220.505 271.918 222.473C272.497 225.227 272.796 228.079 272.796 230.997C272.796 233.916 272.497 236.768 271.923 239.516C271.515 241.485 270.968 243.401 270.286 245.261C269.867 246.423 269.392 247.57 268.865 248.681C268.018 250.494 267.041 252.235 265.951 253.894C262.8 258.688 258.693 262.795 253.899 265.946C252.24 267.036 250.505 268.013 248.691 268.86C247.581 269.382 246.434 269.857 245.271 270.28C243.411 270.957 241.495 271.51 239.527 271.913C236.773 272.492 233.921 272.791 231.002 272.791C228.084 272.791 225.232 272.492 222.478 271.913C220.51 271.51 218.593 270.957 216.734 270.28C215.571 269.857 214.424 269.382 213.314 268.86C211.5 268.013 209.765 267.036 208.106 265.946C203.312 262.795 199.205 258.688 196.054 253.894C194.964 252.235 193.987 250.494 193.14 248.681C192.613 247.57 192.138 246.423 191.719 245.261ZM191.921 258.026C195.176 262.733 199.267 266.824 203.973 270.079L145.917 328.136C141.639 324.39 137.615 320.361 133.864 316.083L191.921 258.026ZM150.334 331.84L209.031 273.142C211.48 274.429 214.058 275.503 216.734 276.351V359.406C191.787 356.658 168.958 346.77 150.334 331.84ZM316.088 328.136L297.625 309.672L258.032 270.079C262.738 266.824 266.829 262.733 270.084 258.026L328.141 316.083C324.39 320.361 320.366 324.39 316.088 328.136ZM331.845 311.661L273.153 252.969C274.434 250.515 275.514 247.937 276.356 245.261H359.411C356.663 270.208 346.78 293.037 331.845 311.661ZM276.356 216.729C275.509 214.053 274.434 211.475 273.148 209.026L331.845 150.329C346.78 168.952 356.663 191.781 359.411 216.729H276.356ZM216.734 185.639C214.058 186.486 211.48 187.561 209.031 188.847L150.334 130.155C168.958 115.22 191.787 105.332 216.734 102.583V185.639ZM145.912 133.854L203.973 191.911C199.267 195.17 195.176 199.262 191.921 203.968L162.025 174.072L133.864 145.912C137.61 141.634 141.634 137.604 145.912 133.854ZM130.16 150.329L188.857 209.026C187.571 211.475 186.496 214.053 185.649 216.729H102.594C105.342 191.781 115.225 168.952 130.16 150.329Z" fill="#E1EAF0"></path>
						<path d="M461.985 230.315C461.644 221.115 454.168 213.557 444.973 213.107C441.129 212.921 437.42 213.939 434.227 216.057C433.555 216.501 432.843 216.734 432.161 216.734H396.907C394.009 182.358 380.66 150.132 358.404 123.78V123.775L383.331 98.8483C383.811 98.3678 384.477 98.0269 385.247 97.8719C388.703 97.1744 391.844 95.4851 394.339 92.9951C397.811 89.5234 399.676 84.9049 399.583 79.992C399.49 75.0842 397.455 70.5328 393.849 67.1852C387.097 60.9239 376.47 60.8619 369.651 67.0457C366.804 69.6288 364.898 72.9764 364.133 76.727C363.973 77.5122 363.632 78.1838 363.152 78.6643L338.225 103.591C311.873 81.33 279.647 67.9859 245.271 65.0877V29.8342C245.271 29.1523 245.504 28.4445 245.938 27.7884C247.885 24.8489 248.919 21.4341 248.919 17.9108C248.919 12.9979 246.971 8.41553 243.432 5.01106C239.893 1.60143 235.234 -0.170545 230.321 0.0102686C221.12 0.351232 213.562 7.82659 213.112 17.0223C212.926 20.8607 213.944 24.5751 216.062 27.7678C216.372 28.2327 216.739 28.9715 216.739 29.8342V65.0929C182.364 67.9911 150.137 81.3352 123.785 103.596L98.8535 78.6643C98.3731 78.1838 98.0321 77.5226 97.8771 76.7477C97.1797 73.2915 95.4904 70.1505 93.0003 67.6553C89.5287 64.1837 84.9205 62.329 79.9972 62.4117C75.0894 62.5047 70.5381 64.5401 67.1904 68.1461C60.9291 74.8982 60.8671 85.5249 67.051 92.3441C69.634 95.1907 72.9816 97.097 76.7374 97.8615C77.285 97.9752 78.0651 98.2335 78.6747 98.8431L103.606 123.775C81.3507 150.127 68.0015 182.353 65.1033 216.729H29.8343C29.1524 216.729 28.4446 216.496 27.7885 216.062C24.8542 214.115 21.4342 213.081 17.9109 213.081C12.998 213.081 8.41562 215.029 5.01115 218.568C1.60669 222.106 -0.170455 226.761 0.0103589 231.679C0.356488 240.88 7.82668 248.438 17.0224 248.888C17.322 248.903 17.6165 248.908 17.9161 248.908C21.4342 248.908 24.8283 247.891 27.773 245.938C28.238 245.628 28.9767 245.261 29.8395 245.261H65.0982C67.9964 279.641 81.3456 311.862 103.601 338.215L78.6695 363.146C78.1891 363.627 77.5278 363.968 76.7529 364.123C73.2968 364.82 70.1506 366.51 67.6606 369C64.1889 372.471 62.324 377.09 62.417 382.003C62.5099 386.911 64.5454 391.462 68.1513 394.81C71.5558 397.966 75.9418 399.547 80.3279 399.547C84.6467 399.547 88.9656 398.013 92.3494 394.949C95.1959 392.366 97.1022 389.018 97.8668 385.268C97.9805 384.72 98.2388 383.935 98.8484 383.33L123.78 358.399C150.132 380.66 182.359 394.009 216.734 396.907V432.166C216.734 432.848 216.501 433.555 216.067 434.211C214.115 437.146 213.087 440.566 213.087 444.089C213.087 449.002 215.034 453.584 218.573 456.989C221.941 460.233 226.332 462 230.992 462C231.22 462 231.452 462 231.685 461.984C240.885 461.643 248.443 454.168 248.893 444.972C249.079 441.134 248.061 437.42 245.948 434.227C245.638 433.762 245.271 433.023 245.271 432.16V396.907C279.647 394.009 311.873 380.66 338.225 358.399L363.157 383.33C363.637 383.811 363.978 384.477 364.133 385.247C364.831 388.703 366.515 391.844 369.01 394.339C372.399 397.734 376.883 399.588 381.667 399.588C381.781 399.588 381.9 399.588 382.013 399.588C386.921 399.495 391.472 397.46 394.82 393.854C401.086 387.107 401.143 376.475 394.959 369.656C392.376 366.809 389.029 364.903 385.273 364.138C384.725 364.025 383.945 363.766 383.336 363.157L358.404 338.225C380.665 311.868 394.014 279.647 396.912 245.271H432.171C432.853 245.271 433.561 245.504 434.217 245.938C437.151 247.891 440.571 248.919 444.094 248.919C449.007 248.919 453.59 246.971 456.994 243.432C460.404 239.893 462.176 235.239 461.995 230.321L461.985 230.315ZM231.003 70.2384C319.648 70.2384 391.762 142.352 391.762 230.997C391.762 319.643 319.648 391.756 231.003 391.756C142.357 391.756 70.2436 319.637 70.2436 230.997C70.2436 142.357 142.357 70.2384 231.003 70.2384ZM367.212 82.73C368.493 81.4488 369.377 79.7698 369.759 77.8739C370.276 75.327 371.572 73.0539 373.505 71.3026C378.133 67.1025 385.35 67.1439 389.938 71.3956C392.392 73.6738 393.776 76.7631 393.838 80.0953C393.9 83.4326 392.635 86.5684 390.279 88.9293C388.59 90.6187 386.456 91.7655 384.111 92.2356C382.225 92.6179 380.551 93.4962 379.27 94.7774L354.607 119.44C352.716 117.338 350.753 115.276 348.738 113.262C346.718 111.242 344.657 109.284 342.554 107.388L367.217 82.73H367.212ZM218.847 17.3064C219.152 11.0606 224.281 5.98746 230.532 5.75498C233.88 5.62583 237.042 6.8347 239.444 9.14912C241.846 11.4635 243.174 14.5787 243.174 17.916C243.174 20.3079 242.477 22.6223 241.154 24.6164C240.09 26.2179 239.527 28.0209 239.527 29.8394V64.7106C236.696 64.5711 233.859 64.4988 231.008 64.4988C228.156 64.4988 225.315 64.5711 222.484 64.7106V29.8394C222.484 28.0261 221.921 26.2128 220.851 24.6009C219.415 22.4363 218.728 19.9101 218.852 17.3064H218.847ZM77.874 92.2356C75.3271 91.719 73.054 90.4223 71.3027 88.4902C67.1026 83.8614 67.1439 76.6392 71.3957 72.0568C73.6739 69.6029 76.7632 68.2184 80.0954 68.1564C83.4379 68.1047 86.5685 69.3601 88.9294 71.721C90.6187 73.4103 91.7656 75.544 92.2357 77.8894C92.618 79.775 93.4963 81.4488 94.7775 82.73L119.44 107.393C117.338 109.289 115.282 111.242 113.262 113.262C111.247 115.276 109.284 117.338 107.388 119.44L82.7249 94.7825C81.4437 93.5013 79.7647 92.6179 77.8688 92.2356H77.874ZM24.601 241.154C22.4364 242.59 19.9102 243.277 17.3065 243.153C11.0607 242.848 5.98755 237.718 5.75507 231.467C5.63109 228.125 6.83479 224.958 9.14921 222.556C11.4636 220.154 14.5788 218.826 17.9161 218.826C20.308 218.826 22.6224 219.523 24.6165 220.846C26.218 221.91 28.021 222.468 29.8395 222.468H64.7107C64.5712 225.299 64.4989 228.14 64.4989 230.992C64.4989 233.844 64.5712 236.685 64.7107 239.511H29.8395C28.0262 239.511 26.2129 240.074 24.601 241.144V241.154ZM94.7826 379.265C93.5014 380.546 92.618 382.225 92.2357 384.121C91.7191 386.668 90.4224 388.941 88.4903 390.692C83.8615 394.892 76.6393 394.851 72.0569 390.599C69.603 388.321 68.2185 385.232 68.1565 381.899C68.0945 378.562 69.3602 375.426 71.7211 373.065C73.4104 371.376 75.544 370.229 77.8895 369.759C79.7751 369.377 81.4489 368.499 82.7301 367.217L107.393 342.554C109.289 344.662 111.252 346.723 113.267 348.738C115.282 350.753 117.343 352.716 119.446 354.612L94.7878 379.27L94.7826 379.265ZM243.153 444.693C242.848 450.939 237.719 456.012 231.468 456.245C228.12 456.364 224.958 455.165 222.556 452.851C220.154 450.536 218.826 447.421 218.826 444.084C218.826 441.692 219.523 439.378 220.846 437.383C221.91 435.782 222.468 433.979 222.468 432.16V397.289C225.299 397.429 228.141 397.501 230.992 397.501C233.844 397.501 236.68 397.429 239.511 397.289V432.155C239.511 433.969 240.074 435.777 241.144 437.394C242.58 439.558 243.272 442.085 243.143 444.688L243.153 444.693ZM384.126 369.764C386.673 370.281 388.946 371.578 390.697 373.51C394.897 378.138 394.856 385.361 390.604 389.943C388.326 392.397 385.237 393.781 381.905 393.843C378.578 393.921 375.432 392.64 373.071 390.284C371.381 388.595 370.234 386.461 369.764 384.116C369.382 382.235 368.504 380.561 367.223 379.275L342.565 354.617C344.667 352.721 346.729 350.758 348.743 348.743C350.758 346.729 352.721 344.667 354.617 342.565L379.275 367.223C380.556 368.504 382.235 369.387 384.131 369.769L384.126 369.764ZM452.851 239.439C450.536 241.841 447.421 243.169 444.084 243.169C441.692 243.169 439.378 242.471 437.384 241.149C435.782 240.085 433.979 239.527 432.161 239.527H397.294C397.434 236.696 397.506 233.854 397.506 231.003C397.506 228.151 397.434 225.309 397.294 222.478H432.161C433.974 222.478 435.787 221.915 437.399 220.846C439.564 219.41 442.095 218.717 444.694 218.847C450.939 219.151 456.013 224.281 456.245 230.532C456.369 233.875 455.165 237.042 452.851 239.444V239.439Z" fill="#E1EAF0"></path>
						<path d="M231.003 254.379C243.897 254.379 254.384 243.887 254.384 230.997C254.384 218.108 243.897 207.61 231.003 207.61C218.108 207.61 207.621 218.103 207.621 230.997C207.621 243.892 218.108 254.379 231.003 254.379ZM231.003 213.355C240.73 213.355 248.64 221.27 248.64 230.997C248.64 240.725 240.73 248.635 231.003 248.635C221.275 248.635 213.366 240.72 213.366 230.997C213.366 221.275 221.275 213.355 231.003 213.355Z" fill="#E1EAF0"></path>
					</g>
					<defs>
						<clipPath id="clip0_2017_105">
							<rect width="462" height="462" fill="white"></rect>
						</clipPath>
					</defs>
				</svg>
			</div>
    <div class="container">
        <?php
        $gall= get_field('galerie');
        ?>
        <div class="ds_about_gal_wrap">
            <div class="ds_about_gal_col">
                <figure>
                    <img class="lightboxed" src="<?php echo $gall[0]['sizes']['large']?>" data-link="<?php echo $gall[0]['sizes']['2048x2048'];?>"  rel="group2" alt="">
                </figure>

            </div>
            <div class="ds_about_gal_col2">
                <div class="ds_about_gal_row">
                    <figure>
                        <img class="lightboxed" src="<?php echo $gall[1]['sizes']['large']?>" data-link="<?php echo $gall[1]['sizes']['2048x2048'];?>"  rel="group2" alt="">
                    </figure>
                </div>
                <div class="ds_about_gal_row2">
                    <div class="ds_about_gal_subcol">
                        <figure>
                            <img class="lightboxed" src="<?php echo $gall[2]['sizes']['large']?>" data-link="<?php echo $gall[2]['sizes']['2048x2048'];?>"  rel="group2" alt="">
                        </figure>
                    </div>
                    <div class="ds_about_gal_subcol">
                        <figure>
                            <img class="lightboxed" src="<?php echo $gall[3]['sizes']['large']?>" data-link="<?php echo $gall[3]['sizes']['2048x2048'];?>"  rel="group2" alt="">
                        </figure>
                    </div>
                </div>
            </div>

        </div>
	</div>
</section>

<section class="ds_archive_section ds_archive_section_refs container-fluid">
		<div class="container">
			<div class="ds_archive_section_refs_row">
				<div class="ds_archive_section_refs_col">
					<h2><?php echo get_field('bottle_title');?></h2>
					<p><?php echo get_field('bottle_subtitle');?></p>
					<p><?php echo get_field('bottle_text');?></p>
					<a href="<?php echo get_field('bottle_button_link');?>" class="ds_blog_link" alt="Nove lode"><?php echo get_field('bottle_button_text');?><img src="/wp-content/uploads/2024/03/chevron-right.svg" alt="Šipka vpravo"></a>

				</div>
				<div class="ds_archive_section_refs_col">
                    <img src="<?php echo get_field('bottle_image1');?>" class="ds_section_tax_img1" alt="bottle lights">
                    <img src="<?php echo get_field('bottle_image2');?>" class="ds_section_tax_img2" alt="bottle lights">
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
