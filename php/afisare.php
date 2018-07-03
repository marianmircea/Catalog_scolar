<?php
	session_start();
	$servername="localhost";
	$username="root";
	$password="";
	$database="catalog";
	$conn=mysqli_connect($servername, $username, $password);
	$select_db = mysqli_select_db($conn, 'catalog');
	$out = 0;
	switch ($_SESSION["tip_user"]) {
		case 1:
			$cerinta = "SELECT id, Nume, Prenume, Materie FROM utilizatori";
			$tip_em_pw = mysqli_query($conn, $cerinta);
			$num_randuri = mysqli_num_rows($tip_em_pw);
			echo "Utilizator profesor.<br><br>";
			while ($out === 0 && $rand = mysqli_fetch_assoc($tip_em_pw)) {
				if ($rand["id"] === $_SESSION["id_unic"]) {
				$out = 1;
				echo $rand["Nume"]."<br>";
				echo $rand["Prenume"]."<br>";
				echo $rand["Materie"]."<br>";
				echo $_SESSION["utilizator"]."<br>";
				}
			}
			break;
		case 2:
			$cerinta = "SELECT id, Nume, Prenume, matricol FROM utilizatori";
			$tip_em_pw = mysqli_query($conn, $cerinta);
			$num_randuri = mysqli_num_rows($tip_em_pw);
			echo "Utilizator elev.<br><br>";
			while ($out === 0 && $rand = mysqli_fetch_assoc($tip_em_pw)) {
				if ($rand["id"] === $_SESSION["id_unic"]) {
				$out = 1;
				echo $rand["Nume"]."<br>";
				echo $rand["Prenume"]."<br>";
				echo $rand["matricol"]."<br>";
				echo $_SESSION["utilizator"]."<br>";
				}
			}
			break;
		case 3:
			$cerinta = "SELECT id, Nume, Prenume, Telefon_contact FROM utilizatori";
			$tip_em_pw = mysqli_query($conn, $cerinta);
			$num_randuri = mysqli_num_rows($tip_em_pw);
			echo "Utilizator parinte.<br><br>";
			while ($out === 0 && $rand = mysqli_fetch_assoc($tip_em_pw)) {
				if ($rand["id"] === $_SESSION["id_unic"]) {
				$out = 1;
				echo $rand["Nume"]."<br>";
				echo $rand["Prenume"]."<br>";
				echo $rand["Telefon_contact"]."<br>";
				echo $_SESSION["utilizator"]."<br>";
				}
			}
			break;
		}
?>