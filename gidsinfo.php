
<?php
    session_start();
    //include_once("login.php");

   spl_autoload_register( function($class)
    {
        include_once("classes/".$class.".class.php");
    });




       if(!empty($_POST['gerated'])){   
            echo "gelukt!";
            $gerated = "Uw rating is verzonden!";
            //$info = "<b>Boeking gelukt!</b> GidsID: ".$book->Gidsid." IsGeboekt: ".$book->Isgeboekt;
        }
?>

<?php include_once( 'rating/getItems.php' ); include_once( 'rating/ip.php' );?>



<!DOCTYPE html>
<html lang="en">
<head>




    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="Rent-A-Student">
    <meta name="keywords" content="Rent,Student,Multimedia,Thomas More, Mechelen">
    <meta name="author" content="Ande Timmerman,Manuel van den Notelaer,Nick van Puyvelde,Stijn Van Doorslaer">
    
    <link rel="icon" href="img/weareimd.png">
    <title>Rent-A-Student: Rating</title>
    
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




    <meta charset="utf-8">
    <link rel="stylesheet" href="jquery/jRating.jquery.css" />
    <link rel="stylesheet" href="css/style.css" />
    <script type="text/javascript" src="jquery/jquery.js"></script>
    <script type="text/javascript" src="jquery/jRating.jquery.js"></script>
    <script type="text/javascript">
        $(function(){
            $(".rating").jRating({
                decimalLength : 1,
                rateMax : 5, // maximal rate - integer from 0 to 9999 (or more)
                phpPath: 'ajax/rating.php',
                onSuccess: function(){
                    alert('Jouw rating is verzonden');
                    //$gerated = "Uw rating is verzonden!";
                },
                onError: function(){
                    alert('Er deed zich een probleem voor waardoor uw rating niet kon worden verzonden');
                    //$gerated = "Er deed zich een probleem voor waardoor uw rating niet kon worden verzonden";
                }
            });
        });
    </script>
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







 <!-- ALERTS -->
    <div class="container"> 
        <!--ALERT SUCCESS-->
        <?php if(isset($gerated)){ ?>
            <div class="alert alert-success" role="alert">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                <?php echo $gerated; ?>
            </div>
        <?php } ?>

    


          <!--HEADER-->
        <header class="inleiding">

                <!--FACEBOOK INLOGGEN-->
                <?php if(!isset($_SESSION['logged_in']) && !isset($_SESSION['FBID'])){ ?>
                    <a href="facebook/fbconfig.php">
                    <button class="btn btn-facebook"><i class="fa fa-facebook"></i>Log in met facebook</button>
                    </a>
                    <p class="fb">Enkel voor bezoekers.</p>
                <?php } ?>
        </header>








 <!-- BEZOEKER MOET GIDSEN KUNNEN RATEN -->
        <div id="ratings" class="container">
        <?php if(isset($_SESSION['FBID'])){ ?>
            
            <?php
        
        


            $c = new UserBeschikbaar();
            $allgids = $c->getAllGids();


        
            // LOOP ALLE BESCHIKBARE DATA
            while($beschikbaar = $allgids->fetch(PDO::FETCH_ASSOC)){ ?>
                <div class="col-sm-3">






                   
                    <?php if(!empty($beschikbaar['gids_foto'])){
                    ;
                    ?>


                        <img class="img-rounded img-responsive" src="img/profielfotos/<?php echo $beschikbaar['gids_id']."/".$beschikbaar['gids_foto']; ?>" alt="profielfoto" width="150">
                    <?php }else{ ?>
                        <img class="img-rounded img-responsive" src="img/weareimd.png" alt="weareimd">
                    <?php } ?>
                    <p>
                    <br><b>Voornaam: </b><?php echo $beschikbaar['gids_voornaam'] ?>
                    <br><b>Achternaam: </b><?php echo $beschikbaar['gids_naam'] ?>
                    <br><b>Aantal Ratings: </b><?php echo $beschikbaar['total_rates'] ?>
                    <br><b>Gemiddelde Rating: </b><?php echo $beschikbaar['rating'] ?>
        


                                       <?php if ($allItems !== 0) { 
                                              //foreach($allItems as $value) {
                                             //if ($allItems !== 0) { foreach($allItems as $value) {

            $allIpAddress = explode(',',$beschikbaar['ip_address']);
            $current_ipAddress = GetUserIP();
            
            if(in_array($current_ipAddress,$allIpAddress))
            {
                $class = 'jDisabled';
            }
            else
            {
                $class = '';
            }
            
        ?>

     <br><b>Rating:</b><div name="gerated" class="rating <?php echo $class; ?>" id="<?php echo $beschikbaar['rating']; ?>_<?php echo $beschikbaar['gids_id']; ?>"></div>

 <?php }?>  
                     


                    
                    <br>
                    </p>
                        
                    <form method='post'>
                    <input type='hidden' name='gidsid' value='<?php echo $beschikbaar['gids_id'] ?>'/>
                    <input type='hidden' name='isgeboekt' value='1'/>
                    
                   </form>
                   
                            
                    
                    <br>
                </div>            
            <?php }}?>


            








    

</body>
</html>
