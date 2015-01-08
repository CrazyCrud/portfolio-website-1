<?php

include_once 'php/default.inc.php';

$email = $message = $captcha = false;
if(isset($_POST['email']) && !empty($_POST['email'])){
	$email = htmlentities($_POST['email']);
	if(!((strpos($email, ".") > 0) && (strpos($email, "@") > 0)) || preg_match("/[^a-zA-Z0-9.@_-]/", $email)){
		$email = false;
	}
}

if(isset($_POST['message']) && !empty($_POST['message'])){
	$message = htmlentities($_POST['message']);
}

if(isset($_POST['captcha']) && !empty($_POST['captcha'])){
	if(intval($_POST['number-1']) + intval($_POST['number-2']) == intval($total)){
		$captcha = true;
	}
}

if($email != false && $message != false && $captcha != false){
	mail($me, "Portfolio - Request", $message, null, "-f".$email); 
}

?>

<!doctype html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Portfolio of Constantin Lehenmeier</title>
	<link rel="stylesheet" type="text/css" href="css/app.css">
	<script type="text/javascript" src="js/vendor/modernizr.js"></script>
	<script type="text/javascript">
		Modernizr.load([
			{
				test : Modernizr.mq('only all'),
				nope : ['js/vendor/respond.js']
			},
			'js/production.js'
		]);
	</script>
	<noscript>
		<link rel="stylesheet" type="text/css" href="css/app.css">
	</noscript>
