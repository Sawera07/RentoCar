<?php
// Database connection (adjust as needed)
require('../connection.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pickupDate = $_POST['pickupDate'];
    $returnDate = $_POST['returnDate'];
    $sql = "INSERT INTO bookings (name, email, phone, pickup_date, return_date) 
            VALUES ('$name', '$email', '$phone', '$pickupDate', '$returnDate')";
    if ($conn->query($sql) === TRUE) {
        $orderID = $conn->insert_id;
        $conn->close();
        echo "<script>
                alert('Booking confirmed! Your Order ID is: $orderID');
                setTimeout(function() {
                    window.location.href = 'Thanks.php?orderID=$orderID';
                }); // 5000 milliseconds = 5 seconds
              </script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thank You for Booking with Rento Car</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../CSS files/book.css">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <!-- Custom CSS -->

</head>
<body>
  <section class="naavigation fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light  ">
        <a class="navbar-brand mx-5 text-light" href="#">Rento</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        <div class="collapse navbar-collapse"  id="navbarToggleExternalContent">
          <ul class="navbar-nav justify-content-center flex-grow-1 ">
            <li class="nav-item mx-2">
              <a class="nav-link" href="../Html files/landing.php">Home</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="../Html files/About.php">About us</a>
            </li>
          <li class="nav-item mx-2">
              <a class="nav-link" href="../Html files/Contact.php">Contact us</a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link" href="../Html files/Cars.php">Cars</a>
              </li>
             
              <li class="nav-item mx-2">
                <a class="nav-link" href="../Html files/Privacypolicy.php">Privacy Policy</a>
              </li>
              
          </ul>
          <button class="btn-login btn  p-1 mx-5"> <a href="../Html files/login.php">Admin Panel</a></button>

        </div>
      </nav>
    </section>

<!-- Carousel Section -->
<div class="carousel-inner">
    <div class="hero carousel-item active">
      <img alt="..." class="d-block w-100" height="630px" src="https://html.design/demo/rento/images/banner.jpg">
        <div class="carousel-caption d-none d-md-block" style="opacity: 1;">
            <h5 >Book Your Ride</h5>
            <p >Welcome to our booking platform! Start your journey with us.</p>
        </div>
    </div>
</div>


<!-- Booking Form Section -->
<div class="bg">
    <div class="container">
      <div class="row">
        <!-- Car images column -->
        <div class="col-md-4 text-center mt-5">
          <img src="../Images/car11.jpg" class="b_card" alt="">
          <img src="../Images/car1.jpg" class="b_card" alt="">
          <img src="../Images/car3.jpg" class="b_card" alt="">
        </div>
        <div class="col-md-1"></div>
        <!-- Booking form column -->
        <div class="col-md-7">
          <div class="card booking-form mt-5">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
              <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
              </div>
              <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
              </div>
              <div class="mb-3">
                <label for="pickupDate" class="form-label">Pickup Date</label>
                <input type="date" class="form-control" id="pickupDate" name="pickupDate" required>
              </div>
              <div class="mb-3">
                <label for="returnDate" class="form-label">Return Date</label>
                <input type="date" class="form-control" id="returnDate" name="returnDate" required>
              </div>
              <button type="submit" class="btn btn-primary">Confirm Booking</button>
            </form>
        </div>
      </div>
    </div>
  </div>

<div class="banner p-5 mt-5">
    <footer class="text-center text-lg-start bg-body-tertiary  ">

  <div class="row ">
<div class="text col-lg-8 col-md-8 col-sm-12">
<h1 class="">Save big with our cheap <br> car rental!</h1>
<p class=" mb-0 fs-4 mt-3">Top Airports. Local Suppliers. 24/7 Support.</p>
</div>
<div class=" text col-lg-4 col-md-4 col-sm-12 text-end">

    <h6 class=""><i class="fa fa-phone me-1"></i> Call to book</h6>
    <button class="Book_ride mb-0 mt-3 p-3"><a class="button_2" href="">Book Car <i class="fa fa-check-circle ms-1"></i> </a></button>
    <h3 class=" mt-3 mb-0" style="color: darkorange;">+(000) 345 67 89</h3>
 
</div>
  </div>
      
      </footer>
</div>
<!-- Footer Section -->
<div class="foot p-5 " >
    <footer class="text-center text-lg-start bg-body-tertiary text-light ">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
          <!-- Left -->
          <div class="me-5 d-none d-lg-block fs-5">
            <span>Get connected with us on social networks:</span>
          </div>
          <!-- Left -->
      
          <!-- Right -->
          <div class="fs-5">
            <a href="" class="me-4 text-reset ">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="" class="me-4 text-reset">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="" class="me-4 text-reset">
              <i class="fab fa-google"></i>
            </a>
            <a href="" class="me-4 text-reset">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="" class="me-4 text-reset">
              <i class="fab fa-linkedin"></i>
            </a>
            <a href="" class="me-4 text-reset">
              <i class="fab fa-github"></i>
            </a>
          </div>
          <!-- Right -->
        </section>
        <!-- Section: Social media -->
      
        <!-- Section: Links  -->
        <section class="">
          <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
              <!-- Grid column -->
              <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                <!-- Content -->
                <h6 class="text-uppercase fs-2 fw-bold mb-4">
                   Rento Car
                </h6>
                <p>
                  Here you can use rows and columns to organize your footer content. Lorem ipsum
                  dolor sit amet, consectetur adipisicing elit.
                </p>
              </div>
              <!-- Grid column -->
      
              <!-- Grid column -->
              <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4 fs-3">
                 Links
                </h6>
                <p class="fs-5">
                  <a href="#!" class="text-reset">About us</a>
                </p>
                <p class="fs-5">
                  <a href="#!" class="text-reset">Services</a>
                </p>
                <p class="fs-5">
                  <a href="#!" class="text-reset">Latest News</a>
                </p>
                <p class="fs-5">
                  <a href="#!" class="text-reset">Contact</a>
                </p>
              </div>
              <!-- Grid column -->
      
              <!-- Grid column -->
              <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4 fs-3">
                 Other links
                </h6>
                <p class="fs-5">
                  <a href="#!" class="text-reset">FAQ's</a>
                </p>
                <p class="fs-5">
                  <a href="#!" class="text-reset">Contact us</a>
                </p>
                <p class="fs-5">
                  <a href="#!" class="text-reset">Term's and Conditions</a>
                </p>
                <p class="fs-5">
                  <a href="#!" class="text-reset">Help</a>
                </p>
              </div>
              <!-- Grid column -->
      
              <!-- Grid column -->
              <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                <!-- Links -->
                <h6 class="text-uppercase fw-bold mb-4 fs-3">Contact</h6>
                <p class="fs-5"><i class="fas fa-home  fs-4 me-3"></i> New York, NY 10012, US</p>
                <p class="fs-5">
                  <i class="fas fa-envelope me-3"></i>
                  info@example.com
                </p>
                <p class="fs-5"><i class="fas fa-phone fs-4  me-3"></i> + 01 234 567 88</p>
                <pclass="fs-5"><i class="fas fa-print fs-4  me-3"></i> + 01 234 567 89</p>
              </div>
              <!-- Grid column -->
            </div>
            <!-- Grid row -->
          </div>
        </section>
        <!-- Section: Links  -->
      
        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
          © 2021 Copyright:
          <a class="text-reset fw-bold" href="https://mdbootstrap.com/">RentoCar</a>
        </div>
        <!-- Copyright -->
      </footer>
    </div>
    <script>
    function showConfirmation() {
      alert("Booking confirmed! Your Order ID is: " + generateOrderID());
      return true; // Return true to allow form submission
    }

    function generateOrderID() {
      // Generate a random order ID (you can modify this as needed)
      return Math.floor(Math.random() * 100000);
    }
  </script>
</body>
</html>
