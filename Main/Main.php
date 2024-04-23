<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="index.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="icon" href="icon.ico" type="image/x-icon">

    <link rel="icon" href="/icon.ico" type="image/x-icon">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!--============================================================================================== SPLIDE ===================================================== -->
    
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
    

    <meta name="viewport" content="width=device-width, initial-scale=2.0">
    
    <title>Travel go ph</title>
<style>
  
  .container {
    position: relative;
    padding: 20px;
    max-height: 100vh;
    height: 100vh;
    max-width: 100%;
    width: 100%;
    background-position: center;
    background-size: cover;
    justify-content: center;
    align-self: center;
    overflow: hidden;
    background-color: rgb(35, 71, 122);
}





</style>
</head>

<body>
    <div id="ewan"></div>
   <form action="Main.php" method="post">
    <section class="banner">
    <header>
    
    <nav class="navigation" id="navbar">
          
            <ul class="myul">
           
                <li class="lis"><img src="/2024-03-29-removebg-preview.png" class="travel" alt="" srcset=""></li>

                <li class="lis">
                <div class="autocomplete">
                    <input type="search" id="search" name="search" placeholder="Search for places" required>
                    <button class="search" name="submit"><i class="fas fa-search"></i></button>
                    <ul id="my-box"></ul>
                </div>
                </li>


                
                <li class="li"><a href="#ewan" class="active" id="a">Home</a> </li>
          
                <li class="li"><a href="#container3"class="" id="a">Hotels</a></li>
            
                <li class="lis"><a href="#container"class="" id="a">Attractions</a></li>

                <li class="lis"><a href="#flights"class="" id="a">Flights</a></li>

                <li class="lis"> <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"><?php require_once 'con4.php';
                $email = $_SESSION['email']; 
               

                $sql = "SELECT user_name FROM registration WHERE email='$email'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $User = $row['user_name'];
                        echo $User;
                    }
                }
                
                
                
                
                ?></button>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog" style="color: black; transform: translate(-50%);"></i> Account Settings</a></li>
                        <li><a class="dropdown-item" href="travel.php"><i class="fas fa-book" style="color: black; transform: translate(-50%);"></i> My Bookings</a></li>
                        <li><a class="dropdown-item" href="travel2.php"><i class="fas fa-plane" style="color: black; transform: translate(-50%);"></i> My Flights</a></li>
                        <li class="list"><a href="login_page.php" class="dropdown-item" name="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Sign out"><i class="fas fa-sign-out-alt" style="color: black; transform: translate(-50%);"></i> Signout</a></li>
                    </ul>

            
                </li>

               

                
            
                </li><?php
                
                
                if (isset($_POST["button"])) {
                    header("Location: /login_page.php");
                }
                

               
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                    // Fetch data from API based on form input
                    $get = $_POST['search'];
                    // Redirect user to another page to display fetched data
                    echo '<script>window.location.href = "res2.php?data=' . urlencode($get) . '";</script>';
                    exit();
                }
                
                ?>



             
            </ul>


        
            <h1 class="travel-2">YOUR TRAVEL STARTS HERE</h1>
            <p class="discover">Welcome to TravelGo Philippines, your ultimate companion for unforgettable journeys across the stunning landscapes and vibrant cultures of the archipelago. <br> We are your one-stop destination for seamless travel experiences, offering a range of services designed to make exploring the Philippines as convenient and enjoyable as possible.</p>
                <a href="#container" class="button2" name="button" data-bs-toggle="tooltip" data-bs-placement="top">START BOOKING</a>

                 
               </li>
            </ul>
        </div>
    </form>
        

        
        

            </div>
            </form>
        

        
        </div>
           

    </nav>
    
   
</header>



    

</section>


