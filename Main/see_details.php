<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/iloveyouaila.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="icon" href="icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="/icon.ico" type="image/x-icon">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!--============================================================================================== SPLIDE ===================================================== -->
    
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
    <title>TravelGoPH</title>
</head>
<body>
<form action="Main.php" method="post">
            <section class="banner">
                <header>
                    <nav class="navigation" id="navbar">
                        <ul class="myul">
                            <li class="li"><a href="#ewan" class="active" id="a">Home</a> </li>
                            <li class="li"><a href="#container3"class="" id="a">Hotels</a></li>
                            <li class="lis"><a href="#container"class="" id="a">Attractions</a></li>
                            <li class="lis"><a href="#flights"class="" id="a">Flights</a></li>
                            <div class="dropdown">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">More</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Link 1</a></li>
                                <li><a class="dropdown-item" href="travel.php">My Bookings</a></li>
                                <li class="list"><button class="dropdown-item" name="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Sign out">Signout</button></li>
                            </ul>
                        </div>
                    </div>
                 </ul>
                 <div class="container">                          
                    <?php 
                    include_once("config.php");
                    $dataget = $_GET['details'];
                    $sql = "SELECT * FROM `create_see_details.php` WHERE specific_place = '$dataget'";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            $description = $row['description'];
                            $price = number_format($row['price']);
                            $amenities = $row['amenities'];
                            $rating = $row['rating'];
                            $specific_place = $row['specific_place'];
                            $imageData = base64_encode($row['image']);
                            echo '<div class="inner-box">
                                    <div class="box"><img src="/details/' . $row["image"] . '" alt="Image" /></div>

                                    <div class="content">
                                        <h2 class="textdata">'.$specific_place.'</h2>
                                        <hr>
                                        <h2 class="textdata2">Details</h2>
                                        <p>'.$description.'</p>
                                    </div>

                                    <div class="outer">
                                        <p class="price"> Starting PHP '.$price.'</p>';

                                        // Star Ratings
                                        echo '<p class="ratings">Ratings (' . $rating . ' / 5)</p>';
                                        for ($i = 1; $i <= 5; $i++) {
                                            if ($i <= $rating) {
                                                echo '<span class="fa fa-star checked"></span>';
                                            } else {
                                                echo '<span class="fa fa-star"></span>';
                                            }
                                        }
                                        
                                echo '</div>
                                </div>';
                            
                            }
                        }?>
                            </div>
                        </form>
                    </nav>
                </header>
            </section>
        </body>
    </html>