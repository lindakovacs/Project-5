<?php 
    spl_autoload_register( function($class)
    {
        include_once("classes/".$class.".class.php");
    });

    if (!empty($_POST["aanmelden"])) 
    {
        $conn = Db::getInstance();
        
        try
        {
            $post = $conn->prepare("SELECT * FROM gids WHERE gids_email = ?");
            $post->execute(array($_POST['email']));
            $row = $post->fetch(PDO::FETCH_ASSOC);
            if (password_verify($_POST['password'], $row['gids_wachtwoord'])) 
            {
                $success ="<b>Welkom!</b> U bent aangemeld met ".$row['gids_email'].".";
                $_SESSION['logged_in']=true;
                $_SESSION['username']=$row['gids_email'];
                $_SESSION['gids_id']=$row['gids_id'];
                $_SESSION['gids_foto']=$row['gids_foto'];
                $Gebruikersnaam = $_SESSION['username'];
            }
            elseif (!isset($row['gids_wachtwoord']))
            {
                throw new Exception('<b>Onjuist e-mailadres</b> U kan zich niet aanmelden met onjuiste gegevens.');
            }else
            {
                throw new Exception("Ongeldig wachtwoord!");
            }
        }
            catch(Exception $e)
            {
                $error = $e->getMessage();
            }
    }
?>