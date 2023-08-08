<?php

require 'config.php';

$sql = "SELECT COUNT(*) AS total_users FROM userdata";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $totalUsers = $row["total_users"];
  echo "Total users: " . $totalUsers;
} else {
  echo "No users found.";
}

$connection->close();


?>