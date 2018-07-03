<?php
	session_start();
	$servername="localhost";
	$username="root";
	$password="";
	$database="catalog";
	$conn = mysqli_connect($servername, $username, $password);
	$select_db = mysqli_select_db($conn, 'catalog');
	$materia = $_SESSION["materia"];
	$cerinta_materii = "SELECT * FROM materii";
	$materiile = mysqli_query($conn, $cerinta_materii);
	while ($linie_materii = mysqli_fetch_assoc($materiile)) {
		if ($linie_materii["nume_materie"] === $materia) {
			$id_materie = $linie_materii["id_materie"];
			}
		}
	/*if(isset( $_GET[ 'numele' ] ) && !empty( $_GET[ 'numele' ] ) ) {
		echo "Salut, {$_GET[ 'numele' ]}!";
		}
		else echo "nu ai bagat nimik.<br>";*/
	/*$grup_note = unserialize(urldecode($_GET["grup"]));
	for ($k = 1; $k <= 5; $k++) {
		echo $grup_note[$k]."<br>";
		}*/
	/*$probe = $_POST["nota"];*/
	echo "<pre>";
		print_r($_POST["nota"]);
	echo "</pre>";
	if (empty($_POST["data"])) {
		echo "Va rugam alegeti o data de acordare a notelor.<br>";
		header ('refresh:1; url = http://localhost/Catalog_scolar/Inregistrari_profesori.php');
		die();
		}
		$data_inreg = $_POST["data"];
	if ($data_inreg < "2018-02-10") {
		$sem = 1;
		}
		else {
			$sem = 2;
			}
	$clasa = $_GET["class"];
	$notele = $_POST["nota"];
	$ok = 0;
	foreach($notele as $x => $x_value) {
		$nota = $x_value;
		$id_elev = $x;
		/*echo "id=" . $x . ", nota=" . $x_value;
		echo "<br>";*/
		$record = "INSERT INTO note (valoare_nota, clasa, semestru, id_materie, id_elev, data_obtinere)
		VALUES ('$nota', '$clasa', '$sem', '$id_materie', '$id_elev', '$data_inreg')";
		if (mysqli_query($conn, $record)) {
			$ok ++;
			/*$_SESSION["confirmare"] = "Inregistrare reusita.<br>Multumim!";
			echo "Inregistrare reusita.<br>Multumim!";
			header ('refresh:1; url = http://localhost/Catalog_scolar/Inregistrari_profesori.php');*/
			}
		}
	echo $ok." Inregistrari reusite! Multumim."."<br>";
	header ('refresh:1; url = http://localhost/Catalog_scolar/Inregistrari_profesori.php');
	
	mysqli_close($conn);
?>