<?php

	$con = mysql_connect('localhost', 'root','');
	mysql_select_db('phpproject', $con);
	$result1 = mysql_query('SELECT * FROM message ORDER by bericht_id DESC');

	while($extract = mysql_fetch_array($result1)){
		echo "<span class='uname'>" . $extract['username'] . "</span>: <span class='msg'>" . $extract['bericht_tekst'] . "</span><br>";
	}

?>