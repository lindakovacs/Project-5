<?php

	$uname = $_REQUEST['uname'];
	$msg = $_REQUEST['msg'];
	$id = $_GET['id'];


	$con = mysql_connect('localhost', 'root','');
	mysql_select_db('phpproject', $con);

	mysql_query("INSERT INTO message (username, gids_id, bericht_tekst ) VALUES ('$uname','$id', '$msg')");
	$result1 = mysql_query("SELECT * FROM message ORDER by bericht_id DESC");

	while($extract = mysql_fetch_array($result1)){
		echo "<span class='uname'>" . $extract['username'] . "</span>: <span class='msg'>" . $extract['bericht_tekst'] . "</span>: <span class='id'>" . $extract['gids_id'] . "</span><br>";
	}

?>