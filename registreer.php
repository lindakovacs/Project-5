<?php

    spl_autoload_register( function($class)
    {
        include_once("classes/" . $class . ".class.php");
    });


    include_once("login.php");
    
    if(!empty($_POST["registreren"]))
    {
        try
        {             
            $g = new User();
            $g->Firstname=$_POST['firstname'];
            $g->Lastname=$_POST['lastname'];
            $g->Email=$_POST['email'];
            //PASSWORD HASH
            $options=['cost'=>12,];
            $g->Password = password_hash($_POST['password'],PASSWORD_DEFAULT, $options);
            $g->Year=$_POST['year'];
            $g->Education=$_POST['education'];
            $g->City=$_POST['city'];
            $g->Bio=$_POST['bio'];
            $g->save();
            $success ="<b>Ok!</b> Je bent succesvol geregistreerd.";
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
    <meta name="author" content="Ande Timmerman,Manuel van den Notelaer,Nick Van Puyvelde,Stijn Van Doorslaer">
    
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
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

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
            <ul class="nav navbar-nav">
                <li><a class="navbar-brand" href="index.php">Rent-A-Student</a></li>
                <li><a href="index.php">Over ons</a></li>
                <li><a href="index.php">Contact</a></li>
            </ul>
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
        
        <!--HEADER-->
        <header class="jumbotron">

            <a href="index.php"><img src="img/vector-logo.png" class="img-responsive" alt="logo"></a>
            <p>Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen.</p>
            
        </header>
          
        <!--ALERT SUCCESS-->
        <?php if(isset($success)){ ?>
            <div class="alert alert-success" role="alert">
            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
            <?php echo $success ?>
            </div>
        <?php } ?>

        <!--ALERT DANGER-->
        <?php if(isset($error)){ ?>
            <div class="alert alert-danger" role="alert">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                <?php echo $error ?>
            </div>
        <?php } ?>
           
        <!--SECTION-->
        <section>
            
        <!--FORMULIER REGISTREREN-->
        <h2 id="registration">Registratie</h2>
        <form role="form" method="post" >
            <!--VOORNAAM-->            
            <label for="firstname">Voornaam:<span class="required">*</span></label>
            <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Voornaam">     
            </div>
            
            <!--ACHTERNAAM-->
            <label for="lastname">Achternaam:<span class="required">*</span></label>
            <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Achternaam">     
            </div>
            
            <!--EMAILADRES-->
            <label for="email">E-mailadres:<span class="required">*</span></label>
            <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                <input type="email" class="form-control" id="email" name="email" placeholder="E-emailadres">                             </div>
                
            <!--WACHTWOORD-->
            <label for="password">Wachtwoord:<span class="required">*</span></label>
            <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input type="password" class="form-control" id="password" name="password" placeholder="Wachtwoord">
            </div>
            
            <!--JAAR-->
           <div class="form-group">
                <label for="year">Jaar:<span class="required">*</span></label>
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                    <select class="form-control" id="year" name="year">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>
            </div>
            
            <!--RICHTING-->
            <div class="form-group">
                <label for="education">Richting:<span class="required">*</span></label>
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
                    <select class="form-control" id="education" name="education">
                        <option>Niet van toepassing</option>
                        <option>Webdesign</option>
                        <option>Webdevelopment</option>
                    </select>
                </div>
            </div>
            
            <!--WOONPLAATS-->
            <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                <input type="text" class="form-control" id="city" name="city" placeholder="Woonplaats">                                 </div>
            
            <!--TEXTAREA-->
           <div class="form-group">
                <label for="bio">Biografie:</label>
                <textarea class="form-control" id="bio" cols="30" name="bio" rows="10" placeholder="Lorem Ipsum is slechts een proeftekst."></textarea>
            </div>
            
            <!--PROFIELFOTO-->
            <div class="form-group">
                <label for="profilePicInputFile">Profielfoto uploaden</label>
                <input type="file" name="fileToUpload" id="fileToUpload">
            </div>
            <input type="submit" name="registreren" class="btn btn-primary" value="Registreren"></input>
            </form>
         
        </section>

        <br>
        
        <!--FOOTER-->
        <footer>
            <p>&copy; Rent-A-Student 2015</p>    
        </footer>
        
    </div><!--/CONTAINER-->
</body>
</html>