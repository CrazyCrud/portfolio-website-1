var App = (function(){
	var that = this;
	this.elements = {
		top_bar: $(".top-bar"),
		toggle: $(".toggle-nav a"),
		skills: $(".skills"),
		projects: $(".projects"),
		about: $(".about"),
		contact: $(".contact"),
		link_skills: $("#link-skills"),
		link_projects: $("#link-projects"),
		link_about: $("#link-about"),
		link_contact: $("#link-contact")
	};
	var init = function(){
		var offset = that.elements.top_bar.height();
		that.elements.toggle.bind("tap", function(e){
			that.elements.top_bar.toggleClass('expanded');
		}); 

		var scrolling = skrollr.init({
		    smoothScrolling: true,
		    smoothScrollingDuration: 200,
		    forceHeight: false
		});

		that.elements.link_skills.bind("tap", function(e){
			scrolling.stopAnimateTo();
            scrolling.animateTo(that.elements.skills.offset().top - offset);
        });

		that.elements.link_projects.bind("tap", function(e){
			scrolling.stopAnimateTo();
            scrolling.animateTo(that.elements.projects.offset().top - offset);
        });

		that.elements.link_about.bind("tap", function(e){
			scrolling.stopAnimateTo();
            scrolling.animateTo(that.elements.about.offset().top- offset);
        });

		that.elements.link_contact.bind("tap", function(e){
			scrolling.stopAnimateTo();
            scrolling.animateTo(that.elements.contact.offset().top - offset);
        });
		
	};

	return {
		init: init
	};
})();

App.init();