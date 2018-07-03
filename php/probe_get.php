<?php
	if(isset( $_GET[ 'numele' ] ) && !empty( $_GET[ 'numele' ] ) ) {
		echo "Salut, {$_GET[ 'numele' ]}!";
		}
		else echo "nu ai bagat nimik";
?>