<section class="sec2">





    
   
    <!-- ==========================================================================number 1 container ===============================================================================-->
    <div class="container" id="container">
    <h1 class="for">Popular Places</h1>
    
    <div class="splide" id="popular-places-slider">
        <div class="splide__track">
            <ul class="splide__list">
                <?php
                $conn = new mysqli("localhost:3307", "root", "admin", "sample");

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // SQL query to retrieve image data
                $sql = "SELECT place, price, image FROM for_creating_a_place"; // Adjust the query according to your database schema
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        // Display the image
                        $imageData = base64_encode($row['image']);
                        $price = number_format($row['price']);
                        $price2 = $row['price'];
                        $textData = $row['place'];

                        echo '<li class="splide__slide">';
                        echo '<div class="inner-box" id="hotels">';
                            echo '<div class="box">';
                            echo '<img src="/img/'.$row["image"].'" alt="" srcset="">';
                            echo '</div>';
                        echo '<h2 class="textdata">'.$textData.'</h2>';
                        echo '<div class="outer"><p class="price"> Starting PHP '.$price.'</p></div>';
                        echo '<hr class="solidblack"></hr>';
                        echo '<a href="placesbooking.php?choice=' . urlencode($textData) . '&price=' . urlencode($price2) . '" class="book">Book now</a>';
                        echo '<a href="results.php?choice=' . urlencode($textData) .'" class="see_details">See Details</a>';
                        echo '</div>';
                        echo '</li>';
                    }
                } else {
                    echo "0 results";
                }

                $conn->close();
                ?>
            </ul>
        </div>
    </div>
</div>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        new Splide('#popular-places-slider', {
            type: 'slide',
            perPage: 6,
            perMove: 1,
            pagination: false,
            autoplay: true,
            breakpoints: {
                640: {
                    perPage: 5,
                },
                480: {
                    perPage: 1,
                    height: '5rem',
                },
            },
        }).mount();
    });
</script>   

<!---------------------------------------------------------------------------------------------FLIGHTS CONTAINER------------------------------------------------------------------------------------>
<div class="flights" id="flights">
    <h1>All Flights</h1>
    <div class="outer-flights">
        <div id="splide8" class="splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php
                    // Establish connection to the database
                    $servername = "localhost:3307";
                    $username = "root"; 
                    $password = "admin";
                    $database = "sample"; 

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $database);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // SQL query to fetch all flights
                    $sql = "SELECT * FROM flights";

                    // Execute the query
                    $result = $conn->query($sql);

                    // Check if there are any rows returned
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <li class="splide__slide">
                                <div class="inner-flight">
                                    <div class="flight-card">
                                        <img src="<?php echo $row['image_url']; ?>" alt="Flight Image">
                                    </div>
                                    <h2 class="flight2">Flight Details</h2>
                                    <p>Destination: <?php echo $row['destination'];echo '<br> Origin: '.$row['origin'];
                                    echo '<br> Departure: ' 
                                    .$row['departure_time']; 
                                    echo'<br> Arrival time: '.$row['arrival_time'].'</br>'; 
                                    echo'Price: ' .$row['price'];?></p>

                                            <?php
                                            if (isset($_POST['booking'])) {
                                                // Get the values from $row or any other source
                                                $destination = urlencode($row['destination']);
                                                $price = urlencode($row['price']);
                                                $arrival = urlencode($row['arrival_time']);
                                                $departure = urlencode($row['departure_time']);
                                                $arrivaldate = urlencode($row['arrival_date']);
                                                $departure_date = urlencode($row['departure_date']);
                                                $flight_number = isset($row['flight_number']) ? urlencode($row['flight_number']) : ''; // Check if $row['flight_number'] is set before using it
                                                $origin = urlencode($row['origin']);
                                            
                                                // Construct the URL with encoded parameters
                                                $url = "flight_booking_.php?destination=$destination&price=$price&arrival=$arrival&departure=$departure&arrivaldate=$arrivaldate&departuredate=$departure_date&flightnum=$flight_number&origin=$origin";
                                            
                                                // Redirect the user using JavaScript
                                                echo "<script>window.location.href = '$url';</script>";
                                                exit(); // Ensure no further code execution after redirection
                                            }
                                            
                                            ?>
                                    <form method="post" action="Main.php">
                                        <button class="book-flight-btn" name="booking">Book Now</button>
                                    </form>
                                </div>
                            </li>
                    <?php
                        }
                    } else {
                        echo "No flights found";
                    }

                    
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/@splidejs/splide@3.0.9/dist/js/splide.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Splide('#splide8', {
            type: 'slide',
            perPage: 6, // Adjust the number of slides per page as needed
            perMove: 1,
            pagination: false,
            autoplay: true,
            breakpoints: {
                640: {
                    perPage: 2,
                },
                480: {
                    perPage: 1,
                },
            },
        }).mount();
    });
