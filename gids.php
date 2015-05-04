<?php
    session_start();
    include("login.php");
    include_once('classes/User.class.php');
    include_once('classes/Db.class.php');

    $link = new mysqli("localhost", "root", "root");
    $link->select_db("phpproject");
    $Gebruikersnaam = $_SESSION['username'];

    // UPDATE VOORNAAM
    if (!empty($_POST['update_voornaam'])){ 
        $update_voornaam = $_POST['update_voornaam'];
        $sqlquery2 = "UPDATE gids SET gids_voornaam='$update_voornaam' WHERE gids_email='$Gebruikersnaam'";
        $res = $link->query($sqlquery2);
    }

    // UPDATE NAAM
    if (!empty($_POST['update_naam'])){
        $update_naam = $_POST['update_naam'];
        $sqlquery3 = "UPDATE gids SET gids_naam='$update_naam' WHERE gids_email='$Gebruikersnaam'";
        $res2 = $link->query($sqlquery3);
    }

    // UPDATE EMAIL
    if (!empty($_POST['update_email'])){
        $update_email = $_POST['update_email'];
        $sqlquery4 = "UPDATE gids SET gids_email='$update_email' WHERE gids_email='$Gebruikersnaam'";
        $res3 = $link->query($sqlquery4);
    }

    // UPDATE JAAR
    if (!empty($_POST['update_jaar'])){
        $update_jaar = $_POST['update_jaar'];
        $sqlquery4 = "UPDATE gids SET gids_jaar='$update_jaar' WHERE gids_email='$Gebruikersnaam'";
        $res3 = $link->query($sqlquery4);
    }

    // UPDATE RICHTING
    if (!empty($_POST['update_richting'])){
        $update_richting = $_POST['update_richting'];
        $sqlquery5 = "UPDATE gids SET gids_richting='$update_richting' WHERE gids_email='$Gebruikersnaam'";
        $res4 = $link->query($sqlquery5);
    }

    // UPDATE STAD
    if (!empty($_POST['update_stad'])){
        $update_stad = $_POST['update_stad'];
        $sqlquery6 = "UPDATE gids SET gids_stad='$update_stad' WHERE gids_email='$Gebruikersnaam'";
        $res5 = $link->query($sqlquery6);
    }

    // UPDATE BIO
    if (!empty($_POST['update_bio'])){
        $update_bio = $_POST['update_bio'];
        $sqlquery7 = "UPDATE gids SET gids_bio='$update_bio' WHERE gids_email='$Gebruikersnaam'";
        $res6 = $link->query($sqlquery7);
    }

    // UPDATE FOTO
    if (!empty($_POST['update_foto'])){
        $update_foto = $_POST['update_foto'];
        $sqlquery7 = "UPDATE gids SET gids_foto='$update_foto' WHERE gids_email='$Gebruikersnaam'";
        $res6 = $link->query($sqlquery7);
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
    
    <!-- DATETIME PICKER -->
    <link href="bootstrap/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="bootstrap/jquery-1.8.3.min.js" charset="UTF-8"></script>
    <script type="text/javascript" src="bootstrap/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="bootstrap/bootstrap-datetimepicker.nl.js" charset="UTF-8"></script>
    
    <!-- SHARE TOOLS (www.addthis.com/dashboard) -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5534d6620e22bfa1"         async="async"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->    
</head>
<body>

    <!-- NAVIGATIE -->
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
                <?php
                   <img class="img-rounded img-responsive img-profile" src="img/weareimd.png" alt="weareimd">
                <?php } ?>
                <p class="email-ingelogd"><?php echo $_SESSION['username'] ?></p>
                <a class="btn btn-primary" href="gids.php">Profiel</a>
                <a class="btn btn-primary" href="logout.php">Afmelden</a>
            <?php } ?>

            <!-- FORMULIER INLOGGEN -->
            <?php if(!isset($_SESSION['logged_in']) && !isset($_SESSION['FBID'])){ ?>
            <div class="form-group">
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
    
    <!-- CONTAINER -->
    <div class="container">
      
        <!-- ALERT SUCCESS -->
        <?php if(isset($success)){ ?>
            <div class="alert alert-success" role="alert">
                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                <?php echo $success; ?>
            </div>
        <?php } ?>

        <!-- ALERT DANGER -->
        <?php if(isset($error)){ ?>
            <div class="alert alert-danger" role="alert">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                <?php echo $error; ?>
            </div>
        <?php } ?>
       
        <!-- HEADER -->
        <header class="jumbotron">

            <a href="index.php"><img src="img/vector-logo.png" class="img-responsive center-logo" alt="logo"></a>
            <p>Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen.</p>
            
            <!-- FACEBOOK INLOGGEN -->
            <?php if(!isset($_SESSION['logged_in']) && !isset($_SESSION['FBID'])){ ?>
                <a href="facebook/fbconfig.php">Lorem Ipsum is slechts een proeftekst.<br>
                <button class="btn btn-facebook"><i class="fa fa-facebook"></i>Log in met facebook</button>
                </a>
            <?php } ?>

        </header>

        <!-- SECTION -->
        <section>                      
        	<div class="container">
            
            <!-- PROFIEL FOTO + INFO -->
            <div class="page-header">
                <h1>Profiel</h1>
            </div>
            <?php if(!empty($_SESSION['gids_foto'])){ ?>
                <img class="img-rounded img-responsive img-beschikbaar" src="img/profielfotos/<?php echo $_SESSION['gids_id']."/".$_SESSION['gids_foto']; ?>" alt="profielfoto">
            <?php }else{ ?>
                <img class="img-rounded img-responsive img-beschikbaar" src="img/weareimd.png" alt="weareimd">
            <?php } ?>

            <?php
                $link = new mysqli("localhost", "root", "root");
                $link->select_db("phpproject");

                $sqlquery = "SELECT * FROM gids";
                $result = $link->query($sqlquery);

                while($line = $result->fetch_array())
                {
                    if($_SESSION['username']==$line['gids_email'])
                    {
                        echo "<b>Voornaam:</b> ".$line['gids_voornaam']."<br>";
                        echo "<b>Achternaam:</b> ".$line['gids_naam']."<br>";
                        echo "<b>Email:</b> ".$line['gids_email']."<br>";
                        echo "<b>Jaar:</b> ".$line['gids_jaar']."<br>";
                        echo "<b>Richting:</b> ".$line['gids_richting']."<br>";
                        echo "<b>Stad:</b> ".$line['gids_stad']."<br>";
                        echo "<b>Bio:</b> " .$line['gids_bio']."<br>";                           
                    }
                }
            ?>
            
            <br>
            
            <!-- BESCHIKBAARHEID -->
            <h3>Beschikbaarheid</h3>
            <div class="input-append date form_datetime">
                <input class="form-control" type="text" placeholder="Klik hier voor een datum en uur te kiezen.">
                <span class="add-on"><i class="icon-th"></i></span>
            </div>            
            <br><input type="submit" name="beschikbaar" class="btn btn-primary" value="Beschikbaar"></input>
            
            <script type="text/javascript">
                $(".form_datetime").datetimepicker({
                    format: "dd MM yyyy - hh:ii"
                });
            </script>           
            
            <!-- PROFIEL UPDATEN -->
            <div class="page-header">
                <h1>Profiel aanpassen</h1>
            </div>
            <?php
                $link = new mysqli("localhost", "root", "root");
                $link->select_db("phpproject");
                //test

                $sqlquery = "SELECT * FROM gids";
                $result = $link->query($sqlquery);

                while($line = $result->fetch_array())
                {
                    if($_SESSION['username']==$line['gids_email'])
                    { ?>
                    <form role="form" method="post" enctype="multipart/form-data" >              
                        <!--VOORNAAM-->            
                        <label for="firstname">Voornaam:</label>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" id="firstname" name="update_voornaam" value="<?php echo $line['gids_voornaam']; ?>">  
                        </div>
                        
                        <!--ACHTERNAAM-->
                        <label for="lastname">Achternaam:</label>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" class="form-control" id="lastname" name="update_naam" value="<?php echo $line['gids_naam']; ?>">  
                        </div>

                        <!--EMAILADRES-->
                        <label for="email">E-mailadres:</label>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input type="email" class="form-control" id="email" name="update_email" value="<?php echo $line['gids_email']; ?>">
                        </div>

                       <!--JAAR-->
                       <div class="form-group">
                            <label for="year">Jaar:</label>
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                                <select class="form-control" id="year" name="update_jaar">
                                    <option><?php echo $line['gids_jaar']; ?></option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                        </div>

                        <!--RICHTING-->
                        <div class="form-group">
                            <label for="education">Richting:</label>
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                                <select class="form-control" id="education" name="update_richting">
                                    <option><?php echo $line['gids_richting']; ?></option>
                                    <option>Niet van toepassing</option>
                                    <option>Webdesign</option>
                                    <option>Webdevelopment</option>
                                </select>
                            </div>
                        </div>

                        <!--WOONPLAATS-->
                        <label for="email">Woonplaats:</label>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                            <input type="text" class="form-control" id="city" name="update_stad" value="<?php echo $line['gids_stad']; ?>">                                 
                        </div>
                        
                        <!--BIOGRAFIE-->
                        <label for="email">Biografie:</label>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span>
                            <input type="text" class="form-control" id="bio" name="update_bio" value="<?php echo $line['gids_bio']; ?>">                                 
                        </div>
                        
                        <!--PROFIELFOTO-->
                        <label for="email">Profielfoto:</label>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                            <input type="text" class="form-control" id="bio" name="update_foto" value="<?php echo $line['gids_foto']; ?>">                                 
                        </div>
                
                        <input type="submit" name="beschikbaar" class="btn btn-primary" value="Profiel bewerken"></input>
                </form>
                <?php }
                }
            ?>

        	</div>
        </section>

        <!--FOOTER-->
        <footer>
           <!-- SnapWidget -->
            <h1>Vergeet niet mee te instagrammen met ons!</h1>
            <h2>#weareimd</h2>
            <script src="http://snapwidget.com/js/snapwidget.js"></script>
            <iframe src="http://snapwidget.com/in/?h=d2VhcmVpbWR8aW58MjB8NXwyfHx5ZXN8NXxmYWRlSW58b25TdGFydHx5ZXN8eWVz&ve=150415" title="Instagram Widget" class="snapwidget-widget" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden;"></iframe>
            <p>&copy; Rent-A-Student 2015</p>    
        </footer>
        
    </div><!-- /CONTAINER -->

</body>
</html>