<?php  

    class Connection{

        private $database = "oci:dbname=XE";
        private $user;
        private $pass;


        function Connection( $user, $pass ){
            $this->user = $user;
            $this->pass = $pass;
        }

        public function connect(){
            try{
                $connecting = new PDO($this->database, $this->user, $this->pass);
                if($connecting){
                    
                    return $connecting;
                }
            }catch(Exception $e){
                throw $e;
            }   
        }


    }

    

?>