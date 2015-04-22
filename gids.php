<?php

    session_start();
    include("login.php");
//    include_once("classes/User.class.php");

?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="Rent-A-Student">
    <meta name="keywords" content="Rent,Student,Multimedia,Thomas More, Mechelen">
    <meta name="author" content="Ande Timmerman,Manuel van den Notelaer,Nick van Puyvelde,Stijn Van Doorslaer">
    
    <link rel="icon" href="img/favicon.png">
    <title>Rent-A-Student</title>
    
    <!-- OPENGRAPH TAGS -->
    <meta property="og:image" content="img/favicon.png"/>
    
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <!-- SHARE TOOLS (www.addthis.com/dashboard) -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5534d6620e22bfa1" async="async"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->    
</head>
<body>

    <!--NAVIGATIE-->
    <nav class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
          <a class="navbar-brand" href="index.php">Rent-A-Student</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form method="post" class="navbar-form navbar-right">
            <!--FORMULIER INGELOGD + UITLOGGEN-->
            <?php if(isset($_SESSION['logged_in'])){ ?>
                <p class="email-ingelogd"><?php echo $Gebruikersnaam ?></p>
                <a class="btn btn-primary" href="logout.php">Afmelden</a>
            <?php } ?>
            
            <!--FACEBOOK INGELOGD + UITLOGGEN-->
            <?php if(isset($_SESSION['FBID'])){ ?>
                <?php $success ="<b>Welkom!</b> U bent aangemeld met ".$_SESSION['FULLNAME']."."; ?>
                <img class="img-rounded fb-img" src="https://graph.facebook.com/<?php echo $_SESSION['FBID']; ?>/picture">
                <span class="fb-ingelogd"><?php echo $_SESSION['FULLNAME']; ?></span>
                <a class="btn btn-primary" href="facebook/logout.php">Afmelden</a>
            <?php } ?>

            <!--FORMULIER INLOGGEN-->
            <?php if(!isset($_SESSION['logged_in']) && !isset($_SESSION['FBID'])){ ?>
            <div class="form-group has-feedback">
              <input type="text" name="email" id="email" placeholder="E-mailadres" class="form-control email-inloggen">
            </div>
            <div class="form-group">
              <input type="password" name="password" id="password" placeholder="Wachtwoord" class="form-control">
            </div>
            <input type="submit" name="aanmelden" class="btn btn-primary" value="Aanmelden"></input>
            <?php } ?>
          </form>
        </div>
      </div>
    </nav>
    
    <!--CONTAINER-->
    <div class="container">
      
        <!--ALERT SUCCESS-->
        <?php if(isset($success)){ ?>
            <div class="alert alert-success" role="alert">
                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                <?php echo $success; ?>
            </div>
        <?php } ?>

        <!--ALERT DANGER-->
        <?php if(isset($error)){ ?>
            <div class="alert alert-danger" role="alert">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                <?php echo $error; ?>
            </div>
        <?php } ?>
       
        <!--HEADER-->
        <header class="jumbotron">

            <a href="index.php"><img src="img/vector-logo.png" class="img-responsive center-logo" alt="logo"></a>
            <p>Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen.</p>
            
            <!--FACEBOOK INLOGGEN-->
            <?php if(!isset($_SESSION['logged_in']) && !isset($_SESSION['FBID'])){ ?>
                <a href="facebook/fbconfig.php">Lorem Ipsum is slechts een proeftekst.<br>
                <button class="btn btn-facebook"><i class="fa fa-facebook"></i>Log in met facebook</button>
                </a>
            <?php } ?>

        </header>

        <!--SECTION-->
        <section>
                                    
        	<div class="container marketing">
                
            	<?php
            		$link = new mysqli("localhost", "root", "");
        			$link->select_db("phpproject");
                    //test

        			$sqlquery = "SELECT * FROM gids";
        			$result = $link->query($sqlquery);

        			
        			

        			while($line = $result->fetch_array())
        			{
        				if($Gebruikersnaam==$line['gids_email']){
        				
        					echo "Voornaam: " . $line['gids_voornaam'] . "<br>";
        						?><form method="POST">
        							<input type="text" name="update_voornaam">
        							<input type="submit" value="Aanpassen">
        						</form><?php 
        					echo "<br>Naam: " . $line['gids_naam'] . "<br>";
        						?><form method="POST">
        							<input type="text" name="update_naam">
        							<input type="submit" value="Aanpassen">
        						</form><?php 
        					echo "<br>Foto: " . $line['gids_foto'] . "<br>";
        						?><form method="POST">
        							<input type="text" name="update_foto">
        							<input type="submit" value="Aanpassen">
        						</form><?php 
        					echo "<br>Bio: " . $line['gids_bio'] . "<br>";
        						?><form method="POST">
        							<input type="text" name="update_bio">
        							<input type="submit" value="Aanpassen">
        						</form><?php 
        					echo "<br>Richting: " . $line['gids_richting'] . "<br>";
        						?><form method="POST">
        							<input type="text" name="update_richting">
        							<input type="submit" value="Aanpassen">
        						</form><?php 
        					echo "<br>Jaar: " . $line['gids_jaar'] . "<br>";
        						?><form method="POST">
        							<input type="text" name="update_jaar">
        							<input type="submit" value="Aanpassen">
        						</form><?php 
        					echo "<br>Stad: " . $line['gids_stad'] . "<br>";
        						?><form method="POST">
        							<input type="text" name="update_stad">
        							<input type="submit" value="Aanpassen">
        						</form><?php 
        					echo "<br>Email: " . $line['gids_email'] . "<br>";
        						?><form method="POST">
        							<input type="text" name="update_email">
        							<input type="submit" value="Aanpassen">
        						</form><?php 

        				}
        			}

        		?>

        	</div>
         
        </section>

        <!--FOOTER-->
        <footer>
            <p>&copy; Rent-A-Student 2015</p>    
        </footer>
        
    </div><!--/CONTAINER-->

</body>
</html>