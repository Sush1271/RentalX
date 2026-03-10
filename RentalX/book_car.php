<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: signin.html"); // redirect if not logged in
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Book Your Car | RentalX</title>
<link rel="stylesheet" href="styles.css">

<style>
  /* Full-page gradient background */
  body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #667eea, #764ba2);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #fff;
  }

  /* Frosted glass form container */
  form {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    border-radius: 20px;
    padding: 40px;
    max-width: 400px;
    width: 100%;
    box-shadow: 0 8px 32px rgba(0,0,0,0.25);
  }

  h1 {
    text-align: center;
    margin-bottom: 30px;
    font-size: 28px;
    color: #fff;
    text-shadow: 0 2px 4px rgba(0,0,0,0.5);
  }

  label {
    display: block;
    margin: 15px 0 5px;
    font-weight: 500;
    color: #fff;
  }

  select, input[type="date"], input[type="number"], button {
    width: 100%;
    padding: 12px 15px;
    margin-bottom: 10px;
    border-radius: 10px;
    border: none;
    outline: none;
    font-size: 16px;
    font-weight: 500;
  }

  select, input[type="date"], input[type="number"] {
    background: rgba(255, 255, 255, 0.15);
    color: #fff;
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    box-shadow: inset 0 2px 5px rgba(0,0,0,0.2);
  }

  select option {
    color: #000;
  }

  input::placeholder {
    color: rgba(255,255,255,0.7);
  }

  button {
    background: rgba(255, 255, 255, 0.25);
    color: #fff;
    font-weight: 600;
    cursor: pointer;
    transition: 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 1px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
  }

  button:hover {
    background: rgba(255, 255, 255, 0.4);
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.3);
  }

</style>
</head>
<body>

<form action="confirm_booking.php" method="POST">
    <h1>Book Your Car</h1>

    <label for="car">Select Car:</label>
    <select name="car" id="car" required>
        <option value="Swift Dzire">Swift Dzire</option>
        <option value="Honda City">Honda City</option>
        <option value="Fortuner">Fortuner</option>
        <option value="Maruti Alto">Maruti Alto</option>
    </select>

    <label for="date">Pick-up Date:</label>
    <input type="date" name="date" id="date" required>

    <label for="days">Number of Days:</label>
    <input type="number" name="days" id="days" min="1" required>

    <button type="submit">Book Now</button>
</form>

</body>
</html>