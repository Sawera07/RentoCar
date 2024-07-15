<?php
$id = $_POST['id'];
$car_name = $_POST['car_name'];
$car_price = $_POST['car_price'];
$car_speed = $_POST['car_speed'];

$update_image = '';
if (!empty($_FILES["car_image"]["name"])) {
    $target_dir = "../Images/";
    $target_file = $target_dir . basename($_FILES["car_image"]["name"]);
    move_uploaded_file($_FILES["car_image"]["tmp_name"], $target_file);
    $update_image = ", car_image='$target_file'";
}

$conn = new mysqli('localhost', 'root', '', 'carapp');

$sql = "UPDATE admin_cars SET car_name='$car_name', car_price='$car_price', car_speed='$car_speed' $update_image WHERE id='$id'";
$conn->query($sql);

header("Location: manage_cars.php");
?>
