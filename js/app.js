var App = (function(){
	var that = this;
	this.elements = {
		top_bar: $(".top-bar"),
		toggle: $(".toggle-nav a"),
		body: $("body")
	};

	var init = function(){
		/*
		that.elements.toggle.bind("tap", function(e){
			e.stopPropagation();
			App.elements.top_bar.toggleClass('expanded');
		}); 
		*/

		$('html').click(function(event) {
			App.elements.top_bar.removeClass('expanded');
		});

		that.elements.toggle.click(function(event){
			event.preventDefault();
		    event.stopPropagation();
		    App.elements.top_bar.toggleClass('expanded');
		});

		var scrolling = skrollr.init({
		    smoothScrolling: true,
		    smoothScrollingDuration: 200,
		    forceHeight: false
		});

		that.elements.scrolling = scrolling;		
	};

	return {
		init: init,
		elements: elements
	};
})();

App.init();