// page init
$(function(){
	initOpenClose();
});


// open-close init
function initOpenClose() {

	$('div.price-list-box').OpenClose({
		activeClass:'open',
		opener:'div.price-list-btn',
		slider:'div.price-list-holder',
		effect:'slide',
		animSpeed:500
	});

	$('div.text-box').OpenClose({
		activeClass:'open',
		opener:'div.loading',
		slider:'div.text-box-slade',
		effect:'slide',
		animSpeed:500
	});

	$('div.current-position-item').OpenClose({
		activeClass:'open',
		opener:'div.loading',
		slider:'div.current-position-item-description',
		effect:'slide',
		animSpeed:500
	});

}

// open-close plugin
$.fn.OpenClose = function(_options){
	// default options
	var _options = $.extend({
		activeClass:'active',
		opener:'.opener',
		slider:'.slide',
		animSpeed: 400,
		animStart:false,
		animEnd:false,
		effect:'fade',
		event:'click'
	},_options);

	return this.each(function(){
		// options
		var _holder = $(this);
		var _slideSpeed = _options.animSpeed;
		var _activeClass = _options.activeClass;
		var _opener = $(_options.opener, _holder);
		var _slider = $(_options.slider, _holder);
		var _animStart = _options.animStart;
		var _animEnd = _options.animEnd;
		var _effect = _options.effect;
		var _event = _options.event;
		if(_slider.length) {
			_opener.bind(_event,function(){
				if(!_slider.is(':animated')) {
					if(typeof _animStart === 'function') _animStart();
					if(_holder.hasClass(_activeClass)) {
						_slider[_effect=='fade' ? 'fadeOut' : 'slideUp'](_slideSpeed,function(){
							if(typeof _animEnd === 'function') _animEnd();
						});
						_holder.removeClass(_activeClass);
					} else {
						_holder.addClass(_activeClass);
						_slider[_effect=='fade' ? 'fadeIn' : 'slideDown'](_slideSpeed,function(){
							if(typeof _animEnd === 'function') _animEnd();
						});
					}
				}
				return false;
			});
			if(_holder.hasClass(_activeClass)) _slider.show();
			else _slider.hide();
		}
	});
}
