<?php

require "config.php";

if (isset($_POST['submit'])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $phonenumber = $_POST['phonenumber'];
  $bod = $_POST['bod'];

  $sql = "INSERT INTO userdata(fname, lname, email, phonenumber, bod) VALUES('$fname', '$lname', '$email', '$phonenumber', '$bod')";
  $result = mysqli_query($connection, $sql);

  // var_dump($sql);

}




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form method="post" action="index.php">
    <label for="fname">First Name</label>
    <input type="text" name="fname" id="fname"> </br>
    <label for="lname">Last Name</label>
    <input type="text" name="lname" id="lname"></br>
    <label for="email">Email</label>
    <input type="text" name="email" id="email"></br>
    <label for="bod">Date of Birth</label>
    <input type="date" name="bod" id="bod"></br>
    <label for="phonenumber">Phone Number</label>
    <input type="text" name="phonenumber" id="phonenumber"></br>
    <button type="submit" name="submit">Submit</button>
  </form>
  <?php

  // if ($result) {
  //   echo "Data Recoreded successfully";
  //   echo " ";
  
  // }
  
  ?>

  <table border="1">

    <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Date of Birth</th>
        <th>Phone Number</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT * FROM userdata";
      $data = mysqli_query($connection, $sql);
      while ($row = mysqli_fetch_assoc($data)) {
        echo "<tr>";
        echo "<td>" . $row['fname'] . "</td>";
        echo "<td>" . $row['lname'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['bod'] . "</td>";
        echo "<td>" . $row['phonenumber'] . "</td>";
        echo '<td><a href="./edit.php?id=' . $row['id'] . '">Edit</a></td>';
        echo "</tr>";
      }
      ?>
      \
    </tbody>
  </table>




  </table>



</body>

</html>