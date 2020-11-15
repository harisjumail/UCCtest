<?php
   // header("Access-Control-Allow-Origin: *");
   // header("Content-Type: application/json; charset=UTF-8");
  //  header("Access-Control-Allow-Methods: POST");
  //  header("Access-Control-Max-Age: 3600");
  //  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../config/database.php';
    include_once '../class/engine.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new engine($db);

    $item->createEngine();  

    $item->id = $_POST['id'];
    $item->nama = $_POST['name'];
    $item->engined = $_POST['engined'];
    $item->enginep = $_POST['enginep'];
    $item->price = $_POST['price'];
    $item->location = $_POST['location'];
   
    $item->createEngine();  
    
?>