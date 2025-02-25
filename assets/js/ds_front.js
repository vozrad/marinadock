jQuery(document).ready(function($) {

    var header = $("#masthead");
    var height = $('.ds_header_top_bar').outerHeight();
    var w2 = '';
    if($('.ds_home_section_vawe2').length){
        setTimeout(function(){
            w2 = $('.ds_home_section_vawe2').offset().top - $(window).height();
        }, 200);
    }
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        if (scroll > height) {
            header.addClass("smallHeader");
        } else {
            header.removeClass("smallHeader");
        }

        if(($('.ds_home_section_vawe2').length) && (w2 < scroll)){
            $('.ds_home_section_vawe2').addClass('active');
        }
    });


    $('#nav-icon3').click(function(){
        $(this).toggleClass('open');
        header.toggleClass('headerOpen');
        $('html').toggleClass('scroll');
        $('.navbar').toggleClass('ds_navbar_open');
    });
	if ($(window).width() > 991) {
		$('#masthead .ds_wrapper_menu_main .navbar #main-nav ul li ul').each(function(){
		   $(this).prepend('<li class="ds_less_wrap"><img src="/wp-content/uploads/2024/03/Expand_Less.svg" alt="arrow less"></li>')
		   let wx=$(this).width();
		   let wx2=$(this).closest('li').width();
		   if(wx>wx2){
			   $(this).css('left',(wx/2 * -1)+'px');
		   }else{
			   $(this).css('min-width',wx2+'px');
		   }
		   $('body').on('click','#masthead .ds_wrapper_menu_main .navbar #main-nav ul li#menu-item-103 li>a',function(e){
			   e.preventDefault();
			   let href=$(this).attr('href');
			   window.location.href = href;
		   })
		   $('body').on('click','#masthead .ds_wrapper_menu_main .navbar #main-nav ul li#menu-item-103>a',function(e){
            e.preventDefault();
			   let top=$('#sluzby').offset().top-50;
			   $('html, body').animate({
				  scrollTop: parseInt(top)
				}, 500);
		   })
	   })

	}
    if ($(window).width() < 992) {

    }
    $('#masthead .ds_wrapper_menu_main .navbar #main-nav ul li#menu-item-90>a').attr('href','/kategorie-produktu/skladem/');
    $('#masthead .ds_wrapper_menu_main .navbar #main-nav ul li#menu-item-103>a').attr('href','#sluzby');
    if ($(window).width() > 991) {
        $('body').on('mouseenter','#masthead .ds_wrapper_menu_main .navbar #main-nav ul li.menu-item-has-children',function(){
            $('#masthead .ds_wrapper_menu_main .navbar #main-nav ul li.menu-item-has-children ul').removeClass('active');
            $(this).find('ul').addClass('active');
        })
        $('body').on('mouseleave','#masthead .ds_wrapper_menu_main .navbar #main-nav ul li.menu-item-has-children ',function(){
            $(this).find('ul').removeClass('active');
        })
    }
    if ($(window).width() <= 991) {
       $('.ds_wrapper_menu_main ul li a').click(function(){
           $('.navbar').removeClass('ds_navbar_open');
           $('#nav-icon3').removeClass('open');
           $('html').removeClass('scroll');
       })

       $('<div class="trigger"></div>').insertAfter('#masthead .ds_wrapper_menu_main .navbar #main-nav .navbar-nav > li.dropdown > a');

       $('.trigger').click(function(){
        if(!($(this).hasClass('active'))){
            $('.dropdown-menu').removeClass('open');
            $('.dropdown-toggle').removeClass('open');
            $('.trigger').removeClass('active');
            $(this).addClass('active');
            $(this).next().addClass('open');
            $(this).prev().addClass('open');
        } else{
            $(this).toggleClass('active');
            $(this).next().toggleClass('open');
            $(this).prev().toggleClass('open');
        }
       })
    }

    /*search*/

    $('body').on('click', '.openSearch', function(){
        $('.ds_search_form_wrapper').addClass('ds_search_active');
    })

    $('body').on('click', '.ds_header_search_close', function(){
        $('.ds_search_form_wrapper').removeClass('ds_search_active');
    })
    $('body').on('change', '.ds_header_search_input', function(){
        $('#ds_header_search_button').attr('data-s',$(this).val());
    })
    $('body').on('click', '.ds_header_search_button', function(){
        let s=$('#ds_header_search_input').val();
        if(s){
          window.location.replace("/vysledky-hledani/?search="+s);
        }
    })

    /* blog */
    let cid=$('.ds_archive_header').attr('data-cid');
    let tax=$('.ds_archive_header').attr('data-tax');
    let page=1;
    let order='DESC';
    let orderby='date';
    $('body').on('click', '.ds_archive_filter_cats_item', function(){
        page=1;
        cid=$(this).attr('data-cid');
        $('.ds_archive_filter_cats_item').removeClass('active');
        $(this).addClass('active');
        ds_get_shop();
    })
    $('body').on('click', '.ds_btn_more', function(){
        page=$(this).attr('data-page');
        ds_get_shop();
    })

    function ds_get_shop(){
        $.ajax(
            {
                url:ajax_url,
                type:"POST",
                data: {action:"ds_get_post", tax:tax,cid:cid,page:page,order:order,orderby:orderby},
                beforeSend: function() {
                    $(".dot-preloader-overlay").removeClass('d-none');
                 },
                 complete: function (response) {
                     $(".dot-preloader-overlay").addClass('d-none');
                 },
                success: function(response) {
                    if(response){
                        $('.ds_btn_more_wrapper').remove();
                        if(page==1){
                            $('.ds_archive_content').html(response);
                        }else{
                            $('.ds_archive_content').append(response);
                        }
                    }else{

                    }

                }
            });
    }
    /* faq */
    $('body').on('click', '.accordion_header', function(){
        let target=$(this).attr('data-target');
            let panel=$('.accordion_panel[data-target='+target+']');
            let wrapper=$('.accordion_body[data-target='+target+']');
            //console.log(panel.height());
            if (wrapper.css('max-height')!='0px') {
                wrapper.css('max-height','0px');
                $(this).removeClass('ds_tab_desc_more_less');
            } else {
                wrapper.css('max-height',panel.height() + "px");
                $(this).addClass('ds_tab_desc_more_less');
            }
    })

    /* single swiper */

    let  swiper_single = new Swiper(".single_slider", {
        slidesPerView: 2,
        spaceBetween: 20,
        loop: true,
        grabCursor: true,
        keyboard: {
            enabled: true,
          },
        pagination: {
            el: ".swiper-pagination_single",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next_single",
            prevEl: ".swiper-button-prev_single",
        },
        breakpoints: {
            400: {
                slidesPerView: 2,
                spaceBetween: 20,
            },

            640: {
              slidesPerView: 2,
              spaceBetween: 20,
            },
            768: {
              slidesPerView: 2,
              spaceBetween: 30,
            },
            800: {
              slidesPerView: 2,
              spaceBetween: 30,
            },
            1024: {
              slidesPerView: 4,
              spaceBetween: 30,
            },
        },
    });

    /*archive products*/
    function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return typeof sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
        return false;
    };
    if($('body').hasClass('tax-product_cat') || $('body').hasClass('page-template-ds_blog')){
        let cat=$('.ds_archive_section_filters').attr('data-cat');
        let tag=0;
        let state=0;
        let power=0;
        let page=1;
        let type=cat;
        let catName=$('.ds_cats_filter_item:first-child').attr('data-name');
        let powerName=0;
        let search='';

        if($('body').hasClass('term-skladem')){
            $('body').on('click', '.ds_cats_filter_state', function(){
                state=$(this).attr('data-id');
                page=1;
                $('.ds_cats_filter_state').removeClass('active');
                $(this).addClass('active');
                console.log(state);
                ds_refresh_products();
            })
            $('body').on('click', '.ds_cats_filter_item', function(){
                cat=$(this).attr('data-id');
                page=1;
                catName=$(this).attr('data-name');
                let name=catName;
                if(power){
                    name=catName+' - '+powerName;
                }
                $('.ds_products_list_name').text(name);
                $('.ds_cats_filter_item').removeClass('active');
                $(this).addClass('active');
                if($('body').hasClass('term-skladem')){
                    ds_refresh_products();
                }
                if($('body').hasClass('term-nove-lode')){
                    $('.ds_subcats_filter_wrap').removeClass('open');
                    $('.ds_subcats_filter_wrap[data-id='+cat+']').addClass('open');
                }
                if($('body').hasClass('term-nove-skutry')){
                    if(name=='all'){
                        $('.ds_jet_cat_wrapper').removeClass('hide');
                    }else{
                        $('.ds_jet_cat_wrapper').addClass('hide');
                        $('.ds_jet_cat_wrapper[data-cat='+cat+']').removeClass('hide');
                    }
                }
                ds_refresh_products();
            })
        }
        if($('body').hasClass('term-nove-lode') || $('body').hasClass('term-nove-skutry')){
            $('body').on('click', '.ds_cats_filter_state', function(){
                cat=$(this).attr('data-id');
                page=1;
                $('.ds_cats_filter_state').removeClass('active');
                $(this).addClass('active');
                $('.ds_subcats_filter_wrap').removeClass('open');
                $('.ds_subcats_filter_wrap[data-id='+cat+']').addClass('open');
                ds_refresh_products();
            })
            $('body').on('click', '.ds_cats_filter_item', function(){
                cat=$(this).attr('data-id');
                page=1;
                catName=$(this).attr('data-name');
                let name=catName;
                if(power){
                    name=catName+' - '+powerName;
                }
                $('.ds_products_list_name').text(name);
                $('.ds_cats_filter_item').removeClass('active');
                $(this).addClass('active');
                if($('body').hasClass('term-skladem')){
                    ds_refresh_products();
                }
                if($('body').hasClass('term-nove-lode')){

                }
                if($('body').hasClass('term-nove-skutry')){
                    if(name=='all'){
                        $('.ds_jet_cat_wrapper').removeClass('hide');
                    }else{
                        $('.ds_jet_cat_wrapper').addClass('hide');
                        $('.ds_jet_cat_wrapper[data-cat='+cat+']').removeClass('hide');
                    }
                }
                console.log(cat);
                ds_refresh_products();
            })
        }
        if($('body').hasClass('term-nove-motory')){
            /*$('body').on('click', '.ds_cats_filter_item', function(){
                cat=$(this).attr('data-id');
                page=1;
                catName=$(this).attr('data-name');
                let name=catName;
                if(power){
                    name=catName+' - '+powerName;
                }
                $('.ds_products_list_name').text(name);
                $('.ds_cats_filter_item').removeClass('active');
                $(this).addClass('active');
                ds_refresh_products();
            })*/
        }

        $('body').on('click', '.ds_subcats2_filter_item', function(){
            cat=$(this).attr('data-id');
            catName=$(this).attr('data-name');
            if(cat!=0){
                let name=catName;
                $('.ds_products_list_name').text(name);
            }
            page=1;
            $('.ds_subcats2_filter_item').removeClass('active');
            $(this).addClass('active');
            ds_refresh_products();
        })

        $('body').on('click', '.ds_subcats_filter_item', function(){
            cat=$(this).attr('data-id');
            let name=$(this).attr('data-name');
            $('.ds_subcats_filter_item').removeClass('active');
            $(this).addClass('active');
            console.log(name);
            if(name=='all'){
                $('.ds_boat_cat_wrapper').removeClass('hide');
            }else{
                $('.ds_boat_cat_wrapper').addClass('hide');
                $('.ds_boat_cat_wrapper[data-cat='+cat+']').removeClass('hide');
            }

        })
        $('body').on('click', '.ds_pagNum', function(){
            page=$(this).attr('data-page');
            ds_refresh_products();
        })

        if(getUrlParameter('cat')){
            cat=getUrlParameter('cat');
            let name=$('.ds_cats_name[data-id='+cat+']').text();
            ds_add_filter('cat',name);
            ds_refresh_products();
        }
        if(getUrlParameter('tag')){
            tag=getUrlParameter('tag');
            let name=$('.ds_tag_name[data-id='+tag+']').text();
            ds_add_filter('tag',name);
            ds_refresh_products();
        }
        if(getUrlParameter('search')){
            search=getUrlParameter('search');
            ds_add_filter('search',search);
            ds_refresh_products();
        }
        $('body').on('click', '.ds_cats_name', function(){
            page=1;
            cat=$(this).attr('data-id');
            let name=$(this).text();
            $('.ds_cats_name').removeClass('active');
            $(this).addClass('active');
            ds_add_filter('cat',name);
            ds_refresh_products();

        })
        $('body').on('click', '.ds_tag_name', function(){
            page=1;
            tag=$(this).attr('data-id');
            let name=$(this).text();
            $('.ds_tag_name').removeClass('active');
            $(this).addClass('active');
            ds_add_filter('tag',name);
            ds_refresh_products();

        })

        $('body').on('change paste keyup', '.ds_search_input2', function(){
            let val=$(this).val();
            $('.ds_search_submit2').attr('href',val);
            console.log(val);
        })

        $('body').on('click', '.ds_search_submit', function(){
            page=1;
            search=$('.ds_search_input').val();
            ds_add_filter('search',search);
            ds_refresh_products();

        })
        function ds_add_filter(type,value){
            $('.filter-tag[data-id='+type+']').remove();
            let html='<div class="filter-tag" data-id="'+type+'"><span class="filter-tag-txt">';
            if(type=='search'){
                html+='<span>Hledání:</span> "'+value+'"';
            }else{
              html+=value;
            }

            html+='</span><button class="btn_cancel" data-id="'+type+'"></button></div>';
            $('.ds_filters_wrap').append(html);
            $('.ds_filters').removeClass('ds_hide');
        }
        $('body').on('click', '.ds_filters .btn_cancel', function(){
            let type=$(this).attr('data-id');
            $('.filter-tag[data-id='+type+']').remove();
            if(!$('.filter-tag').length){
                $('.ds_filters').addClass('ds_hide');
            }
            switch(type){
                case 'cat':
                    cat=0
                    break;
                case 'tag':
                    tag=0
                    break;
                case 'search':
                    search=''
                    break;
            }
            ds_refresh_products();
        })
        $('body').on('click', '.ds_filters .ds_remove_all_filters', function(){
            cat=0;
            tag=0;
            search=0;
            $('.filter-tag').remove();
            $('.ds_filters').addClass('ds_hide');
            ds_refresh_products();
        })
        function ds_refresh_products(){
            let action="ds_refresh_products";
            if(type==17){
                action="ds_refresh_boat"
            }
            if(type==18){
                action="ds_refresh_jet"
            }
            if(type==19){
                action="ds_refresh_eng"
            }
            if($('body').hasClass('page-template-ds_blog')){
                action="ds_refresh_art"
            }
            $.ajax(
                {
                    url:ajax_url,
                    type:"POST",
                    data: {action:action,cat:cat,tag:tag,state:state,page:page,power:power,search:search},
                    beforeSend: function() {
                        $(".dot-preloader-overlay").removeClass('d-none');
                     },
                    success: function(response) {
                        $(".dot-preloader-overlay").addClass('d-none');
                        if(response){
                            if($('body').hasClass('page-template-ds_blog')){
                                $(".ds_blog_left").html(response);
                            }else{
                                $(".ds_products_list").html(response);
                            }

                        }

                    }
                });
        }
    }

    //home
    let  swiper_depo = new Swiper(".slider_depo", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: false,
        grabCursor: true,
        keyboard: {
            enabled: true,
          },
        pagination: {
            el: ".swiper-pagination-depo",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next-depo",
            prevEl: ".swiper-button-prev-depo",
        },
        breakpoints: {
            400: {
                slidesPerView: 1,
                spaceBetween: 20,
            },

            640: {
              slidesPerView: 1,
              spaceBetween: 20,
            },
            768: {
              slidesPerView: 1,
              spaceBetween: 30,
            },
            800: {
              slidesPerView: 1,
              spaceBetween: 30,
            },
            1024: {
              slidesPerView: 1,
              spaceBetween: 30,
            },
        },
    });
    let  swiper_ref = new Swiper(".slider_ref", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: false,
        grabCursor: true,
        keyboard: {
            enabled: true,
          },
        pagination: {
            el: ".swiper-pagination-ref",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next-ref",
            prevEl: ".swiper-button-prev-ref",
        },
        breakpoints: {
            400: {
                slidesPerView: 1,
                spaceBetween: 20,
            },

            640: {
              slidesPerView: 1,
              spaceBetween: 20,
            },
            768: {
              slidesPerView: 1,
              spaceBetween: 30,
            },
            800: {
              slidesPerView: 1,
              spaceBetween: 30,
            },
            1024: {
              slidesPerView: 1,
              spaceBetween: 30,
            },
        },
    });

    $('body').on('click','.ds_slider_content_wrap a',function(e){
        e.preventDefault();
        let href=$(this).attr('href');
        console.log(href);
        let top=$(href).offset().top-50;
        $('html, body').animate({
          scrollTop: parseInt(top)
        }, 500);
      })
      //product detail
    if($('body').hasClass('single-product')){
        $('body').on('click', '.ds_params_nav_item', function(){
            target=$(this).attr('data-target');
            $('.ds_params_nav_item').removeClass('active');
            $(this).addClass('active');
            $('.ds_params_tab_item').removeClass('active');
            $('.ds_params_tab_item[data-target='+target+']').addClass('active');
        })
        let  swiperT = new Swiper(".slider_galT", {
            slidesPerView: 2,
            spaceBetween: 12,
            loop: false,
            grabCursor: true,
            keyboard: {
                enabled: true,
              },
            navigation: {
                nextEl: ".swiper-button-next-gal_nav",
                prevEl: ".swiper-button-prev-gal_nav",
            },
            breakpoints: {
                576: {
                    slidesPerView: 2,
                    spaceBetween: 16,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                992: {
                    slidesPerView: 4,
                    spaceBetween: 25,
                },
                1200: {
                    slidesPerView: 6,
                    spaceBetween: 35,
                },
            },
        });
        let  gal_ref = new Swiper(".slider_gal", {
            slidesPerView: 1,
            spaceBetween: 30,
            keyboard: {
                enabled: true,
              },
            navigation: {
                nextEl: ".swiper-button-next-gal",
                prevEl: ".swiper-button-prev-gal",
            },
            thumbs: {
              swiper: swiperT,
            },
        });
        let  ship_ref = new Swiper(".slider_ship", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: false,
            grabCursor: true,
            keyboard: {
                enabled: true,
              },
            pagination: {
                el: ".swiper-pagination-ship",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next-ship",
                prevEl: ".swiper-button-prev-ship",
            },
        });
    }

    $('body').on('click','.ds_vybava_con_nav',function(){
        $('.ds_vybava_con_tab').addClass('open');
        console.log('YES');
    })
    $('body').on('click','.ds_vybava_con_del',function(){
        $('.ds_vybava_con_tab').removeClass('open');
        console.log('NOE');
    })
	//form
    $('body').on('click','.ds_submit_div',function(e){
        e.preventDefault();
        let res=ds_validate_form(1);
        console.log(res);
    })
    $('body').on('change','input.ds_required',function(e){
        e.preventDefault();
        let check=ds_validate_form();
        if(!check){
            setTimeout(function(){
                $('.ds_submit_wraper').html('<input type="submit" class="ds_submit_btn btn" value="Odeslat">');
            }, 200);
        }else{
            $('.ds_submit_wraper').html('<div class="ds_submit_div btn">Odeslat</div>');
        }
    })
    function ds_validate_form(type){
        let check=0;
        $('label').removeClass('no_validate');
        $('input.ds_required[type=text]').each(function(){
            if(!$(this).val()){
                check++;
                if(type){
                    $(this).closest('label').addClass('no_validate');
                    //$(this).closest('label').append('<p class="red_text">Toto pole je povinné...</p>');
                }
            }
        })
        if($('#gdpr').prop('checked')==false){
            check++;
            if(type){
                $('#gdpr').closest('label').addClass('no_validate');
                //$('#gdpr').closest('label').append('<p class="red_text">Toto pole je povinné...</p>');
            }
        }
        let validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if(!validRegex.test($('.ds_form_email').val())){
            check++;
            if(type){
                $(this).closest('label').addClass('no_validate');
                $(this).closest('label').append('<p class="red_text">Zadaný e=mail není platný...</p>')
            }
        }
        return check;
    }


	$('body').on('submit','#orderForm',function(e){
        e.preventDefault();
        let resArr = $(this).serializeArray();
        let data=JSON.stringify(resArr);
        console.log(resArr);
        $.ajax(
          {
              url:ajax_url,
              type:"POST",
              data: {action:"ds_send_form",data:data},
              beforeSend: function() {
                 $(".dot-preloader-overlay").removeClass('d-none');
              },
              complete: function() {
                  $(".dot-preloader-overlay").addClass('d-none');
              },
              success: function(response) {
                  if(response){
                        $('.ds_submit_wraper').html('<div class="ds_submit_div btn">Odeslat</div>');
                        $(".ds_submit_wrapper").append(response);
                        $('#orderForm input[type=checkbox]').each(function(){
                            $(this).prop('checked',false);
                        })
                        $('#orderForm input[type=text]').each(function(){
                            $(this).val('');
                        })
                        $('#orderForm textarea').each(function(){
                            $(this).val('');
                        })

                  }

              }
          });
      })

    //end jQuery
})
