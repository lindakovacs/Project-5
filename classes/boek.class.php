<?php
    spl_autoload_register( function($class)
    {
        include_once("classes/" . $class . ".class.php");
    });

    class Book
    {
        private $m_sBeschikbaaruur;
        private $m_sBeschikbaardag;
        private $m_sGidsid;
        private $m_sIsgeboekt;
        //private $m_sBezoekerid;
        
    


        //SET----------------------------------------
        public function __set($p_sProperty,$p_vValue)
        {
                switch($p_sProperty)
                {
                    case 'Beschikbaardag':
                    if($p_vValue=="")
                    {
                        throw new Exception("contactdag invullen");
                    }
                    else
                    {
                        $this->m_sBeschikbaardag = $p_vValue;    
                    }
                    break;

                    case 'Beschikbaaruur':
                    if($p_vValue=="")
                    {
                        throw new Exception("contactuur invullen");
                    }
                    else
                    {
                        $this->m_sBeschikbaaruur = $p_vValue;   
                    }
                    break;
                    
                    
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
                    case 'Beschikbaardag':
                    return $this->m_sBeschikbaardag;
                    break;

                    case 'Beschikbaaruur':
                    return $this->m_sBeschikbaaruur;
                    break;
                    
                    
                         case 'Gidsid':
                    return $this->m_sGidsid;
                    break;

                    
                              case 'Isgeboekt':
                    return $this->m_sIsgeboekt;
                    break;
                    
               
                

                }
        }
        
        public function afsprakenB($fbid)
        {
        $conn = Db::getInstance();
        $afsprakenB = $conn->query("SELECT * FROM geboekt
        INNER JOIN beschikbaarheid ON geboekt.gids_id = beschikbaarheid.gids_id
        INNER JOIN gids ON geboekt.gids_id = gids.gids_id 
        INNER JOIN bezoeker ON geboekt.bezoeker_facebookid = bezoeker.bezoeker_facebookid
        WHERE geboekt_isgeboekt = 1");
        return $afsprakenB;
        }

         //SAVE---------------------------------------
   
         public function save($facebookid){
         $conn = Db::getInstance();
         $statement = $conn->prepare("INSERT INTO geboekt  (
                                                        
                                                     
                                                        bezoeker_facebookid,
                                                        gids_id,
                                                        geboekt_isgeboekt
                                                        
                                                        
                                                        )

                                                 VALUES(
                                                        
                                                      
                                                        :bezoeker_facebookid,
                                                        :gidsid,
                                                        :isgeboekt
                                                        
                                
                                                        )"
                                       ); 

             $statement->bindValue(':bezoeker_facebookid', $facebookid);
             $statement->bindValue(':gidsid',$this->Gidsid);
             $statement->bindValue(':isgeboekt',$this->Isgeboekt);
             $statement->execute();
             
         }
             
             

        }

?>