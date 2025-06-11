<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

if ($data) {
    $log = date("Y-m-d H:i:s") . " | Lat: {$data['latitude']}, Lon: {$data['longitude']}, Accuracy: {$data['accuracy']}m\n";
    file_put_contents("location-log.txt", $log, FILE_APPEND);
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => "No data received"]);
}
?>
