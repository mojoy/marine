
/***********************
 Mob menu BEGIN
 ***********************/
document.addEventListener('DOMContentLoaded',function () {
	var burger = document.querySelector('.burger');
	var mobPanel = document.querySelector('.mob-panel');

	burger.addEventListener('click',function (evt) {
		evt.preventDefault();
		burger.classList.toggle('active');
		mobPanel.classList.toggle('active');
		document.body.classList.toggle('stopped');
	});

	mobPanel.addEventListener('click', function(evt) {
		evt.stopPropagation();
	});
	burger.addEventListener('click', function(evt) {
		evt.stopPropagation();
	});

	document.addEventListener("click", function () {
		burger.classList.remove('active');
		mobPanel.classList.remove('active');
		document.body.classList.remove('stopped');
	});
});
/***********************
 Mob menu END
 ***********************/


/***********************
 Fixed panel BEGIN
 ***********************/
document.addEventListener('DOMContentLoaded',function () {
	var fixedPanel = document.querySelector('.header');
	checkFixedPanel();

	window.onscroll = function() {
		checkFixedPanel();
	};

	function checkFixedPanel() {
		var scrolled = window.pageYOffset || document.documentElement.scrollTop;
		var topPanelHeight = document.querySelector('.header').offsetHeight;
		if (scrolled > topPanelHeight){
			fixedPanel.classList.add('fixed','compensate-for-scrollbar');
		} else {
			fixedPanel.classList.remove('fixed','compensate-for-scrollbar');
		}
	}
});
/***********************
 Fixed panel END
 ***********************/



/***********************
 Scroll to BEGIN sections
 ***********************/
$(function () {
	$(document).on('click','.scrollto', function () {
		var elementClick = $(this).attr("href");
		var destination = $(elementClick).offset().top;
		$('html,body').stop().animate({scrollTop: destination}, 1000);
		return false;
	});
});
/***********************
 Scrolling to END sections
 ***********************/

/***********************
 Lazy BEGIN
 ***********************/
function lazyLoad(){
	var lazyImgs = $('[data-lazy]');
	lazyImgs.each(function(){
		var lazyImage = $(this);
		var src = lazyImage.attr('data-lazy');
		lazyImage.attr('src',src);
	});
}

function lazyLoadBg(){
	var lazyImgs = $('[data-lazybg]');

	lazyImgs.each(function(){
		var lazyImage = $(this);
		var src = lazyImage.attr('data-lazybg');
		lazyImage.css('background-image','url('+src+')');
	});
}

$(function(){
	lazyLoad();
	lazyLoadBg();
});


/***********************
 Lazy END
 ***********************/





/***********************
 testimonials BEGIN
 ***********************/
document.addEventListener('DOMContentLoaded',function () {
	var maintechSlider = new Swiper('.testimonials', {
		slidesPerView: 3,
		//slidesPerColumn: 2,
		spaceBetween: 30,
		loop: true,
		/*
		lazy: {
			preloaderClass: 'slide-loading',
			loadPrevNext: true,
			loadPrevNextAmount: 1
		},*/
		navigation: {
			nextEl: '.testimonials-arrow--next',
			prevEl: '.testimonials-arrow--prev'
		},
		pagination: {
			el: '.swiper-pagination',
			clickable: true,
			//dynamicBullets: true
		},

		breakpoints: {

			1000: {
				slidesPerView: 2,
				slidesPerColumn: 1,
			},

			640: {
				slidesPerView: 1,
				slidesPerColumn: 1,
			}
		}
	});



});
/***********************
 testimonials END
 ***********************/

$(function($){
	if ($(".testimonials").length) {
		$('.testimonials').find('.swiper-slide-inner').attr("style","height:"+($('.swiper-wrapper').outerHeight() - 110)+"px;");
	}
});

