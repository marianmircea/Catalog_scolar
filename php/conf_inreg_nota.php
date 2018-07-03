<?php
	session_start();
	if (empty($_POST["sem"]) || empty($_POST["data"]) || empty($_POST["nota"])) {
		echo "Lipsesc date, va rugam incercati din nou.";
		header ('refresh:1; url = http://localhost/Catalog_scolar/Prof_viz_note.php');
		die();
		}
	$nota = $_POST["nota"];
	$sem = $_POST["sem"];
	$materia = $_SESSION["materia"];
	$data_inreg = $_POST["data"];
	$materia = $_SESSION["mat_curenta"];
	$id_elev = $_SESSION["elev_curent"];
	$clasa = $_SESSION["clasa"];
	echo $_POST["sem"]."<br>";
	echo $_POST["data"]."<br>";
	echo $_POST["nota"]."<br>";
	echo $_SESSION["clasa"]."<br>";
	echo $materia."<br>";
	echo $id_elev."<br>";
	$parola = "";
	$servername="localhost";
	$username="root";
	$password="";
	$database="catalog";
	$conn = mysqli_connect($servername, $username, $password);
	$select_db = mysqli_select_db($conn, 'catalog');
	$record = "INSERT INTO note (clasa, semestru, valoare_nota, id_materie, id_elev, data_obtinere)
		VALUES ('$clasa', '$sem', '$nota', '$materia', '$id_elev', '$data_inreg')";
	if (mysqli_query($conn, $record)) {
		$_SESSION["confirmare"] = "Inregistrare reusita.<br>Multumim!";
		echo "Inregistrare reusita.<br>Multumim!";
		header ('refresh:1; url = http://localhost/Catalog_scolar/Inregistrari_profesori.php');
		}
	mysqli_close($conn);
?>