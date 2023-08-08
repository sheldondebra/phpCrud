<?php
require "config.php";

$id = "";
$fname = "";
$lname = "";
$email = "";
$phonenumber = "";
$bod = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (!isset($_GET["id"])) {
    header("location:/datacollection/index.php");
    exit();
  }

  $id = $_GET["id"];

  $sql = "SELECT * FROM userdata WHERE id = '$id'";
  $result = $connection->query($sql);
  $row = $result->fetch_assoc();

  if (!$row) {
    header("location:/datacollection/index.php");
    exit();
  }

  $fname = $row["fname"];
  $lname = $row["lname"];
  $email = $row["email"];
  $phonenumber = $row["phonenumber"];
  $bod = $row["bod"];
  $id = $row["id"];
} else {
  $id = $_POST['id'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $phonenumber = $_POST['phonenumber'];
  $bod = $_POST['bod'];

  if (empty($fname) || empty($lname) || empty($email) || empty($phonenumber) || empty($bod)) {
    $errorMessage = "All fields are required";
  } else {
    $sql = "UPDATE userdata " .
      "SET fname = '$fname', lname = '$lname', email = '$email', phonenumber = '$phonenumber', bod = '$bod' " .
      "WHERE id = $id";

    // $result = $connection->query($sql);
    $result = mysqli_query($connection, $sql);

    if (!$result) {
      $errorMessage = "Invalid query: " . $connection->error;
    } else {
      $successMessage = "Data updated successfully";
      header("location:/datacollection/index.php");
      exit();
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js
"></script>
  <title>New Regirstration</title>
</head>

<body>

  <div class="container my-5">
    <h2>New Memeber</h2>
     <a class="btn btn-primary" href="index.php" role="button">View Data</a>
    <table class="table">

    <?php
    if (!empty($errorMessage)) {
      echo "<div class='alert alert-warning alert-dismissible fade show'>" . $errorMessage . "</div>";
    }

    ?>


    <form action="" method="post">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <div class="row mb-3">
        <label for="" class="col-sm-3 col-form-label">First Name</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>">
        </div>

        <div class="row mb-3 >
<label for="" class=" col-sm-3 col-form-label ">last Name</label>
<div class=" col-sm-6">
          <input type="text" class="form-control" name="lname" value="<?php echo $lname; ?>">
        </div>
        <div class="row mb-3 >
<label for="" class=" col-sm-3 col-form-label ">Email</label>
<div class=" col-sm-6">
          <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="row mb-3 >
<label for="" class=" col-sm-3 col-form-label ">Phone Number</label>
<div class=" col-sm-6">
          <input type="text" class="form-control" name="phonenumber" value="<?php echo $phonenumber; ?>">
        </div>
        <div class="row mb-3 >
<label for="" class=" col-sm-3 col-form-label ">Date of Birth</label>
<div class=" col-sm-6">
          <input type="date" class="form-control" name="bod" value="<?php echo $bod; ?>">
        </div>

      </div>

       <?php
      if (!empty($successMessage)) {
        echo "<div class='alert alert-success alert-dismissible fade show'>$successMessage</div>";
      }
      ?>

      <div class="row mb-3">
        <div class="offset-sm-2 col-sm-2 d-grid">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="offset-sm-2 col-sm-2 d-grid">
          <a class="btn btn-outline-primary" href="/account.php">Cancel</a>
        </div>
      </div>
    </form>
  </div>

</body>

</html>