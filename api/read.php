<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../config/database.php';
    include_once '../class/engine.php';

    $database = new Database();
    $db = $database->getConnection();

    $items = new engine($db);

    $stmt = $items->getEngine();
    $itemCount = $stmt->rowCount();

    if($itemCount > 0){    

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                  $rows[] = $row;
      
        }
        
        echo json_encode($rows);
   
    }

    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
?>