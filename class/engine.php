<?php
    class engine{

        // Connection
        private $conn;

        // Table
        private $db_table = "t_main";

        // Columns

        public $id;
        public $name;
        public $engined;
        public $enginep;
        public $price;
        public $location;

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // GET ALL
        public function getEngine(){
            $sqlQuery = "SELECT v_id, v_nama, v_engined, v_enginep, v_price, v_location FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
            //echo $sqlQuery;
        }

        // CREATE
        public function createEngine(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        v_id = '".$this->id."',
                        v_nama = '".$this->nama."', 
                        v_engined = '".$this->engined."', 
                        v_enginep = '".$this->enginep."', 
                        v_price = '".$this->price."', 
                        v_location = '".$this->location."'";
        
            $stmt = $this->conn->prepare($sqlQuery);
        

            $this->nama=htmlspecialchars(strip_tags($this->nama));
            $this->engined=htmlspecialchars(strip_tags($this->engined));
            $this->enginep=htmlspecialchars(strip_tags($this->enginep));
            $this->price=htmlspecialchars(strip_tags($this->price));
            $this->location=htmlspecialchars(strip_tags($this->location));
        
            if($stmt->execute()){
               return true;

      
            }
            return false;
        }

        // UPDATE
        public function getSingleEngine(){
            $sqlQuery = "SELECT
                        v_id, 
                        v_nama, 
                        v_engined, 
                        v_enginep, 
                        v_price, 
                        v_location
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       v_id = ?
                    LIMIT 0,1";

         

            $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->id);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id = $dataRow['v_id'];
            $this->nama = $dataRow['v_nama'];
            $this->engined = $dataRow['v_engined'];
            $this->enginep = $dataRow['v_enginep'];
            $this->price = $dataRow['v_price'];
            $this->location = $dataRow['v_location'];
        }        

        // UPDATE
        public function updateEngine(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        v_nama = :nama, 
                        v_engined = :engined, 
                        v_enginep = :enginep, 
                        v_price = :price, 
                        v_location = :location
                    WHERE 
                        v_id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->nama=htmlspecialchars(strip_tags($this->nama));
            $this->enginep=htmlspecialchars(strip_tags($this->enginep));
            $this->engined=htmlspecialchars(strip_tags($this->engined));
            $this->price=htmlspecialchars(strip_tags($this->price));
            $this->location=htmlspecialchars(strip_tags($this->location));
           
        
            // bind data
            $stmt->bindParam(":nama", $this->nama);
            $stmt->bindParam(":engined", $this->engined);
            $stmt->bindParam(":enginep", $this->enginep);
            $stmt->bindParam(":price", $this->price);
            $stmt->bindParam(":location", $this->location);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // DELETE
        function deleteEngine(){

            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE v_id = ?";

            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            $stmt->bindParam(1, $this->id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }

    }
?>

