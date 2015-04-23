<?php

    include_once('classes/message.class.php');

$m = new message();
    if(!empty($_POST))
    {
        try
        {
        $m = new message();
        $m->Message=$_POST['chat'];
        $m->save();
        $success ="<b>Ok!</b> Je bent succesvol geregistreerd.";
        }

        catch(Exception $e)
        {
            $error=$e->getMessage();
        }
    }
$all_m = $m->GetAllMessages();

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="Rent-A-Student">
    <meta name="keywords" content="Rent,Student,Multimedia,Thomas More, Mechelen">
    <meta name="author" content="Ande Timmerman,Manuel van den Notelaer,Nick Van Puyvelde,Stijn Van Doorslaer">
    
    <link rel="icon" href="img/Rent-A-Student.png">
    <title>Rent-A-Student</title>
    
    <!-- OPENGRAPH TAGS -->
    <meta property="og:image" content="img/Rent-A-Student.png"/>
    
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->    
</head>
<body>
    <!--CONTAINER-->
    <div class="container"> 
       
       <div id="chatbox">
           Hier komen de berichten
           <ul><?php
            while($message = $all_m->fetch(PDO::FETCH_ASSOC)){
            echo "<li   class='article'>".htmlspecialchars($message['message_tekst'])."</li>";}
           ?></ul>
       </div>
        <form role="form" method="post" >
            <!--chat-->
            <div class="form-group">
                <input type="text" class="form-control" id="chat" name="chat" placeholder="Chat met u gids">
            </div>
            <button type="submit" id="btnSubmit" class="btn btn-default">chat</button>
            </form>
         
        </section>
        
        <br>
        

        <!-- FOOTER -->
        <footer class="footer">
            <p>&copy;2015</p>    
        </footer>
        
    </div>
    
</body>
</html>