$(function(){
		"use strict";

		var Clock = function(options) {
			$.extend(this, {}, options);

			this.cache();
			this.bind();

			return this;
		};
		
		$.extend(Clock.prototype, {
			cache: function(){
				this.$secArrow = $('.arrow .sec-arrow');
				this.$secMin = $('.arrow .min-arrow');
				this.$secHrs = $('.arrow .hour-arrow');
			},
			bind: function(){
				this.runTime();
			},
			setTime: function($el, getTime, deg){
				$el.css({   '-webkit-transform': 'rotate(' + getTime *deg + 'deg)',
							'-moz-transform': 'rotate(' + getTime *deg + 'deg)',
							'-ms-transform': 'rotate(' + getTime *deg + 'deg)',
							'-o-transform': 'rotate(' + getTime *deg + 'deg)',
							'transform': 'rotate(' + getTime *deg + 'deg)'
				});
			},
			setSeconds: function(){
				var getSec = new Date().getSeconds();
				this.setTime(this.$secArrow, getSec, 6);
			},
			setMinutes: function(){
				var getMin = new Date().getMinutes();
				this.setTime(this.$secMin, getMin, 6);
			},
			setHours: function(){
				var getHrs = new Date().getHours();
				this.setTime(this.$secHrs, getHrs, 30);
			},
			runTime: function(){
				setInterval( $.proxy(this.setSeconds, this), 1000);
				setInterval( $.proxy(this.setMinutes, this), 1000);
				setInterval( $.proxy(this.setHours, this), 1000);
			}
		});
		window.Clock = Clock;
	});