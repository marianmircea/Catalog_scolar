<?php
	session_start();
	$parola = "";
	$clasa = $_POST["clasa"];
	$sem = $_POST["semestrul"];
	$materia = $_SESSION["materia"];
	$matricol = $_POST["matricol"];
	$absenta = 1;
	$data_inreg = $_POST["data"];
	$servername="localhost";
	if (empty($_POST["matricol"]) || empty($_POST["data"])) {
		echo "Numarul matricol si / sau data lipsesc.<br>Va rugam incercati din nou.<br>";
		header ('refresh:1; url = http://localhost/Catalog_scolar/Inreg_prof_abs.php');
		die();
		}
	$username="root";
	$password="";
	$database="catalog";
	$conn = mysqli_connect($servername, $username, $password);
	$select_db = mysqli_select_db($conn, 'catalog');
	/*aicisa trebuie facuta interogarea din tabelul de elevi, sa aduci id-ul elevului*/
	$cerinta = "SELECT id_elev, nr_matricol FROM elevi";
	$tip_em_pw = mysqli_query($conn, $cerinta);
	$num_randuri = mysqli_num_rows($tip_em_pw);
	$out = 0;
	$id_elev = 0;
	while ($out == 0 && $rand = mysqli_fetch_assoc($tip_em_pw)) {
		if ($rand["nr_matricol"] === $matricol) {
			$out = 1;
			$id_elev = $rand["id_elev"];
			}
		}
	if ($id_elev == 0) {
		echo "Numarul matricol nu exista in baza de date.<br>Va rugam reverificati.<br>";
		header ('refresh:1; url = http://localhost/Catalog_scolar/Inreg_prof_abs.php');
		die();
		}
	/*tre adus id-ul materiei, de bagat in BD ....*/
	$cerinta = "SELECT id_materie, nume_materie FROM materii";
	$tip_em_pw = mysqli_query($conn, $cerinta);
	$num_randuri = mysqli_num_rows($tip_em_pw);
	$out = 0;
	while ($out == 0 && $rand = mysqli_fetch_assoc($tip_em_pw)) {
		if ($rand["nume_materie"] === $materia) {
			$out = 1;
			$id_materie = $rand["id_materie"];
			}
		}
	$record = "INSERT INTO absente (valoare_abs, clasa, semestru, id_materie, id_elev, data_obtinere)
		VALUES ('$absenta', '$clasa', '$sem', '$id_materie', '$id_elev', '$data_inreg')";
	if (mysqli_query($conn, $record)) {
		$_SESSION["confirmare"] = "Inregistrare reusita.<br>Multumim!";
		echo "Inregistrare reusita.<br>Multumim!";
		header ('refresh:1; url = http://localhost/Catalog_scolar/Inregistrari_profesori.php');
		}
	mysqli_close($conn);
?>