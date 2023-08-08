<?php

require "config.php";

if (isset($_GET["id"])) {

$id = $_GET["id"];

  $sql = "DELETE FROM userdata WHERE id=$id";
  $connection->query($sql);

}

header("location:/datacollection/index.php");
exit;


?>