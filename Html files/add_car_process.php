
<?php
$target_dir = "../Images/";
$target_file = $target_dir . basename($_FILES["car_image"]["name"]);
move_uploaded_file($_FILES["car_image"]["tmp_name"], $target_file);

$car_name = $_POST['car_name'];
$car_price = $_POST['car_price'];
$car_speed = $_POST['car_speed'];

require('../connection.php');

$sql = "INSERT INTO admin_cars (car_image, car_name, car_price, car_speed) VALUES ('$target_file', '$car_name', '$car_price', '$car_speed')";
$conn->query($sql);

header("Location: manage_cars.php");
?>
