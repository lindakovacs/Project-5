<?php
    spl_autoload_register( function($class)
    {
        include_once("classes/".$class.".class.php");
        include_once("../login.php");
    });

    $Gebruikersnaam = $_SESSION['username'];

    class User
    {
        private $m_sFirstname;
        private $m_sLastname;
        private $m_sEmail;
        private $m_sPassword;
        private $m_iYear;
        private $m_sEducation;
        private $m_sCity;
        private $m_sBio;
        private $m_sPicture;

        //SET----------------------------------------
        public function __set($p_sProperty,$p_vValue)
        {
                switch($p_sProperty)
                {
                    //VOORNAAM
                    case 'Firstname':
                    if($p_vValue=="")
                    {
                        throw new Exception("<b>Voornaam niet ingevuld!</b> Alle verplichte velden moeten ingevuld zijn.");
                    }
                    else
                    {
                        $this->m_sFirstname = $p_vValue;    
                    }
                    break;

                    //ACHTERNAAM
                    case 'Lastname':
                    if($p_vValue=="")
                    {
                        throw new Exception("<b>Achternaam niet ingevuld!</b> Alle verplichte velden moeten ingevuld zijn.");
                    }
                    else
                    {
                        $this->m_sLastname = $p_vValue;   
                    }
                    break;

                    //E-MAILADRES
                    case 'Email':
                    if ($p_vValue!="")
                    {
                        if ($this->checkEmail($p_vValue) === true)
                        {
                            $this->m_sEmail = $p_vValue;
                        }
                        else
                        {
                            throw new Exception("<b>E-mailadres is al in gebruik!</b> Probeer opnieuw met een ander e-mailadres.");
                        }
                    }
                    else
                    {
                        throw new Exception("<b>E-mailadres niet ingevuld!</b> Alle verplichte velden moeten ingevuld zijn.");
                    }
                    break;

                    //WACHTWOORD
                    case 'Password':
                    if($p_vValue=="")
                    {
                        throw new Exception("<b>Geen geldig wachtwoord!</b> Alle verplichte velden moeten ingevuld zijn.");
                    }
                    else
                    {
                        $this->m_sPassword = $p_vValue;   
                    }
                    break;

                    //JAAR
                    case 'Year':
                    $this->m_iYear = $p_vValue;
                    break;

                    //RICHTING
                    case 'Education':
                    $this->m_sEducation = $p_vValue;
                    break;

                    case 'City':
                    $this->m_sCity = $p_vValue;
                    break;

                    case 'Bio':
                    $this->m_sBio = $p_vValue;
                    break;
                    
                    case 'Picture':
                    $this->m_sPicture = $p_vValue;
                    break;
                }
        }

        //GET----------------------------------------
        public function __get($p_sProperty)
        {
                switch($p_sProperty)
                {
                    case 'Firstname':
                    return $this->m_sFirstname;
                    break;

                    case 'Lastname':
                    return $this->m_sLastname;
                    break;

                    case 'Email':
                    return $this->m_sEmail;
                    break;

                    case 'Password':
                    return $this->m_sPassword;
                    break;

                    case 'Year':
                    return $this->m_iYear;
                    break;

                    case 'Education':
                    return $this->m_sEducation;
                    break;

                    case 'City':
                    return $this->m_sCity;
                    break;

                    case 'Bio':
                    return $this->m_sBio;
                    break;
                    
                    case 'Picture':
                    return $this->m_sPicture;
                    break;
                }
        }
        
        //GET ALL---------------------------------------
        public function getAll()
        {
            $conn = Db::getInstance();
            $allposts = $conn->query("SELECT * FROM gids");
            return $allposts;
        }
        
        //CHECK IF EMAIL EXIST--------------------------
        public function checkEmail($m_sEmail)
        {
            $ret = true;
            $all_mails = $this->getAll();
            while($row = $all_mails->fetch(PDO::FETCH_ASSOC)) {
                if($row['gids_email'] == $m_sEmail)
                {
                    $ret = false;
                }
            }
            return $ret;
        }
        
        //PROFIELFOTO----------------------------------
        public function createFolderSaveImage($p_iId){
            $curdir = getcwd()."/img/profielfotos/";
            if(mkdir($curdir.$p_iId,0777)){
                move_uploaded_file($_FILES['profilepic']['tmp_name'],"img/profielfotos/".$p_iId."/".$_FILES['profilepic']['name']);

            }
         }

         //SAVE---------------------------------------
         public function save(){
         $conn = Db::getInstance();
         $statement = $conn->prepare("INSERT INTO gids  (
                                                        gids_voornaam,
                                                        gids_naam,
                                                        gids_email,
                                                        gids_wachtwoord,
                                                        gids_jaar,
                                                        gids_richting,
                                                        gids_stad,
                                                        gids_bio,
                                                        gids_foto
                                                        )

                                                 VALUES(
                                                        :firstname,
                                                        :lastname,
                                                        :email,
                                                        :wachtwoord,
                                                        :jaar,
                                                        :richting,
                                                        :stad,
                                                        :bio,
                                                        :picture
                                                        )"
                                       ); 

             $statement->bindValue(':firstname',$this->Firstname);
             $statement->bindValue(':lastname',$this->Lastname);
             $statement->bindValue(':email',$this->Email);
             $statement->bindValue(':wachtwoord',$this->Password);
             $statement->bindValue(':jaar',$this->Year);
             $statement->bindValue(':richting',$this->Education);
             $statement->bindValue(':stad',$this->City);
             $statement->bindValue(':bio',$this->Bio);
             $statement->bindValue(':picture',$this->Picture);
             $statement->execute();
             
             if(!empty($_POST['gids_foto'])){
                $insert_id = $conn->lastInsertId();
                $this->createFolderSaveImage($insert_id);  
             }
        }
    }

    //UPDATE PROFIEL----------------------------------
    if (!empty($_POST["update_voornaam"])){
        $update_voornaam = $_POST['update_voornaam'];
        $sqlquery2 = "UPDATE gids SET gids_voornaam='$update_voornaam' WHERE gids_email = $Gebruikersnaam";
    }
?>