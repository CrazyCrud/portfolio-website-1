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
<html class="no-js">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Portfolio of Constantin Lehenmeier</title>
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<script type="text/javascript" src="js/vendor/modernizr.js"></script>
	<script type="text/javascript">
		Modernizr.load([
			{
				test : Modernizr.mq('only all'),
				nope : ['js/vendor/respond.js']
			},
			'js/home.js'
		]);
	</script>
	<noscript>
		<link rel="stylesheet" type="text/css" href="css/home.css">
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
							<span class="headline" data-0="transform: scale(1) rotate(-8deg);" data-top="transform: scale(1.2) rotate(-6deg);">Skillset</span>
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
											I have been reviewing papers and works in the field of <strong>human-computer-interaction</strong> 
											and took possesion of researching topics to get an unterstanding of the way things work. 
											I wrote several essays and works on my own and I'm always curious to learn about new things. 
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
											I've got a knowledge of established <strong>usability methods and practices</strong> to either build or evaluate and redesign a product. 
											Generally I'm always aiming to turn a human-computer-interaction to a <strong>human-human-interaction</strong>.
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
											Working with new technologies like the <em>Kinect</em> or the <em>Wii</em>, I developed skills in lagnuages like <strong>Java</strong>, <strong>C#</strong> and <strong>Python</strong>.
											Also I'm trained in frontend and backend <strong>web design and development</strong>.
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
							<span class="headline" data-0="transform: scale(1) rotate(-8deg);" data-top="transform: scale(1.2) rotate(-6deg);">Projects</span>
						</header>
						<div class="projects-content-container">
							<ul class="projects-content">
								<a href="projects.php?project=1">
									<li class="project-1">
										<span class="project-overlay"></span>
										<div class="project-description">
											<h3 class="project-titel uppercase">Latrinalia</h3>
											<p>
												A responsive platform to share and comment on toilet graffiti
											</p>
										</div>
										<span class="project-caption uppercase">Webdesign</span>
									</li>
								</a>
								<a href="projects.php?project=2">
									<li class="project-2">
										<span class="project-overlay"></span>
										<div class="project-description ">
											<h3 class="project-titel uppercase">Settlers of Catan</h3>
											<p>
												An augmented version of the tabletop game <em>Settlers of Catan</em>
											</p>
										</div>
										<span class="project-caption uppercase">Augmented Reality</span>
									</li>
								</a>
								<a href="projects.php?project=3">
									<li class="project-3">
										<span class="project-overlay"></span>
										<div class="project-description">
											<h3 class="project-titel uppercase">Beliar</h3>
											<p>
												A prototyp of a <em>Dungeon&Dragons</em> inspired singleplayer game
											</p>
										</div>
										<span class="project-caption uppercase">Game Development</span>
									</li>
								</a>
								<a href="projects.php?project=4">
									<li class="project-4">
										<span class="project-overlay"></span>
										<div class="project-description">
											<h3 class="project-titel uppercase">Media Informatics Showroom</h3>
											<p>
												A multitouch application offering multimedia information about student projects
											</p>
										</div>
										<span class="project-caption uppercase">Multitouch Table</span>
									</li>
								</a>
								<a href="projects.php?project=5">
									<li class="project-5">
										<span class="project-overlay"></span>
										<div class="project-description">
											<h3 class="project-titel uppercase">Music in the Air</h3>
											<p>
												A <em>Microsoft Kinect</em> game which allows the user to pratice and play different instruments
											</p>
										</div>
										<span class="project-caption uppercase">Interaction Design</span>
									</li>
								</a>
								<a href="projects.php?project=1">
									<li class="project-6">
										<span class="project-overlay"></span>
										<div class="project-description">
											<h3 class="project-titel uppercase">All Projects</h3>
											<p>
												You can view all projects here
											</p>
										</div>
										<span class="project-caption uppercase"></span>
									</li>
								</a>
								<div class="clear"></div>
								<!--
								<p class="github"><span class="uppercase highlight">Chin check out some code</span>You can also check the code of some of these projects and other minor projects and works including this portfolio site on my <span class="primary-light"><a href="https://github.com/CrazyCrud"><strong>GitHub</strong></a></span> account!
									</br><span class="icon-github"></span>
								</p>
								-->
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
							<span class="headline" data-0="transform: scale(1) rotate(-8deg);" data-top="transform: scale(1.2) rotate(-6deg);">Self &#38; I</span>
						</header>
						<div class="about-content-container">
							<section>
								<h3 class="highlight">Education</h3>
								<div class="what">
									<h5 class="uppercase">University-Entrance Diploma</h5>
									<p>
										I graduated with honors and received a general qualification for university entrance.
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
										In the terms of my study in Ratisbon, Germany I received an extensive as well as far-reaching teaching in the field of the human-computer-interaction.</br>
										I aquired knowledge and pratical skills in working areas like <strong>interaction design</strong>, <strong>media development</strong> and <strong>software development</strong>.
										</br>Also I was teached in the basics of <strong>project management</strong> and learned about ways to tackle problems and obstacles.
										I learned to work and communicate with other people and developed a love-hate relationship with my laptop. 
									</p>
								</div>
								<div class="when">
									<p>
										<span class="date">2009-2015</span>
									</p>
								</div>
								<div class="clear"></div>
							</section>
							<section class="employment">
								<h3 class="highlight">Employment</h3>
								<p class="info">
									While I attended the course of media and computer science I worked at the IT branch of the university's library.</br>
								</p>
								<div class="what">
									<h5 class="uppercase">Backend-Work</h5>
									<p>
										I redesigned the strcuture and organization of few <strong>mySQL</strong> databases and their connection to the frontend.
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
										I was involved in the <strong>responsive</strong> redesign of a digital magazine library.
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
									Besides designing and developing things, I'm a <strong>music</strong> enthusiast in collecting, listening and creating - not so listenable - music.
									I spent a lot of time creating and tweaking sounds in <em>Ableton</em> and sampling obscure sources; I'm always searching for new and innovative music.</br> 
									When I'm not listening to music I'm trying to get my head around the history and the evolution of type. For a few years I have been reading all influential books about <strong>typography</strong> which is a never ending venture.
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
							<span class="headline" data-0="transform: scale(1) rotate(-22deg);" data-top="transform: scale(1.2) rotate(-6deg);">Questions</span>
						</header>
							<form id="contact" name="contact" method="post" action="index.php#contact">
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