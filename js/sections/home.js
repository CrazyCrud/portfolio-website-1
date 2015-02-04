var Home = (function(){
	var that = this;
	this.elements = {
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
		message_form: $("#message"),
		number_1: $("#number-1"),
		number_2: $("#number-2"),
		captcha: $("#captcha")
	};

	this.email_regex = /^([a-zA-Z0-9_.+-]+)\@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,4})$/;

	var init = function(){
		var scrolling = App.elements.scrolling;
		var offset = App.elements.top_bar.height();

		that.elements.link_skills.bind("tap", function(e){
			e.preventDefault();
			App.elements.body.stop();
			App.elements.body.animate({scrollTop: that.elements.skills.offset().top - offset}, 500, 'swing', function() { 
			   	
			});
			//scrolling.stopAnimateTo();
            //scrolling.animateTo(that.elements.skills.offset().top - offset);
        });

		that.elements.link_projects.bind("tap", function(e){
			e.preventDefault();
			App.elements.body.stop();
			App.elements.body.animate({scrollTop: that.elements.projects.offset().top - offset}, 500, 'swing', function() { 
			   	
			});
			//scrolling.stopAnimateTo();
            //scrolling.animateTo(that.elements.projects.offset().top - offset);
        });

		that.elements.link_about.bind("tap", function(e){
			e.preventDefault();
			App.elements.body.stop();
			App.elements.body.animate({scrollTop: that.elements.about.offset().top- offset}, 500, 'swing', function() { 
			   	
			});
			//scrolling.stopAnimateTo();
            //scrolling.animateTo(that.elements.about.offset().top- offset);
        });

		that.elements.link_contact.bind("tap", function(e){
			e.preventDefault();
			App.elements.body.stop();
			App.elements.body.animate({scrollTop: that.elements.contact.offset().top - offset}, 500, 'swing', function() { 
			   	
			});
			//scrolling.stopAnimateTo();
            //scrolling.animateTo(that.elements.contact.offset().top - offset);
        });
		loadImages();
        activateForm();
		
	},

	loadImages = function(){
		that.elements.projects.find('.projects-content').addClass('load');
		if (window.matchMedia("(min-width: 32em)").matches) {
			that.elements.projects.find('li').css('opacity', '0');
			$(window).scroll(function(event) {
				if($(document).scrollTop() > that.elements.projects.offset().top - 600){
					that.elements.projects.find('li').each(function(index, el) {
						$(this).animate({'opacity': '1'}, 1000);
					});
					$(window).unbind('scroll');
				}
			});
		}
	},

	activateForm = function(){
		that.elements.submit_form.bind("tap", function(e){
			e.preventDefault();
			var email = that.email_regex.test($.trim(that.elements.email_form.val()));
			var message = $.trim(that.elements.message_form.val());
			var number_1 = that.elements.number_1.val();
			var number_2 = that.elements.number_2.val();
			var captcha = that.elements.captcha.val();
			var validMail = isValidMail(email);
			var validMessage = isValidMessage(message);
			var validCaptcha = isValidCaptcha(number_1, number_2, captcha);
			
			if(validMail && validMessage && validCaptcha){
				that.elements.submit_form.addClass('success');
				that.elements.submit_form.children('.response').html('Success');
				$.ajax({
					url: 'php/send_mail.php',
					type: 'POST',
					dataType: 'json',
					data: 'email=' + email + '&message=' + message + '&number-1=' + number_1 + '&number-2=' + number_2 + '&captcha=' + captcha
				})
				.always(function(reponse) {
					that.elements.submit_form.addClass('disabled');
					that.elements.submit_form.unbind('tap');
					that.elements.submit_form.bind("tap", function(e){
						e.preventDefault();
					});
				});
			}else{
				that.elements.submit_form.addClass('error');
				that.elements.submit_form.children('.response').html('Error');
				window.setTimeout(function(){
					that.elements.submit_form.removeClass('error');
					that.elements.submit_form.children('.response').html('Send');
				}, 1600);
			}			
		});
	},

	isValidMail = function(email){
		var valid = email;
		if(valid === true){
			that.elements.email_form.prev('.required-error').remove();
		}else{
			if(that.elements.email_form.prev('.required-error').length < 1){
				that.elements.email_form.before("<label for='email' class='required-error'>Please enter a correct email address</label>");
			}
		}
		return valid;
	},

	isValidMessage = function(message){
		var valid = message.length > 0? true: false;
		if(valid === true){
			that.elements.message_form.prev('.required-error').remove();
		}else{
			if(that.elements.message_form.prev('.required-error').length < 1){
				that.elements.message_form.before("<label for='message' class='required-error'>Please type a message</label>");
			}
		}
		return valid;	
	},

	isValidCaptcha = function(number_1, number_2, captcha){
		var isValid = (parseInt(number_1) + parseInt(number_2) == parseInt(captcha));
		if(isValid === true){
			that.elements.captcha.prev('.required-error').remove();
		}else{
			if(that.elements.captcha.prev('.required-error').length < 1){
				that.elements.captcha.before("<label for='captcha' class='required-error'>Please enter the correct number</label>");
			}
		}
		return isValid;
	};

	return {
		init: init
	};
})();

Home.init();