</script>

<!----------------------------------------------------------------------------------------------FLGIHTS CONTAINER------------------------------------------------------------------------------------------->




<!-----------------------------------------------------------------------------------------------CONTAINER 3--------------------------------------------------------------------------------------------->

<div id="sec3" class="sec3">
    <div id="container3" class="container3">
        <h1 class="featured_properties">
            Hotel Recommendations in Manila
        </h1>
        <ul class="ul2">
            <li class="lis"><a href="#sec3">Manila</a></li>
            <li class="lis"><a href="#container5">Cebu</a></li>
            <li class="lis"><a href="#container6">Batanes</a></li>
            <li class="lis"><a href="#">Bohol</a></li>
            <li class="lis"><a href="#">Davao</a></li>
            <li class="lis"><a href="#">Albay</a></li>
        </ul>

        <div class="splide" id="splide1">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php 
                    $conn = new mysqli("localhost:3307", "root", "admin", "sample");
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "SELECT hotel, price, image FROM for_creating_a_hotel WHERE place ='Manila'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $prices = $row['price'];
                            $textdata = $row['hotel'];
                            echo '<li class="splide__slide">';
                            echo '<div class="hotels" id="hotels">';
                            echo '<div class="in">';
                            echo '<img src="/images/'.$row["image"].'" alt="" srcset="">';
                            echo '</div>';
                            echo '<h1>'.$textdata.'</h1>';
                            echo '<h1 class="h2">Starts from PHP '.$prices.'</h1>';
                            echo '<a href="hotelbooking.php?choice='. urlencode($textdata) .' &price='.urlencode($prices).'" class="book_hotel">Book now</a>';
                            echo '</div>';
                            echo '</li>';
                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <div id="container5" class="container3">
        <h1 class="featured_properties">
            Hotel Recommendations in Cebu
        </h1>
        <ul class="ul2">
            <li class="lis"><a href="#container3">Manila</a></li>
            <li class="lis"><a href="#sec3">Cebu</a></li>
            <li class="lis"><a href="#container6">Batanes</a></li>
            <li class="lis"><a href="#">Bohol</a></li>
            <li class="lis"><a href="#">Davao</a></li>
            <li class="lis"><a href="#">Albay</a></li>
        </ul>

        <div class="splide" id="splide2">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php 
                    $conn = new mysqli("localhost:3307", "root", "admin", "sample");
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "SELECT hotel, price, image FROM for_creating_a_hotel WHERE place ='cebu'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $prices = number_format($row['price']);
                            $textdata = $row['hotel'];
                            echo '<li class="splide__slide">';
                            echo '<div class="hotels" id="hotels">';
                            echo '<div class="in">';
                            echo '<img src="/images/'.$row["image"].'" alt="" srcset="">';
                            echo '</div>';
                            echo '<h1>'.$textdata.'</h1>';
                            echo '<h1 class="h2">Starts from PHP '.$prices.'</h1>';
                            echo '<a href="/placesbooking.php?choice= '.urlencode($textdata).'" class="book_hotel">Book now</a>';
                            echo '</div>';
                            echo '</li>';
                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    ?>
                </ul>
            </div>
        </div>
    </div>



 <div id="container5" class="container3">
        <h1 class="featured_properties">
            Hotel Recommendations in Cebu
        </h1>
        <ul class="ul2">
            <li class="lis"><a href="#container3">Manila</a></li>
            <li class="lis"><a href="#sec3">Cebu</a></li>
            <li class="lis"><a href="#container6">Batanes</a></li>
            <li class="lis"><a href="#">Bohol</a></li>
            <li class="lis"><a href="#">Davao</a></li>
            <li class="lis"><a href="#">Albay</a></li>
        </ul>

        <div class="splide" id="splide2">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php 
                    $conn = new mysqli("localhost:3307", "root", "admin", "sample");
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "SELECT hotel, price, image FROM for_creating_a_hotel WHERE place ='cebu'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $prices = number_format($row['price']);
                            $textdata = $row['hotel'];
                            echo '<li class="splide__slide">';
                            echo '<div class="hotels" id="hotels">';
                            echo '<div class="in">';
                            echo '<img src="/images/'.$row["image"].'" alt="" srcset="">';
                            echo '</div>';
                            echo '<h1>'.$textdata.'</h1>';
                            echo '<h1 class="h2">Starts from PHP '.$prices.'</h1>';
                            echo '<a href="/placesbooking.php?choice= '.urlencode($textdata).'" class="book_hotel">Book now</a>';
                            echo '</div>';
                            echo '</li>';
                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    ?>
                </ul>
            </div>
        </div>
    </div>

    <div id="container6" class="container3">
        <h1 class="featured_properties">
            Hotel Recommendations in Batanes
        </h1>
        <ul class="ul2">
            <li class="lis"><a href="#container3">Manila</a></li>
            <li class="lis"><a href="#sec3">Cebu</a></li>
            <li class="lis"><a href="#container6">Batanes</a></li>
            <li class="lis"><a href="#">Bohol</a></li>
            <li class="lis"><a href="#">Davao</a></li>
            <li class="lis"><a href="#">Albay</a></li>
        </ul>

        <div class="splide" id="splide2">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php 
                    $conn = new mysqli("localhost:3307", "root", "admin", "sample");
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "SELECT hotel, price, image FROM for_creating_a_hotel WHERE place ='cebu'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $prices = number_format($row['price']);
                            $textdata = $row['hotel'];
                            echo '<li class="splide__slide">';
                            echo '<div class="hotels" id="hotels">';
                            echo '<div class="in">';
                            echo '<img src="/images/'.$row["image"].'" alt="" srcset="">';
                            echo '</div>';
                            echo '<h1>'.$textdata.'</h1>';
                            echo '<h1 class="h2">Starts from PHP '.$prices.'</h1>';
                            echo '<a href="/placesbooking.php?choice= '.urlencode($textdata).'" class="book_hotel">Book now</a>';
                            echo '</div>';
                            echo '</li>';
                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>

