<?php

require_once 'php/ProjectController.php';

$project_id = $next = $prev = 1;
$projects_max = get_max_projects();
if(isset($_GET['project'])){
	$project_id = intval(htmlentities($_GET['project']));
}

$project = get_project($project_id, false);

$next = ($project_id + 1) > $projects_max? 1: ($project_id + 1);
$prev = ($project_id - 1) <= 0? $projects_max: ($project_id - 1);

?>

<!doctype html>
<html class="no-js">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Portfolio of Constantin Lehenmeier</title>
	<link rel="stylesheet" type="text/css" href="css/projects.css">
	<script type="text/javascript" src="js/vendor/modernizr.js"></script>
	<script type="text/javascript">
		Modernizr.load([
			{
				test : Modernizr.mq('only all'),
				nope : ['js/vendor/respond.js']
			},
			'js/vendor/picturefill.js',
			'js/project.js'
		]);
	</script>
	<noscript>
		<link rel="stylesheet" type="text/css" href="css/projects.css">
	</noscript>
	<link rel="shortcut icon" type="image/png" href="assets/icons/favicon_small.png"/>
</head>
<body>
	<div class="nav-sticky">
		<nav class="top-bar">
			<ul class="title-bar">
				<li class="project-name-nav uppercase"><?php echo "{$project['project']['name']}" ?></li>
				<li class="toggle-nav" class="uppercase">
					<a href="#"></a>
				</li>
			</ul>
			<section class="top-bar-section">
				<ul>
					<li class="top-bar-item home uppercase"><a id="link-home" class="animsition-link" href="index.php">Home</a></li>
					<li class="top-bar-item uppercase"><a id="link-prev" class="animsition-link" href="projects.php?project=<?php echo "$prev" ?>">Prev</a></li>
					<li class="top-bar-item project-name-nav uppercase"><?php echo "{$project['project']['name']}" ?></li>
					<li class="top-bar-item uppercase"><a id="link-next" class="animsition-link" href="projects.php?project=<?php echo "$next" ?>">Next</a></li>
					<div class="clear"></div>
				</ul>
			</section>
		</nav>
	</div>
	<div id="skrollr-body" class="index projects">
		<div class="header" data-0="background-position: 50% -6%;" data-500="background-position: 50% 6%;">
			<div class="overlay"></div>
			<div class="header-text">
				<h2 class="project-name-header"><?php echo "{$project['project']['name']}" ?></h2>
				<p class="uppercase project-description-header">
					<?php echo "{$project['project']['summary']}" ?>
				</p>
				<p class="uppercase project-date-header">
					<?php echo "{$project['project']['date']}" ?>
				</p>			
			</div>
		</div>
		<div class="content">
			<div class="project">
				<section class="goal">
					<h3>Goal</h3>
					<p>
						<?php echo "{$project['project']['goal']}" ?>
					</p>
				</section>
				<section class="functionality">
					<h3>Functionality</h3>
					<p>
						<?php echo "{$project['project']['functionality']}"; ?>
					</p>
				</section>
				<section class="process">
					<h3>Development Process</h3>
					<p>
						<?php echo "{$project['project']['process']}"; ?>
					</p>
				</section>
				<section class="demo">
					<h3>Demo</h3>
					<p>
						<?php echo "{$project['project']['demo']}"; ?>
					</p>
				</section>
			</div>
			<footer class="footer">
			</footer>
		</div>
	</div>
</body>
</html>