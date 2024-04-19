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
    <style>
        .modal-body img {
            max-width: 100%;
            max-height: 400px; 
            width: auto;
            height: auto;
        }
    </style>
</head>
<body>
    <section class="banner">
        <header>
            <nav class="navigation" id="navbar">
                <ul class="myul">
                    <li class="li"><a href="#ewan" class="active" id="a">Home</a> </li>
                    <li class="li"><a href="#container3" class="" id="a">Hotels</a></li>
                    <li class="lis"><a href="#container" class="" id="a">Attractions</a></li>
                    <li class="lis"><a href="#flights" class="" id="a">Flights</a></li>
                    <div class="dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">More</button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Link 1</a></li>
                            <li><a class="dropdown-item" href="travel.php">My Bookings</a></li>
                            <li class="list"><button class="dropdown-item" name="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Sign out">Signout</button></li>
                        </ul>
                    </div>
                </ul>
                <div class="container">
                <?php 
                include_once("con2.php");
                $dataget = $_GET['details'];
                $sql = "SELECT * FROM `create_see_details.php` WHERE specific_place = '$dataget'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    //TODO: Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $description = $row['description'];
                        $price = number_format($row['price']);
                        $price2 = $row['price'];
                        $amenities = $row['amenities'];
                        $rating = $row['rating'];
                        $specific_place = $row['specific_place'];
                        $images = explode(',', $row['image']); //TODO: Split the list of images into an array of strings and remove duplicates
                        $firstImage = reset($images); //TODO: Get the first image from the array para mag fetch first image sa db
                        echo '<div class="inner-box">
                                <div class="box">
                                    <img src="/details/' . $firstImage . '" alt="Image" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                </div>
                                <div class="content">
                                    <h2 class="textdata">'.$specific_place.'</h2>
                                    <hr>
                                    <h2 class="textdata">Details</h2>
                                    <p>'.$description.'</p>
                                </div>
                                <div class="outer">';
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
                        echo '<div class="rates">
                                <p class="price"> Starting PHP '.$price.'</p>
                                <a href="placesbooking.php?choice='.urlencode($specific_place).'&price='.urlencode($price2).'" class="now">Book now</a>
                            </div>';
                    }
                }
                ?>
                </div>
            </nav>
        </header>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Image Gallery</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <!-- Generate carousel indicators dynamically based on the number of images -->
                            <?php
                                // Fetch the images again for the carousel
                                $result = $conn->query($sql);
                                $indicatorIndex = 0; // Indicator index for the first slide
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="' . $indicatorIndex . '"';
                                        // Add "active" class to the first indicator
                                        if ($indicatorIndex === 0) {
                                            echo ' class="active"';
                                        }
                                        echo '></button>';
                                        $indicatorIndex++;
                                    }
                                }
                            ?>
                        </div>
                        <div class="carousel-inner">
                            
                            <?php
                                $result->data_seek(0);
                                $itemIndex = 0; 
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<div class="carousel-item';
                                        if ($itemIndex === 0) {
                                            echo ' active';
                                        }
                                        echo '">';
                                        echo '
                                        <h2 class="textdata2">'.$row["specific_place"].'</h2>
                                        <img src="/details/' . $row["image"] . '" class="d-block w-100" alt="Image">';
                                        echo '</div>';
                                        $itemIndex++;
                                    }
                                }
                            ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
