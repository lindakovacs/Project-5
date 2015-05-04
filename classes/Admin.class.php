<?php
    spl_autoload_register( function($class)
    {
        include_once("classes/" . $class . ".class.php");
    });

class Admin
    {
        private $m_sFirstname;
        private $m_sLastname;
        private $m_sEmail;
        private $m_sPassword;
        
    
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
                
                    //Email
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
                    
                    //PASSWORD
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
                }
    }
    
    public function getAll()
        {
            $conn = Db::getInstance();
            $alladmins = $conn->query("SELECT * FROM admin");
            return $alladmins;
        }
             
        public function checkEmail($m_sEmail)
        {
            $ret = true;
            $all_mails = $this->getAll();
            while($row = $all_mails->fetch(PDO::FETCH_ASSOC)) {
                if($row['admin_email'] == $m_sEmail)
                {
                    $ret = false;
                }
            }
            return $ret;
        }
    
    
    public function save(){
         $conn = Db::getInstance();
         $statement = $conn->prepare("INSERT INTO admin  (
                                                        admin_voornaam,
                                                        admin_achternaam,
                                                        admin_email,
                                                        admin_wachtwoord
                                                        )

                                                 VALUES(
                                                        :firstname,
                                                        :lastname,
                                                        :email,
                                                        :wachtwoord
                                                        )"
                                       ); 

             $statement->bindValue(':firstname',$this->Firstname);
             $statement->bindValue(':lastname',$this->Lastname);
             $statement->bindValue(':wachtwoord',$this->Password);
             $statement->bindValue(':email',$this->Email);
             $statement->execute();  
             }
        }

?>