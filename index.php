<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
      <!-- Link Swiper's CSS -->
      <link rel="stylesheet" href="swiper-bundle.min.css">

      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

        <!--  CSS -->
    <link rel="stylesheet" href="style.css">

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="icon" href="icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="/icon.ico" type="image/x-icon">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    

    <meta name="viewport" content="width=device-width, initial-scale=2.0">
    
    <title>Travel go ph</title>

    <style>
        .travel{
    color: #fff;
    transform: translateX(-150%);
    font-size: 30px;
    
}


    </style>
</head>

<body>
    
   <form action="index.php" method="post">
    <section class="banner" id="banner">
        <div class="background"></div>
        <video autoplay loop class="video" muted plays-inline>
            <source src="128052-740186610_small.mp4" type="video/mp4">
        </video>
        
        
    <header>
   
    <nav class="navigation" id="navbar">
           
        <ul class="myul">
                <img src="2024-03-29-removebg-preview.png" class="travel" alt="" srcset="">
                
                <li class="li"><a href="#banner" class="active" id="a">Home</a> </li>
              
                <li class="li"><a href="#container2"  class="" id="a">About</a></li>
            
                <li class="lis"><a href="#container"class="" id="a">Contact Us</a></li>

                <li class="lis"><a href="#container4"class="" id="a">Explore</a></li>

                <li class="lis"><a href="#container3"class="" id="a">Hotels</a></li>

               

                

                 
            
                



             
            </ul>


        
        

        
        </div>
        
    </nav>
    

</header>
<h1 class="travel-2">YOUR TRAVEL STARTS HERE</h1>
<p class="discover">Welcome to TravelGo Philippines, your ultimate companion for unforgettable journeys across the stunning landscapes and vibrant cultures of the archipelago. <br> We are your one-stop destination for seamless travel experiences, offering a range of services designed to make exploring the Philippines as convenient and enjoyable as possible.</p>
    <button class="button" name="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Sign in">Get Started</button><?php
                
                
                if (isset($_POST["button"])) {
                    header("Location: Main/login_page.php");
                }
                
                
                ?>
