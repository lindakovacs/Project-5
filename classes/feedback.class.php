<?php 
	class Db
	{
		private $m_sHost = "localhost";
		private $m_sUser = "root";
		private $m_sPassword = "";
		private $m_sDatabase = "phpproject";
		public $conn;


		public function __construct()
		{
			$this->conn = new mysqli($this->m_sHost, $this->m_sUser, $this->m_sPassword, $this->m_sDatabase);
		}
		
	}

	class Feedback
	{
		private $m_sFeedback_tekst;		
		private $m_iBezoeker_id;		
		private $m_iFeedback_rating;	
		private $m_iGids_id;

		public function __set($p_sProperty, $p_vValue)
		{
			switch ($p_sProperty) {
				case 'Feedback_tekst':
				$this->m_sFeedback_tekst = $p_vValue;   
                break;

				case 'Bezoeker_id':
					$this->m_iBezoeker_id = $p_vValue;
					break;

				case 'Feedback_rating':
					$this->m_iFeedback_rating = $p_vValue;
					break;

				case 'Gids_id':
					$this->m_iGids_id = $p_vValue;
					break;
							
			}
		}

		public function __get($p_sProperty)
		{
			switch($p_sProperty)
			{
				case 'Feedback_tekst':
					return $this->m_sFeedback_tekst;
					break;

				case 'Bezoeker_id':
					return $this->m_iBezoeker_id;
					break;

				case 'Feedback_rating':
					return $this->m_iFeedback_rating;
					break;

				case 'Gids_id':
					return $this->m_iGids_id;
					break;


			}
		}


		public function Save()
		{
            $db = new Db();
            $sql = "insert into feedback2 (feedback_tekst, bezoeker_id, feedback_rating, gids_id) values ('". $db->conn->real_escape_string($this->m_sFeedback_tekst) ."', '" . $db->conn->real_escape_string($this->m_iBezoeker_id) . "', '" . $db->conn->real_escape_string($this->m_iFeedback_rating) . "', '". $db->conn->real_escape_string($this->m_iGids_id) .  "')";
            $db->conn->query($sql);
		}

		/*public function getAll()
		{
		    $db = new Db();
        $sql = "select * from ooptblorders_v10";
        $result = $db->conn->query($sql);
        return $result;
		}*/
	
	}

?>