<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Creare cont | Catalog online</title>
		<link rel="stylesheet" type="text/css" href="css_pt_afisare.css">
	</head>
	<body>
		<section>
<?php
	session_start();
	$parola = "";
	$clasa = $_POST["clasa"];
	if (empty($_POST["matricol"])) {
		$matricol = 0;
		}
		else {
			$matricol = $_POST["matricol"];
		}
	$mat_curenta = $_SESSION["materia"];
	$_SESSION["cl_curenta"] = $_POST["clasa"]; 
	$servername="localhost";
	$username="root";
	$password="";
	$database="catalog";
	$conn = mysqli_connect($servername, $username, $password);
	$select_db = mysqli_select_db($conn, 'catalog');
	$select_mat = "SELECT * FROM materii WHERE nume_materie = '$mat_curenta'";
	$tipp = mysqli_query($conn, $select_mat);
	$randd = mysqli_fetch_assoc($tipp);
	$id_mater = $randd["id_materie"];
	if ($clasa == 0 && $matricol == 0){
		$cerinta_note = "SELECT * FROM note WHERE id_materie = $id_mater";
		}
		else if ($clasa == 0 && $matricol != 0) {
				$cere_elev = "SELECT id_elev, nr_matricol FROM elevi WHERE nr_matricol = $matricol";
				$tip_id = mysqli_query($conn, $cere_elev);
				$rand = mysqli_fetch_assoc($tip_id);
				$id_elev = $rand["id_elev"];
				$cerinta_note = "SELECT * FROM note WHERE id_elev = $id_elev AND id_materie = $id_mater";
				}
				else if ($clasa != 0 && $matricol == 0) {
					$cerinta_note = "SELECT * FROM note WHERE clasa = $clasa AND id_materie = $id_mater";
					}
					else {
						$cere_elev = "SELECT id_elev, nr_matricol FROM elevi WHERE nr_matricol = $matricol";
						$tip_id = mysqli_query($conn, $cere_elev);
						$rand = mysqli_fetch_assoc($tip_id);
						$id_elev = $rand["id_elev"];
						$cerinta_note = "SELECT * FROM note WHERE id_elev = $id_elev AND clasa = $clasa AND id_materie = $id_mater";
					}
	$info = mysqli_query($conn, $cerinta_note);
	$num_randuri = mysqli_num_rows($info);
?>
				<h3>Rezultatele la invatatura:</h3>
				<table id="afisare_note">
					<tr>
						<th>Id elev</th>
						<th>Clasa</th>
						<th>Semestrul</th> 
						<th>Nota</th>
						<th>Data obtinerii</th>
						<th>Edit</th>
					</tr>
					<tr>
<?php
	for ($i = 1; $i <= $num_randuri; $i++) {
		$rand = mysqli_fetch_assoc($info);
		$obiect_rand = array("id_elev"=>$rand["id_elev"], "clasa"=>$rand["clasa"], "semestru"=>$rand["semestru"], "nota"=>$rand["valoare_nota"]);
		$_SESSION["probe"] = $obiect_rand;
?>
						<td>
<?php
		echo $obiect_rand["id_elev"];
		$id_unic = $obiect_rand["id_elev"];
?>
						</td>
						<td>
<?php
		echo $rand["clasa"];
?>
						</td>
						<td>
<?php
		echo $rand["semestru"];
?>
						</td>
						<td>
<?php
		
		echo $rand["valoare_nota"];
?>
						</td>
						<td>
<?php
		$data = date_create($rand["data_obtinere"]);
		echo date_format($data, 'd m Y');
?>
						</td>
						<td>
							<a href="Inreg_individuala.php?id_elev=<?php echo $id_unic;?>">Editare</a>
						</td>
					</tr>
<?php
		}
?>	
				</table>
			</section>
		</body>
</html>
<?php	
	mysqli_close($conn);
?>