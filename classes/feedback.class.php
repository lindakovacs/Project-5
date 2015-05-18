<?php
    spl_autoload_register( function($class)
    {
        include_once("classes/".$class.".class.php");
    });

	class Feedback
	{
		private $m_sFeedback_tekst;			
		private $m_iFeedback_rating;	
		private $m_iGids_id;
        private $m_iBezoeker_facebookid;

        //SET
		public function __set($p_sProperty, $p_vValue)
		{
			switch ($p_sProperty)
            {
                //FEEDBACK TEKST
				case 'Feedback_tekst':
                if($p_vValue!="")
                {
                    $this->m_sFeedback_tekst = $p_vValue;     
                }
                else
                {
                    throw new Exception("<b>Er is geen feedback geplaatst!</b> Alle verplichte velden moeten ingevuld zijn.");
                }
                break;

                //FEEDBACK RATING
				case 'Feedback_rating':
                if($p_vValue!="")
                {
                    $this->m_iFeedback_rating = $p_vValue;
                }
                else
                {
                    throw new Exception("<b>Er is geen rating aangeduid!</b> Alle verplichte velden moeten ingevuld zijn.");
                }
                break;

                //GIDS ID
				case 'Gids_id':
                if($p_vValue!="")
                {
                    $this->m_iGids_id = $p_vValue;
                }
                else
                {
                    throw new Exception("<b>Er is geen gids aangeduid!</b> Alle verplichte velden moeten ingevuld zijn.");
                }
                break;

                 //BEZOEKER FACEBOOK ID
                case 'Bezoeker_facebookid':
                if($p_vValue!="")
                {
                    $this->m_iBezoeker_facebookid = $p_vValue;
                }
                else
                {
                   
                }
                break;
			}
		}

        //GET
		public function __get($p_sProperty)
		{
			switch($p_sProperty)
			{
				case 'Feedback_tekst':
                return $this->m_sFeedback_tekst;
                break;

				case 'Feedback_rating':
                return $this->m_iFeedback_rating;
                break;

				case 'Gids_id':
                return $this->m_iGids_id;
                break;

                case 'Bezoeker_facebookid':
                return $this->m_iBezoeker_facebookid;
                break;
			}
		}
        
        //SAVE
		public function save($fbid)
		{
            $conn = Db::getInstance();
            $statement = $conn->prepare("INSERT INTO feedback(feedback_tekst,
                                                              bezoeker_facebookid,
                                                              feedback_rating,
                                                              gids_id
                                                             )

                                                       VALUES(:feedback,
                                                              :bezoeker_facebookid,
                                                              :rating,
                                                              :gids_id
                                                             )                       
                                    ");
            $statement->bindValue(':feedback',$this->Feedback_tekst);
            $statement->bindValue(':bezoeker_facebookid',$fbid);
            $statement->bindValue(':rating',$this->Feedback_rating);
            $statement->bindValue(':gids_id',$this->Gids_id);
            $statement->execute();
		}

        //GET ALL INFO-----------------------------------
        public function getAllInfo()
        {
            
            $conn = Db::getInstance();
            $id = $_GET['id'];
            $allInfo = $conn->query("SELECT * FROM feedback WHERE gids_id = $id");
            return $allInfo;
        }
    }
?>