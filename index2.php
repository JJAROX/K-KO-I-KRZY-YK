<?php

include("database.php");

$sql_count = "SELECT COUNT(*) AS count FROM users";
$result_count = $conn->query($sql_count);
$row_count = $result_count->fetch_assoc();
$count = $row_count["count"];

if ($count < 2 && isset($_POST)) {
  $data = json_decode(file_get_contents("php://input"));
  $sql = "INSERT INTO users (znak) VALUES ('$data->user')";
  if ($conn->query($sql) === TRUE) {
    echo json_encode(array("message" => "Pomyslnie dodano uzykownika"));
  } else {
    echo json_encode(array("error" => "Error: " . $sql . "<br>" . $conn->error));
  }
} else {
  echo json_encode(array("too_many_users" => "Gra juz dwoch uzytkownikow, poczekaj na swoja kolej"));
}

$conn->close();
