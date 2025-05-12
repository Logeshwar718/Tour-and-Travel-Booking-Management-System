<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>About Us - TripMaster</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
  <?php include 'header.php'; ?>

  <section class="section about-section">
    <h2>ABOUT TRIPMASTER</h2>
    <div class="about-container">
      <div class="about-content">
        <h3>Your Journey Begins With Us</h3>
        <p>TripMaster was founded in 2025 with a simple mission: to make travel planning effortless and enjoyable. What started as a small team of travel enthusiasts has grown into a trusted name in the travel industry, helping thousands of customers create unforgettable memories.</p>
        
        <div class="about-features">
          <div class="feature-box">
            <i class="fas fa-globe-americas"></i>
            <h4>100+ Destinations</h4>
            <p>We offer carefully curated packages to the world's most amazing places.</p>
          </div>
          <div class="feature-box">
            <i class="fas fa-award"></i>
            <h4>5-Star Service</h4>
            <p>Our travel experts provide personalized service to ensure your perfect trip.</p>
          </div>
          <div class="feature-box">
            <i class="fas fa-smile"></i>
            <h4>10,000+ Happy Travelers</h4>
            <p>Join our community of satisfied customers who've explored the world with us.</p>
          </div>
        </div>
      </div>
      
      <div class="about-image">
        <img src="images/group.jpg" alt="Our Team">
      </div>
    </div>

    <div class="team-section">
      <h3>Meet Our Team</h3>
      <div class="team-members">
        <div class="member">
          <img src="images/sesh.jpg" alt="Team Member">
          <h4>Kaniesh Raj R</h4>
          <p>Founder & CEO</p>
        </div>
        <div class="member">
          <img src="images/loki.jpg" alt="Team Member">
          <h4>Logeshwar KS</h4>
          <p>Travel Specialist</p>
        </div>
      </div>
    </div>
  </section>

  <section class="section testimonials">
    <h3>What Our Customers Say</h3>
    <div class="testimonial-container">
      <div class="testimonial">
        <div class="quote">"TripMaster made our Paris vacation absolutely magical! Every detail was perfectly arranged."</div>
        <div class="author">- Priya K, Chennai</div>
      </div>
      <div class="testimonial">
        <div class="quote">"The best travel experience we've ever had. Will definitely book with TripMaster again!"</div>
        <div class="author">- Rajesh M, Bangalore</div>
      </div>
    </div>
  </section>

  <?php include 'footer.php'; ?>
</body>
</html>