</div>


</div>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        new Splide('#splide1', {
            type: 'slide',
            perPage: 6,
            perMove: 1,
            pagination: false,
            autoplay: true,
            breakpoints: {
                640: {
                    perPage: 5,
                },
                480: {
                    perPage: 1,
                    height: '5rem',
                },
            },
        }).mount();

        new Splide('#splide2', {
            type: 'slide',
            perPage: 6,
            perMove: 1,
            pagination: false,
            autoplay: true,
            breakpoints: {
                640: {
                    perPage: 6,
                },
                480: {
                    perPage: 1,
                    height: '5rem',
                },
            },
        }).mount();


        new Splide('#splide3', {
            type: 'slide',
            perPage: 6,
            perMove: 1,
            pagination: false,
            autoplay: true,
            breakpoints: {
                640: {
                    perPage: 5,
                },
                480: {
                    perPage: 1,
                    height: '5rem',
                },
            },
        }).mount();

        new Splide('#splide4', {
            type: 'slide',
            perPage: 5,
            perMove: 1,
            pagination: false,
            autoplay: true,
            breakpoints: {
                640: {
                    perPage: 5,
                },
                480: {
                    perPage: 1,
                    height: '5rem',
                },
            },
        }).mount();
    });


    
</script>



       
        
    
    
    
    
       <footer>
        <hr>
        <div class="contacts">

       <h3 class="h1">Contacts</h3>
      




       <h3 class="h2">About</h3>

       

       
       <h3 class="h4">Payment Methods</h3>
       <li class="cl"><a href="#">Customer Support</a></li>
       <li class="cl"><a href="#">Service Guarantee</a></li>
       <li class="cl"><a href="#">More Service Info</a></li>
       <li class="cl"><a href="#">Website Feedback</a></li>
       <li class="cl"><a href="#">Developers</a></li>

       

       <li class="cll"><a href="">About Travel Go Philippines</a></li>
       <li class="cll"><a href="">Travel go promos</a></li>
       <li class="cll"><a href="">Travel Go Group</a></li>
       <li class="cll"><a href="">Travel Go Quality</a></li>
       <li class="cll"><a href="">Terms and Conditions</a></li>
       <li class="cll"><a href="">Privacy Statement</a></li>

       <img src="https://ak-d.tripcdn.com/images/05E2712000cjsr5ul9716.png" alt="" srcset="">
       <img src="https://ak-d.tripcdn.com/images/05E0f12000cjsr2f9AAAB.png" alt="" srcset="">
       <img src="https://ak-d.tripcdn.com/images/05E4f12000cjsqzn4B29D.png" alt="">
       <img src="https://ak-d.tripcdn.com/images/05E3e12000cjsr47e852C.png" alt="">
       
       

       <h3>follow </h3>
       </div>
       <hr>
       <p>Copyright © 2024 Travel Go Philippines. All rights reserved.</p>
   </footer> 
        
       
    
