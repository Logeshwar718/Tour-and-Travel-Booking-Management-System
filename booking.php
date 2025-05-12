<?php include 'config.php'; 

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $package_name = $_POST['package_name'];
    $package_desc = $_POST['package_desc'];
    $travel_date = $_POST['travel_date'];
    $num_people = $_POST['people'];
    $full_name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $user_id = $_SESSION['user_id'];
    
    try {
        $stmt = $pdo->prepare("INSERT INTO bookings (user_id, package_name, package_desc, travel_date, num_people, full_name, email, phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$user_id, $package_name, $package_desc, $travel_date, $num_people, $full_name, $email, $phone]);
        
        $booking_success = true;
    } catch (PDOException $e) {
        $booking_error = "Booking failed: " . $e->getMessage();
    }
}

// Get package details from URL
$package_name = isset($_GET['name']) ? urldecode($_GET['name']) : '';
$package_price = isset($_GET['price']) ? $_GET['price'] : '';
$package_desc = isset($_GET['desc']) ? urldecode($_GET['desc']) : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Book Your Trip - TripMaster</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <?php include 'header.php'; ?>

  <section class="section" id="booking">
    <h2>BOOKING DETAILS</h2><br>
    
    <?php if(isset($booking_success)): ?>
      <div class="confirmation">
        <p>✅ Thank you <strong><?php echo htmlspecialchars($_POST['name']); ?></strong>! Your booking for <strong><?php echo htmlspecialchars($package_name); ?></strong> (<?php echo htmlspecialchars($package_desc); ?>) for <strong><?php echo htmlspecialchars($_POST['people']); ?></strong> person(s) is confirmed. We'll contact you at <strong><?php echo htmlspecialchars($_POST['email']); ?></strong>.</p>
      </div>
    <?php elseif(isset($booking_error)): ?>
      <div class="alert error"><?php echo $booking_error; ?></div>
    <?php endif; ?>
    
    <div class="package-info">
      <h3 id="package-name"><?php echo htmlspecialchars($package_name); ?></h3>
      <p id="package-desc"><?php echo htmlspecialchars($package_desc); ?></p>
      <span id="package-price">₹<?php echo htmlspecialchars($package_price); ?></span>
    </div>

    <form id="bookingForm" class="booking-form" method="POST">
      <input type="hidden" name="package_name" value="<?php echo htmlspecialchars($package_name); ?>">
      <input type="hidden" name="package_desc" value="<?php echo htmlspecialchars($package_desc); ?>">
      
      <input type="text" name="name" placeholder="Full Name" required value="<?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : ''; ?>">
      <input type="email" name="email" placeholder="Email Address" required value="<?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : ''; ?>">
      <input type="tel" name="phone" placeholder="Phone Number" required>
      <input type="date" name="travel_date" required>
      <input type="number" name="people" placeholder="Number of Persons" required min="1">
      <button type="submit" class="book-btn">Confirm Booking</button>
    </form>  
  </section>

  <?php include 'footer.php'; ?>

  <script>
    // Set min date to today
    document.querySelector('input[type="date"]').min = new Date().toISOString().split('T')[0];
  </script>
</body>
</html>