<?php include 'config.php'; 

$password_error = '';
$signup_success = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $retype = $_POST['retype'];
    
    // Validate passwords match
    if ($password !== $retype) {
        $password_error = "Passwords do not match";
    } else {
        try {
            // Check if email already exists
            $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->execute([$email]);
            
            if ($stmt->rowCount() > 0) {
                $password_error = "Email already registered";
            } else {
                // Hash password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                
                // Insert new user
                $stmt = $pdo->prepare("INSERT INTO users (username, email, phone, password) VALUES (?, ?, ?, ?)");
                $stmt->execute([$username, $email, $phone, $hashed_password]);
                
                $signup_success = true;
                $_SESSION['signup_success'] = true;
                header("Location: login.php");
                exit();
            }
        } catch (PDOException $e) {
            $password_error = "Database error: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign Up - TripMaster</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
  <?php include 'header.php'; ?>

  <section class="section">
    <h2 class="login-heading">Create Your Account</h2>
    <?php if(isset($_SESSION['signup_success'])): ?>
      <div class="alert success">Registration successful! Please login.</div>
      <?php unset($_SESSION['signup_success']); ?>
    <?php endif; ?>
    <form class="signup-form" method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="email" name="email" placeholder="Email Address" required>
      <input type="tel" name="phone" placeholder="Phone Number" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="password" name="retype" placeholder="Retype Password" required>
      <button type="submit" class="book-btn">Register</button>
      <div class="login-links">
        <p>Already have an account? <a href="login.php">Login here</a></p>
      </div>
    </form>
    <p id="passwordMessage" style="color:red; font-size: 0.9rem;">
      <?php echo $password_error; ?>
    </p>
  </section>

  <script>
    const form = document.querySelector(".signup-form");
    const passwordInput = form.password;
    const retypeInput = form.retype;
    const message = document.getElementById("passwordMessage");
  
    retypeInput.addEventListener("input", function () {
      if (passwordInput.value === retypeInput.value) {
        message.textContent = "✅ Passwords match.";
        message.style.color = "green";
      } else {
        message.textContent = "❌ Passwords do not match.";
        message.style.color = "red";
      }
    });
  </script>

  <?php include 'footer.php'; ?>
</body>
</html>