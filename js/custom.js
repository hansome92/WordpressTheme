widthClassOptions = [];
var widthClassOptions = ({
	bestseller            : 'topsellers_default_width',		
	featured              : 'featured_default_width',
	special               : 'special_default_width',
	latest      	      : 'latest_default_width',
	recentlyview          : 'recentlyview_default_width',
	brand	              : 'brand_default_width',
	thumblist 			  : 'thumblist_default_width',
	module				  : 'grid_default_width',
	shop				  : 'shop_default_width',
	upsells               : 'upsells_default_width',
	related 			  : 'related_default_width',
	crosssells			  : 'crosssells_default_width'		
});
itemClassOptions = [];
var itemClassOptions = ({
	bestseller            : 3,		
	featured              : 3,
	special               : 3,
	latest      	      : 3,
	recentlyview          : 3,
	brand	              : 3,
	thumblist 			  : 3,
	module				  : 3,
	shop				  : 3,
	upsells               : 3,
	related 			  : 3,
	crosssells			  : 3		
});
jQuery(document).ready(function() {		
	jQuery(".nav-menu > li.menu-item-has-children").addClass("dropdown");

    jQuery("li.dropdown").hover(function(){
        jQuery(this).addClass("hover");
       // jQuery('body').find('.dropdown-backdrop').addClass('in');

    }, function(){
        jQuery(this).removeClass("hover");
       // jQuery('body').find('.dropdown-backdrop').removeClass('in');
    });

    jQuery("#pa_size").change(function() {
    	alert("c");
    });

	jQuery( "<div class='article-border'></div>" ).prependTo( jQuery( "article.post" ) );
	jQuery(".woocommerce div#container").wrap("<div class='shop-page'><div id='primary' class='site-content'></div></div>");
	jQuery("ul.products li").wrapInner("<div class='product_block'></div>");		
	jQuery('input[type="checkbox"]').tmMark(); 
	jQuery('input[type="radio"]').tmMark();
	jQuery('select.orderby').customSelect();
	jQuery('select#pa_size').customSelect();
	jQuery('select#pa_color').customSelect();
	jQuery('select#calc_shipping_country').customSelect();
	jQuery('.widget_categories select').customSelect();
	jQuery('.widget_archive select').customSelect();
	jQuery(".customNavigation").hide();
	jQuery('br', '.cart-collaterals .products').remove(); 
	jQuery('br', '.gallery-item p').remove(); 
	jQuery('.related.products > ul').attr('id', 'related_porducts');
	jQuery(".search-submit, #searchsubmit").val("");
	
	jQuery(".nav-menu:first > li").each(function(i){
	    jQuery(this).addClass("menu" + (i+1));
 	 });  
	//=================== Show or hide Go Top button ========================//
	jQuery(window).scroll(function() {
		if (jQuery(this).scrollTop() > 200) {
			jQuery('.go-top').fadeIn(200);
		} else {
			jQuery('.go-top').fadeOut(200);
		}
	});	
	
			
	//=================== Animate the scroll to top ========================//
	jQuery('.go-top').click(function(event) {
		event.preventDefault();		
		jQuery('html, body').animate({scrollTop: 0}, 300);
	});	
	
	/* Toggle */
	(function ($) {	
		$('.togg a.tog').click(function (i) { 
			var dropDown = $(this).parent().find('.tab_content');
			
			$(this).parent().find('.tab_content').not(dropDown).slideUp();
			
			if ($(this).hasClass('current')) { 
				$(this).removeClass('current');
			} else { 
				$(this).addClass('current');
			}
			
			dropDown.stop(false, true).slideToggle().css( { display : 'block' } );
			
			i.preventDefault();
		} );
	} )(jQuery);
	
	/*(function ($) {		
	$('body').click(function (i) {
			$('.tab_content').slideUp();
		} );
	} )(jQuery);*/

	/* Accordion */
	(function ($) { 
		$('.accordion a.tog').click(function (j) { 
			var dropDown = $(this).parent().find('.tab_content');
			
			$(this).parent().parent().find('.tab_content').not(dropDown).slideUp();
			
			if ($(this).hasClass('current')) { 
				$(this).removeClass('current');
			} else { 
				$(this).parent().parent().find('.tog').removeClass('current');
				$(this).addClass('current');
			}
			
			dropDown.stop(false, true).slideToggle().css( { display : 'block' } );
			
			j.preventDefault();
		} );
	} )(jQuery);

	/* Tabs */
	(function ($) { 
		$('.tab ul.tabs li:first-child a').addClass('current');
		$('.tab .tab_content div.tabs_tab:first-child').show();
		
		$('.tab ul.tabs li a').click(function (g) { 
			var tab = $(this).parent().parent().parent(), 
				index = $(this).parent().index();
			
			tab.find('ul.tabs').find('a').removeClass('current');
			$(this).addClass('current');
			
			tab.find('.tab_content').find('div.tabs_tab').not('div.tabs_tab:eq(' + index + ')').slideUp();
			tab.find('.tab_content').find('div.tabs_tab:eq(' + index + ')').slideDown();
			
			g.preventDefault();
		} );
	} )(jQuery);
	
	/* Tour */
	(function ($) { 
		$('.tour_content ul.tour li:first-child').addClass('current');
		$('.tour_content div.tour_box:first').show();
		
		$('.tour_content ul.tour li a').click(function (f) { 
			var tour = $(this).parent().parent().parent().parent(), 
				index = $('ul.tour li').index($(this).parent());
			
			tour.find('ul.tour').find('li').removeClass('current');
			$(this).parent().addClass('current');
			
			tour.find('div.tour_box').not('div.tour_box:eq(' + index + ')').slideUp();
			tour.find('div.tour_box:eq(' + index + ')').slideDown();
			
			f.preventDefault();
		} );
	} )(jQuery);
	
		
	// Responsive Open Menu
	var $responsive_menu = jQuery.noConflict(); 
	$responsive_menu(".nav-button").click(function () {
		$responsive_menu(".nav-button, .primary-nav").toggleClass("open");
	});	
	
	jQuery(".products_block").each(function() {
		var objectID = jQuery(this).attr('id');	
		jQuery("#porduct_thumbs").addClass("products");
		var porducts_count = jQuery("#" + objectID + " ul.products li").length;
		var item_count = itemClassOptions[objectID];
		jQuery("div.products").addClass("block_content");
		if(porducts_count > 0)
		{
			if(porducts_count > item_count)
			{			
				jQuery("#" + objectID + " .customNavigation").show();
				jQuery("#" + objectID + " ul.products").attr("id", objectID + "-carousel");					
				jQuery("#" + objectID + " ul.products").addClass("product-carousel");
				jQuery("#" + objectID + " ul.products li").addClass("slider-item");				
			}else{
				jQuery("#" + objectID + " .customNavigation").hide();
				jQuery("#" + objectID + " ul.products").attr("id", objectID + "-grid");
				jQuery("#" + objectID + " ul.products").addClass("product_list");
				jQuery("#" + objectID + " ul.products li").addClass("product-list-item");
			}		
		}
	});
	
	jQuery(".shop ul.products").addClass("product_list");
	jQuery(".shop ul.products").attr("id","shop-grid");
	jQuery(".shop ul.products").wrap("<div class='products_block'></div>");	
	jQuery( "<span style='display: none; visibility: hidden;' class='shop_default_width'></span>" ).appendTo( jQuery( ".shop .products_block" ) );
	jQuery(".archive .shop-page ul.products").addClass("product_list");
	jQuery(".archive .shop-page ul.products").wrap('<div class="products_block"></div>');
	jQuery(".archive .shop-page ul.products").attr("id","shop-grid");
	jQuery( "<span style='display: none; visibility: hidden;' class='shop_default_width'></span>" ).appendTo( jQuery( ".archive .shop-page .products_block" ) );
});

