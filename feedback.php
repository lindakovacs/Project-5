<?php
    session_start();
    spl_autoload_register( function($class)
    {
        include_once("classes/" . $class . ".class.php");
    });

    include_once("login.php");

    //FEEDBACK VERSTUREN
    if(!empty($_POST["send_feedback"]))
    {
        include_once("classes/feedback.class.php");
        try
        {       
            $f = new Feedback();
            $fbid = $_SESSION['FBID'];
            $f->Feedback_tekst=$_POST['feedback'];
            $f->Feedback_rating=$_POST['rating'];
            $f->Gids_id = $_POST['gids_id'];
            $f->save($fbid);
            $success ="<b>Feedback is succesvol verzonden!</b>";
        }

        catch(Exception $e)
        {
            $error=$e->getMessage();
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
    <title>Rent-A-Student | Feedback</title>
    
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
            <p>Rent a Student is een platform waar bezoekers IMD-studenten kunnen boeken.</p>
            
            <!--FACEBOOK INLOGGEN-->
            <?php if(!isset($_SESSION['logged_in']) && !isset($_SESSION['FBID'])){ ?>
                <a href="facebook/fbconfig.php">Enkel voor bezoekers.<br>
                <button class="btn btn-facebook"><i class="fa fa-facebook"></i>Log in met facebook</button>
                </a>
            <?php } ?>

        </header>

        <?php if (isset($_SESSION['FBID'])){ ?>

            <!--SECTION-->
            <section>
            <div class="page-header"><h2>Feedback over jouw bezoek</h2></div>
            <p>Gelieve hier wat feedback en een rating op 5 te geven over de gids en het verloop van jouw bezoek.</p><br>
            <div id="feedback_all">

                <form method="POST">
                    
                <!--GIDS NAAM-->
               <div class="form-group">
                    <label for="year">Gids naam:<span class="required">*</span></label>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <select class="form-control" name="gids_id">
                        <option></option>
                        <?php
                            $g = new User();
                            $allInfo = $g->getAllInfo();
            
                            while($row = $allInfo->fetch(PDO::FETCH_ASSOC)){ ?>
                                <option value="<?php echo $row['gids_id'] ?>"><?php echo $row['gids_voornaam']." ".$row['gids_naam'] ?></option>
                        <?php } ?>
                        </select>
                    </div>
                </div>
                    
                <!--RATING-->
               <div class="form-group">
                    <label for="rating">Rating:<span class="required">*</span></label>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
                        <select class="form-control" name="rating">
                            <option></option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="feedback">Feedback:<span class="required">*</span></label><br>
                    <textarea class="form-control" id="bio" cols="50" rows="7" name="feedback" placeholder="Plaats hier je feedback."></textarea>
                </div>
                <input type="submit" name="send_feedback" class="btn btn-primary" value="Feedback verzenden" width="200"></input>
            </form>
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
           <div id="instafeed"></div>
            <p>&copy; Rent-A-Student 2015</p>    
        </footer>
        
    </div><!--/CONTAINER-->

</body>
</html>




<?php 

   

?>
