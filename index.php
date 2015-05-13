<?php
    session_start();
    include_once("login.php");
    include_once("classes/boek.class.php");

    spl_autoload_register(function($class)
    {
        include_once("classes/".$class.".class.php");
    });

    if(!empty($_GET['id']))
    {
        $conn = Db::getInstance();
        $current_id = $_GET['id'];
        $conn->query("DELETE FROM beschikbaarheid WHERE beschikbaar_id = $current_id;");
        header('Location:index.php');
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
    
    <!-- ALERTS -->
    <div class="container"> 
        <!--ALERT SUCCESS-->
        <?php if(isset($success)){ ?>
            <div class="alert alert-success" role="alert">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
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
    </div>
               
        <!-- INHOUD WANNEER NIET INGELOGD -->
        <?php if(!isset($_SESSION['logged_in']) && !isset($_SESSION['FBID'])){ ?>
        
        <!--HEADER-->
        <header class="inleiding">
            <div class="container">
                <a href="index.php"><img src="img/vector-logo.png" class="img-responsive center-logo" alt="logo"></a>
                <p>Rent a Student is een platform waar bezoekers IMD-studenten kunnen boeken.</p>

                <!--FACEBOOK INLOGGEN-->
                <?php if(!isset($_SESSION['logged_in']) && !isset($_SESSION['FBID'])){ ?>
                    <a href="facebook/fbconfig.php">
                    <button class="btn btn-facebook"><i class="fa fa-facebook"></i>Log in met facebook</button>
                    </a>
                    <p class="fb">Enkel voor bezoekers.</p>
                <?php } ?>
            </div>
        </header>
        
        <!-- INHOUD -->
        <div class="marketing">
            <div class="container">
                <div class="col-lg-4">
                <img class="img-rounded" src="img/weareimd.png">
                <h2>Bezoeker of Gids?</h2>
                <p>Ben jij een bezoeker en kom je onze richting ontdekken. Dan kan je dit vanaf nu doen met een IMD-student. Het enige wat je daarvoor moet doen is je inloggen via facebook door op bovenstaande knop te klikken je gids uit te kiezen.<br><br>
Ben je momenteel een IMD-student en wil je je graag als gids voorstellen registreer je dan nu. </p>
                </div>

                <div class="col-lg-4">
                    <img class="img-rounded" src="img/weareimd.png">
                    <h2>Voor jouw bezoek</h2>
                    <p>Voor jouw bezoek kan je nog chatten met jouw gids over onze opleiding of kan je enkele zaken praktisch regelen. Dit zal ervoor zorgen dat jouw bezoek aan onze opleiding op een foutloze manier verloopt, zodat je meteen van minuut 1 geboeid kan raken over onze opleiding.<br><br>
                    IMD is onze passie en die willen we ook aan jouw doorgeven.</p>
                </div>

                <div class="col-lg-4">
                    <img class="img-rounded" src="img/weareimd.png">
                    <h2>Na jouw bezoek</h2>
                    <p>Na jouw bezoek aan onze opleiding met een van onze gidsen, kan je vertellen wat je ervan vond. Hiervoor bestaat er het feedback formulier die jouw zal toegestuurd worden via mail zodra de opleiding is afgelopen. Dan kan je vertellen hoe jouw gids je heeft rondgeleid doorheen de opleiding, en wat je persoonlijk van hem vond.<br><br>
                    En wie weet word jij dan volgend jaar wel een gids!</p>
                </div>
            </div>
        </div>
        <?php } ?>
        
        <!-- AFSPRAKEN VAN GIDS -->
        <div class="container">
        <?php if(isset($_SESSION['username'])){ ?>
        <h1 class="page-header">Wanneer heb ik een afspraak en met wie?</h1>
        <?php 
            $book = new Book();
            $afsprakenG = $book->afsprakenG();
            
            while($row = $afsprakenG->fetch(PDO::FETCH_ASSOC)){ ?>
                <div class="col-sm-4">
                   
                    <img class="img-rounded float-left" src="https://graph.facebook.com/<?php echo $row['bezoeker_facebookid']; ?>/picture" width="59">

                    <p>
                    <b>Naam: </b><?php echo $row['bezoeker_naam'] ?>
                    <br><b>E-mailadres: </b><?php echo $row['bezoeker_email'] ?>
                    <br><b>Afspraak: </b><?php echo $row['beschikbaar_dag_uur'] ?>
                    </p>
                    <br>
                </div>
            <?php } ?>
        </div>
        
        <!-- BESCHIKBARE DATA VAN GIDS -->
        <div class="container">
            <div class="page-header"><h1>Wanneer heb ik afspraken ingesteld?</h1></div>
            
            <?php
            $b = new UserBeschikbaar();
            $allAfspraak = $b->getAllSelf();
        
            while($beschikbaar = $allAfspraak->fetch(PDO::FETCH_ASSOC)){ ?>
                <div class="col-sm-4">
                    <p><br><b>Datum: </b><?php echo $beschikbaar['beschikbaar_dag_uur']." "?><a href="<?php echo "?id=".$beschikbaar['beschikbaar_id'] ?>"><span style="color:#333333" class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></p>
                    <br>
                </div>            
            <?php }} ?>
        </div>
        
        <!-- AFSPRAKEN VAN BEZOEKER -->
        <div class="container">
        <?php if(isset($_SESSION['FBID'])){ 
        $fbid = $_SESSION['FBID']; ?>
        <h1 class="page-header">Wanneer heb ik een afspraak en met wie?</h1>
        <?php 
            $book = new Book();
            $afsprakenB = $book->afsprakenB($fbid);
            
            while($row = $afsprakenB->fetch(PDO::FETCH_ASSOC)){ ?>
                <div class="col-sm-4">
                    <img class="img-rounded img-responsive" src="img/profielfotos/<?php echo $row['gids_id']."/".$row['gids_foto']; ?>" alt="profielfoto" width="150">
                    <p>
                    <br><b>Voornaam: </b><?php echo $row['gids_voornaam'] ?>
                    <br><b>Achternaam: </b><?php echo $row['gids_naam'] ?>
                    <br><b>Richting: </b><?php echo $row['gids_richting'] ?>
                    <br><b>Jaar: </b><?php echo $row['gids_jaar'] ?>
                    <br><b>Biografie: </b><?php echo $row['gids_bio'] ?>
                    <br><b>Afspraak: </b><?php echo $row['beschikbaar_dag_uur'] ?>
                    </p>
                    <br>
                </div>
            <?php } ?>
        </div>
        
        <!-- FOTO'S VAN GIDSEN -->
        <div class="container">
        <h1>Onze gidsen</h1>
        <?php
            include_once("classes/user.class.php");
            $g = new User();
            $allInfo = $g->getAllInfo();

            while($row = $allInfo->fetch(PDO::FETCH_ASSOC)){ ?>
                <a href="gids.php?id=<?php echo $row['gids_id']; ?>">
                <img class="img-responsive img-gids" src="img/profielfotos/<?php echo $row['gids_id']."/".$row['gids_foto']; ?>" alt="">
                </a>
        <?php }} ?>  
        </div>                    

        <!--FOOTER-->
        <footer>
            <!-- INSTAFEED -->
            <h1>Vergeet niet mee te instagrammen met ons!</h1>
            <h2>#weareimd</h2>
            <div id="instafeed"></div>
            <p>&copy; Rent-A-Student 2015</p>    
        </footer>

</body>
</html>