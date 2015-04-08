<?php

    session_start();

    if (!empty($_POST)) 
    {
        $Gebruikersnaam = $_POST['email'];
        $Wachtwoord = $_POST['password'];

        $conn = new mysqli("localhost", "root", "","phpproject");
        if (!$conn->connect_errno)
        {
            $query = "SELECT * FROM gids WHERE gids_email = '".$conn->real_escape_string($Gebruikersnaam)."';";
            $result = $conn->query($query);
            
            $row_hash = $result->fetch_array();
            if (password_verify($Wachtwoord, $row_hash['gids_wachtwoord'])) 
            {
                $success ="<b>Welkom!</b> U bent aangemeld met ".$Gebruikersnaam.".";
                $_SESSION['logged_in'] = true;
            }
            else
            {
                $error = "<b>Onjuist e-mailadres of wachtwoord!</b> U kan zich niet aanmelden met onjuiste gegevens.";
            }
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
    
    <link rel="icon" href="img/Rent-A-Student.png">
    <title>Rent-A-Student</title>
    
    <!-- OPENGRAPH TAGS -->
    <meta property="og:image" content="img/Rent-A-Student.png"/>
    
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->    
</head>
<body>
    <!--CONTAINER-->
    <div class="container">
       
        <!--HEADER-->
        <header class="jumbotron">

            <!--FORMULIER LOGOUT-->
            <?php if(isset($_SESSION['logged_in'])){ ?>
                <a id="logout" href="logout.php">Afmelden</a>
            <?php } ?>
                    
            <!--FACEBOOK LOGOUT-->
            <?php if (isset($_SESSION['FBID'])){ ?>
                <a id="logout" href="facebook/logout.php">Afmelden</a>
            <?php } ?>

            <a href="index.php"><img src="img/vector-logo.png" alt="logo"></a>
            <p>Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen.</p>
            
            <!--FACEBOOK LOGIN-->
            <?php if(isset($_SESSION['FBID'])){ ?>
                <!--  After user login  -->
                <img class="img-rounded" src="https://graph.facebook.com/<?php echo $_SESSION['FBID']; ?>/picture">
                <?php echo $_SESSION['FULLNAME']; ?>
            <?php }else{ ?>
                <!--  Before user login  -->  
                <a href="facebook/fbconfig.php">
                <button class="btn btn-facebook"><i class="fa fa-facebook"></i>Log in met facebook</button>
                </a>
            <?php } ?> 
        </header>

        <!--NAV-->
        <nav>
            <ul class="nav nav-tabs nav-justified">
              <li><a href="index.php">Home</a></li>
              <li><a href="">About us</a></li>
              <li><a href="">Contact</a></li>
            </ul>
        </nav>

        <!--SECTION-->
        <section >
            
            <!--ALERT SUCCESS-->
            <?php if(isset($success)){ ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $success; ?>
                </div>
            <?php } ?>
            
            <!--ALERT DANGER-->
            <?php if(isset($error)){ ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
            <?php } ?>
            
            <!--FORMULIER LOGIN-->
            <h1>Login</h1>
            <form class="form-inline" role="form" method="post">
                <div class="form-group">
                  <label class="sr-only" for="gebruikersnaam">Gebruikersnaam:</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="E-mailadres">
                </div>
                <div class="form-group">
                  <label class="sr-only" for="pwd">Wachtwoord:</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Wachtwoord">
                </div>
                <button type="submit" class="btn btn-default">Verstuur</button>
                <br>
                <div class="checkbox">
                  <label><input type="checkbox"> Aangemeld blijven</label>
                </div>
                <br>
                <a href="registreer.php">Indien je nog niet bent ingeschreven moet je dit hier doen.</a>
            </form>

           <br>
           
            <!--3xROW-->
            <div class="row">
                <div class="col-sm-4">
                    <img class="img-rounded img-responsive" src="http://placehold.it/150">
                    <h3>Column 1</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
                <div class="col-sm-4">
                    <img class="img-rounded img-responsive" src="http://placehold.it/150">
                    <h3>Column 2</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
                <div class="col-sm-4">
                    <img class="img-rounded img-responsive" src="http://placehold.it/150">
                    <h3>Column 3</h3>        
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
            </div>
         
        </section>

        <!-- FOOTER -->
        <footer>
            <p>&copy;2015</p>    
        </footer>
        
    </div>  
</body>
</html>