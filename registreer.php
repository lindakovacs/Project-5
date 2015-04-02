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
            <h1>Rent-A-Student</h1>
            <p>Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen.</p>
            <button class="btn btn-facebook"><i class="fa fa-facebook"></i>Registreer met facebook</button>
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
            <!--NAAM-->
            <div class="form-group">
                <label for="name">Naam:<span class="required">*</span></label>
                <input type="text" class="form-control" id="name" placeholder="Naam">
            </div>
            <!--EMAILADRES-->
            <div class="form-group">
                <label for="email">E-mailadres:<span class="required">*</span></label>
                <input type="email" class="form-control" id="email" placeholder="E-emailadres">
            </div>
            <!--WACHTWOORD-->
            <div class="form-group">
                <label for="password">Wachtwoord:<span class="required">*</span></label>
                <input type="password" class="form-control" id="password" placeholder="Wachtwoord">
            </div>
            <!--WOONPLAATS-->
            <div class="form-group">
                <label for="city">Woonplaats:<span class="required">*</span></label>
                <input type="text" class="form-control" id="city" placeholder="Woonplaats">
            </div>
            <!--JAAR-->
            <div class="form-group">
                <label for="year">Jaar:<span class="required">*</span></label>
                <select class="form-control" id="year">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select>
            </div>
            <!--RICHTING-->
            <div class="form-group">
                <label for="education">Richting:<span class="required">*</span></label>
                <select class="form-control" id="education">
                    <option>Niet van toepassing</option>
                    <option>Webdesign</option>
                    <option>Webdevelopment</option>
                </select>
            </div>
            <!--TEXTAREA-->
            <div class="form-group">
                <label for="bio">Biografie</label>
                <textarea class="form-control" id="bio" cols="30" rows="10">Lorem Ipsum is slechts een proeftekst.</textarea>
            </div>
            <!--PROFIELFOTO-->
            <div class="form-group">
                <label for="profilePicInputFile">Profielfoto uploaden</label>
                <input type="file" id="profileInputFile">
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