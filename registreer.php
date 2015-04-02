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
            <h1>Rent-A-Student</h1>
            <p>Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen.</p>
            <a class="btn-facebook" href="#" role="button">Learn more</a>
            <div id="test"></div>
        </header>

        <!--NAV-->
        <nav>
            <ul class="nav nav-tabs nav-justified">
              <li><a href="">Home</a></li>
              <li><a href="">About us</a></li>
              <li><a href="">Contact</a></li>
            </ul>
        </nav>
            
            <!--FORMULIER REGISTREREN-->
            <h2 id="registration">Registratie</h2>
            <form role="form">
                <div class="form-group">
                    <label for="firstname">Voornaam:</label>
                    <input type="text" class="form-control" id="firstname" placeholder="Voornaam">
                </div>
                <div class="form-group">
                    <label for="lastname">Achternaam:</label>
                    <input type="text" class="form-control" id="lastname" placeholder="Achternaam">
                </div>
                <div class="form-group">
                    <label for="email">E-mailadres:</label>
                    <input type="email" class="form-control" id="email" placeholder="E-emailadres">
                </div>
                <div class="form-group">
                    <label for="pwd">Wachtwoord:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Wachtwoord">
                </div>
                <div class="form-group">
                    <label for="lastname">Stad:</label>
                    <input type="text" class="form-control" id="lastname" placeholder="Stad">
                </div>
                <div class="form-group">
                    <label for="sel1">Jaar:</label>
                    <select class="form-control" id="sel1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select>
                </div>
                <div class="form-group">
                    <label for="sel1">Richting:</label>
                    <select class="form-control" id="sel1">
                    <option>Webdevelopment</option>
                    <option>Webdesign</option>
                    </select>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox">Aangemeld blijven</label>
                </div>
                <button type="submit" class="btn btn-default">Registreren</button>
                

             


             </form>

            <br>

            <!--ALERT SUCCESS-->
            <div class="alert alert-success" role="alert">
                <b>Well done!</b> You successfully read this important alert message.
            </div>

            <!--ALERT WARNING-->
            <div class="alert alert-warning" role="alert">
                <b>Warning!</b> Better check yourself, you're not looking too good.
            </div>

            <!--ALERT DANGER-->
            <div class="alert alert-danger" role="alert">
                <b>Oh snap!</b> Change a few things up and try submitting again.
            </div>
         
        </section>

        <!-- FOOTER -->
        <footer class="footer">
            <p>&copy;2015</p>    
        </footer>
        
    </div>  
</body>
</html>