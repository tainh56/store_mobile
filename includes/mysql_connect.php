<?php 
	$dbc = mysqli_connect('localhost','root','','store_mb');
	
	if(!$dbc){
		trigger_error("Could not connect to DB". mysqli_connect_error());
	}else{
		mysqli_set_charset($dbc,'utf-8');
	}
?>