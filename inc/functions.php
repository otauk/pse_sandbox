<?php

/*
* =======================================================================
* 	Funktion für Kontakt-Angaben in der Marginalspalte
*
*	Format
*	---------------
*	<name>
*	<funktion> 			[optional]
*	<gebaeude> <raum>
*	<straße>
*	<plz> <ort>
*	<telefon>
*	<fax> 				[optional]
*	<mail>
*
*	Icons für Telefon, Fax, Mail in includes/icons.php festgelegt
* =======================================================================
*/

function kontakt ($tag) {
	// icons einbinden
	include "icons.php";
	// db-Verbindung herstellen
	include (__DIR__)."/../db_con.inc.php";
	// UTF-8 Fix
	$res=mysql_query("SET NAMES 'utf8'");

	// Abfrage
	$cont = "SELECT vorname, nachname, funktion, gebaeude, raum, telefon, fax, mail FROM pse_team WHERE tag LIKE '%".$tag."%'";
	$cont_erg = mysql_query($cont);

	while($dsatz = mysql_fetch_assoc($cont_erg)) {
		// Zuweisung der Variablen
		$name = $dsatz["vorname"]." ".$dsatz["nachname"];
		$funktion = $dsatz["funktion"];
		$gebaeude = $dsatz["gebaeude"];
		$raum = $dsatz["raum"];
		$telefon = $dsatz["telefon"];
		$fax = $dsatz["fax"];
		$mail = $dsatz["mail"];

		// Ausgabe der Kontaktdaten
		echo "
			<p>
				$name												<br/>
			";
			// Mit oder ohne Funktion ausgeben
			if ($funktion != NULL) {
				echo "
				$funktion											<br/>
				";
			}
			else echo "";

		echo "
				Gebäude $gebaeude $raum								<br/>
				Universitätsstr. 150								<br/>
				D-44801 Bochum										<br/>
				$icon_phone 0234 32-$telefon	<br/>
			";
			// Mit oder ohne Faxnummer ausgeben
			if ($fax != NULL) {
				echo "
				$icon_fax 0234 32-$fax				<br/>
				";
			}
			else echo "";
		echo "
				$icon_mail
				<a href='mailto:$mail'>
					$mail
				</a>
			</p>
			";
	}
}

/*
* =======================================================================
* 	Funktionen für Kontakt-Blöcke (Ressorts)
* =======================================================================
*/

function kontakt_ps () {
	kontakt (bellenberg);
	kontakt (floss);
	}

function kontakt_drpse () {
	kontakt (sommer);
	kontakt (matt);
	kontakt (hegemann);
	}

function kontakt_coes () {
	kontakt (wirth);
	kontakt (thillmann);
	}

function kontakt_pb () {
	kontakt (pb);
	echo "<p>Peter Floß (Leitung)<br/>Dagmar Lieck (Praktikumsmanagement)<br/>Christa Meyer (Sekretariat)</p>";
	}

/*
* =======================================================================
* 	Optionen für Select-Liste mit Titeln
* =======================================================================
*/

$title_select ='
	<option></option>
	<option value="Prof. Dr.">Prof. Dr.</option>
	<option value="Jun.-Prof. Dr.">Jun.-Prof. Dr.</option>
	<option value="Dr.">Dr.</option>
	';



/*
* =======================================================================
* 	Letztes Update einer Tabelle
*
*	Parameter:
*	1: Name der Datenbank (idr 'pse')
*	2: Name der Tabelle (z.B. 'pse_team')
* =======================================================================
*/

// Letztes Update der Tabelle
function tbl_update ($db, $table) {
	include (__DIR__)."/../conn.php";
	$abfrage = "SHOW TABLE STATUS FROM $db LIKE '$table'";
	$ergebnis = $con->query($abfrage);
	$array = mysqli_fetch_assoc($ergebnis);
	$update = $array["Update_time"];
	$date = date_create($update);
	$update_frm = date_format($date, 'd.m.Y H:i:s');
	echo $update_frm;
}

/*
* =======================================================================
* 	Dynamische Klappboxen
* 	Funktionalität in expander.js
* =======================================================================
*/

function expand_content ($no) {
	$expand_content = "class='exp_content' id='dialog$no' data-id='$no'";
	echo $expand_content;
};
function expand_button ($no) {
	$expand_button = "<button class='form_btn exp_button exp'  id='opener$no' openid='$no'></button>";
	echo $expand_button;
};



?>