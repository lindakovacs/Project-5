<?php
    session_start();
    include_once("login.php");
    //include_once("classes/Db.class.php");    
    include_once('classes/feedback.class.php');

    $link = new mysqli("localhost", "root", "");
    $link->select_db("phpproject");

    if(!empty($_POST["feedback"]) && !empty($_POST["rating"]) && !empty($_POST["naam_gids"]) && !empty($_POST["voornaam_gids"]))
    {   
        $feedback = $_POST["feedback"];
        $rating = $_POST["rating"];
        $naam_gids = $_POST["naam_gids"];
        $voornaam_gids = $_POST["voornaam_gids"];
        $naam_bezoeker = $_SESSION['FULLNAME'];

        $sqlquery2 = "SELECT gids_id FROM gids WHERE gids_voornaam='$voornaam_gids' && gids_naam='$naam_gids' ";
        $result2 = $link->query($sqlquery2);

        $sqlquery3 = "SELECT bezoeker_id FROM bezoeker WHERE bezoeker_naam='$naam_bezoeker'";
        $result3 = $link->query($sqlquery3);

        while($line=$result2->fetch_array())
        {
            //echo $line['gids_id'];
            $feedback = new Feedback();
            $feedback->Feedback_tekst = $_POST['feedback'];
            $feedback->Feedback_rating = $_POST['rating'];
            $feedback->Gids_id = $line['gids_id']; 
        }
        while($line=$result3->fetch_array())
        {
            //echo $line['bezoeker_id'];
            $feedback->Bezoeker_id = $line['bezoeker_id'];
            $feedback->Save();
        }      
    }
    else{
        //echo "failed!";
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
    
    <link rel="icon" href="img/weareimd.png">
    <title>Rent-A-Student</title>
    
    <!-- OPENGRAPH TAGS -->
    <meta property="og:image" content="img/weareimd.png"/>
    
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <!-- RESPONSIVE -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <!-- SHARE TOOLS (www.addthis.com/dashboard) -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5534d6620e22bfa1" async="async"></script>
    
    <style>
        #feedback_all{
            width:250px; 
        }
    </style>  

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
            <!-- FORMULIER INGELOGD + UITLOGGEN -->
            <?php if(isset($_SESSION['logged_in'])){ 
                if(!empty($_SESSION['gids_foto'])){ ?>
                    <img class="img-rounded img-responsive img-profile" src="img/profielfotos/<?php echo $_SESSION['gids_id']."/".$_SESSION['gids_foto']; ?>" alt="">
                <?php }else{ ?>
                   <img class="img-rounded img-responsive img-profile" src="img/weareimd.png" alt="weareimd">
                <?php } ?>
                <p class="email-ingelogd"><?php echo $_SESSION['username'] ?></p>
                <a class="btn btn-primary" href="gids.php">Profiel</a>
                <a class="btn btn-primary" href="logout.php">Afmelden</a>
            <?php } ?>
            
            <!--FACEBOOK INGELOGD + UITLOGGEN-->
            <?php if(isset($_SESSION['FBID'])){ ?>
                <?php $success ="<b>Welkom!</b> U bent aangemeld met ".$_SESSION['FULLNAME']."."; ?>
                <img class="img-rounded fb-img" src="https://graph.facebook.com/<?php echo $_SESSION['FBID']; ?>/picture">
                <p class="fb-ingelogd"><?php echo $_SESSION['FULLNAME']; ?></p>
                <a class="btn btn-primary" href="facebook/logout.php">Afmelden</a>
            <?php } ?>

            <!--FORMULIER INLOGGEN-->
            <?php if(!isset($_SESSION['logged_in']) && !isset($_SESSION['FBID'])){ ?>
            <div class="form-group">
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

            <a href="index.php"><img src="img/vector-logo.png" class="img-responsive center-logo" alt="logo"></a>
            <p>Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen.</p>
            
            <!--FACEBOOK INLOGGEN-->
            <?php if(!isset($_SESSION['logged_in']) && !isset($_SESSION['FBID'])){ ?>
                <a href="facebook/fbconfig.php">Lorem Ipsum is slechts een proeftekst.<br>
                <button class="btn btn-facebook"><i class="fa fa-facebook"></i>Log in met facebook</button>
                </a>
            <?php } ?>

        </header>

        <?php if (isset($_SESSION['FULLNAME'])){ ?>

            <!--SECTION-->
            <section>
            <div class="page-header"><h2>Feedback over jouw bezoek</h2></div>
            <p>Gelieve hier wat feedback en een rating op 5 te geven over de gids en het verloop van jouw bezoek.</p><br>
            <div id="feedback_all">
                <?php

                    $sqlquery = "SELECT feedback_tekst, feedback_rating FROM feedback;";
                    //$sqlquery2 = "SELECT bezoeker_naam FROM bezoeker WHERE bezoeker_id=m_iBezoeker_id;";
                    $result = $link->query($sqlquery);

                    // INFO AFDRUKKEN!!!!!
                    /*while($line = $result->fetch_array())
                    {
                        echo 'feedback: ' . $line['feedback_tekst'] . '<br>';
                        echo 'rating: ' . $line['feedback_rating'] . '/5' . '<br>';
                        echo '<br><hr><br>';
                    }*/

                ?>

                <form method="POST">
                <div class="form-group">
                    <label for="education">Voornaam gids:</label><br>
                    <textarea class="form-control" cols="30" rows="1" name="voornaam_gids" placeholder="Voornaam van je gids"></textarea>

                    <br><label for="education">Naam gids:</label><br>
                    <textarea class="form-control" cols="30" rows="1" name="naam_gids" placeholder="Naam van je gids"></textarea>
                    
                    <br><label for="education">Rating:</label><br>
                    <select class="form-control" name="rating">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="bio">Feedback:</label><br>
                    <textarea class="form-control" id="bio" cols="30" rows="10" name="feedback" placeholder="Plaats hier je feedback"></textarea>
                </div>
                <input type="submit" name="" class="btn btn-primary"></input>
            </form><br>
        </div>
                            
        </section>
        <?php }
        
            else{
                echo 'Log in met facebook om feedback te kunnen geven.';
            }
        
         ?>

        <!--FOOTER-->
        <footer>
           <!-- SnapWidget -->
           <h1>Vergeet niet mee te instagrammen met ons!</h1>
           <h2>#weareimd</h2>
<script src="http://snapwidget.com/js/snapwidget.js"></script>
<iframe src="http://snapwidget.com/in/?h=d2VhcmVpbWR8aW58MjB8NXwyfHx5ZXN8NXxmYWRlSW58b25TdGFydHx5ZXN8eWVz&ve=150415" title="Instagram Widget" class="snapwidget-widget" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden;"></iframe>
            <p>&copy; Rent-A-Student 2015</p>    
        </footer>
        
    </div><!--/CONTAINER-->

</body>
</html>




<?php 

   

?>
