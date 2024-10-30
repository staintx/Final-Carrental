<?php
    include('connect_db.php');

    $sql = "SELECT * FROM cars";
    $result = $conn->query($sql);
    // $cars_result = $result->fetch_assoc();
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="css/style.css">
    
    <title>Rent N Go</title>
</head>

<body>
    <nav>
        <div class="nt-container">
            <div class="container">
                <div class="nav-top">
                    <div>
                        <i class="fa-solid fa-location-dot"></i>
                        <span>Nueva Ecija, Philippines</span>
                    </div>
                    <div>
                        <i class="fa-solid fa-clock"></i>
                        <span>24/7 Open</span>
                    </div>
                    <div>
                        <i class="fa-solid fa-phone"></i>
                        <span>1234567890</span>
                    </div>
                    <div class="social-icons">
                        <i class="fa-brands fa-facebook"></i>
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-linkedin-in"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="n1-container">
            <div class="container">
                <div class="logo">
                    <img src="pic/logo.png" alt="">
                </div>
                <ul class="navlist">
                    <li><a href="#home">home</a></li>
                    <li><a href="#about">about</a></li>
                    <li><a href="#car-list">car-list</a></li>
                    <li><a href="customer_login.html">login/register</a></li>
                    
                </ul>
                <div class="menu-btn">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
        </div>
    </nav>

    <header class="home" id="home">
        <div class="container home-container">
            <div class="info">
                <h1>Rent A Car is Within your finger tips</h1>
                <a href="customer_login.html"><button class="btn">Rent now</button></a>
            </div>
        </div>
    </header>

    <section class="works">
        <div class="title">
            <h3>How it works?</h3>
            <p>At Rent & Go, booking a car is simple and straightforward. Just follow these steps:</p>
        </div>
        <div class="container works-container">
        <div class="step">
                <span class="number">01</span>
                <span class="caption">Log In</span>
            </div>
            <div class="step">
                <span class="number">02</span>
                <span class="caption">Rent Car</span>
            </div>
            <div class="step">
                <span class="number">03</span>
                <span class="caption">Wait For Approval</span>
            </div>
            <div class="step">
                <span class="number">04</span>
                <span class="caption">Pick and Drop</span>
            </div>
            <div class="step">
                <span class="number">05</span>
                <span class="caption">Done</span>
            </div>


        </div>
    </section>

    
    <!--=================================ABOUT==================================================== -->
    <section class="about" id="about">
        <div class="title">
            <h4><i class="fa-solid fa-car"></i></h4>
        </div>
        <div class="about-container">
            <div class="image">
                <img id="about_image" src="pic/about pixels.jpg" alt="">
            </div>
            <div class="content">
                <div class="title">
                    <p>About us</p>
                    <h2>Welcome to Rent N Go</h2>
                    <p>Rent & Go offers a hassle-free car rental experience designed for your convenience. With a wide range of vehicles to choose from, you can find the perfect ride for any occasion, 
                        whether it’s a road trip, business travel, or a weekend getaway. Our easy online booking system 
                        ensures quick reservations, and our friendly customer service is always ready to assist you. Enjoy flexible rental options and competitive pricing as you hit the road with Rent & Go!
                    </p> <br>
                    
                </div>
            </div>
        </div>
    </section>

    
    
    <!-- ==================================CARS=================================== -->
    <section class="cars" id="cars">
        <div class="title">
            <h4><i class="fa-solid fa-car"></i></h4>
            <h2>Featured cars</h2>
            <p>Explore our top picks just for you!</p>
        </div>
        <div class="container cars-container-dets">
            <?php while ($car = $result->fetch_assoc()): ?>
            <div class="box">
                <img src="<?= $car['car_img']; ?>" alt="Car Image">
                <div class="info">
                    <div class="tag">
                        <span class="lnr lnr-pointer-right"></span>
                        <p><?=$car['price_per_day']?>/DAY</p>
                    </div>
                    <h5><?=$car['make']?></h5>
                    <p><?=$car['model']?></p>
                    <div>
                        <a href=""><?=$car['year']?></a>
                        <a href=""><?=$car['type']?></a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            


        </div>
    </section>
   
<!--=========================================FOOTER======================================-->

<footer>
    <div class="container footer-container">
        <div class="row-1">
            <div class="logo">
                <img src="pic\logo.png" alt="">
            </div>
            <p>Rent A Car is Within your finger tips</p>
        </div>
        <div class="row-2">
            <ul class="quick-links">
                <h4>Quick Links</h4>
                    <li><a href="#about">about</a></li>
                    <li><a href="#services">services</a></li>
                    <li><a href="#car-list">car-list</a></li>

            </ul>
        </div>
        
        <div class="row-4">
            <ul class="explore">
                <h4>Support</h4>
                    <li style="color: var(--color-primary);"><a href="">Contact us</a></li>
                    <li style="color: var(--color-primary);"><a href="#services">0123456789</a></li>
                    <p>dfg@gmail.com</p>
                    <ul class="footer-social">
                        <li class="fa-brands fa-facebook"></li>
                        <li class="fa-brands fa-instagram"></li>
                        <li class="fa-brands fa-twitter"></li>
                        <li class="fa-brands fa-linkedin-in"></li>
                    </ul>

            </ul>
        </div>
    </div>
</footer>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="js/script.js"></script>
</body>

</html>