</section>






  <!--====================================================================================== NUMBER 2 CONTAINER================================================================================ -->
 <section class="sec2 swiper mySwiper">
  <div class="container2 swiper-wrapper" id="container2">



  <div class="box3 swiper-slide">
    <h1 class="promos">About Us</h1>

    
        <img src="plane.jpg" alt="" class="image">
        <div class="image-date">
            <h2>What We Offer: </h2>
            <br>
            <h2>1. Flight Booking</h2>
            <br>
            <span class="text"> Planning your next adventure? With TravelGo, booking flights is a breeze. Our user-friendly interface allows you to effortlessly compare prices, select preferred airlines, and secure your seats with just a few clicks. Whether you're flying solo, with family, or on a group trip, we're here to ensure you reach your destination comfortably and affordably.</span>
            <button class="button2" name="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Sign in">Get Started</button><?php
                
                
                if (isset($_POST["button"])) {
                    header("Location: Main/login_page.php");
                }
                
                
                ?>
        </div>
    </div>
    <div class="box3 swiper-slide">
    <h1 class="promos">About Us</h1>

    
        <img src="plane.jpg" alt="" class="image">
        <div class="image-date">
            <h2>What We Offer: </h2>
            <br>
            <h2>2. Hotel Accommodations</h2>
            <br>
            <span class="text">Finding the perfect place to stay is essential for a memorable trip. That's why TravelGo brings you an extensive selection of hotels worldwide, ranging from cozy boutique stays to luxurious resorts. Whether you're craving a beachfront retreat, a city-center oasis, or a quaint countryside escape, our platform has something to suit every taste and budget.</span>
            <button class="button2" name="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Sign in">Get Started</button><?php
                
                
                if (isset($_POST["button"])) {
                    header("Location: Main/login_page.php");
                }
                
                
                ?>
        </div>
        
    </div>
    <div class="box3 swiper-slide">
    <h1 class="promos">About Us</h1>

    
        <img src="https://cdn.wallpapersafari.com/68/2/MShsNr.jpg" alt="" class="image">
        <div class="image-date">
            <h2>What We Offer: </h2>
            <br>
            <h2>3. Destination Exploration</h2>
            <br>
            <span class="text"> Finding the perfect place to stay is essential for a memorable trip. That's why TravelGo brings you an extensive selection of hotels worldwide, ranging from cozy boutique stays to luxurious resorts. Whether you're craving a beachfront retreat, a city-center oasis, or a quaint countryside escape, our platform has something to suit every taste and budget.</span>
            <button class="button2" name="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Sign in">Get Started</button><?php
                
                
                if (isset($_POST["button"])) {
                    header("Location: Main/login_page.php");
                }
                
                
                ?>
        </div>
    </div>

    <div class="box3 swiper-slide">
    <h1 class="promos">About Us</h1>

    
        <img src="https://cdn.wallpapersafari.com/68/2/MShsNr.jpg" alt="" class="image">
        <div class="image-date">
            <h2>Why Choose Travel Go Ph: </h2>
            <br>
            <h2>Convenience</h2>
            <br>
            <span class="text"> Say goodbye to endless hours of searching multiple websites. With TravelGo, everything you need for your trip is right at your fingertips.</span>
            <button class="button2" name="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Sign in">Get Started</button><?php
                
                
                if (isset($_POST["button"])) {
                    header("Location: Main/login_page.php");
                }
                
                
                ?>
        </div>
    </div>

    <div class="box3 swiper-slide">
    <h1 class="promos">About Us</h1>

    
        <img src="https://cdn.wallpapersafari.com/68/2/MShsNr.jpg" alt="" class="image">
        <div class="image-date">
            <h2>Why Choose Travel Go Ph: </h2>
            <br>
            <h2>Competitive Prices</h2>
            <br>
            <span class="text"> We understand the value of your hard-earned money. That's why we strive to offer the best deals and discounts to make your travel budget stretch further.</span>
            <button class="button2" name="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Sign in">Get Started</button><?php
                
                
                if (isset($_POST["button"])) {
                    header("Location: Main/login_page.php");
                }
                
                
                ?>
        </div>
        
    </div>

    <div class="box3 swiper-slide">
    <h1 class="promos">About Us</h1>

    
        <img src="https://cdn.wallpapersafari.com/68/2/MShsNr.jpg" alt="" class="image">
        <div class="image-date">
            <h2>Why Choose Travel Go PH: </h2>
            <br>
            <h2>Reliability</h2>
            <br>
            <span class="text"> Trust is the cornerstone of our service. Rest assured, when you book with TravelGo, you're in good hands. Our secure payment gateway and 24/7 customer support ensure a worry-free booking experience.</span>
            <button class="button2" name="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Sign in">Get Started</button><?php
                
                
                if (isset($_POST["button"])) {
                    header("Location: Main/login_page.php");
                }
                
                
                ?>
        </div>
        
    </div>

    <div class="box3 swiper-slide">
    <h1 class="promos">About Us</h1>

    
        <img src="https://wallpapertag.com/wallpaper/full/8/7/e/221119-travel-background-1920x1080-laptop.jpg" alt="" class="image">
        <div class="image-date">
            <h2>Let's Go and Travel and Go! in The Philippines </h2>
            <br>
            <span class="text">At TravelGoPH, we're passionate about turning your travel dreams into reality. Whether you're planning a spontaneous getaway or a meticulously planned vacation, let us be your trusted companion every step of the way. Start your journey with TravelGo today and let the adventures begin!</span>
            <button class="button2" name="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Sign in">Get Started</button><?php
                
                
                if (isset($_POST["button"])) {
                    header("Location: Main/login_page.php");
                }
                
                
                ?>
        </div>
        
    </div>
  </div>
    
<div class="swiper-button-next"></div>
<div class="swiper-button-prev"></div>
<div class="swiper-pagination"></div>



</section>
<script src="swiper-bundle.min.js"></script>

     <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 1,
      spaceBetween: 30,
      loop: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>

   
    <!-- ==========================================================================number 1 container ===============================================================================-->
<div class="container" id="container">

    <h1 class="for">Contacts</h1>
    <p class="cont">Got a question? We'd love to hear it from you. Send us a message <br> and we'll respond as soon as possible</p>
    <div class="center-container">
    <div class="card bg-dark">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Contact Us</h4>
        </div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="name" class="text-white">Your Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <label for="email" class="text-white">Email Address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="message" class="text-white">Message</label>
                    <textarea class="form-control" name="message" id="message" rows="3" placeholder="Enter your message"></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<div class="text-container">