function productCarouselAutoSet() { 
	jQuery(".products_block .product-carousel").each(function() {
															
		var objectID = jQuery(this).attr('id');
		if(widthClassOptions[objectID.replace('-carousel','')])
			var myDefClass= widthClassOptions[objectID.replace('-carousel','')];
		else
			var myDefClass= 'grid_default_width';
		var slider = jQuery(".products_block #" + objectID);
		slider.sliderCarousel({
			defWidthClss : myDefClass,
			subElement   : '.slider-item',
			firstClass   : 'first_item_tm',
			lastClass    : 'last_item_tm',
			slideSpeed : 200,
			paginationSpeed : 800,
			autoPlay : false,
			stopOnHover : false,
			goToFirst : true,
			goToFirstSpeed : 5000,
			goToFirstNav : true,
			pagination : true,
			paginationNumbers: false,
			responsive: true,
			responsiveRefreshRate : 200,
			baseClass : "slider-carousel",
			theme : "slider-theme",
			autoHeight : true
		});
		
		var nextButton = jQuery(this).parent().parent().find('.next');
		var prevButton = jQuery(this).parent().parent().find('.prev');
		nextButton.click(function(){
			slider.trigger('slider.next');
		})
		prevButton.click(function(){
			slider.trigger('slider.prev');
		})
	});
}
jQuery(window).load(function(){
	productCarouselAutoSet();

	//
	var AutoScroll = function() {
		jQuery('.customNavigation .next').click();
	};

	setInterval(AutoScroll, 3000);
});
//jQuery(window).resize(function(){productCarouselAutoSet();});

