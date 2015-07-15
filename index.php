<?php
// ~~~~~~~~~~~~~~~~~~~~| HEADER |~~~~~~~~~~~~~~~~~~~~
// Parameter active-Status
$thisPage="start";
// Meta-Informationen
$metaTitle = "RUB | Professional School of Education";


include "conn_loc.php";

/*
// Datum abfragen & konvertieren
$heute = date("d.m.Y");
$datum = strtotime($heute);
$new_datum = $datum - 345600;
$ftb = strftime("%Y-%m-%d", $new_datum);
*/

// Summe der aktuellen Einträge
try {
    $stmt = $db->prepare("SELECT * FROM aktuelles WHERE TO_DAYS(NOW()) - TO_DAYS(datum) <=duration ORDER BY first DESC, datum ASC");
    $stmt->execute();
    $count = $stmt->rowCount();
}
catch(PDOException $e) {
    echo $e->getMessage();
}

// Summe der Archiv-Einträge
try {
    $stmt = $db->prepare("SELECT * FROM aktuelles WHERE datum <= CURRENT_DATE");
    $stmt->execute();
    $count_archiv = $stmt->rowCount();
}
catch(PDOException $e) {
    echo $e->getMessage();
}



// Archiv
if (isset($_POST["archiv"])) {
    try {
        $stmt = $db->prepare("SELECT * FROM aktuelles WHERE datum <= CURRENT_DATE");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }

    $btn = "<input type='submit' class='form_btn' value='Zurück' name='all'>";
}
// Standard
else {
    try {
        $stmt = $db->prepare("SELECT * FROM aktuelles WHERE TO_DAYS(NOW()) - TO_DAYS(datum) <=duration ORDER BY first DESC, datum ASC");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }

    $btn = "<input type='submit' class='form_btn' value='Archiv ($count_archiv Einträge)' name='archiv'>";

}

include "includes/functions.php";
$base = "";

?>

<!DOCTYPE html>
<html>
<head>
    <title><?= isset ($metaTitle) ? $metaTitle : "Default Title" ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="author" content="Professional School of Education">
    <meta name="revisit-after" content="1 days">
    <meta name="robots" content="index, follow">
	<!-- scripts -->
    <script src="http://code.jquery.com/jquery-1.11.1.js" type="text/javascript"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js" type="text/javascript"></script>
    <script async="" type="text/javascript" src="<?=$base;?>inc/scrollTop.js"></script>
    <!-- css -->
    <link href="<?=$base;?>css/style.css" rel="stylesheet" type="text/css">
    <!-- fonts -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <?php
    if ( $thisPage=="start") { $active = 'one'; }
    elseif ( $thisPage=="pse") { $active = 'two'; }
    elseif ( $thisPage=="med") { $active = 'three'; }
    elseif ( $thisPage=="forschung") { $active = 'four'; }
    else {$active = 'none';}
    ?>
    <style type="text/css">
#navigation li.<?= $active; ?>{background-color:#fff;color:#003560;}
    </style>
    <style type="text/css">
#navigation li.<?= $active; ?> a {color:#003560;box-shadow:   0px 3px 10px -8px #999;}
    </style>
    <style type="text/css">
#navigation li.<?= $active; ?> a:hover {color:#fff;}
    </style>
</head>

