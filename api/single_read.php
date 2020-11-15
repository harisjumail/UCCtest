<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../config/database.php';
    include_once '../class/engine.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new engine($db);

    $item->id = isset($_GET['id']) ? $_GET['id'] : die();
  
    $item->getSingleEngine();

    if($item->id != null){

        // create array
        $emp_arr = array(
            "v_id" =>  $item->id,
            "v_nama" => $item->name,
            "v_engined" => $item->engined,
            "v_enginep" => $item->enginep,
            "v_price" => $item->price,
            "v_location" => $item->location
        );
      
        http_response_code(200);
        echo json_encode($emp_arr);
    }
      
    else{
        http_response_code(404);
        echo json_encode("Record not found.");
    }
?>