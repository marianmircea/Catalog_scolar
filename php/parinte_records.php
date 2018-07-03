<?php
	session_start();
	$nume = $_POST["nume"];
	$prenume = $_POST["prenume"];
	$telefon = $_POST["telefon"];
	$email = $_POST["email"];
	$parola = $_POST["parola"];
	$parola2 = $_POST["parola2"];
	/*$user_type = 3;*/
	if (empty($_POST["parola"]) || ($parola != $parola2)) {
		echo "Parola introdusa gresit.<br>Va rugam incercati din nou.<br>";
		header ('refresh:1; url = http://localhost/Catalog_scolar/Creare_cont_parinte.htm');
		die();
		}
	$servername="localhost";
	$username="root";
	$password="";
	$database="catalog";
	$conn = mysqli_connect($servername, $username, $password);
	$select_db = mysqli_select_db($conn, 'catalog');
	$parola = password_hash($parola, PASSWORD_DEFAULT);
	/*$nr_matricole = mysqli_query($conn, $selectie);
	$num_randuri = mysqli_num_rows($nr_matricole);*/
	$record = "INSERT INTO parinti (nume, prenume, email, tel_contact, parola)
			VALUES ('$nume', '$prenume', '$email', '$telefon', '$parola')";
	if (mysqli_query($conn, $record)) {
		$_SESSION["confirmare"] = "CREARE CONT PARINTE REUSITA!<br>Multumim!";
		echo "CREARE CONT PARINTE REUSITA!<br>Multumim!";
		header ('refresh:2; url = http://localhost/Catalog_scolar/Catalog.php');
		}
	mysqli_close($conn);
?>