<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rento Car Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: url("https://media.istockphoto.com/id/135887442/photo/white-tissue-paper-background-with-geometric-design.webp?b=1&s=170667a&w=0&k=20&c=hbW4kQw0YDlK5wWG5_UvHYVaLuz0ZXZZdUhh5QHUmWo=");
            background-position: center;
        
            color: #ffffff;
        }
        .admin-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            height: 100vh;
        }
        h1 {
            padding: 20px;
            color: darkorange;
            width: 100%;
            margin: 0;
            text-align: center;
            background-color: black;
        }
        nav {
            width: 100%;
            background-color: #333;
        }
        nav ul {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
            margin: 0;
        }
        nav ul li {
            margin: 0 15px;
        }
        nav ul li a {
            display: block;
            padding: 15px 20px;
            color: white;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
        }
        nav ul li a:hover {
            background-color: darkorange;
            color: #ffffff;
        }
        .main-content {
            display: flex;
            justify-content: space-around;
            align-items: center;
            width: 100%;
            flex-grow: 1;
        }
        .section {
            flex: 1;
            margin: 20px;
            padding: 20px;
            background-color: #1e1e1e;
            border-radius: 10px;
            text-align: center;
        }
        .section h2 {
            color: darkorange;
        }
        .section a {
            display: block;
            margin-top: 10px;
            padding: 10px;
            background-color: darkorange;
            color: #ffffff;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
        }
        .section a:hover {
            background-color: #ffa733;
        }
        .footer {
            width: 100%;
            background-color: #333;
            text-align: center;
            padding: 10px;
            color: darkorange;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <h1>Rento Car Admin Dashboard</h1>
        <nav>
            <ul>
                <li><a href="add_car.php"><i class="fas fa-plus-circle"></i> Add Car</a></li>
                <li><a href="manage_cars.php"><i class="fas fa-car"></i> Manage Cars</a></li>
                <li><a href="view_bookings.php"><i class="fas fa-book"></i> View Bookings</a></li>
            </ul>
        </nav>
        <div class="main-content">
            <div class="section">
                <h2>Add Car</h2>
                <p>Add new cars to the inventory</p>
                <a href="add_car.php">Go to Add Car</a>
            </div>
            <div class="section">
                <h2>Manage Cars</h2>
                <p>Update or remove cars from the inventory</p>
                <a href="manage_cars.php">Go to Manage Cars</a>
            </div>
            <div class="section">
                <h2>View Bookings</h2>
                <p>Check all the bookings made by customers</p>
                <a href="view_bookings.php">Go to View Bookings</a>
            </div>
        </div>
        <div class="footer">
            © 2024 Rento Car. All rights reserved.
        </div>
    </div>
</body>
</html>
