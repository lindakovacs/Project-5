<?php
    spl_autoload_register( function($class)
    {
        include_once("classes/" . $class . ".class.php");
    });

    class message
    {
        private $m_sMessage;

        //SET----------------------------------------
        public function __set($p_sProperty,$p_vValue)
        {
                switch($p_sProperty)
                {
                    case 'Message':
                        $this->m_sMessage = $p_vValue;    
                    break;

                }
        }

        //GET----------------------------------------
        public function __get($p_sProperty)
        {
                switch($p_sProperty)
                {
                    case 'Message':
                    return $this->m_sMessage;
                    break;


                }
        }

         //SAVE---------------------------------------
         public function save(){
         $conn = Db::getInstance();
         $statement = $conn->prepare("INSERT INTO message  (
                                                        message_tekst       
                                                        )

                                                 VALUES(
                                                        :message
                                                        )"
                                       ); 

             $statement->bindValue(':message',$this->Message);
             $statement->execute();

        }
        
        public function GetAllMessages()
		{
			return Db::getInstance()->query("select * from message;");
		}
    }
?>

