/* ===================================================================
    Author          : ModinaTheme
    Template Name   : Shipo – App, Software & SAAS Landing Page
    Version         : 1.0
* ================================================================= */

(function ($) {
	"use strict";

	$(document).on("ready", function () {
		$("button.navbar-toggler").click(function () {
			$("body .home_one_header").toggleClass("mobile-menu");
		});

		// Preloading
		$(window).on("load", function () {
			// Animate loader off screen
			$(".pre-loader").delay(600).fadeOut("slow");
		});

		/*==========================
       Count up init
    ============================*/
		$(
			".single-countup span, .single-counter-two span, .single-funfact-item span"
		).counterUp({
			delay: 20,
			time: 2000,
		});

		/*==================================================
     # Team Carousel - theme two
     ===============================================*/
		$(".team-carousel").owlCarousel({
			autoplay: true,
			loop: true,
			margin: 30,
			nav: false,
			dots: true,
			responsive: {
				0: {
					items: 1,
				},
				600: {
					items: 2,
				},
				1000: {
					items: 3,
				},
			},
		});

		/*==============================================
     # Testimonial Carousel - Theme three
     ===============================================*/
		$(".saas-testimonial-carousel").owlCarousel({
			autoplay: true,
			loop: true,
			nav: false,
			dots: true,
			responsive: {
				0: {
					items: 1,
				},
				600: {
					items: 1,
				},
				1000: {
					items: 1,
				},
			},
		});

		/* =============================================
        # Magnific popup init
     ===============================================*/
		$(".popup-link").magnificPopup({
			type: "image",
			gallery: {
				enabled: true,
			},
			// other options
		});

		$(".popup-gallery").magnificPopup({
			type: "image",
			gallery: {
				enabled: true,
			},
			// other options
		});

		$(".popup-video, .popup-vimeo, .popup-gmaps").magnificPopup({
			type: "iframe",
			mainClass: "mfp-fade",
			removalDelay: 160,
			preloader: false,
			fixedContentPos: false,
		});

		var wow = new WOW({
			mobile: false,
		});
		wow.init();

		//# Smooth Scroll
		$(".navbar-nav a").on("click", function (event) {
			var $anchor = $(this);
			var headerH = "80";
			$("html, body")
				.stop()
				.animate(
					{
						scrollTop: $($anchor.attr("href")).offset().top - headerH + "px",
					},
					1500,
					"easeInOutExpo"
				);
			event.preventDefault();
		});

		$(document).on("click", ".navbar-collapse.show", function (e) {
			if (
				$(e.target).is("a") &&
				$(e.target).attr("class") != "dropdown-toggle"
			) {
				$(this).collapse("hide");
			}
		});

		// sticky nav Scroll
		$("#sticky-nav").sticky({ topSpacing: 0 });

		/*==========================
       Scroll To Up init
    ============================*/
		$.scrollUp({
			scrollName: "scrollUp", // Element ID
			topDistance: "1110", // Distance from top before showing element (px)
			topSpeed: 2000, // Speed back to top (ms)
			animation: "slide", // Fade, slide, none
			animationInSpeed: 300, // Animation in speed (ms)
			animationOutSpeed: 300, // Animation out speed (ms)
			scrollText: '<i class="fas fa-angle-up"></i>', // Text for element
			activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
		});
	}); // end document ready function
})(jQuery); // End jQuery
