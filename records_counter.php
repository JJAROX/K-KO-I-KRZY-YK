<?php

include("database.php");

$sql = "SELECT COUNT(*) AS count, GROUP_CONCAT(znak SEPARATOR ', ') AS signs FROM users";
$result = $conn->query($sql);

if (isset($_POST)) {
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode(array("count" => $row["count"], "signs" => $row["signs"]));
  } else {
    echo json_encode(array("count" => 0, "signs" => ""));
  }
}

$conn->close();
