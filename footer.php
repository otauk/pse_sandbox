<div id="footer">
	<div class="subcolumns">
		<div class="flinks center">
		<!--
		<a href="<?= $base;?>sites/studium/beratung.php">Aktivitäten</a>
		|
		-->
		<a href="<?= $base;?>index.php">Aktuelles</a>
		|
		<a href="<?= $base;?>sites/studium/beratung.php">Beratung</a>
		|
		<a href="<?= $base;?>sites/studium/praktikumsbuero.php">Praktikumsbüro</a>
		|
		<a href="<?= $base;?>sites/studium/divormed.php">Vorlesungsverzeichnis</a>
		</div>
	</div>

    <div class="subcolumns fusszeile">
				<div class=" center">
					<?php
					$filename = $_SERVER['SCRIPT_FILENAME'];
					echo "Letzte Änderung: ".date ("d.m.Y", filemtime($filename))." um ".date ("H:i", filemtime($filename)). " Uhr";
					?> | <a href="mailto:manuel.buczka@rub.de" title="Email Inhalt">Inhalt</a> &amp; <a href="mailto:webmaster@ruhr-uni-bochum.de" title="Email Webmaster">Technik</a> | <a href="<?=$base?>intern/index.php">Interner Bereich</a>
					|
					<span id="druckversion">
						<a onclick="javascript:self.print(); return false;" title="Diese Seite drucken" >Drucken</a>
					</span>
					|
					<a href="http://www.ruhr-uni-bochum.de/impressum.htm" target="_blank">Impressum</a>
				</div>
      </div>
</div> <!-- end footer -->
</div> <!--end page -->
</div> <!-- end page margins -->

</body>
</html>