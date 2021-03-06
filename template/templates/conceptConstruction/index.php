<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]> <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]> <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<?php
// get current menu name
$menu = JSite::getMenu();
if ($menu && $menu->getActive()) {
		$menu = $menu->getActive();
		$page_sfx = $menu->params->get('pageclass_sfx');
    $menu = $menu->alias;
} else {
	$menu = "";
	$page_sfx = "";
}


if ($_SERVER['SERVER_PORT'] === 8888 ||
		$_SERVER['SERVER_ADDR'] === '127.0.0.1' ||
		stripos($_SERVER['SERVER_NAME'], 'ccistaging') !== false ||
		stripos($_SERVER['SERVER_NAME'], 'dev') === 0) {

	$testing = true;
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
} else {
	$testing = false;
}

$analytics = "UA-28572584-1";
?>

<head>
	<meta charset="utf-8" />
	<?= ($testing)? '':  '<meta http-equiv="X-UA-Compatible" contents="IE=edge,chrome=1">' ?>

 	<jdoc:include type="head" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/x-icon" href="/templates/<?= $this->template ?>/resources/favicon.ico">
	<link rel="shortcut icon" type="image/x-icon" href="/templates/conceptConstruction/favicon.ico">	
	<link rel="apple-touch-icon" href="/templates/<?= $this->template ?>/resources/apple-touch-icon.png">

	<!-- load css -->
	<?php if ($testing): ?>
		<link rel="stylesheet" href="/templates/<?= $this->template ?>/css/template.css">
	<?php else: ?>
		<link rel="stylesheet" href="/templates/<?= $this->template ?>/css/template.min.css">
	<?php endif; ?>
	
	<script type="text/javascript" src="http://use.typekit.com/dss7lza.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->

	<!-- load modernizer, all other at bottom -->
	<?php if ($testing): ?>
		<script src="/templates/<?= $this->template ?>/js/libs/modernizr-1.7.js"></script>
	<?php else: ?>
		<script src="/templates/<?= $this->template ?>/js/libs/modernizr-1.7.min.js"></script>
	<?php endif; ?>
</head>

<body class="<?= $menu ?>">

	<div id="header" class=""><div><div>
		<jdoc:include type="modules" name="header" style="rounded" />
		<div class="buttonContainer"><div><div class="button"></div></div></div>
	</div></div></div>
	
	<div id="body"><div><div><div class="container">
		<div id="content" class="<?php 
					if (!$this->countModules('sidebar')) {
						echo 'wide1';
					} else {
						echo 'wide2';
					}
			?>"><div><div>
			<jdoc:include type="component" />
		</div></div></div>
		<?php if ($this->countModules('sidebar')): ?>
		<div id="sidebar">
			<jdoc:include type="modules" name="sidebar" style="rounded" />
			<div class="clear"></div>
		</div>
		<?php endif; ?>
		<div class="clear"></div>
		<?php if ($this->countModules('bottom')): ?>
		<div id="bottom">
			<jdoc:include type="modules" name="bottom" style="xhtml" />
			<div class="clear"></div>
		</div>
		<?php endif; ?>
		<div class="clear"></div>
	</div></div></div></div>
	
	<div id="footer"><div><div class="container">
		<div id="copyright">
			&copy; Concept Construction LTD. <?php echo date('Y') ?>. All Rights Reserved.<br />
			<a target="_blank" href="http://ccistudios.com">Site by CCI Studios</a>
		</div>
		<jdoc:include type="modules" name="footer" style="xhtml" />
		<div class="clear"></div>
	</div></div></div>
	
	
	<div class="hidden">
		<jdoc:include type="modules" name="hidden" style="raw" />
	</div>

	<!-- load scripts -->
	<?php if ($testing): ?>
		<script src="/templates/<?= $this->template ?>/js/columns.js"></script>
		<script src="/templates/<?= $this->template ?>/js/dropmenu.js"></script>
		<script src="/templates/<?= $this->template ?>/js/html5.js"></script>
		<script src="/templates/<?= $this->template ?>/js/header.js"></script>
	<?php else: ?>
		<script>
			var _gaq=[["_setAccount","<?php echo $analytics?>"],["_trackPageview"]];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
				g.src=("https:"==location.protocol?"//ssl":"//www")+".google-analytics.com/ga.js";
				s.parentNode.insertBefore(g,s)}(document,"script"));
	  	</script>
		<script src="/templates/<?= $this->template ?>/js/scripts.min.js"></script>
	<?php endif; ?>
</body>
</html>
