<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>TripMaster</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
<?php include 'header.php'; ?>
  
  <section class="hero">
    <div class="slideshow-container">
      <div class="slide fade">
        <img src="images/slide1.jpg" alt="Beach">
        <div class="caption">Tour Around The Universe</div>
      </div>
      <div class="slide fade">
        <img src="images/slide2.jpg" alt="Mountains">
        <div class="caption">Express The New Destination</div>
      </div>
      <div class="slide fade">
        <img src="images/slide3.jpg" alt="City">
        <div class="caption">Make Your Tour Effective</div>
      </div>

      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>

    <a href="packages.php" class="cta-button">Explore Packages</a>
  </section>

  <section class="section" id="packages">
    <h2>TOP PACKAGES</h2>
    <div class="package-list">
      <div class="package-card">
        <img src="images/paris.jpg" alt="Paris">
        <h3>Romantic Paris Tour</h3>
        <p>5 days with guided sightseeing.</p>
        <span>₹100,000/person</span>
        <a href="booking.php?name=Romantic+Paris+Tour&price=100,000/person&desc=5+days+with+guided+sightseeing" class="book-btn">Book Now</a>
      </div>
      <div class="package-card">
        <img src="images/dubai.jpg" alt="Dubai">
        <h3>Discover Dubai</h3>
        <p>4 days with desert safari experience.</p>
        <span>₹55,000/person</span>
        <a href="booking.php?name=Discover+Dubai&price=55,000/person&desc=4+days+with+desert+safari+experience" class="book-btn">Book Now</a>
      </div>
      <div class="package-card">
        <img src="images/canada.jpg" alt="Canada">
        <h3>Canada Rockies & Lakes</h3>
        <p>Explore Banff and Lake Louise.</p>
        <span>₹220,000/person</span>
        <a href="booking.php?name=Canada+Rockies+%26+Lakes&price=220,000/person&desc=Explore+Banff+and+Lake+Louise" class="book-btn">Book Now</a>
      </div>
    </div>
  </section>

  <?php include 'footer.php'; ?>
  
  <script src="script.js"></script>
</body>
</html>