</head>
<body>
	<div class="index">
		<div class="nav-sticky">
			<nav class="top-bar">
				<ul class="title-bar">
					<li class="logo uppercase"></li>
					<li class="toggle-nav" class="uppercase">
						<a href="#"></a>
					</li>
				</ul>
				<section class="top-bar-section">
					<ul>
						<li class="top-bar-item uppercase"><a id="link-skills" href="#skills">Skills</a></li>
						<li class="top-bar-item uppercase"><a id="link-projects" href="#projects">Projects</a></li>
						<li class="top-bar-item divider"></li>
						<li class="top-bar-item uppercase"><a id="link-about" href="#about">About</a></li>
						<li class="top-bar-item uppercase"><a id="link-contact" href="#contact">Contact</a></li>
						<div class="clear"></div>
					</ul>
				</section>
			</nav>
		</div>
		<div class="header" data-0="background-position: 50% -6%;" data-500="background-position: 50% 6%;">
			<div class="overlay"></div>
			<div class="header-text">
				<h2>Hello!</h2>
				<p class="uppercase">
					My Name is <span class="primary-light">Constantin Lehenmeier</span>, I&#39;m a web enthusiast and a weekend programmer from Germany.
					</br>And I make cool shit for cool people!
				</p>			
			</div>
		</div>
		<div class="content">
			<div class="skills">
				<a class="dest" name="skills"></a>
				<section>
					<article>
						<header class="header-section">
							<h2>My</h2>
							<span class="headline" data-0="transform: scale(1) rotate(-8deg);" data-top="transform: scale(1.16) rotate(-6deg);">Skillset</span>
						</header>
						<div class="skills-content-container">
							<ul class="skills-content">
								<li>
									<div class="skill-icon-container">
										<span class="skill-icon icon-research"></span>
									</div>
									<div class="skill-text-container">
										<h3>Research</h3>
										<p>
											Must-do is a good fucking master. Sometimes it is appropriate to place various typographic elements on the outside of the fucking left margin of text to maintain a strong vertical axis.
										</p>
									</div>
								</li>
								<li>
									<div class="skill-icon-container">
										<span class="skill-icon icon-usability"></span>
									</div>
									<div class="skill-text-container">
										<h3>Usability & UX</h3>
										<p>
											Dedicate yourself to lifelong fucking learning. Nothing of value comes to you without fucking working at it. When you design, you have to draw on your own fucking life experiences. 
										</p>
									</div>
								</li>
								<li>
									<div class="skill-icon-container">
										<span class="skill-icon icon-coding"></span>
									</div>
									<div class="skill-text-container">
										<h3>Coding</h3>
										<p>
											Don’t get hung up on things that don’t fucking work. Sometimes it is appropriate to place various typographic elements on the outside of the fucking left margin of text to maintain a strong vertical axis.
										</p>
									</div>
								</li>
								<div class="clear"></div>
							</ul>
						</div>
					</article>
				</section>
			</div>
			<div class="projects">
				<a class="dest" name="projects"></a>
				<section>
					<article>
						<header class="header-section">
							<h2>My</h2>
							<span class="headline" data-0="transform: scale(1) rotate(-8deg);" data-top="transform: scale(1.16) rotate(-6deg);">Projects</span>
						</header>
						<div class="projects-content-container">
							<ul class="projects-content">
								<li class="project-1">
									<span class="project-overlay"></span>
									<div class="project-description">
										<h3 class="project-titel uppercase">Project 1</h3>
										<p>
											Design is all about fucking relationships—the relationship of form
										</p>
									</div>
									<span class="project-caption uppercase">Webdesign</span>
								</li>
								<li class="project-2">
									<span class="project-overlay"></span>
									<div class="project-description ">
										<h3 class="project-titel uppercase">Project 2</h3>
										<p>
											Your rapidograph pens are fucking dried up
										</p>
									</div>
									<span class="project-caption uppercase">Webdesign</span>
								</li>
								<li class="project-3">
									<span class="project-overlay"></span>
									<div class="project-description">
										<h3 class="project-titel uppercase">Project 3</h3>
										<p>
											When you sit down to work, external critics aren’t the
										</p>
									</div>
									<span class="project-caption uppercase">Game Development</span>
								</li>
								<li class="project-4">
									<span class="project-overlay"></span>
									<div class="project-description">
										<h3 class="project-titel uppercase">Project 4</h3>
										<p>
											You need to sit down and sketch more fucking ideas
										</p>
									</div>
									<span class="project-caption uppercase">Multitouch Table</span>
								</li>
								<li class="project-5">
									<span class="project-overlay"></span>
									<div class="project-description">
										<h3 class="project-titel uppercase">Project 5</h3>
										<p>
											Design as if your fucking life depended on it
										</p>
									</div>
									<span class="project-caption uppercase">Usability</span>
								</li>
								<div class="clear"></div>
								<p class="github">You can also check some of these projects and other projects on my <span class="primary-light">GitHub</span> account
									</br><span class="icon-github"></span>
								</p>
							</ul>
						</div>
					</article>
				</section>
			</div>
			<div class="about">
				<a class="dest" name="about"></a>
				<section>
					<article>
						<header class="header-section">
							<h2>My</h2>
							<span class="headline" data-0="transform: scale(1) rotate(-8deg);" data-top="transform: scale(1.16) rotate(-6deg);">Self &#38; I</span>
						</header>
						<div class="about-content-container">
							<section>
								<h3 class="highlight">Education</h3>
								<div class="what">
									<h5 class="uppercase">University-Entrance Diploma</h5>
									<p>
										You won’t get good at anything by doing it a lot fucking aimlessly. Nothing of value comes to you without fucking working at it. To go partway is easy, but mastering anything requires hard fucking work. Don’t worry about what other people fucking think.
									</p>
								</div>
								<div class="when">
									<p>
										<span class="date">2001-2009</span>
									</p>
								</div>
								<div class="what">
									<h5 class="uppercase">Academic Studies in Media and Computer Science</h5>
									<p>
										Form follows fucking function. Don’t get hung up on things that don’t fucking work. Don’t fucking lie to yourself. Never let your guard down by thinking you’re fucking good enough. You won’t get good at anything by doing it a lot fucking aimlessly. 
									</p>
								</div>
								<div class="when">
									<p>
										<span class="date">2009-2015</span>
									</p>
								</div>
								<div class="clear"></div>
							</section>
							<section>
								<h3 class="highlight">Employment</h3>
								<div class="what">
									<h5 class="uppercase">Backend-Work</h5>
									<p>
										Widows and orphans are terrible fucking tragedies, both in real life and definitely in typography. Respect your fucking craft. If you’re not being fucking honest with yourself how could you ever hope to communicate something meaningful to someone else? When you sit down to work, external critics aren’t the enemy.
									</p>
								</div>
								<div class="when">
									<p>
										<span class="date">2014-2015</span>
									</p>
								</div>
								<div class="what">
									<h5 class="uppercase">Responsive Refactoring</h5>
									<p>
										Design as if your fucking life depended on it. This design is fucking brilliant. Don’t get hung up on things that don’t fucking work.
									</p>
								</div>
								<div class="when">
									<p>
										<span class="date">2015</span>
									</p>
								</div>
								<div class="clear"></div>
							</section>
							<section>
								<h3 class="highlight">Interests</h3>
								<p class="interests">
									The details are not the details. They make the fucking design. When you sit down to work, external critics aren’t the enemy. It’s you who you must to fight against to do great fucking work. You must overcome yourself. Respect your fucking craft. Form follows fucking function. Use your fucking hands. You are not your fucking work.
								</p>
							</section>
							
						</div>
					</article>
				</section>
			</div>
			<div class="contact">
				<a class="dest" name="contact"></a>
				<section>
					<article>
						<header class="header-section">
							<h2>Your</h2>
							<span class="headline" data-0="transform: scale(1) rotate(-22deg);" data-top="transform: scale(1.16) rotate(-6deg);">Questions</span>
						</header>
							<form id="contact" name="contact" method="post" action="index.php">
								<fieldset>
									<label for="name">What&#39;s your name?</label>
									<input type="text" name="name" id="name">
									<label for="email">What&#39;s your email address? <span class="required">*</span></label>
									<?php if(isset($_POST['submit']) && $email === false){
										echo "<label for='email' class='required-error'>Please enter a correct email address</label>";
									} ?>
									<input type="email" name="email" id="email">
									<label for="message">What do you want to tell me? <span class="required">*</span></label>
									<?php if(isset($_POST['submit']) && $message === false){
										echo "<label for='message' class='required-error'>Please type a message</label>";
									} ?>
									<textarea name="message" id="message"></textarea>
									<label for="captcha">What is <input size="1" disabled id="number-1" type="text" name="number-1" value="<?php echo rand(1,4);?>"> + <input size="1" disabled id="number-2" type="text" name="number-2" value="<?php echo rand(5,9);?>"> <span class="required">*</span></label>
									<?php if(isset($_POST['submit']) && $captcha === false){
										echo "<label for='captcha' class='required-error'>Please enter the correct number</label>";
									} ?>
									<input id="captcha" class="captcha" type="text" name="captcha" maxlength="2" />
									<button id="submit" name="submit" type="submit" class="button uppercase">
										<span class="response">Send</span>
									</button>
								</fieldset>
							</form>
					</article>
				</section>
			</div>
			<footer class="footer">
				<p class="uppercase">&#169; 2015 Constantin Lehenmeier. All rights reserved. Credits for the icons go to Pedro Sanchez</p>
			</footer>
		</div>
	</div>
</body>
</html>