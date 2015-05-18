<?php
    spl_autoload_register( function($class)
    {
        include_once("classes/" . $class . ".class.php");
    });

    class message
    {
        private $m_sBericht_tekst;
        private $m_iGids_id;
        private $m_iBezoeker_id;
        private $m_sUsername;

        //SET----------------------------------------
        public function __set($p_sProperty,$p_vValue)
        {
                switch($p_sProperty)
                {
                    case 'Bericht_tekst':
                        $this->m_sBericht_tekst = $p_vValue;    
                    break;

                    case 'Gids_id':
                        $this->m_iGids_id = $p_vValue;    
                    break;

                    case 'Bezoeker_id':
                        $this->m_iBezoeker_id = $p_vValue;    
                    break;

                    case 'Username':
                        $this->m_sUsername = $p_vValue;    
                    break;

                }
        }

        //GET----------------------------------------
        public function __get($p_sProperty)
        {
                switch($p_sProperty)
                {
                    case 'Bericht_tekst':
                    return $this->m_sBericht_tekst;
                    break;

                    case 'Gids_id':
                    return $this->m_iGids_id;
                    break;

                    case 'Bezoeker_id':
                    return $this->m_iBezoeker_id;
                    break;

                    case 'Username':
                    return $this->m_sUsername;
                    break;


                }
        }

         //SAVE---------------------------------------
         public function save(){
         $conn = Db::getInstance();
         $statement = $conn->prepare("INSERT INTO message  (
                                                        Bericht_tekst,
                                                        Gids_id,
                                                        Bezoeker_id,
                                                        Username    
                                                        )

                                                 VALUES(
                                                        :Bericht_tekst,
                                                        :Gids_id,
                                                        :Bezoeker_id,
                                                        :Username
                                                        )"
                                       ); 

             $statement->bindValue(':Bericht_tekst',$this->Bericht_tekst);
             $statement->bindValue(':Gids_id',$this->Gids_id);
             $statement->bindValue(':Bezoeker_id',$this->Bezoeker_id);
             $statement->bindValue(':Username',$this->Username);
             $statement->execute();

        }
        
        public function GetAllMessages()
		{
			return Db::getInstance()->query("select * from message;");
		}
    }
?>

