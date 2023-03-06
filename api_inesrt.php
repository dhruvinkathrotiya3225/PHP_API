<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');

include('config.php');

$config = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // fetch input values
    $Movie_Name= $_POST['Movie_Name'];
    $Seat_No= $_POST['Seat_No'];
    $Movie_language= $_POST['Movie_language'];
    $price = $_POST['price'];

    // call insert logic
    $insert_res = $config->insert($Movie_Name, $Seat_No , $Movie_language , $price);

    if ($insert_res) {
        $res['msg'] = "Recored Insert Succesfully ...";
    } else {
        $res['msg'] = "Recored Inserted Failed ...";
    }
} else {
    $res['msg'] = "Only POST request is allowed . . .";
}

echo json_encode($res);
?>