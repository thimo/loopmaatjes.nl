/////////////////////////////////////// Remove Javascript Disabled Class ///////////////////////////////////////


var el = document.getElementsByTagName("html")[0];
el.className = "";


/////////////////////////////////////// Mobile Navigation Menu ///////////////////////////////////////


jQuery(window).load(function(){

	jQuery("<option />", {"selected": "selected", "value": "", "text": navigationText}).prependTo("#nav select");
			
	jQuery("#nav select").change(function() {
		window.location = jQuery(this).find("option:selected").val();
	});
	
});


/////////////////////////////////////// Lightbox ///////////////////////////////////////


jQuery(document).ready(function(){

	jQuery("div.gallery-item .gallery-icon a").prepend('<span class="lightbox-hover icon-plus"></span>').attr("rel", "prettyPhoto[gallery]").width(jQuery(this).find('.attachment-thumbnail').width());
		
	jQuery("a[rel^='prettyPhoto']").prettyPhoto({
		theme: 'pp_default',
		deeplinking: false,
		social_tools: ''
	});
	
});


/////////////////////////////////////// Image Hover ///////////////////////////////////////


jQuery(document).ready(function(){

	jQuery('.lightbox-hover').css({'opacity':'0'});
	jQuery("a[rel^='prettyPhoto']").hover(
		function() {
			jQuery(this).find('.lightbox-hover').stop().fadeTo(750, 1);
		},
		function() {
			jQuery(this).find('.lightbox-hover').stop().fadeTo(750, 0);
		})

});


/////////////////////////////////////// Image Preloader ///////////////////////////////////////


jQuery(function () {
	jQuery('.preload').hide();
});

var i = 0;
var int=0;
jQuery(window).bind("load", function() {
	var int = setInterval("doThis(i)",100);
});

function doThis() {
	var images = jQuery('.preload').length;
	if (i >= images) {
		clearInterval(int);
	}
	jQuery('.preload:hidden').eq(0).fadeIn(400);
	i++;
}


/////////////////////////////////////// Back To Top ///////////////////////////////////////


jQuery(document).ready(function() {
	
	jQuery().UItoTop({ 
		text: '<i class="icon-chevron-up"></i>',
		scrollSpeed: 600
	});
	
});



/////////////////////////////////////// Accordion ///////////////////////////////////////


jQuery(document).ready(function(){
	jQuery(".accordion").accordion({ header: "h3.accordion-title" });
	jQuery("h3.accordion-title").toggle(function(){
		jQuery(this).addClass("icon-circle-arrow-up").removeClass("icon-circle-arrow-down");
		}, function () {
		jQuery(this).removeClass("icon-circle-arrow-up").addClass("icon-circle-arrow-down");
	});	
});


/////////////////////////////////////// Tabs ///////////////////////////////////////


jQuery(document).ready(function(){
	jQuery(".sc-tabs").tabs({
		fx: {
			height:'toggle',
			duration:'fast'
		}
	});	
});


/////////////////////////////////////// Toggle Content ///////////////////////////////////////


jQuery(document).ready(function(){
	jQuery(".toggle-box").hide(); 
	jQuery(".toggle").toggle(function(){
		jQuery(this).addClass("icon-minus-sign").removeClass("icon-plus-sign");
		}, function () {
		jQuery(this).removeClass("icon-minus-sign").addClass("icon-plus-sign");
	});
	jQuery(".toggle").click(function(){
		jQuery(this).next(".toggle-box").slideToggle();
	});
});


/////////////////////////////////////// Contact Form ///////////////////////////////////////


jQuery(document).ready(function(){
	
	jQuery('#contact-form').submit(function() {

		jQuery('.contact-error').remove();
		var hasError = false;
		jQuery('.requiredFieldContact').each(function() {
			if(jQuery.trim(jQuery(this).val()) == '') {
				jQuery(this).addClass('input-error');
				hasError = true;
			} else if(jQuery(this).hasClass('email')) {
				var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
				if(!emailReg.test(jQuery.trim(jQuery(this).val()))) {
					jQuery(this).addClass('input-error');
					hasError = true;
				}
			}
		});
	
	});
				
	jQuery('#contact-form .contact-submit').click(function() {
		jQuery('.loader').css({display:"block"});
	});	

});


/////////////////////////////////////// Prevent Empty Search - Thomas Scholz http://toscho.de ///////////////////////////////////////


(function( $ ) {
   $.fn.preventEmptySubmit = function( options ) {
       var settings = {
           inputselector: "#searchbar",
           msg          : emptySearchText
       };
       if ( options ) {
           $.extend( settings, options );
       };
       this.submit( function() {
           var s = $( this ).find( settings.inputselector );
           if ( ! s.val() ) {
               alert( settings.msg );
               s.focus();
               return false;
           }
           return true;
       });
       return this;
   };
})( jQuery );

jQuery(document).ready(function(){
	jQuery('#searchform').preventEmptySubmit();
});