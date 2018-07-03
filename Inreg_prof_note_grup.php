<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Creare cont | Catalog online</title>
		<link rel="stylesheet" type="text/css" href="php\css_pt_afisare.css">
	</head>
	<body>
		<section>
<?php
	session_start();
	$clasa = $_GET["clasa"];
	$_SESSION["clasa"] = $clasa;
	if ($clasa == 0) {
		echo "Va rugam alegeti o clasa!";
		header ('refresh:0.5; url = http://localhost/Catalog_scolar/Inregistrari_profesori.php');
		die();
		}
?>
			<h3>Inregistrare note la materia 
<?php 
	echo $_SESSION["materia"];
?>
					, Clasa a 
<?php
	echo $clasa;
?>
								-a:</h3>
			<form action="php\note_pe_grup.php?class=<?php echo $clasa;?>" method="post">
				<table id="inreg_note_grup">
					<tr>
						<th>Edit</th>
						<th>Id elev</th>
						<th>Nume</th>
						<th>Prenume</th> 
						<th>Nr. matricol</th>
						<th>Note obtinute</th>
						<th>Nota acordata</th>
						<!--<th>Data acordarii</th>
						<!--<th>Inregistrare</th>-->
					</tr>
					
<?php
	$servername="localhost";
	$username="root";
	$password="";
	$database="catalog";
	$materia = $_SESSION["materia"];
	$conn = mysqli_connect($servername, $username, $password);
	$select_db = mysqli_select_db($conn, 'catalog');
	$cerinta_materii = "SELECT * FROM materii";
	$materiile = mysqli_query($conn, $cerinta_materii);
	while ($linie_materii = mysqli_fetch_assoc($materiile)) {
		if ($linie_materii["nume_materie"] === $materia) {
			$id_mat = $linie_materii["id_materie"];
			}
		}
	$select_elev_unic = "SELECT DISTINCT id_elev FROM note WHERE clasa = $clasa";
	$elevi_unici = mysqli_query($conn, $select_elev_unic);
	$k = 1;
	while ($linie_el_unici = mysqli_fetch_assoc($elevi_unici)) {
		$id_unic = $linie_el_unici["id_elev"];
?>
					<tr>
						<td>
						 <a href="php\Inreg_individuala.php?id_elev=<?php echo $id_unic;?>">Editare</a>
						</td>
						<td>
<?php	
		echo $id_unic;
?>
						</td>
						<td>
<?php
		$sel_elev = "SELECT * FROM elevi WHERE id_elev = $id_unic";/*tre adus toate informatiile despre elev ....*/
		$elevul = mysqli_query($conn, $sel_elev);
		$linie = mysqli_fetch_assoc($elevul);
		echo $linie["nume"];
?>
						</td>
						<td>
<?php
		echo $linie["prenume"];
?>
						</td>
						<td>
<?php
		echo $linie["nr_matricol"];
?>
						</td>
						<td>
<?php
		/*notele obtinute si existente pana in acest moment*/
		$selectie = "SELECT * FROM note WHERE clasa = $clasa AND id_materie = $id_mat AND id_elev = $id_unic";
		$elevii = mysqli_query($conn, $selectie);
		$note[0] = 0;
		$i = 1;
		while ($linii_note = mysqli_fetch_assoc($elevii)) {
			/*if ($linii_note["id_elev"] == $id_unic) {*/
				$note[$i] = $linii_note["valoare_nota"];
				$i++;
				/*}*/
			}
		if (count($note) == 1) {
			echo "-";
			}
			else {
				for ($j = 1; $j < count($note); $j++) {
				echo $note[$j]." ";
				}
			}
?>
						</td>
						<td>
							Nota <select name="nota[<?php echo $id_unic;?>]">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							</select>
						</td>
						<!--<td>
							Data <input type="date" name="data"/>
						</td>
						<!--<td>
							<a href="php\Inreg_individuala.php">Salveaza</a>
						</td>-->
					</tr>
<?php
	$grup_note[$k] = $id_unic;
	$k++;
	}
	$serial = urlencode(serialize($grup_note));
?>
				</table>
				<p>Selectati data acordarii notelor: <input type="date" name="data"/></p>
				<p><input type="submit" value="Salveaza"/></p>
				</form>
			<!--<p><a href="php\probe_inreg_note_gruppp.php?grup=<?php echo $serial;?>&materia=<?php echo $_SESSION["materia"];?>&clasa=<?php echo $clasa;?>">Salveaza</a></p>-->
		</section>
	</body>
</html
<?php
	mysqli_close($conn);
?>