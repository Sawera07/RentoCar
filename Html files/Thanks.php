<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS files/thanks.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
   
    </style>
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
        <div class="cont m-5 p-5 text-center">
        <?php

        if (isset($_GET['orderID'])) {
            $orderID = $_GET['orderID'];
            echo "<h1>Thank You for Booking with Rento Car</h1>";
            echo "<p>Your car rental <b> (Order ID: $orderID) </b> has been successfully booked!</p>";
            echo "<p>An email confirmation has been sent to your inbox.</p>";
            echo "<p>If you have any questions or need further assistance, feel free to contact us.</p>";
        } else {
            // Handle case where order ID is not provided
            echo "<h1>Thank You for Booking with Rento Car</h1>";
            echo "<p>Your car rental has been successfully booked!</p>";
            echo "<p>An email confirmation has been sent to your inbox.</p>";
            echo "<p>If you have any questions or need further assistance, feel free to contact us.</p>";
        }
        ?>
        <a href="../Html files/contact.php" class="btn">Contact Us</a>
    </div>
    <div class="foot p-2 mt-5" >
        <footer class="text-center text-lg-start text-light ">
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
</body>
</html>
