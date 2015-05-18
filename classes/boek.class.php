<?php
    spl_autoload_register( function($class)
    {
        include_once("classes/" . $class . ".class.php");
    });

    class Book
    {
        private $m_sGidsid;
        private $m_sIsgeboekt;
        
        //SET----------------------------------------
        public function __set($p_sProperty,$p_vValue)
        {
                switch($p_sProperty)
                {
                    case 'Gidsid':
                    if($p_vValue=="")
                    {
                        throw new Exception("gidsid invullen");
                    }
                    else
                    {
                        $this->m_sGidsid = $p_vValue;   
                    }
                    break;
                    
                    case 'Isgeboekt':
                    if($p_vValue=="")
                    {
                        throw new Exception("");
                    }
                    else
                    {
                        $this->m_sIsgeboekt = $p_vValue;   
                    }
                    break;
                }
        }

        //GET----------------------------------------
        public function __get($p_sProperty)
        {
                switch($p_sProperty)
                {
                    case 'Gidsid':
                    return $this->m_sGidsid;
                    break;

                    case 'Isgeboekt':
                    return $this->m_sIsgeboekt;
                    break;
                }
        }
        
        //AFSPRAKEN VAN GIDS
        public function afsprakenG()
        {
            $conn = Db::getInstance();
            $current_id = $_SESSION['gids_id'];
            $afsprakenG = $conn->query("SELECT * FROM bezoeker
            INNER JOIN geboekt ON bezoeker.bezoeker_facebookid = geboekt.bezoeker_facebookid
            INNER JOIN gids ON geboekt.gids_id = gids.gids_id
            WHERE gids.gids_id = $current_id");
            return $afsprakenG;
        }
        
        //AFSPRAKEN VAN BEZOEKER
        public function afsprakenB($fbid)
        {
            $conn = Db::getInstance();
            $afsprakenB = $conn->query("SELECT * FROM gids
            INNER JOIN geboekt ON gids.gids_id = geboekt.gids_id
            INNER JOIN bezoeker ON geboekt.bezoeker_facebookid = bezoeker.bezoeker_facebookid
            WHERE bezoeker.bezoeker_facebookid = $fbid");
            return $afsprakenB;
        }

         //SAVE---------------------------------------
         public function save($facebookid,$beschikbaar_id,$beschikbaar_dag_uur)
         {
             $conn = Db::getInstance();
             $statement = $conn->prepare("INSERT INTO geboekt(bezoeker_facebookid,
                                                              gids_id,
                                                              geboekt_isgeboekt,
                                                              beschikbaar_id,
                                                              beschikbaar_dag_uur
                                                             )

                                                       VALUES(:bezoeker_facebookid,
                                                              :gidsid,
                                                              :isgeboekt,
                                                              :beschikbaar_id,
                                                              :beschikbaar_dag_uur
                                                             )
                                        "); 

             $statement->bindValue(':bezoeker_facebookid',$facebookid);
             $statement->bindValue(':gidsid',$this->Gidsid);
             $statement->bindValue(':isgeboekt',$this->Isgeboekt);
             $statement->bindValue(':beschikbaar_id',$beschikbaar_id);
             $statement->bindValue(':beschikbaar_dag_uur',$beschikbaar_dag_uur);
             $statement->execute();
         }
    }
?>