<div class="map-container" style="height: 500px; ">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15904.22199331931!2d120.3220124!3d16.1856156!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x339164eab7fb75c1%3A0x8a0f06775e05237a!2sSan%20Fabian%2C%20Pangasinan!5e0!3m2!1sen!2sph!4v1649238830344!5m2!1sen!2sph"
            height="50%" style="width: 100%; border:0; " allowfullscreen="" loading="lazy"></iframe>
            <p>Email: TravelGoPh@gmail.com</p>
            <p>Phone: +63 907 321 7264</p>
            <p>Website: www.travelgo.ph</p>
            <p>Address: Binday, San Fabian Pangasinan</p>
            <p>Hours: Monday - Friday: 9:00am - 5:00pm</p>
            
    
</div>

</div>

</div>


        
        
        
        
 <?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require 'C:/xampp/htdocs/Website/PHPMailer/src/Exception.php';
require 'C:/xampp/htdocs/Website/PHPMailer/src/PHPMailer.php';
require 'C:/xampp/htdocs/Website/PHPMailer/src/SMTP.php';

if (isset($_POST["submit"])) {
    $fullname = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"]; // Corrected to use message input
    // SMTP Configuration
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'kurosawataki84@gmail.com'; // TODO:  Indicate My Gmail email address
        $mail->Password = 'fwbmdkvlhkxivqet'; //TODO: Indicate my Gmail password here
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption here
        $mail->Port = 587; // TCP port to connect to 

        //Recipients
        $mail->setFrom('kurosawataki84@gmail.com', $fullname);
        $mail->addAddress($email, $fullname); // Add recipient email address

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'From TravelGo Philippines';
        $mail->Body = "Dear $fullname, $email<br><br>Thank you for contacting us. Your message is:<br><br>$message<br><br>We'll get back to you as soon as possible.<br><br>Best regards,<br>Travel GO Philippines";

        $mail->send();
        echo "<script>alert('Email sent successfully')</script>";
        // TODO: Redirect to a thank you page or any other page after sending the email
        
        
    } catch (Exception $e) {
        echo "No Connection Found";
    }
}
?>



<!---------------------------------------------------------------------------------------------Places------------------------------------------------------------------------------------>


<div class="container4" id="container4">


                
<h1 class="for2">Book and Explore!</h1>



<?php
$conn = new mysqli("localhost:3307", "root", "admin", "sample");

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

// TODO: SQL query to retrieve image data
$sql = "SELECT place, price, image FROM for_creating_a_place"; // Adjust the query according to your database schema
$result = $conn->query($sql);


if ($result->num_rows > 0) {
// TODO: Output data of each row
while($row = $result->fetch_assoc()) {
     if (isset($_POST['book'])) {
        
  
   
}
 // TODO: Display the image
    $imageData = base64_encode($row['image']);
    $price = number_format($row['price']);
    $textData = $row['place'];
    
    echo '<div class="inner-box">
    <div class="box"><img src="/img/' . $row["image"] . '" alt="Image" /></div>
    <h2 class="textdata">Explore '.$textData.'!</h2>
    <div class="outer"><p class="price"> Starting PHP '.$price.'</p></div>

    <hr class="solidblack"></hr>
    <a href="Main/login_page.php" class="book">Book now</a>
    
    <a href="/Main/maps.php?choices='. urlencode($textData),"  ".'"" class="see_details">See Details</a>
</div>';
     
}
} else {
echo "0 results";
}





   
  
?>



</div>

<!----------------------------------------------------------------------------------------------FLGIHTS CONTAINER------------------------------------------------------------------------------------------->




<!-----------------------------------------------------------------------------------------------CONTAINER 3--------------------------------------------------------------------------------------------->

<div class="sec3">
<div class="container3" id="container3">
<h1 class="featured_properties">
    Hotel Recommendations
