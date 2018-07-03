<?php
	session_start();
	if (empty($_POST["user"]) || empty($_POST["parola"])) {
		echo "Utilizator sau / si parola nespecificate.<br>Va rugam incercati din nou.<br>";
		header ('refresh:1; url = http://localhost/Catalog_scolar/Catalog.php');
		die();
		}
	$servername="localhost";
	$username="root";
	$password="";
	$database="catalog";
	$conn = mysqli_connect($servername, $username, $password);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
		}
	/*echo "Connected successfully.<br>";*/
	$select_db = mysqli_select_db($conn, 'catalog');
	if (!$select_db) {
		die ("No connection to database.");
		}
	/*echo "Connected with the database.<br>";*/
	$_SESSION["tip_user"] = 0;
	$cerinta = "SELECT id_elev, nume, prenume, email, nr_matricol, parola FROM elevi";
	$tip_em_pw = mysqli_query($conn, $cerinta);
	$num_randuri = mysqli_num_rows($tip_em_pw);
	$out = 0;
	while ($out == 0 && $rand = mysqli_fetch_assoc($tip_em_pw)) {
		if (($rand["email"] === $_POST["user"]) && password_verify($_POST["parola"], $rand["parola"])) {
			$out = 1;
			$_SESSION["id_unic"] = $rand["id_elev"];
			$_SESSION["nume_user"] = $rand["nume"];
			$_SESSION["prenume_user"] = $rand["prenume"];
			$_SESSION["matricol"] = $rand["nr_matricol"];
			$_SESSION["utilizator"] = $rand["email"];
			$_SESSION["tip_user"] = 2;
			header ('refresh:0; url = http://localhost/Catalog_scolar/Vizualizare_elevi.php');
			}
		}
	$cerinta = "SELECT id_profesor, nume, prenume, email, materie, parola FROM profesori";
	$tip_em_pw = mysqli_query($conn, $cerinta);
	$num_randuri = mysqli_num_rows($tip_em_pw);
	$out = 0;
	while ($out == 0 && $rand = mysqli_fetch_assoc($tip_em_pw)) {
		if (($rand["email"] === $_POST["user"]) && password_verify($_POST["parola"], $rand["parola"])) {
			$out = 1;
			$_SESSION["id_unic"] = $rand["id_profesor"];
			$_SESSION["nume_user"] = $rand["nume"];
			$_SESSION["prenume_user"] = $rand["prenume"];
			$_SESSION["materia"] = $rand["materie"];
			$_SESSION["utilizator"] = $rand["email"];
			$_SESSION["tip_user"] = 1;
			header ('refresh:0; url = http://localhost/Catalog_scolar/Inregistrari_profesori.php');
			}
		}
	$cerinta = "SELECT * FROM parinti";
	$tip_em_pw = mysqli_query($conn, $cerinta);
	$num_randuri = mysqli_num_rows($tip_em_pw);
	$out = 0;
	while ($out === 0 && $rand = mysqli_fetch_assoc($tip_em_pw)) {
		if (($rand["email"] === $_POST["user"]) && password_verify($_POST["parola"], $rand["parola"])) {
			$out = 1;
			$_SESSION["id_unic"] = $rand["id_parinte"];
			$_SESSION["nume_user"] = $rand["nume"];
			$_SESSION["prenume_user"] = $rand["prenume"];
			$_SESSION["telefon"] = $rand["tel_contact"];
			$_SESSION["utilizator"] = $rand["email"];
			$_SESSION["tip_user"] = 3;
			header ('refresh:0; url = http://localhost/Catalog_scolar/Vizualizare_parinti.php');
			}
		}
	if ($_SESSION["tip_user"] == 0) {
		echo "Datele introduse nu le regasim in baza de date; va rugam incercati din nou.";
		header ('refresh:1; url = http://localhost/Catalog_scolar/php/log_out.php');
		die();
		}
	mysqli_close($conn);
?>