</section>

 

<script src="script.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('#a');
    
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href').substring(1); // Get target ID
            const targetElement = document.getElementById(targetId); // Get target element
            
            if (targetElement) {
                targetElement.scrollIntoView({ behavior: 'smooth' }); // Smooth scroll to target
            }
        });
    });
});


window.onscroll = function() {stickyNavbar()};

var myul = document.querySelector(".myul");

var sticky = myul.offsetTop;

function stickyNavbar() {
    if (window.pageYOffset >= sticky) {
        myul.classList.add("sticky");
    } else {
        myul.classList.remove("sticky");
    }
}


const page2 = document.querySelectorAll(".myul li a");

page2.forEach(function pagination(items) {
    items.addEventListener('click', function clicker() {
        var current = document.getElementsByClassName('active');
        current[0].className = current[0].className.replace('active','');
        this.className += 'active';
        
    }

    )
    
})


$(document).ready(function(){
            // Perform Ajax request when the document is ready
            $.ajax({
                url: '/login_page.php', // URL of the login page
                method: 'GET', // HTTP method
                success: function(response){
                    // On success, parse the response to extract the email
                    var email = $(response).find('#email2').val(); // Assuming the email field has id 'email'
                    console.log('Email:', email);
                    // You can then use the email variable as needed
                },
                error: function(xhr, status, error){
                    // Handle errors here
                    console.error(xhr, status, error);
                }
            });
        });



// JavaScript to trigger fade-in effect on scroll for all elements with class fade-in
document.addEventListener('DOMContentLoaded', function() {
    const elements = document.querySelectorAll('.inner-box');
    const windowHeight = window.innerHeight;

    function checkPosition() {
        for (let i = 0; i < elements.length; i++) {
            const element = elements[i];
            const positionFromTop = elements[i].getBoundingClientRect().top;

            if (positionFromTop - windowHeight <= 0) {
                element.classList.add('active');
            }
        }
    }

    // Initial check when page loads
    checkPosition();

    // Add scroll event listener
    window.addEventListener('scroll', checkPosition);
});



    

</script>

    
<script>
  AOS.init();
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>





