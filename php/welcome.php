/*<?php
/*Welcome echo $_GET["name"];<br>
Your email address is: echo $_GET["email"];
Welcome <?php echo $_GET["name"]; ?><br>
Your email address is: <?php echo $_GET["email"]; ?>*/
<?php
if( isset( $_GET[ 'numele' ] ) && !empty( $_GET[ 'numele' ] ) ) {
	print "Salut, {$_GET[ 'numele' ]}!";
}
?>
?>