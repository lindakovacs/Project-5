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
<<<<<<< HEAD
            <div id="fb_button">
                <a class="btn btn-block btn-social btn-facebook"><img src="img/Social_button_fb.png" />Login met facebook</a>
            </div>
=======
            <a class="btn-facebook" href="#" role="button">Learn more</a>
            <div id="test"></div>
>>>>>>> origin/master
        </header>

        <!--NAV-->
        <nav>
            <ul class="nav nav-tabs nav-justified">
              <li><a href="">Home</a></li>
              <li><a href="">About us</a></li>
              <li><a href="">Contact</a></li>
            </ul>
        </nav>

        <!--SECTION-->
        <section >
           
            <br>
            
            <!--FORMULIER LOGIN-->
            <h1>Login</h1>
            <form class="form-inline" role="form">
                <div class="form-group">
                  <label class="sr-only" for="email">Email:</label>
                  <input type="email" class="form-control" id="email" placeholder="E-mailadres">
                </div>
                <div class="form-group">
                  <label class="sr-only" for="pwd">Password:</label>
                  <input type="password" class="form-control" id="pwd" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
                <br>
                <div class="checkbox">
                  <label><input type="checkbox"> Remember me</label>
                </div>
                <a href="#registration"></a>
            </form>
            
            <!--FORMULIER REGISTREREN-->
            <h2 id="registration">Registration</h2>
            <form role="form">
                <div class="form-group">
                    <label for="firstname">Firstname:</label>
                    <input type="text" class="form-control" id="firstname" placeholder="Firstname">
                </div>
                <div class="form-group">
                    <label for="lastname">Lastname:</label>
                    <input type="text" class="form-control" id="lastname" placeholder="Lastname">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password">
                </div>
                <div class="checkbox">
                    <label><input type="checkbox"> Remember me</label>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
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
        <footer class="footer">
            <p>&copy;2015</p>    
        </footer>
        
    </div>  
</body>
</html>