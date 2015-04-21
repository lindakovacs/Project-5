<?php
    session_start();
    include_once("login.php");



try {
    
    spl_autoload_register(function($class){
        include_once("class/".$class.".class.php"); 
        
    });
    
    
    
    
include_once("classes/boek.class.php");


 if (!empty($_POST['voegtoe'])){ 
    
      //echo "gelukt!";
      $book = new Book();
     
      $book->Gidsid=$_POST['gidsid'];
      $book->Isgeboekt=$_POST['isgeboekt'];
     
      $book->save();
      echo $book->Gidsid;
      echo $book->Isgeboekt;
      echo "gelukt!";
     
 }
    
    

 

}

catch(Exception $e)
    
    
{
    
    $error = $e->getMessage();
    
    
}


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
           <a class="navbar-brand" href="index.php">Rent-A-Student</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form method="post" class="navbar-form navbar-right">
            <!--FORMULIER INGELOGD + UITLOGGEN-->
            <?php if(isset($_SESSION['logged_in'])){ ?>
                
                <p class="email-ingelogd"><?php echo $Gebruikersnaam ?></p><a href="gids.php" id="gids_change_profile_btn">Change profile</a>
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
            <!--REGISTREREN-->
            <a href="registreer.php"><button type="button" class="btn btn-primary">Registreren</button></a>
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

            <a href="index.php"><img src="img/vector-logo.png" class="img-responsive" alt="logo"></a>
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
                                    

        
        
        
        
        
        <!-- bezoeker moet gidsen kunnen raadplegen -->

        <div class="row">

        <?php 

        if(isset($_SESSION['FBID'])){
            
           echo  '<h2>Welke gids is beschikbaar... en wanneer?</h2>';


        // Create connection
        $conn = new mysqli("localhost", "root", "root", "phpproject");
        // Check connection
        if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
        }


            
                  //$sql = "SELECT g.gids_voornaam, g.gids_naam, g.gids_bio, g.gids_richting, g.gids_jaar, g.gids_stad, //c.contact_dag, c.contact_uur  FROM gids g JOIN contact c ON c.gids_id = g.gids_id ORDER BY c.contact_dag";  
            
            
            
            //$sql = "SELECT g.gids_id, g.gids_voornaam, g.gids_naam, g.gids_bio, g.gids_richting, g.gids_jaar, g.gids_stad, b.geboekt_dag, b.geboekt_uur  FROM gids g JOIN geboekt b ON b.gids_id = g.gids_id ORDER BY b.geboekt_dag";
            
            
            $sql = "SELECT * FROM gids INNER JOIN beschikbaar ON gids.gids_id = beschikbaar.gids_fk";
            
            
        $result = $conn->query($sql);

    if ($result->num_rows > 0) {
         // output data of each row
   // output data of each row
        //new variable
 $counter = 1; 
        
 while($row = $result->fetch_assoc()) {
     echo
'<div class="col-sm-4">'.
        "<br>".'<img class="img-rounded img-responsive" src="http://placehold.it/150">'.
        "<br>"."voornaam: ".$row["gids_voornaam"].
        "<br>". "Achternaam: ". $row["gids_naam"].
        "<br>". "Richting: ". $row["gids_richting"].
        "<br>". "Jaar: ". $row["gids_jaar"].
        "<br>". "Biografie:  " . $row["gids_bio"]. 
        "<br>"." Afspraakuur:  " . $row["beschikbaar_uur"].
         "<br>"."Afspraakdag: " . $row["beschikbaar_dag"].
         
         
        "<form method='post'>
        <input type='hidden' name='gidsid' value='".$row["gids_id"]."'/>
        <input type='hidden' name='isgeboekt' value='1'/>
        <input type='submit' class='data' name='voegtoe' value='Boek mij'/></form>".
'</div>';
//$counter++; //increment it with every row
     


 }
        
        
    } else {
         echo "0 results";
    }

    $conn->close();
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