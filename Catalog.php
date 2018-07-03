<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Conectare | Catalog online</title>
		<link rel="stylesheet" type="text/css" href="css\css_pt_catalog.css">
	</head>
	<body>
		<header>
			<div id="catalog_header">
				<h1>CN Ion Creanga Bistrita - Catalog online. Bun venit!</h1>
			</div>
		</header>
		<section>
			<div id="account_box">
				Creare cont
				<ul id="navigation_buttons">
					<li><a href="Creare_cont_profesor.htm" target="_blank">PROFESOR</a></li>
					<li><a href="Creare_cont_parinte.htm" target="_blank">PARINTE</a></li>
					<li><a href="Creare_cont_elev.htm" target="_blank">ELEV</a></li>
				</ul>
			</div>
			<div class="clear"></div>
			<div id="login_box">
				<h3>Login</h3>
				<form action="php\login_catalog.php" method="post">
					<p><input type="text" name="user"/> Utilizator (email)</p>
					<p><input type="password" name="parola"/> Parola</p>
					<p><input type="submit" value="Acces catalog"/></p>
					<p>Foloseste ca exemplu EMAIL = suan@yahoo.com</br>
					<p>PAROLA = 12 ... doar sa vezi conceptul</p>
				</form>
			</div>
<?php
	if (isset($_SESSION["confirmare"])) {
		echo $_SESSION["confirmare"];
		}
		else {
			echo 'Welcome here!';
			}
?>
		</section>
		<footer>
			<div id="catalog_footer">
				<h2>contact</h2>
			</div>
		</footer>	
	</body>
</html>