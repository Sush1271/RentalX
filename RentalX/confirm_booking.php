<?php
session_start();

// Make sure user is logged in
if(!isset($_SESSION['user_id'])){
    header("Location: signin.html");
    exit();
}

$user_id = $_SESSION['user_id'];
$car = $_POST['car'];
$date = $_POST['date'];
$days = $_POST['days'];

// Connect to DB
$conn = mysqli_connect("localhost","root","","rentalx");
if(!$conn){
    die("Database connection failed: " . mysqli_connect_error());
}

// Insert booking into 'bookings' table
$sql = "INSERT INTO bookings (user_id, car, pickup_date, days, booking_time) 
        VALUES ('$user_id', '$car', '$date', '$days', NOW())";

if(mysqli_query($conn, $sql)){
    $success = true;
} else {
    $success = false;
    $error_msg = mysqli_error($conn);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Booking Confirmed | RentalX</title>
<style>
  body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: linear-gradient(to right, #667eea, #764ba2); margin: 0; display:flex; justify-content:center; align-items:center; height:100vh; color:#333;}
  .confirmation-card { background:#fff; padding:40px; border-radius:15px; box-shadow:0 10px 25px rgba(0,0,0,0.2); text-align:center; max-width:400px; width:90%; animation:fadeIn 0.8s ease;}
  .confirmation-card h1 { color:#333; margin-bottom:20px; }
  .confirmation-card p { font-size:18px; margin:10px 0; }
  .confirmation-card a { display:inline-block; margin-top:25px; padding:12px 25px; background:#667eea; color:white; text-decoration:none; font-weight:bold; border-radius:8px; transition:0.3s ease; }
  .confirmation-card a:hover { background:#764ba2; }
  @keyframes fadeIn { from {opacity:0; transform:translateY(-20px);} to {opacity:1; transform:translateY(0);} }
</style>
</head>
<body>

<div class="confirmation-card">
<?php if($success): ?>
    <h1>Booking Confirmed!</h1>
    <p><strong>Car:</strong> <?php echo htmlspecialchars($car); ?></p>
    <p><strong>Pick-up Date:</strong> <?php echo htmlspecialchars($date); ?></p>
    <p><strong>Number of Days:</strong> <?php echo htmlspecialchars($days); ?></p>
    <a href="index.php">Back to Home</a>
<?php else: ?>
    <h1>Booking Failed!</h1>
    <p><?php echo htmlspecialchars($error_msg); ?></p>
    <a href="book_car.php">Try Again</a>
<?php endif; ?>
</div>

</body>
</html>