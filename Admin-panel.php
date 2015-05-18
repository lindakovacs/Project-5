<?php 
    session_start();
    include_once("login.php");

    spl_autoload_register(function($class){
        include_once("classes/".$class.".class.php"); 
    });
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
    <title>Rent-A-Student | Admin</title>
    
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

            <!--FORMULIER INLOGGEN-->
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
       
        <!--SECTION-->
        <section>
        <div class="container">
            
        <!--NIEUWE ADMIN TOEVOEGEN-->
        <div class="page-header" id="registration"><h2>Nieuwe Admin Toevoegen</h2></div>
        <form role="form" method="post" >
            <!--VOORNAAM-->
            <div class="form-group">
                <label for="firstname">Voornaam:<span class="required">*</span></label>
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Voornaam">
            </div>
            <!--ACHTERNAAM-->
               <div class="form-group">
                <label for="lastname">Achternaam:<span class="required">*</span></label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Achternaam">
            </div>
            <!--EMAILADRES-->
            <div class="form-group">
                <label for="email">E-mailadres:<span class="required">*</span></label>
                <input type="email" class="form-control" id="email" name="email" placeholder="E-emailadres">
            </div>
            <!--WACHTWOORD-->
            <div class="form-group">
                <label for="password">Wachtwoord:<span class="required">*</span></label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Wachtwoord">
            </div>
            <!--PROFIELFOTO-->
            <div class="form-group">
                <label for="profilePicInputFile">Profielfoto uploaden</label>
                <input type="file" name="fileToUpload" id="fileToUpload">
            </div>
            <button type="submit" class="btn btn-primary">Registreren</button>
        </form>
                      
        <!-- Hier Moet Een tabel komen zodat hij zijn eigen gegevens kan aanpassen -->
        <!-- PROFIELFOTO -->
        <!-- EMAILADRES -->
        <!-- WACHTWOORD -->

        <!-- LIJST OPVRAGEN BOEKINGEN -->
        <div class="page-header" id="registration"><h2>Lijst opvragen van boekingen</h2></div>
        <form role="form" method="post" >
            <button type="submit" name= "lijst" class="btn btn-default">Toon alle boekingen</button>
            <input type='hidden' name='geboektfk' value='".$row["geboekt_fk"]."'/>
        </form>   
        
        <!-- WELKE BEZOEKER WELKE GIDS -->
        <h2 class="page-header">Welke bezoeker heeft welke gids geboekt?</h2>
        <?php 
            $a = new Admin();
            $all_boekingen = $a->boekingen();
            
            while($row = $all_boekingen->fetch(PDO::FETCH_ASSOC))
            {
                $bezoeker_naam = $row["bezoeker_naam"];
                $gids_voornaam = $row["gids_voornaam"];
                $gids_naam = $row["gids_naam"];    
        ?>
            <div class="row">
            <div class="col-lg-4">
                <p>Bezoeker: <b><?php echo $bezoeker_naam; ?></b> heeft </p>
                <p><b><?php echo $gids_voornaam?> <?php echo $gids_naam ?></b> geboekt als gids.</p>
            </div>
            </div>
        <?php } ?>     

        <!-- WELKE BEZOEKER HEEFT WANNEER GEBOEKT -->
        <h2 class="page-header">Welke bezoeker heeft wanneer geboekt?</h2>      
        <table style="width:100%">
            <tr>
                <th>Naam</th>
                <th>E-mail</th>
                <th>Datum</th>
            </tr>

            <?php 
            $b = new UserBeschikbaar();
            $allGeboekt = $b->getAllGeboekt();
        
            // LOOP ALLE BESCHIKBARE DATA
            while($row = $allGeboekt->fetch(PDO::FETCH_ASSOC)){
                $bezoeker_naam = $row["bezoeker_naam"];
                $bezoeker_email = $row["bezoeker_email"];
                $beschikbaar_uur = $row["beschikbaar_dag_uur"];
            ?>

            <tr>
                <td><?php echo $bezoeker_naam; ?></td>
                <td><?php echo $bezoeker_email; ?></td>
                <td><?php echo $beschikbaar_uur; ?></td>
            </tr>

            <?php } ?>                  
        </table>
        
        </div>                      
        </section>
                
        <!--FOOTER-->
        <footer>
            <p>&copy; Rent-A-Student 2015</p>    
        </footer>
        
    </div><!--/CONTAINER-->
    
</body>
</html>