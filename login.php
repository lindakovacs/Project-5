<?php 
    if (!empty($_POST["aanmelden"])) 
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
                $_SESSION['username'] = $Gebruikersnaam;
                $_SESSION['gids_id']=$row_hash['gids_id'];
                $_SESSION['gids_foto']=$row_hash['gids_foto'];
            }
            else
            {
                $error = "<b>Onjuist e-mailadres of wachtwoord!</b> U kan zich niet aanmelden met onjuiste gegevens.";
            }
        }
    }
?>