jQuery(document).ready(function($) {
    "use strict";

    /* ===================
     Page reload
     ===================== */
    $(window).load(function() { // makes sure the whole site is loaded
        $('#status').fadeOut(); // will first fade out the loading animation
        $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
        $('body').delay(350).css({'overflow':'visible'});
    });

    /* ===================
     Header sticky, transparent
     ===================== */
    ( function() {
        if($(window).width() > 991){
            if (jQuery("body").hasClass('header-normal')) {
                // Do Nothing
            } else {
                if (jQuery("body").hasClass('header-transparent')) {
                    jQuery('body').css('padding-top', '0');
                } else {
                    jQuery('body').css('padding-top', jQuery('.site-header').height());
                }

                jQuery(window).scroll(function(){

                    if(jQuery(document).scrollTop() > 55) {
                        jQuery('.site-header').addClass('header-fixed');
                        if (jQuery("body").hasClass('header-sticky')) {
                            // Do Nothing
                        } else {
                            jQuery('.site-header').css('top', -jQuery('.site-header').height());
                        }
                    } else {
                        jQuery('.site-header').removeClass('header-fixed');
                        if (jQuery("body").hasClass('header-sticky')) {
                            // Do Nothing
                        } else {
                            jQuery('.site-header').css('top', 0);
                        }
                    }
                });
            }
        } else {
            jQuery('.site-header').addClass('header-mobile');
        }
    })();


    /* ===================
     responsive video
     ===================== */
    $(document.body).fitVids();

    var height = $('.site-header').height();

    (function(){
        $('.has-header-sticky .header-transparent').each(function(e) {
            $('body').css({'padding-top': height});
        });
    })();

    /* ===================
     Search Toggle
     ===================== */
    var openSearch = $('.open-search'),
        SearchForm = $('.form-search'),
        closeSearch = $('.close-search');

    openSearch.on('click', function(event){
        event.preventDefault();
        openSearch.css({'display': 'none'});
        closeSearch.css({'display': 'block'});
        if (!SearchForm.hasClass('show')) {
            SearchForm.fadeIn(300, function(){
                SearchForm.addClass('show');
            });
        }
    });


    closeSearch.on('click', function(event){
        event.preventDefault();
        closeSearch.css({'display': 'none'});
        openSearch.css({'display': 'block'});
        SearchForm.fadeOut(300, function(){
            SearchForm.removeClass('show');
        });
    });

    /* ================
     Counter Up
     ================== */
    $('.counter').counterUp({
        delay: 100,
        time: 800
    });

    /* ================
     sticky nav
     ================== */
    //$(".header-sticky").sticky({topSpacing:0});

    /* =================
     Carousel
     =================== */
    $(".st-carousel").each(function() {

        // VC 4.4 adds an empty div .vc_row-full-width somehow, get rid of them
        $(this).find('> .vc_row-full-width').remove();

        $(this).owlCarousel({
            margin:parseInt($(this).attr('data-margin')),
            responsiveClass:true,
            loop: $(this).attr('data-loop') === 'true' ? true : false,
            nav: $(this).attr('data-nav') === 'true' ? true : false,
            navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
            dots: $(this).attr('data-dots') === 'true' ? true : false,
            autoPlay : $(this).attr('data-autoplay') === 'false' ? false : $(this).attr('data-autoplay'),
            responsive:{
                0:{
                    items:parseInt($(this).attr('data-xsmall-items'))
                },
                768:{
                    items:parseInt($(this).attr('data-small-items'))
                },
                992:{
                    items:parseInt($(this).attr('data-medium-items'))
                },
                1200:{
                    items:parseInt($(this).attr('data-large-items'))
                }
            }
        });
    });

    /* =====================
     Progress Bar
     ======================= */
    $(".progress-bar").each(function(){
        $(this).waypoint(function() {
            $(this).progressbar();
        },{
            offset: '95%',
            triggerOnce: true
        });
    });

    $('.st-grid').each(function(){
		var $this = $(this);
        var $filter = $this.parent().find('.st-grid-filter');
		var $sizer = $this.find('.shuffle_sizer');
		$this.shuffle({
			itemSelector:'.st-grid-item',
			sizer: $sizer
		});
        if($filter){
            $filter.find('a').click(function(e){
                e.preventDefault();
                // set active class
                $('.st-grid-filter a').removeClass('active');
                $(this).addClass('active');

                // get group name from clicked item
                var groupName = $(this).attr('data-group');
                // reshuffle grid
                $(this).parent().parent().parent().parent().parent().find('.st-grid').shuffle('shuffle', groupName );
            });
        }
    });

    /* ====================
     Scroll To Top
     ====================== */
    /* Check to see if the window is top if not then display button */
    $(window).scroll(function(){
        if ($(this).scrollTop() > 1000) {
            $('.scroll_top').fadeIn();
        } else {
            $('.scroll_top').fadeOut();
        }
    });
    /* Click event to scroll to top */
    $('.scroll_top').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });

    /* ====================
     magnificPopup
     ====================== */
    $('.image-popup').magnificPopup({
        type: 'image'
    });

    $('.gallery-popup-wrap').magnificPopup({
        delegate: 'a.gallery-popup',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
        }
    });

    /* ===============================================
     Remove empty p tag form visual composer
     ================================================= */
    $('.site-row > p').each(function() {
        var $this = $(this);
        if($this.html().replace(/\s|&nbsp;/g, '').length == 0)
            $this.remove();
    });

    /* ====================
     Background parallax
     ====================== */
    $('.parallax').parallax();

});