function productListAutoSet() { 
	jQuery(".products_block .product_list").each(function(){

		var objectID = jQuery(this).attr('id');
		if(objectID.length >0) {
			if(widthClassOptions[objectID.replace('-grid','')])
				var myDefClass= widthClassOptions[objectID.replace('-grid','')];
		}else{
			var myDefClass= widthClassOptions[objectID];
		}
		jQuery(this).smartColumnsRows({
			defWidthClss : myDefClass,
			subElement   : 'li'
		});
	});		
}
jQuery(window).load(function(){productListAutoSet();});
//jQuery(window).resize(function(){productListAutoSet();})

function productShopAutoSet() { 
	
	jQuery(".shop .product_list").each(function(){
		var objectID = jQuery(this).attr('id');
		
		if(objectID.length >0) {
			
			if(widthClassOptions[objectID.replace('-grid','')])
				var myDefClass= widthClassOptions[objectID.replace('-grid','')];
		}else{
			var myDefClass= widthClassOptions[objectID];
		}
		jQuery(this).smartColumnsRows({
			defWidthClss : myDefClass,
			subElement   : 'li'
		});
	});		
}
jQuery(window).load(function(){productShopAutoSet();});
jQuery(window).resize(function(){productShopAutoSet();})


jQuery(document).ready(function() { mobileToggleColumn();});
jQuery(window).resize(function() { mobileToggleColumn();});
function mobileToggleColumn(){	
	if (jQuery(window).width() < 1000){
		jQuery('.site-main .widget .widget-title .mobile_togglecolumn').removeClass('clearfix');
		jQuery('.site-main .widget .widget-title .mobile_togglecolumn').remove();
		jQuery('.site-main .widget .widget-title').append( "<span class='mobile_togglecolumn'>&nbsp;</span>" );
		jQuery('.site-main .widget .widget-title').addClass('toggle');
		jQuery('.site-main .widget .widget-title .mobile_togglecolumn').click(function(){
			jQuery(this).parent().toggleClass('active').parent().find('ul').toggle('slow');
		});		
		jQuery('.footer-main .widget .widget-title .mobile_togglecolumn').removeClass('clearfix');
		jQuery('.footer-main .widget .widget-title .mobile_togglecolumn').remove();
		jQuery('.footer-main .widget .widget-title').append( "<span class='mobile_togglecolumn'>&nbsp;</span>" );
		jQuery('.footer-main .widget .widget-title').addClass('toggle');
		jQuery('.footer-main .widget .widget-title .mobile_togglecolumn').click(function(){
			jQuery(this).parent().toggleClass('active').parent().find('ul').toggle('slow');
		});
	}
	else{
		jQuery('.site-main .widget .widget-title').removeClass('toggle');
		jQuery('.site-main .widget .widget-title').removeClass('active');
		jQuery('.site-main .widget .widget-title .mobile_togglecolumn').remove();
		
		jQuery('.footer-main .widget .widget-title').removeClass('toggle');
		jQuery('.footer-main .widget .widget-title').removeClass('active');
		jQuery('.footer-main .widget .widget-title .mobile_togglecolumn').remove();
	}
}