<body>
    <a id="top-link"></a> <a href="#top-link" class="top_btn"></a>
    <div class="wrapper">
        <div class="container">
            <div class="header">
                <a href="http://www.ruhr-uni-bochum.de"><img src="http://www.ruhr-uni-bochum.de/images/logos/rub-schriftzug.gif" alt="Ruhr-Universität Bochum Wortmarke" width="247" height="18" id="schriftzug"></a>
                <div class="headline">
                    <h1><?php echo $metaTitle ?></h1>
                </div>
            </div>
            <nav>
			        <ul>
			            <li><a href="#">Aktuelles</a></li>
			            <li><a href="#">Professional School of Education</a>
			            <!-- First Tier Drop Down -->
			            <ul>
			                <li><a href="#">Leitung</a></li>
			                <li><a href="#">Geschäftsstelle</a></li>
			                <li><a href="#">Team</a></li>
			            </ul>
			            </li>
			            <li><a href="#">Gestuftes Lehramtsstudium</a>
			            <!-- First Tier Drop Down -->
			            <ul>
			                <li><a href="#">Studium an der RUB</a></li>
			                <li><a href="#">Beratung</a></li>
			                <li><a href="#">Ordnungen</a>
			                <li><a href="#">Links</a>
			            	<!-- Second Tier Drop Down -->
			                <ul>
			                    <li><a href="#">HTML/CSS</a></li>
			                    <li><a href="#">jQuery</a></li>
			                    <li><a href="#">Other</a>
			                        <!-- Third Tier Drop Down -->
			                        <ul>
			                            <li><a href="#">Stuff</a></li>
			                            <li><a href="#">Things</a></li>
			                            <li><a href="#">Other Stuff</a></li>
			                        </ul>
			                    </li>
			                </ul>
			                </li>
			            </ul>
			            </li>
			            <li><a href="#">Praktikumsbüro</a></li>
			            <li><a href="#">Forschung</a></li>
			            <li><a href="#">Nachwuchsförderung</a></li>
			            <li><a href="#">Lehrerfortbildung</a></li>
			        </ul>
				</nav>
            <div class="jumbotron"></div>


			<div class="main">
                <div>
                    <div class="kontakt">
                        <h3>Kontakt</h3>
                        <?php /*kontakt(school); */?>
                    </div>

                    <div class="kontakt">
                        <h3>Öffnungszeiten</h3>

                        <h4>Sekretariat (SH 1/165)</h4>

                        <p>Mo, Di, Mi von 09.00-11.30 Uhr</p>
                        <hr class="dashed">

                        <h4>Praktikumsbüro (SH 1/176)</h4>

                        <p>Di, Mi u. Do von 08.30-11.00 Uhr</p>
                        <hr class="dashed">

                        <h4>Zulassung und Zeugnis (SH 1/168)</h4>

                        <p>Pers. Beratung Mi 10.00-12.00 Uhr</p>
                    </div>

                    <div class="kontakt" id="beratung">
                        <h3>Beratung</h3>

                        <p><a href="mailto:pse-beratung@rub.de">pse-beratung@rub.de</a><br>
                        <a href="sites/studium/beratung.php">Weitere Informationen</a></p>
                    </div>

                    <div class="angeklickt" id="angeklickt">

                    </div>

                    <div class="angeklickt">
                        <form action='index.php' method='post'>
                            <?=$btn;?>
                            </form>
                    </div>
				</div>

                <div id="col3">
                    <div id="col3_content" class="clearfix">
                        <div id="inhalt">
                            <h2>Aktuelles</h2><?php

                                                foreach ($rows as $row) {

                                                   echo $row->titel;
                                                }
                                                ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer">
	            <div class="col-l-4">
		        	<h3>Professional School of Education	</h3>
					Geschäftsstelle	<br/>
					Gebäude SH 1/165<br/>
					Universitätsstr. 150<br/>
					D-44801 Bochum	<br/>
					Tel 0234 32-11991	<br/>
					Fax 0234 32-14647	<br/>
					pse@rub.de
	            </div>
	            <div class="col-l-4">
		            <h3>Öffnungszeiten</h3>
		            Sekretariat (SH 1/165)<br/>
					Mo, Di, Mi von 09.00-11.30 Uhr
					<hr/>
					Sekretariat (SH 1/165)<br/>
					Mo, Di, Mi von 09.00-11.30 Uhr
					<hr/>
					Sekretariat (SH 1/165)<br/>
					Mo, Di, Mi von 09.00-11.30 Uhr

	            </div>
	            <div class="col-l-4">
		                                    <h3>Angeklickt</h3>

                        <ul>
                            <li><a href="download/2010-08-31_ordnung_pse_amtlich.pdf" target="_blank">Ordnung der PSE</a></li>

                            <li><a href="download/antrag_pse_mitgliedschaft.pdf" target="_blank">Mitglied werden</a></li>

                            <li><a href="download/Protokoll_MV_17.12.13.pdf" target="_blank">Protokoll Mitgliederversammlung</a></li>

                            <li><a href="http://lists.ruhr-uni-bochum.de/mailman/listinfo/pse-news" class=" icon-link" target="_blank">Newsletter bestellen</a></li>

                            <li><a href="download/schoolnewsnr915.pdf" target="_blank">Schoolnews Nr. 9</a></li>

                            <li><a href="download/pseflyer2013.pdf" target="_blank">Infoflyer PSE</a></li>

                            <li><a href="download/Gestuftes_Lehramtsstudium_RUB_2014_15.pdf" target="_blank">Informationsbroschüre</a></li>

                            <li><a href="sites/studium/divormed.php">Vorlesungsverzeichnis</a></li>

                            <li><a href="sites/forschung/foerderpreis.php">Förderpreis Lehrerausbildung</a></li>
                        </ul>
	            </div>
	            <div class="col-l-4">
		            <h3>Rest</h3>
	            </div>
			</div>
            <div class="bottomLine">
	            <?php
	                	$filename = $_SERVER['SCRIPT_FILENAME'];
	                    echo "Stand: ".date ("d.m.Y", filemtime($filename))." um ".date ("H:i", filemtime($filename)). " Uhr";
	                ?>
	             <a href="mailto:pse-support@rub.de">Helpdesk</a> | <span id="druckversion"><a onclick="javascript:self.print(); return false;" title="Diese Seite drucken">Drucken</a></span> | <a href="http://www.ruhr-uni-bochum.de/impressum.htm" target="_blank">Impressum</a>

            </div>
        </div>
    </div>

</body>
</html>
