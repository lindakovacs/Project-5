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
        
        //GET ALL------------------------------------
        public function getAll()
        {
            $conn = Db::getInstance();
            $allBeschik = $conn->query("SELECT * FROM gids INNER JOIN beschikbaarheid ON gids.gids_id = beschikbaarheid.gids_id WHERE beschikbaarheid.gids_id = gids.gids_id;");
            return $allBeschik;
        }
    }
?>