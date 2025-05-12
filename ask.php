<?php include 'config.php';

$question_submitted = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $question = htmlspecialchars($_POST['question']);
    
    try {
        $stmt = $pdo->prepare("INSERT INTO questions (name, email, subject, question) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $email, $subject, $question]);
        $question_submitted = true;
    } catch (PDOException $e) {
        $error = "Error submitting question: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ask Questions - TripMaster</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'header.php'; ?>

    <section class="section auth-form">
    <h2 class="login-heading">Ask Your Question</h2>
    
    <?php if($question_submitted): ?>
        <div class="alert success">
            ✅ Your question has been submitted successfully! We'll respond within 24 hours.
        </div>
    <?php elseif($error): ?>
        <div class="alert error"><?php echo $error; ?></div>
    <?php endif; ?>

    <form class="signup-form" method="POST">
        <div class="form-group">
            <input type="text" name="name" placeholder="Your Name" required>
        </div>
        
        <div class="form-group">
            <input type="email" name="email" placeholder="Email Address" required>
        </div>
        
        <div class="form-group">
            <input type="text" name="subject" placeholder="Question Subject" required>
        </div>
        
        <div class="form-group">
            <textarea name="question" placeholder="Your Question..." rows="4" required></textarea>
        </div>
        
        <button type="submit" class="book-btn">Submit Question</button>
    </form>
</section>

    <?php include 'footer.php'; ?>
</body>
</html>