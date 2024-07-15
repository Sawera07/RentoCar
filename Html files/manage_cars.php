<?php
require('../connection.php');
$result = $conn->query("SELECT * FROM admin_cars");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Cars - Rento Car Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: url("https://media.istockphoto.com/id/135887442/photo/white-tissue-paper-background-with-geometric-design.webp?b=1&s=170667a&w=0&k=20&c=hbW4kQw0YDlK5wWG5_UvHYVaLuz0ZXZZdUhh5QHUmWo=");
            background-position: center;
            background-size: cover;
            color: #ffffff;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            min-height: 100vh;
            justify-content: center;
        }
        h2 {
            color: darkorange;
            margin-bottom: 20px;
            text-align: center;
        }
        table {
            width: 100%;
            max-width: 800px;
            border-collapse: collapse;
            background-color: #333;
            color: white;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #555;
        }
        th {
            background-color: darkorange;
            color: black;
        }
        img {
            max-width: 100px;
            border-radius: 5px;
        }
        a {
            color: darkorange;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            color: #ffa733;
        }
        .add-car-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: darkorange;
            color: #333;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
        }
        .add-car-link:hover {
            background-color: #ffa733;
        }
        .back-link {
            display: block;
            margin-top: 20px;
            color: darkorange;
            text-decoration: none;
            font-size: 16px;
        }
        .back-link:hover {
            color: #ffa733;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Manage Cars</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Car Image</th>
                <th>Car Name</th>
                <th>Car Price</th>
                <th>Car Speed</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><img src="<?php echo $row['car_image']; ?>" alt="Car Image"></td>
                <td><?php echo $row['car_name']; ?></td>
                <td><?php echo $row['car_price']; ?></td>
                <td><?php echo $row['car_speed']; ?></td>
                <td>
                    <a href="edit_car.php?id=<?php echo $row['id']; ?>"><i class="fas fa-edit"></i> Edit</a>
                    <a href="delete_car.php?id=<?php echo $row['id']; ?>"><i class="fas fa-trash"></i> Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
        <a class="add-car-link" href="add_car.php"><i class="fas fa-plus-circle"></i> Add New Car</a>
        <a class="back-link" href="../HTML files/AdminPanel.php"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
    </div>
</body>
</html>
