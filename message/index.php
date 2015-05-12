<?php

	spl_autoload_register(function($class){
        include_once("../classes/".$class.".class.php"); 
    });

	if(isset($_SESSION['username'])){
		echo 'lala';
	}

	$naam = 'blabla';

?>
<html>
<head>
	<title>Chatbox</title>
	<link rel="stylesheet" type="text/css" href="chat.css" />
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script>
		function submitChat(){
			if(form1.uname.value == '' || form1.msg.value == ''){
				alert('No message or chatname!');
				return;
			}
			form1.uname.readOnly = true;
			form1.uname.style.border = 'none';
			var uname = form1.uname.value;
			var msg = form1.msg.value;
			var xmlhttp = new XMLHttpRequest();

			xmlhttp.onreadystatechange = function(){
				if(xmlhttp.readyState==4&&xmlhttp.status==200){
					document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open('GET','insert.php?uname='+uname+'&msg='+msg,true);
			xmlhttp.send();
		}

		$(document).ready(function(e){
			$.ajaxSetup({cache:false});
			setInterval(function() {$('#chatlogs').load('logs.php');}, 2000);
		});
	</script>
</head>
<body>
	
	<form name="form1" style="width: 280px; max-height:100%; float:left; background-color:#f9f1b9">
		Enter Your Chatname: <input type="text" name="uname" style="width:200px" value=<?php echo "$naam" ?>><br>
		Your Message: <br>
		<textarea name="msg" style="width:200px; height:70px;"></textarea><br><br>
		<a href="#" onclick="submitChat()" class="button" >Send</a><br><br>

		<div id="chatlogs">
			LOADING CHATLOGS PLEASE WAIT...
		</div>
	
</body>
</html>