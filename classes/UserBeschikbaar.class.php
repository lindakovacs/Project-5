<?php

    spl_autoload_register(function($class)
    {
        include_once("classes/".$class.".class.php");
    });

    class UserBeschikbaar
    {
        private $m_sBeschikbaar;

        //SET----------------------------------------
        public function __set($p_sProperty,$p_vValue)
        {
                switch($p_sProperty)
                {
                    case 'Beschikbaar':
                    if($p_vValue=="")
                    {
                        throw new Exception("<b>Geen datum ingevuld!</b> Er moet een datum ingevuld worden.");
                    }
                    else
                    {
                        $this->m_sBeschikbaar = $p_vValue;    
                    }
                    break;
                }
        }

        //GET----------------------------------------
        public function __get($p_sProperty)
        {
                switch($p_sProperty)
                {
                    case 'Beschikbaar':
                    return $this->m_sBeschikbaar;
                    break;
                }
        }
        
        //SAVE---------------------------------------
        public function save($current_id)
        {
            $conn = Db::getInstance();
            $statement = $conn->prepare('INSERT INTO beschikbaarheid(
                                                          beschikbaar_dag_uur,
                                                          gids_id
                                                         )

                                                   VALUES(
                                                          :beschikbaar_dag_uur,
                                                          :gids_id
                                                         )'
                                       ); 

         $statement->bindValue(':beschikbaar_dag_uur',$this->Beschikbaar);
         $statement->bindValue(':gids_id',$current_id);
         $statement->execute();
        }

        //GET ALL ID------------------------------------
        public function getAllId($id)
        {
            $conn = Db::getInstance();
            $allBeschikId = $conn->query("SELECT b.*, g.* FROM `beschikbaarheid` b
            LEFT JOIN geboekt gb ON gb.beschikbaar_id = b.beschikbaar_id 
            LEFT JOIN gids g ON g.gids_id = b.gids_id 
            WHERE b.gids_id = $id AND gb.geboekt_isgeboekt IS NULL
            ORDER BY b.beschikbaar_dag_uur");
            return $allBeschikId;
        }
        
        //GET ALL SELF------------------------------------
        public function getAllSelf()
        {
            $conn = Db::getInstance();
            $current_id = $_SESSION['gids_id'];
            $allAfspraak = $conn->query("SELECT b.*, g.* FROM `beschikbaarheid` b
            LEFT JOIN geboekt gb ON gb.beschikbaar_id = b.beschikbaar_id 
            LEFT JOIN gids g ON g.gids_id = b.gids_id 
            WHERE b.gids_id = $current_id AND gb.geboekt_isgeboekt IS NULL
            ORDER BY b.beschikbaar_dag_uur");
            return $allAfspraak;
        }
        
        //GET ALL GEBOEKT------------------------------------
        public function getAllGeboekt()
        {
            $conn = Db::getInstance();
            $allGeboekt = $conn->query("SELECT * FROM beschikbaarheid 
            INNER JOIN gids ON beschikbaarheid.gids_id = gids.gids_id 
            INNER JOIN geboekt ON gids.gids_id = geboekt.gids_id 
            INNER JOIN bezoeker ON geboekt.bezoeker_facebookid = bezoeker.bezoeker_facebookid 
            WHERE geboekt_isgeboekt = 1
            ORDER BY beschikbaarheid.beschikbaar_dag_uur ASC;");
            return $allGeboekt;
        }
        
        //GET ALL GIDSEN------------------------------------
        public function getAllGids()
        {
            $conn = Db::getInstance();
            $allgids = $conn->query("SELECT * FROM gids GROUP BY  `gids_id`;");
            return $allgids;
        }
    }
?>