</h1>
        <ul class="ul2">
            <li class="lis" onclick=""><a href="" >Manila</a></li>
            <li class="lis" onclick=""><a href="#container5">Cebu</a></li>
            <li class="lis" onclick=""><a href="">Batanes</a></li>
            <li class="lis" onclick=""><a href="">Bohol</a></li>
            <li class="lis"onclick=""><a href="">Davao</a></li>
            <li class="lis"onclick=""><a href="">Albay</a></li>
            
        </ul>

        <?php 
        $conn = new mysqli("localhost:3307", "root", "admin", "sample");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        //TODO: SQL query to retrieve image data
        $sql = "SELECT hotel, price, image FROM for_creating_a_hotel WHERE place ='Manila'"; //TODO: Adjust the query according to your database schema
        $result = $conn->query($sql);
    
       


        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                 if (isset($_POST['book'])) {
                    
              
               
            }
             // Display the image
                $imagedata = base64_encode($row['image']);
                $prices = number_format($row['price']);
                $textdata = $row['hotel'];
        
        echo' <div class="hotels" id="hotels">
            <div class="in">
            
            <img src="/images/'.$row["image"].'" alt="" srcset="">
            </div>
            <h1>'.$textdata.'</h1>

            <h1 class="h2">Starts from PHP '.$prices.'</h1>

            <a href="Main/login_page.php" class="book_hotel">Book now</a>
    
           
    </div>'; 
        
    }
} else {
echo "0 results";
}?> 

       
</div>

<div class="container3" id="container5">
<h1 class="featured_properties">
    Hotel Recommendations
</h1>
        <ul class="ul2">
            <li class="lis" onclick=""><a href="#container3" >Manila</a></li>
            <li class="lis" onclick=""><a href="">Cebu</a></li>
            <li class="lis" onclick=""><a href="">Batanes</a></li>
            <li class="lis" onclick=""><a href="">Bohol</a></li>
            <li class="lis"onclick=""><a href="">Davao</a></li>
            <li class="lis"onclick=""><a href="">Albay</a></li>
            
        </ul>

        <?php 
        $conn = new mysqli("localhost:3307", "root", "admin", "sample");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        //TODO: SQL query to retrieve image data
        $sql = "SELECT hotel, price, image FROM for_creating_a_hotel WHERE place = 'cebu'"; //TODO: Adjust the query according to your database schema
        $result = $conn->query($sql);
    
       


        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                 if (isset($_POST['book'])) {
                    
              
               
            }
             // Display the image
                $imagedata = base64_encode($row['image']);
                $prices = number_format($row['price']);
                $textdata = $row['hotel'];
        
        echo' <div class="hotels" id="hotels">
            <div class="in">
            
            <img src="/images/'.$row["image"].'" alt="" srcset="">
            </div>
            <h1>'.$textdata.'</h1>

            <h1 class="h2">Starts from PHP '.$prices.'</h1>

            <a href="Main/login_page.php" class="book_hotel">Book now</a>
    
           
    </div>'; 
        
    }
} else {
echo "0 results";
}?> 

       


        
        
        
       


        </div>

        


        
       

    

</div>



    
<!-------------- ===================================================================CONTAINER5 ============================================= -------------------------------->

        






        
    
    
    
    
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
       <img class="" src="data:image/png;base64,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"alt="">
       <img class="" src="data:image/png;base64,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" alt="">

       <h3>follow </h3>
       </div>
       <hr>
       <p>Copyright © 2024 Travel Go Philippines. All rights reserved.</p>
   </footer> 
        
       
    


 


 


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




    

        var number = 1;
var country=document.getElementById("countryName");
setInterval(()=>{
    var name = document.getElementById("country"+number);
    country.innerText=name.innerText;
    var line1 = document.getElementById("country"+number);
    line1.style.borderBottom= "thick solid #0000FF";
    for(var i=1;i<=10;i++)
    {  
        if(i!==number)
        {
            line1.style.borderBottom="0";
        }
    }
    number++;
    if(number===11){
        number=1;
    }
},3000);


document.querySelector(".burger").addEventListener("click",()=>{
    var x = document.getElementById("topnav")

    if(x.style.display === "block")
    {
        x.style.display = "none"
        x.style.transition= "2s,ease-out";
    }
    else{
        x.style.display = "block"
        x.style.borderBottom="thick solid #0000FF"
    }
})

var featureSS = document.querySelector(".first");
var slide = 20
// setInterval(()=>{
// featureSS.style.marginLeft= `${0-slide}%`
// slide=slide+20;
// if(slide===80)
// {
//     slide=0;
// }
// var n=1;
// var btn = document.getElementById("mbtn"+n);
// btn.style.backgroundColor="#4d3af7";
// n++;
// if(n===6)
// n=0;
// for(var i=1;i<=5;i++)
// {
//     // if(i!==n)
//     // {
//     //     btn.style.backgroundColor="#dfe1e296"
//     // }
// }

// },5000)




</script>
<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    
</body>
</html>





