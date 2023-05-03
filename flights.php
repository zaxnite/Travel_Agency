<?php require "flight_book.php";?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="assets/style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
  <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
  <title>Flights</title>
  <style>
    .text {
      padding-top: 15%;
    }
  </style>
</head>

<body>
  <!--Header-->
  <header>
    <a href="#" class="logo">EA</a>
    <div class="bx bx-menu" id="menu-icon"></div>

    <ul class="navbar">
      <li><a href="index.html">Homepage</a></li>
      <li><a href="flights.php" class="active">Flights</a></li>
      <li><a href="hotels.html">Hotels</a></li>
      <li><a href="about_us.html">About Us</a></li>
      <li><a href="support.html">Support</a></li>
    </ul>
  </header>

  <!--Home Section-->
  <section class="flight" id="flight">
    <div class="flight-text">
      <p>Book your trip here...</p>
    </div>
  </section>

  <div class="search">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <datalist id="airport">
        <option value="Abu Dhabi, UAE">
        <option value="Sharjah, UAE">
        <option value="Dubai, UAE">
        <option value="Incheon, Korea">
        <option value="Jeju, Korea">
        <option value="Frankfurt, Germany">
        <option value="Berlin, Germany">
        <option value="Narita, Japan">
        <option value="Haneda, Japan">
        <option value="Paris, France">
        <option value="Bordeaux, France">
        <option value="Bangkok, Thailand">
        <option value="Chiang Mai, Thailand">
        <option value="Barcelona, Spain">
        <option value="Valencia, Spain">
      </datalist>

      <div class="field-holder">
        <input type="text" class="name" id="name" name="username" <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
        <label for="username" class="username">Username </label>
        <br /><span class="invalid-feedback"><?php echo $username_err;?></span>
      </div>
      
      <div class="field-holder">
        <input class="from" list="airport" id="from" name="from" <?php echo (!empty($from_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $from; ?>">
        <label for="airport1" class="airport1">From</label>
        <br /><span class="invalid-feedback"><?php echo $from_err;?></span>
      </div>

      <div class="field-holder">
        <input class="to" list="airport" id="to" name="to" <?php echo (!empty($to_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $to; ?>">
        <label for="airport2" class="airport2">To</label>
        <br /><span class="invalid-feedback"><?php echo $to_err;?></span>
      </div>

      <div class="field-holder">
        <input type="number" class="passengers" id="passengers" name="passengers" <?php echo (!empty($passengers_err)) ? 'is-invalid' : ''; ?> value="<?php echo $passengers; ?>">
        <label for="passengers" class="passengers">Passengers</label>
        <br /><span class="invalid-feedback"><?php echo $passengers_err;?></span>
      </div>

      <div class="field-holder">
        <input type="date" class="departure" id="departure" name="departure" <?php echo (!empty($departure_err)) ? 'is-invalid' : ''; ?> value="<?php echo $departure; ?>">
        <label for="departure" class="departure">Departure</label>
        <br /><span class="invalid-feedback"><?php echo $departure_err;?></span>
      </div>

      <div class="field-holder">
        <input type="date" class="return" id="return" name="arrival" <?php echo (!empty($arrival_err)) ? 'is-invalid' : ''; ?> value="<?php echo $arrival; ?>">
        <label for="return" class="return">Return</label>
        <br /><span class="invalid-feedback"><?php echo $arrival_err;?></span>
      </div>

      <button type="submit" class="flight_button">Submit</button>
      <a class="flight_button" href="flight_index.php">Bookings</a>
    </form>
  </div>

  <div class="slideshow-container">
    <p class="title">Visit Famous Tourist Countries</p>
    <div class="mySlides fade">
      <!-- <div class="numbertext">1 / 5</div> -->
      <img src="./assets/media/flights_country.jpg" alt="Jeju">
      <div class="slidetext">Jeju, Korea</div>
    </div>

    <div class="mySlides fade">
      <!-- <div class="numbertext">2 / 5</div> -->
      <img src="./assets/media/flights_country2.jpg" alt="Berlin">
      <div class="slidetext">Berlin, Germany</div>
    </div>

    <div class="mySlides fade">
      <!-- <div class="numbertext">3 / 5</div> -->
      <img src="./assets/media/flights_country3.jpg" alt="Paris">
      <div class="slidetext">Paris, France</div>
    </div>

    <div class="mySlides fade">
      <!-- <div class="numbertext">4 / 5</div> -->
      <img src="./assets/media/flights_country4.jpg" alt="Bangkok">
      <div class="slidetext">Bangkok, Thailand</div>
    </div>

    <div class="mySlides fade">
      <!-- <div class="numbertext">5 / 5</div> -->
      <img src="./assets/media/flights_country5.jpg" alt="Haneda">
      <div class="slidetext">Haneda, Japan</div>
    </div>

    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>
    
    </div>
    <br>
    
    <div style="text-align:center">
      <span class="dot" onclick="currentSlide(1)"></span> 
      <span class="dot" onclick="currentSlide(2)"></span> 
      <span class="dot" onclick="currentSlide(3)"></span> 
      <span class="dot" onclick="currentSlide(4)"></span> 
      <span class="dot" onclick="currentSlide(5)"></span> 
    </div>

<section class="flights rec">
<h2 class="reveal fade-bottom">Our Recommendations</h2>
<div class="recommendations reveal fade-left">
  <div class="rec-recommendations">
    <a class="rec-box reveal fade-left recanim" href="https://www.emirates.com/ae/english/">
      <img class="one" src="./assets/media/flights_rec.png" alt="Emirates"></br> Emirates
      <img class="two" src="./assets/media/stars.jpg" alt="Stars"> <br>
      <p>Based in Dubai, the Emirates is a subsidiary of The Emirates Group, which is owned by the government of Dubai's Investment Corporation of Dubai.</p>
    </a>
    <a class="rec-box recanim" href="https://www.airarabia.com/en">
      <img class="one" src="./assets/media/flights_rec2.jpg" alt="Air Arabia"></br> Air Arabia
      <img class="two" src="./assets/media/stars.jpg" alt="Stars"> <br>
      <p>Air Arabia is an Emirati low-cost airline with its head office in the A1 Building Sharjah Freight Center, Sharjah International Airport.</p>
    </a>
    <a class="rec-box reveal fade-left recanim" href="https://www.flydubai.com/en/">
      <img class="one" src="./assets/media/flights_rec3.jpg" alt="FlyDubai"></br> FlyDubai
      <img class="two" src="./assets/media/stars.jpg" alt="Stars"><br>
      <p>Flydubai is an Emirati government-owned low-cost airline in Dubai with its head office and flight operations in Terminal 2 of Dubai International Airport.</p>
    </a>
    <a class="rec-box recanim" href="https://www.etihad.com/en-ae/">
      <img class="one" src="./assets/media/flights_rec4.jpg" alt="Etihad Airways"></br> Etihad Airways
      <img class="two" src="./assets/media/stars.jpg" alt="Stars"><br>
      <p>Etihad Airways is the national airline of the United Arab Emirates and one of two flag carriers of the United Arab Emirates.</p>
    </a>
  </div>
</div>
</section>

<section class="flights bg">
<h2 class="reveal fade-bottom">A word from our customers:</h2>
<div class="recommendations reveal fade-left review">
  <div class="rec-recommendations review1">
    <div class="rec-box reveal fade-right">
      <h3>AMAZING AIRLINE SERVICES</h3>
      <p>The staff and hosts in the airlines are of best services. I was able to rent headphones in the Air Arabia flight to listen to songs during the ride. There was little to no turbulence in my flights.</p>
      <img class="two cust" src="./assets/media/stars.jpg" alt="stars"><p class="reviewer">- John S. Smith</p>
    </div>
    <div class="rec-box">
      <h3>BEST TRAVEL AGENCY EXPERIENCE</h3>
      <p>This was my first experience with a travel agency and I safely reached my dream tourist place with the best airline services provided. I took a night ride in the plane and it was peaceful with all the other friendly passengers.</p>
      <img class="two cust" src="./assets/media/45stars.jpg" alt="45stars"><p class="reviewer">- Melinda J. Green</p>
    </div>
  </div>
</div>
<div class="recommendations reveal fade-right review">
  <div class="rec-recommendations review1">
    <div class="rec-box">
      <h3>EASY FLIGHT BOOKING SERVICE</h3>
      <p>I booked my flights to my favourite tourist country through the Escape Artists website and it was the easiest booking process I have had in a while. It was an easy to access website with features like searching for preferred flights and hotels.</p>
      <img class="two cust" src="./assets/media/45stars.jpg" alt="45stars"><p class="reviewer">- Joe M. Paul</p>
    </div>
    <div class="rec-box reveal fade-right">
      <h3>CUSTOMER SUPPORT IS AMAZING</h3>
      <p>The employees at this travel agency are very supportive and understood all my needs with my travel plans. They were able to guide me to my perfect vacation which I enjoyed with my family.</p>
      <img class="two cust" src="./assets/media/4stars.jpg" alt="4stars"><p class="reviewer">- Jill P. Mist</p>
    </div>
  </div>
</div>
</section>

<section class="continer">
  <div class="text">
    <h2>THINGS TO KNOW</h2>
  </div>
  <div class="row-items">
    <div class="continer-box">
      <div class="continer-img">
        <img src="./assets/media/travel_tip1.png">
      </div>
      <h4>Visas</h4>
    </div>

    <div class="continer-box">
      <div class="continer-img">
        <img src="./assets/media/travel_tip2.png">
      </div>
      <h4>Getting Here</h4>
    </div>

    <div class="continer-box">
      <div class="continer-img">
        <img src="./assets/media/travel_tip3.png">
      </div>
      <h4>Travel Tips</h4>
    </div>

    <div class="continer-box">
      <div class="continer-img">
        <img src="./assets/media/travel_tip4.png">
      </div>
      <h4>Getting Around</h4>
    </div>

  </div>
</section>

  <footer>
    <div class="footer-content">
      <h3>Escape Artists</h3>
      <p>"Escape the ordinary and let the Escape Artists turn your travel dreams into reality. Our expert team of travel planners will help you discover the world's hidden gems and create unforgettable memories. Book your next adventure with us today!"</p>
      <ul class="socials">
        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
      </ul>
    </div>
    <div class="footer-bottom">
      <p>copyright &copy; 2023 EscapeArtists</p>
    </div>
  </footer>

  <script src="./assets/script.js"></script>
</body>

</html>