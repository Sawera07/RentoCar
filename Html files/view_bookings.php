<?php
require('../connection.php');
$sql = "SELECT id, name, email, phone, pickup_date, return_date FROM bookings";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel - View Bookings</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: url("https://media.istockphoto.com/id/135887442/photo/white-tissue-paper-background-with-geometric-design.webp?b=1&s=170667a&w=0&k=20&c=hbW4kQw0YDlK5wWG5_UvHYVaLuz0ZXZZdUhh5QHUmWo=");
      background-position: center;
    }
    .container {
      padding: 20px;
      min-height: 100vh;
      background: #ffffff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }
    h2 {
      color: #FF8C00;
      margin-bottom: 20px;
      text-align: center;
    }
    .table {
      background-color: #ffffff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .table th {
      background-color: black;
      color: #ffffff;
    }
    .table-striped tbody tr:nth-of-type(odd) {
      background-color: #FF8C00;
      color: #ffffff;
    }
    .table-striped tbody tr:nth-of-type(even) {
      background-color: #333;
      color: #ffffff;
    }
    .table td, .table th {
      border: none;
      padding: 12px 15px;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <h2 class="mb-4">View Bookings</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Booking ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Pickup Date</th>
          <th>Return Date</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["phone"] . "</td>
                    <td>" . $row["pickup_date"] . "</td>
                    <td>" . $row["return_date"] . "</td>
                  </tr>";
          }
        } else {
          echo "<tr><td colspan='6'>No bookings found</td></tr>";
        }
        $conn->close();
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
