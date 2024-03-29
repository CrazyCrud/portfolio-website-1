<?php

include_once 'php/default.inc.php';

$email = $message = $captcha = false;
if(isset($_POST['email']) && !empty($_POST['email'])){
	$email = htmlentities($_POST['email']);
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$email = false;
	}
}

if(isset($_POST['message']) && !empty($_POST['message'])){
	$message = htmlentities($_POST['message']);
}

if(isset($_POST['captcha']) && !empty($_POST['captcha'])){
	if(intval($_POST['number-1']) + intval($_POST['number-2']) == intval($_POST['captcha'])){
		$captcha = true;
	}
}

if($email != false && $message != false && $captcha != false){
	$message = "Von $email \n".$message;
	mail($me, "Portfolio - Request", $message, null, "-f ".$email); 
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
	<link rel="shortcut icon" type="image/png" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAMAAABEpIrGAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MjhDQTcyNzZBQkNBMTFFNDhBNTFGRTkyRkExNUYyRkQiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MjhDQTcyNzdBQkNBMTFFNDhBNTFGRTkyRkExNUYyRkQiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDoyOENBNzI3NEFCQ0ExMUU0OEE1MUZFOTJGQTE1RjJGRCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDoyOENBNzI3NUFCQ0ExMUU0OEE1MUZFOTJGQTE1RjJGRCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pvx1p6oAAAGkUExURQAAAISEhI6Ojqampr29va2trbS0tNnZ2WFhYZiYmIODg3Jycvr6+nZ2dtXV1Xt7e7e3t5CQkNDQ0PPz84yMjIqKipKSkmJiYomJiVtbW8vLy0ZGRru7u9vb26urq319fdjY2IGBgYCAgJWVlV5eXllZWfn5+YKCgrq6usrKyurq6ktLS/z8/IiIiPv7+3x8fMDAwLi4uIaGhmBgYJaWlldXV6mpqe/v76KioqCgoOvr6yIiIoWFhbm5uX9/f+Pj4/X19cnJyeHh4fDw8M/Pz8HBweTk5O3t7Ts7O6+vr56enk9PT5qamszMzM3NzRAQEKenp25ubqioqBwcHHp6ej09PUhISERERO7u7tPT01FRUWxsbMbGxpeXl66ursLCwlJSUlxcXDo6OmNjY05OTlVVVfT09FpaWsfHx+zs7JGRkaOjo+fn59LS0o2Njby8vLCwsG1tbaysrJubmxUVFYeHhzw8PEdHR/b29nh4eCMjI6GhoWlpaebm5vj4+ExMTLKysuDg4FBQUOnp6ff393R0dJ2dndzc3MPDwzExMWRkZP///2A1tnoAAACMdFJOU/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////8AcRYuAwAAAZBJREFUeNqE0+VXwzAQAPDMO3dBJ8DcGLbh7u7u7u7ucP80HbRr0xbIh7xL7/fykksPwT8DseKr4r/BM1ESZFbSOA/IU71lmcXs/JSXCzosoBVT8WAXlO5xgcEK9aG2n81CYVDKuCAeAbgvsqokQclyBQiAiwQ55fUcqvTD42QkluJAtyaKYvdz32DAkfWO3/9Jj11T/8Kr0EADCyg+wTtnxkGunQWuu6EYxb7DSg0tliQZoCAAalB5OjSNVu1QYFpLg42CI4Db7e+8MwfZ6S2cCgrIRTr6W4X/9C5zCls+BV5FAAVnWRPce/QrKWBUgQKR44EDDGIKiMkd2hG61HBALg2UJNg/TvBKJbNRoNxXJ/g7liYpoLPK4QMtknVxyZpYIBagCyVVg7RsqM+uztGGmXz2AVPqFX96NuOvUZhkQPYk/wSSQvZzG0u4edNYJfbDuAk8vz7i4vRF52MLk9ZUFzXyOiuPUOe3poNowLZgFOzN5kit78Qh8nhSq8LNC29bmxbL7ozh/JfuFhxfAgwAl8HWGEZ39hYAAAAASUVORK5CYII="/>
</head>
<body>
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
					<li class="top-bar-item uppercase"><a id="link-skills" href="#skills">Services</a></li>
					<li class="top-bar-item uppercase"><a id="link-projects" href="#projects">Projects</a></li>
					<li class="top-bar-item divider"></li>
					<li class="top-bar-item uppercase"><a id="link-about" href="#about">About</a></li>
					<li class="top-bar-item uppercase"><a id="link-contact" href="#contact">Contact</a></li>
					<div class="clear"></div>
				</ul>
			</section>
		</nav>
	</div>
	<div id="skrollr-body" class="index">
		<div class="header" data-0="background-position: 30% -6%;" data-500="background-position: 30% 6%;">
			<div class="overlay"></div>
			<div class="header-text">
				<h2>Hello!</h2>
				<p class="uppercase">
					My Name is <span class="primary-light">Constantin Lehenmeier</span>, I&#39;m a pixel pusher and daily programmer from Germany.
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
							<div class="line"></div>
							<h2>
								My
								<span class="headline" data-0="transform: scale(1) rotate(-8deg);" data-top="transform: scale(1.125) rotate(-6deg);">Services</span>
							</h2>
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
											Working with new technologies like the <em>Kinect</em> or the <em>Wii</em>, I developed skills in languages like <strong>Java</strong>, <strong>C#</strong> and <strong>Python</strong>.
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
							<div class="line"></div>
							<h2>
								My
								<span class="headline" data-0="transform: scale(1) rotate(-8deg);" data-top="transform: scale(1.125) rotate(-6deg);">Projects</span>
							</h2>
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
								<a href="projects.php?project=6">
									<li class="project-3">
										<span class="project-overlay"></span>
										<div class="project-description">
											<h3 class="project-titel uppercase">Demo Project</h3>
											<p>
												An attempt to implement a specified site design
											</p>
										</div>
										<span class="project-caption uppercase">Webdesign</span>
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
							</ul>
							<div class="more-projects">
									<!--<h5>And here are some minor projects I have done in my spare time:</h5>-->
									<ul>
										<li>
											A <span class="primary-light"><a href="https://projects.invisionapp.com/share/QA686E9MY#/screens/138668543" target="_blank">redesign</a></span> of the product page of <a href="https://play.google.com/store/apps/details?id=de.zipcart&hl=de">Zalando's ZipCart app</a>
										</li>
										<li>
											A <span class="primary-light"><a href="https://chrome.google.com/webstore/detail/watch-doge/mockgfbbicpeebdpakillhameihbkngf?hl=de" target="_blank">chrome extension</a></span>  which keeps track of episodes of tv shows and reminds you of upcoming episodes
										</li>
										<!--
										<li>
											Chin check my <span class="primary-light"><a href="https://github.com/CrazyCrud">GitHub</a></span> account
										</li>
									-->
									</ul>
								</div>	
						</div>
					</article>
				</section>
			</div>
			<div class="about">
				<a class="dest" name="about"></a>
				<section>
					<article>
						<header class="header-section">
							<div class="line"></div>
							<h2>
								My
								<span class="headline" data-0="transform: scale(1) rotate(-8deg);" data-top="transform: scale(1.125) rotate(-6deg);">Self &#38; I</span>
							</h2>
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
										In the terms of my study in Ratisbon, Germany I received an extensive as well as far-reaching teaching in the field of the human-computer-interaction.
										I aquired knowledge and skills in working areas like <strong>interaction design</strong>, <strong>media</strong> and <strong>software development</strong>.
										</br>Also I was teached in the basics of <strong>project management</strong> and learned about ways to tackle obstacles.
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
								<!--
								<h3 class="highlight">Employment</h3>
								<p class="info">
									While I attended the course of media and computer science I worked at the IT branch of the university's library.</br>
								</p>
								<div class="what">
									<h5 class="uppercase">Backend Development</h5>
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
										I was involved in the <strong>responsive</strong> redesign of the website of a digital magazine library.
									</p>
								</div>
								<div class="when">
									<p>
										<span class="date">2015</span>
									</p>
								</div>
								-->
								<h3 class="highlight">Skills</h3>
								<div class="what">
									<h5 class="uppercase">Usability & UX Design</h5>
									<ul>
										<li>Know-how in <strong>user research</strong> including
										interviews, observations, focus groups and
										surveys</li>
										<li>Experience in the <strong>design</strong> and the
conceptualization of a product including the
creation of user stories, use cases, user
scenarios and wireframes</li>
										<li>Practical knowledge in product evaluation and
<strong>usability testing</strong> as well as in the statistical
analysis of aggregated data</li>
										<li>Knowledge of <strong>Emotional Design</strong> and it’s
realization in the development process</li>
										<li>Experience in working with <strong>Adobe Photoshop</strong>, <strong>Illustrator</strong>, <strong>InDesign</strong>, <strong>Balsamiq</strong> and <strong>Axure</strong></li>
									</ul>
									<h5 class="uppercase">Web Design</h5>
									<ul>
										<li>Fluent in the major web technologies <strong>HTML5</strong>, <strong>CSS3</strong> and <strong>JavaScript (jQuery)</strong></li>
										<li>Extensive knowledge of <strong>Foundation</strong> and experience in <strong>Bootstrap</strong></li>
										<li>Practical knowledge of <strong>Mysql</strong>, <strong>NoSql</strong> and <strong>PHP</strong></li>
										<li>Experience with task runners like <strong>Grunt</strong> and pre-proccesors like <strong>SASS</strong></li>
									</ul>
									<h5 class="uppercase">Software Engineering &#38; Project Management</h5>
									<ul>
										<li>Practical knowledge in <strong>JAVA</strong>, <strong>C#</strong>, <strong>Python</strong> and <strong>C++</strong></li>
										<li>Experience in <strong>GIT</strong></li>
										<li>Experience in <strong>agile product development</strong>
(Scrum)</li>
										
									</ul>
								</div>
								<div class="clear"></div>
							</section>
							<section>
								<!--
								<h3 class="highlight">Interests</h3>
								<p class="interests">
									Besides designing and developing things, I'm a <strong>music</strong> enthusiast in collecting, listening and creating - not so listenable - music.
									I spent a lot of time creating and tweaking sounds in <em>Ableton</em> and sampling obscure sources; I'm always searching for new and innovative music.</br> 
									Besides that I'm trying to get my head around the history and the evolution of <strong>typography</strong>. For a few years I have been trying to get a sense and feeling for type and studied a wide range of books about typography which is a never ending venture.
								</p>
								-->
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
							<div class="line"></div>
								<h2>Your
								<span class="headline" data-0="transform: scale(1) rotate(-22deg);" data-top="transform: scale(1.2) rotate(-6deg);">Questions</span>
							</h2>
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
				<p class="uppercase">&#169; 2015 Constantin Lehenmeier. All rights reserved. Credits for the icons go to Wilson Joseph, Blake Thompson, Don Patino and Jonah Bethlehem</p>
			</footer>
		</div>
	</div>
</body>
</html>