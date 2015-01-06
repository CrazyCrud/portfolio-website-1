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
		link_contact: $("#link-contact"),
		submit_form: $("#submit"),
		name_form: $("#name"),
		email_form: $("#email"),
		message_form: $("#message")
	};

	this.email_regex = /^([a-zA-Z0-9_.+-]+)\@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,4})$/;

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

        activateForm();
		
	},

	activateForm = function(){
		that.elements.submit_form.bind("tap", function(e){
			e.preventDefault();
			var validMail = isValidMessage();
			var validMessage = isValidMail();
			if(validMail && validMessage){
				//that.elements.contact.find('required-error').remove();
				that.elements.submit_form.addClass('success');
	
				window.setTimeout(function(){
					that.elements.submit_form.removeClass('success');
					that.elements.submit_form.html('Send');
				}, 1000);
			}else{
				that.elements.submit_form.addClass('error');

				window.setTimeout(function(){
					that.elements.submit_form.removeClass('error');
					that.elements.submit_form.html('Send');
				}, 1000);
			}			
		});
	},

	isValidMail = function(){
		var valid = that.email_regex.test($.trim(that.elements.email_form.val()));
		if(valid === true){
			that.elements.email_form.prev('.required-error').remove();
		}else{
			if(that.elements.email_form.prev('.required-error').length < 1){
				that.elements.email_form.before("<label for='email' class='required-error'>Please enter a correct email address</label>");
			}
		}
		return valid;
	},

	isValidMessage = function(){
		var valid = $.trim(that.elements.message_form.val()).length > 0? true: false;
		if(valid === true){
			that.elements.message_form.prev('.required-error').remove();
		}else{
			if(that.elements.message_form.prev('.required-error').length < 1){
				that.elements.message_form.before("<label for='message' class='required-error'>Please type a message</label>");
			}
		}
		return valid;	
	};

	return {
		init: init
	};
})();

App.init();