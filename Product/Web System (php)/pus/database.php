<?php

	//Server location, 127.0.0.1 = localhost
	$mysql_hostname = "127.0.0.1";
	
	//Server username to log in to.
	$mysql_username = "root";

	//Server password.
	$mysql_password = "";

	//Database to connect to.
	$mysql_database = "pus";

	//Physical connection.
	 $db = mysql_connect($mysql_hostname, $mysql_username, $mysql_password)
			//If fail give error message.
			or die("Durian Tunggal we have a problem");

	//Selects database to use.
	mysql_select_db($mysql_database, $db)
			or die("Durian Tunggal We Couldn't Find the database.")

?>