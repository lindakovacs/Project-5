<?php
    session_start();
    include("login.php");

    spl_autoload_register( function($class)
    {
        include_once("classes/".$class.".class.php");
    });

    //GIDS BOEKEN
    include("classes/boek.class.php");
    try{
        if(!empty($_POST['voegtoe'])){   
            $book = new Book();
            $facebookid = $_SESSION['FBID'];
            $book->Gidsid=$_POST['gidsid'];
            $book->Isgeboekt=$_POST['isgeboekt'];
            $book->save($facebookid);
            $success = "<b>Boeking gelukt!</b>";
        }
    }

    catch(Exception $e){
        $error = $e->getMessage();
    }

    //BUTTON BESCHIKBAAR
    $b = new UserBeschikbaar();
    if(!empty($_POST['beschikbaar'])){
        try{
            $b->Beschikbaar=$_POST['beschikbaarDagUur'];
            $b->save($_SESSION['gids_id']);
            $success = "<b>U bent beschikbaar op ".$_POST['beschikbaarDagUur']."!</b> Het is succesvol genoteerd.";
        }
        catch(Exception $e){
            $error = $e->getMessage();
        }
    }

    //BUTTON UPDATE
    if(!empty($_POST['update'])){
    
    $link = new mysqli("localhost", "root", "");
    $link->select_db("phpproject");
    $Gebruikersnaam = $_SESSION['username'];

    // UPDATE VOORNAAM
    if (!empty($_POST['update_voornaam'])){ 
        $update_voornaam = $_POST['update_voornaam'];
        $sqlquery2 = "UPDATE gids SET gids_voornaam='$update_voornaam' WHERE gids_email='$Gebruikersnaam'";
        $res = $link->query($sqlquery2);
        $success = "<b>Je profiel is succesvol bijgewerkt!</b>";
    }

    // UPDATE NAAM
    if (!empty($_POST['update_naam'])){
        $update_naam = $_POST['update_naam'];
        $sqlquery3 = "UPDATE gids SET gids_naam='$update_naam' WHERE gids_email='$Gebruikersnaam'";
        $res2 = $link->query($sqlquery3);
        $success = "<b>Je profiel is succesvol bijgewerkt!</b>";
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
        $success = "<b>Je profiel is succesvol bijgewerkt!</b>";
    }

    // UPDATE RICHTING
    if (!empty($_POST['update_richting'])){
        $update_richting = $_POST['update_richting'];
        $sqlquery5 = "UPDATE gids SET gids_richting='$update_richting' WHERE gids_email='$Gebruikersnaam'";
        $res4 = $link->query($sqlquery5);
        $success = "<b>Je profiel is succesvol bijgewerkt!</b>";
    }

    // UPDATE STAD
    if (!empty($_POST['update_stad'])){
        $update_stad = $_POST['update_stad'];
        $sqlquery6 = "UPDATE gids SET gids_stad='$update_stad' WHERE gids_email='$Gebruikersnaam'";
        $res5 = $link->query($sqlquery6);
        $success = "<b>Je profiel is succesvol bijgewerkt!</b>";
    }

    // UPDATE BIO
    if (!empty($_POST['update_bio'])){
        $update_bio = $_POST['update_bio'];
        $sqlquery7 = "UPDATE gids SET gids_bio='$update_bio' WHERE gids_email='$Gebruikersnaam'";
        $res6 = $link->query($sqlquery7);
        $success = "<b>Je profiel is succesvol bijgewerkt!</b>";
    }

    // UPDATE FOTO
    if (!empty($_POST['profilepic'])){
        $profilepic = $_FILES['profilepic']['name'];
        $sqlquery7 = "UPDATE gids SET gids_foto='$profilepic' WHERE gids_email='$Gebruikersnaam'";
        $res6 = $link->query($sqlquery7);
    }
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
    
    <!-- INSTAGRAM -->
    <script type="text/javascript" src="js/instafeed.min.js"></script>
    <script type="text/javascript" src="js/instagram.js"></script>
    
    <!-- DATETIME PICKER -->
    <link href="bootstrap/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="bootstrap/jquery-1.8.3.min.js" charset="UTF-8"></script>
    <script type="text/javascript" src="bootstrap/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    
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
                <a href="#" class="close" data-dismiss="alert">&times;</a>
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

        <!-- SECTION -->
        <section>                      
        	<div class="container">
            
            <!-- GIDS ZELF ZIET DEZE DATA -->
            <?php if(isset($_SESSION['logged_in'])){ ?>
             
            <!-- PROFIEL FOTO GIDS ZELF -->
            <h1 class="page-header">Profiel</h1>
            <?php if(!empty($_SESSION['gids_foto'])){ ?>
                <img class="img-rounded img-responsive img-beschikbaar" src="img/profielfotos/<?php echo $_SESSION['gids_id']."/".$_SESSION['gids_foto']; ?>" alt="profielfoto">
            <?php }else{ ?>
                <img class="img-rounded img-responsive img-beschikbaar" src="img/weareimd.png" alt="weareimd">
            <?php } ?>

            <!-- PROFIEL INFO GIDS ZELF -->
            <?php
                $g = new User();
                $all = $g->getAllInfo();
            
                while($line = $all->fetch(PDO::FETCH_ASSOC)){
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
            <form method="post">
                <div class="row">
                    <div class='col-sm-5'>
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='text' class="form-control" placeholder="Klik op de kalender voor een datum en uur te kiezen." name="beschikbaarDagUur"readonly/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(function () {
                            $('#datetimepicker1').datetimepicker({
                                format: "dd/mm/yyyy - hh:ii",
                                startDate: '+0d',
                                daysOfWeekDisabled: [5, 6],
                                autoclose: true
                            });
                        });
                    </script>
                </div>                
                <input type="submit" name="beschikbaar" class="btn btn-primary" value="Beschikbaar"></input>
            </form>
            
            <!-- GIDS ZELF KAN PROFIEL UPDATEN -->
            <h1 class="page-header">Profiel aanpassen</h1>
            <?php
                $g = new User();
                $all = $g->getAllInfo();
                while($line = $all->fetch(PDO::FETCH_ASSOC)){
                if($_SESSION['username']==$line['gids_email']){ ?>
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
                    <div class="form-group">
                        <label for="bio">Biografie:</label>
                        <textarea class="form-control" id="bio" name="update_bio" rows="7"><?php echo $line['gids_bio']; ?></textarea>
                    </div>

                    <!--PROFIELFOTO-->
                    <div class="form-group">
                        <label for="profilePicInputFile">Profielfoto uploaden:</label>
                        <input type="file" name="profilepic" id="fileToUpload">
                    </div>

                    <!--UPDATEN-->
                    <input type="submit" name="update" class="btn btn-primary" value="Profiel bewerken"></input>
                </form>
                <?php }
                }
            } ?>
              
            <!-- IEDEREEN BUITEN GIDS ZIET DEZE DATA -->
            <?php if(!isset($_SESSION['logged_in'])){ 
            $id = $_GET['id']; ?>
             
            <!-- PROFIEL FOTO + INFO GIDS ID -->
            <h1 class="page-header">Profiel</h1>
            <?php
            $g = new User();
            $userProfile = $g->getUserProfile($id);
            
            while($row = $userProfile->fetch(PDO::FETCH_ASSOC)){ ?>

               <img class="img-rounded img-responsive img-beschikbaar" src="img/profielfotos/<?php echo $row['gids_id']."/".$row['gids_foto']; ?>" alt="profielfoto">

            <?php
                echo "<b>Voornaam:</b> ".$row['gids_voornaam']."<br>";
                echo "<b>Achternaam:</b> ".$row['gids_naam']."<br>";
                echo "<b>Email:</b> ".$row['gids_email']."<br>";
                echo "<b>Jaar:</b> ".$row['gids_jaar']."<br>";
                echo "<b>Richting:</b> ".$row['gids_richting']."<br>";
                echo "<b>Stad:</b> ".$row['gids_stad']."<br>";
                echo "<b>Bio:</b> " .$row['gids_bio']."<br>"; 
                echo "<h1 class='page-header'>Wanneer is ".$row['gids_voornaam']." beschikbaar?</h1>";                                            
           } ?>
           
            <!--FACEBOOK INLOGGEN-->
            <?php if(!isset($_SESSION['logged_in']) && !isset($_SESSION['FBID'])){ ?>
                <a href="facebook/fbconfig.php">
                <button class="btn btn-facebook"><i class="fa fa-facebook"></i>Log in met facebook</button>
                </a>
            <?php } ?>
            
            <!-- BESCHIKBARE DATA GIDS ID -->
            <?php
            $b = new UserBeschikbaar();
            $allBeschikId = $b->getAllId($id);
            
            // ALLEEN ZIEN WANNEER FACEBOOK INGELOGD
            if(isset($_SESSION['FBID'])){ 
                while($beschikbaar = $allBeschikId->fetch(PDO::FETCH_ASSOC)){ ?>
                <div class="col-sm-4">
                    <p>
                    <br><b>Datum: </b><?php echo $beschikbaar['beschikbaar_dag_uur'] ?>
                    </p>

                    <form method='post'>
                    <input type='hidden' name='gidsid' value='<?php echo $beschikbaar['gids_id'] ?>'/>
                    <input type='hidden' name='isgeboekt' value='1'/>
                    <input type='submit' class='data btn btn-primary col-xs-6' name='voegtoe' value='Boek' width='500'/>
                    </form>
                    <br>
                </div> 
                <?php } ?>
                
                <!-- FEEDBACK -->
                <h1 class="page-header col-lg-12">Feedback</h1>
                <p class="col-lg-12">Hier moet feedback gegeven kunnen worden!</p>
            <?php }} ?>

        	</div>
        </section>

        <!--FOOTER-->
        <footer>
           <!-- INSTAFEED -->
           <h1>Vergeet niet mee te instagrammen met ons!</h1>
           <h2>#weareimd</h2>
            <div id="instafeed"></div>
            <p>&copy; Rent-A-Student 2015</p>    
        </footer>
        
    </div><!-- /CONTAINER -->

</body>
</html>