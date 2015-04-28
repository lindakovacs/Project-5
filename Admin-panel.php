
          <?php 

    session_start();
 include_once("class/".$class.".class.php"); 




?>


<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="description" content="Rent-A-Student">
    <meta name="keywords" content="Rent,Student,Multimedia,Thomas More, Mechelen">
    <meta name="author" content="Ande Timmerman,Manuel van den Notelaer,Nick Van Puyvelde,Stijn Van Doorslaer">
    
    <link rel="icon" href="img/Rent-A-Student.png">
    <title>Rent-A-Student</title>
    
    <!-- OPENGRAPH TAGS -->
    <meta property="og:image" content="img/Rent-A-Student.png"/>
    
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">

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
            <a href="index.php"><img src="img/vector-logo.png" alt="logo"></a>
            <p>Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen.</p>
        </header>

        <!--NAV-->
        <nav>
            <ul class="nav nav-tabs nav-justified">
              <li><a href="index.php">Home</a></li>
              <li><a href="">About us</a></li>
              <li><a href="">Contact</a></li>
            </ul>
        </nav>
           
        <!--ALERT SUCCESS-->
        <?php if(isset($success)){ ?>
            <div class="alert alert-success" role="alert">
            <?php echo $success ?>
            </div>
        <?php } ?>

        <!--ALERT DANGER-->
        <?php if(isset($error)){ ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error ?>
            </div>
        <?php } ?>
            
        <!--FORMULIER REGISTREREN-->
        <h2 id="registration">Nieuwe Admin Toevoegen </h2>
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
            <button type="submit" class="btn btn-default">Registreren</button>
            </form>
         
     
        
        <br>
                
                <!-- Hier Moet Een tabel komen zodat hij zijn eigen gegevens kan aanpassen -->
                <!-- PROFIELFOTO -->
                <!-- EMAILADRES -->
                <!-- WACHTWOORD -->
                
                
                
            
                 <h2 id="registration">Lijst opvragen van boekingen</h2>
                 <br>
        <form role="form" method="post" >
            <button type="submit" name= "lijst" class="btn btn-default">Toon alle boekingen</button>
           <!--<input type='hidden' name='geboektfk' value='".$row["geboekt_fk"]."'/>-->
           <input type='hidden' name='geboektfk' value='".$row["geboekt_fk"]."'/>
            </form>   
                   
           
                      
    <h2>Welke gids is beschikbaar... en wanneer?</h2>
       <br>
        
        
        
    <table style="width:100%">
  <tr>
    <th>Naam</th>
    <th>E-mail</th>
    <th>Datum</th>
    <th>tijdstip</th>
  </tr>
 


<?php 

$conn = new mysqli("localhost", "root", "root", "phpproject");
        if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
        }


$sql = "SELECT * FROM beschikbaar INNER JOIN gids ON beschikbaar.gids_fk = gids.gids_id INNER JOIN geboekt ON gids.gids_id = geboekt.gids_id INNER JOIN bezoeker ON geboekt.bezoeker_id = bezoeker.bezoeker_id WHERE geboekt_isgeboekt = 1";



$run = $conn->query($sql);
    
    while($row = $run->fetch_assoc()) {
     $bezoeker_naam = $row["bezoeker_naam"];
     $bezoeker_email = $row["bezoeker_email"];
     $beschikbaar_uur = $row["beschikbaar_uur"];
     $beschikbaar_dag = $row["beschikbaar_dag"];

?>
       
       
    <td><?php echo $bezoeker_naam; ?></td>
    <td><?php echo $bezoeker_email; ?></td>
    <td><?php echo $beschikbaar_uur; ?></td>
    <td><?php echo $beschikbaar_dag; ?></td>
    <td></td>
    <td></td>
  </tr>
             
<?php } ?>
              
                              
        </table>
                                              
         
               <br> 
               <br>
                
        <!-- FOOTER -->
        <footer class="footer">
           <br> 
            <p>&copy;2015</p>
            <br>    
        </footer>
        
 
</body>
</html>