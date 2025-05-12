<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>TripMaster</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<header class="main-header">
  <div class="container">
    <div class="logo-container">
      <img src="images/logo.jpg" class="logo" alt="Logo">
      <span class="site-name">TripMaster</span>
    </div>
    <nav class="navbar">
      <a href="index.php">HOME</a>
      <a href="about.php">ABOUT</a>
      <a href="packages.php">PACKAGES</a>
      <?php if(isset($_SESSION['user_id'])): ?>
        <a href="logout.php">LOGOUT</a>
      <?php else: ?>
        <a href="login.php">LOGIN</a>
      <?php endif; ?>
    </nav>
  </div>
</header>