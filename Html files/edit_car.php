<?php
require('../connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM admin_cars WHERE id='$id'");
    $row = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $car_name = $_POST['car_name'];
    $car_price = $_POST['car_price'];
    $car_speed = $_POST['car_speed'];
    $car_image = $_FILES['car_image']['name'];
    $target_dir = "../Images/";
    $target_file = $target_dir . basename($car_image);

    if ($car_image) {
        // Upload new file
        if (move_uploaded_file($_FILES['car_image']['tmp_name'], $target_file)) {
            $sql = "UPDATE admin_cars SET car_image='$target_file', car_name='$car_name', car_price='$car_price', car_speed='$car_speed' WHERE id='$id'";
        }
    } else {
        $sql = "UPDATE admin_cars SET car_name='$car_name', car_price='$car_price', car_speed='$car_speed' WHERE id='$id'";
    }

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Car updated successfully');</script>";
    } else {
        echo "<script>alert('Error updating car: " . $conn->error . "');</script>";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Car - Rento Car Admin</title>
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
        h1 {
            color: darkorange;
            margin-bottom: 20px;
            text-align: center;
        }
        form {
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: darkorange;
        }
        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: darkorange;
            color: #333;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }
        input[type="submit"]:hover {
            background-color: #ffa733;
        }
        .back-link {
            margin-top: 20px;
            display: block;
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
        <h1>Edit Car</h1>
        <form action="edit_car.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="car_name">Car Name:</label>
            <input type="text" id="car_name" name="car_name" value="<?php echo $row['car_name']; ?>" required>

            <label for="car_price">Car Price:</label>
            <input type="text" id="car_price" name="car_price" value="<?php echo $row['car_price']; ?>" required>

            <label for="car_speed">Car Speed:</label>
            <input type="text" id="car_speed" name="car_speed" value="<?php echo $row['car_speed']; ?>" required>

            <label for="car_image">Car Image:</label>
            <input type="file" id="car_image" name="car_image">

            <input type="submit" value="Update Car">
        </form>
        <a class="back-link" href="manage_cars.php"><i class="fas fa-arrow-left"></i> Back to Manage Cars</a>
    </div>
</body>
</html>
