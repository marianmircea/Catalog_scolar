<?php
	session_start();
	$parola = "";
	$nume = $_POST["nume"];
	$prenume = $_POST["prenume"];
	$materia = $_POST["materia"];
	$email = $_POST["email"];
	$parola = $_POST["parola"];
	$parola2 = $_POST["parola2"];
	$user_type = 1;
	if (empty($_POST["parola"]) || ($parola != $parola2)) {
		echo "Parola introdusa gresit.<br>Va rugam incercati din nou.<br>";
		header ('refresh:1; url = http://localhost/Catalog_scolar/Creare_cont_profesor.htm');
		die();
		}
	$servername="localhost";
	$username="root";
	$password="";
	$database="catalog";
	$conn=mysqli_connect($servername, $username, $password);
	$select_db = mysqli_select_db($conn, 'catalog');
	$parola = password_hash($parola, PASSWORD_DEFAULT);
	$record = "INSERT INTO profesori (nume, prenume, email, materie, parola)
		VALUES ('$nume', '$prenume', '$email', '$materia', '$parola')";
	if (mysqli_query($conn, $record)) {
		$_SESSION["confirmare"] = "CREARE CONT PROFESOR REUSITA!<br>Multumim!";
		$_SESSION["materie"] = $materia;
		echo "CREARE CONT PROFESOR REUSITA!<br>Multumim!";
		header ('refresh:1; url = http://localhost/Catalog_scolar/Catalog.php');
		}
	mysqli_close($conn);
?>