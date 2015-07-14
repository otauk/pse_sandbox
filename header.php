<!DOCTYPE html>
<!-- ~~~~~~~~~~~~~~~~~~~~| ROOT DIR |~~~~~~~~~~~~~~~~~~~~ -->
<?php
$base = "";
?>

<!-- ~~~~~~~~~~~~~~~~~~~~| HEADER |~~~~~~~~~~~~~~~~~~~~ -->
<html>
<head>
<title><?= isset ($metaTitle) ? $metaTitle : "Default Title" ?></title>
<? if (isset ($metaKeys)): ?><meta name="keywords" lang="de" content="<?= $metaKeys; ?>" />
<? endif; ?>
<? if (isset ($metaDesc)): ?><meta name="description" lang="de" content="<?= $metaDesc; ?>" />
<? endif; ?>
<? if (isset ($metaDescEn)): ?><meta name="description" lang="en" content="<?= $metaDescEn; ?>" />
<? endif; ?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="author" content="Professional School of Education" />
<meta name="revisit-after" content="1 days" />
<meta name="robots" content="index, follow"/>
<!-- ~~~~~~~~~~~~~~~~~~~~| SCRIPTE |~~~~~~~~~~~~~~~~~~~~ -->
<!-- ///// jQuery ///// -->
<script src="http://code.jquery.com/jquery-1.11.1.js"></script>
<!-- ///// jQueryUI ///// -->
 <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<!-- ///// scrollTop ///// -->
<script async type="text/javascript" src="<?= $base;?>inc/scrollTop.js"></script>
<!-- ~~~~~~~~~~~~~~~~~~~~| CSS |~~~~~~~~~~~~~~~~~~~~ -->
<link href="<?= $base;?>css/style.css" rel="stylesheet" type="text/css" />
<link href="<?= $base;?>css/navigation.css" rel="stylesheet" type="text/css" />
<!--<link href="<?= $base;?>css/base.css" rel="stylesheet" type="text/css" />-->
<!--<link href="<?= $base;?>css/content.css" rel="stylesheet" type="text/css" />-->
<!-- ~~~~~~~~~~~~~~~~~~~~| FONTS |~~~~~~~~~~~~~~~~~~~~ -->
<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<!-- ~~~~~~~~~~~~~~~~~~~~| ACTIVE STATUS |~~~~~~~~~~~~~~~~~~~~ -->
<?php
if ( $thisPage=="start") { $active = 'one'; }
elseif ( $thisPage=="pse") { $active = 'two'; }
elseif ( $thisPage=="med") { $active = 'three'; }
elseif ( $thisPage=="forschung") { $active = 'four'; }
else {$active = 'none';}
?>
<style type="text/css">#navigation li.<?= $active; ?>{background-color:#fff;color:#003560;}</style>
<style type="text/css">#navigation li.<?= $active; ?> a {color:#003560;box-shadow:   0px 3px 10px -8px #999;}</style>
<style type="text/css">#navigation li.<?= $active; ?> a:hover {color:#fff;}</style>
</head>

<?php
/*
*	========================================================
* 	Include functions.php
*	========================================================
*/
include "includes/functions.php";
?>
<body>
<!-- scrollTop -->
<a id="top-link"></a>
<a href="#top-link" class="top_btn"></a>
<div class="wrapper">
<div class="page">
<div id="header">
	<a href="http://www.ruhr-uni-bochum.de">
	<img src="http://www.ruhr-uni-bochum.de/images/logos/rub-schriftzug.gif" alt="Ruhr-Universität Bochum Wortmarke" width="247" height="18" id="schriftzug" style="margin-bottom: 15px; border:0;" /></a>

	<div id="topnav">
    <a href="http://www.rub.de" title="Startseite der RUB">
	<img class="logo" width="102" height="102" src="http://www.rub.de/images/logo/logo-rub-102.gif" alt="RUB Label" />
	</a>

	<span id="uninavi">
	<a title="Startseite der RUB" href="http://www.rub.de"> Startseite</a>
	|
	<a title="RUB Schnellzugriff" href="http://www.ruhr-uni-bochum.de/uebersicht/">Übersicht</a>
	|
	<a title="RUB Suchmaschine" href="http://www.ruhr-uni-bochum.de/suche/">Suche</a>
	|
	<a title="Stichwortverzeichnis der RUB" href="http://www.ruhr-uni-bochum.de/a-z/">A-Z</a>
	</span>
    </div>

<!-- Titel der jeweiligen Unterseite -->
<div id="ueberschrift">
<h1><?php echo "$metaTitle" ?></h1>
</div>

