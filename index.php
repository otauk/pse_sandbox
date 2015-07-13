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






// Alles anzeigen
if (isset($_POST["all"])) {
	try {
	    $stmt = $db->prepare("SELECT * FROM aktuelles WHERE TO_DAYS(NOW()) - TO_DAYS(datum) <=duration ORDER BY first DESC, datum ASC");
	    $stmt->execute();
	    $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
	}
	catch(PDOException $e) {
    	echo $e->getMessage();
	}
}

else {
// Standard
	try {
	    $stmt = $db->prepare("SELECT * FROM aktuelles WHERE TO_DAYS(NOW()) - TO_DAYS(datum) <=duration ORDER BY first DESC, datum ASC LIMIT 3");
	    $stmt->execute();
	    $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
	}
	catch(PDOException $e) {
	    echo $e->getMessage();
	}
}


include ("header.php");
include ("navi.php");
?>


    <img src="img/header.jpg" alt="RUB mood 01" class="big"> <a id="top"></a>

    <div id="main">
        <div id="col1">
            <div id="col1_content">
                <div>
                    <div class="kontakt">
                        <h3>Kontakt</h3><?php /*kontakt(school); */?>
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
                </div>
            </div>
        </div>

        <div id="col3">
            <div id="col3_content" class="clearfix">
                <div id="inhalt">
                    <h2>Aktuelles</h2>
					<div class='leftside'>
						<form action ='index.php' method='POST'>
							<input type='submit' class='form_btn' value='Alle (<?=$count;?>) Einträge' name='all'>
						</form>
					</div>
					<div class='align_right'>
						<form action ='index.php' method='POST'>
							<input type='submit' class='form_btn' value='Zurück' name='limit'>
						</form>
					</div>
					<div class='align_right'>
						<form action ='index.php' method='POST'>
							<input type='submit' class='form_btn' value='Archiv (<?=$count_archiv;?> Einträge)' name='archiv'>
						</form>
					</div>

                    <?php
                    foreach ($rows as $row) {

	                   echo $row->titel;
	                }
                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php include ("footer.php");?>
                </div>
            </div>
        </div>
    </div>
