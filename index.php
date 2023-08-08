<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
  <title>List of Clients</title>
</head>

<body>

  <div class="container my-5">
    <h2>List of Clients</h2>
    <div class="my-3">



    <?php
    include "process.php";

    $totalUsers;

    ?>

  </div>

  <a class="btn btn-primary" href="create.php" role="button">Add New Data</a>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Date of Birth</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      require "config.php";


      $sql = "SELECT * FROM userdata";
      $result = mysqli_query($connection, $sql);
      if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>
              <td>{$row['id']}</td>
              <td>{$row['fname']}</td>
              <td>{$row['lname']}</td>
              <td>{$row['email']}</td>
              <td>{$row['phonenumber']}</td>
              <td>{$row['bod']}</td>
              <td>
                <a class='btn btn-primary' href='edit.php?id={$row['id']}'>Edit</a>
                <a class='btn btn-primary' href='delete.php?id={$row['id']}'>Delete</a>
              </td>
            </tr>";
        }
      } else {
        echo "<tr><td colspan='7'>No data available</td></tr>";
      }
      ?>
    </tbody>
  </table>
  </div>



</body>

</html>