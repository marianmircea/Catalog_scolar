<?php
	session_start();
	$parola = "";
	$nume = $_POST["nume"];
	$prenume = $_POST["prenume"];
	$matricol = $_POST["matricol"];
	$tel_parinte = $_POST["telefon"];
	$email = $_POST["email"];
	$parola = $_POST["parola"];
	$parola2 = $_POST["parola2"];
	$user_type = 2;
	if (empty($_POST["parola"]) || ($parola != $parola2)) {
		echo "Parola introdusa gresit.<br>Va rugam incercati din nou.<br>";
		header ('refresh:1; url = http://localhost/Catalog_scolar/Creare_cont_elev.htm');
		die();
		}
	$servername="localhost";
	$username="root";
	$password="";
	$database="catalog";
	$conn = mysqli_connect($servername, $username, $password);
	$select_db = mysqli_select_db($conn, 'catalog');
	$selectie = "SELECT nr_matricol FROM elevi";
	$nr_matricole = mysqli_query($conn, $selectie);
	$num_randuri = mysqli_num_rows($nr_matricole);
	$out = 0;
	while ($out === 0 && $rand = mysqli_fetch_assoc($nr_matricole)) {
		if ($rand["nr_matricol"] === $_POST["matricol"]) {
			$out = 1;
			echo "Numarul matricol exista deja in baza de date.<br>Va rugam incercati din nou.<br>";
			header ('refresh:1; url = http://localhost/Catalog_scolar/Creare_cont_elev.htm');
			die();
			}
		}
	$selectie = "SELECT id_parinte FROM parinti WHERE tel_contact = $tel_parinte";
	$parinte = mysqli_query($conn, $selectie);
	$linie_parinte = mysqli_fetch_assoc($parinte);
	$id_parinte = $linie_parinte["id_parinte"];
	$parola = password_hash($parola, PASSWORD_DEFAULT);
	$record = "INSERT INTO elevi (nume, prenume, email, nr_matricol, id_parinte, parola)
		VALUES ('$nume', '$prenume', '$email', '$matricol', $id_parinte, '$parola')";
	if (mysqli_query($conn, $record)) {
		$_SESSION["confirmare"] = "CREARE CONT ELEV REUSITA!<br>Multumim!";
		echo "CREARE CONT ELEV REUSITA!<br>Multumim!";
		header ('refresh:1; url = http://localhost/Catalog_scolar/Catalog.php');
		}
		else {
			echo "Parintele d-voastra inca nu are cont creat.";
			header ('refresh:1; url = http://localhost/Catalog_scolar/Catalog.php');
			die();
			}
	mysqli_close($conn);
?>