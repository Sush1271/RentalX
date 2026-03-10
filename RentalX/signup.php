<?php
session_start();

// Connect to database
$conn = mysqli_connect("localhost","root","","rentalx");
if(!$conn){
    die("Database connection failed: " . mysqli_connect_error());
}

// Capture all fields from the signup form
$name = $_POST['name'];
$birthdate = $_POST['birthdate'];
$age = $_POST['age'];
$mobile = $_POST['mobile'];
$car_number = $_POST['car_number'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Check if email already exists
$sql_check = "SELECT * FROM users WHERE email='$email'";
$result_check = mysqli_query($conn, $sql_check);

if(mysqli_num_rows($result_check) > 0){
    echo "Email already registered. Please login.";
    exit();
}

// Insert new user into users table with all new fields
$sql = "INSERT INTO users (name, birthdate, age, mobile, car_number, email, password)
        VALUES ('$name', '$birthdate', '$age', '$mobile', '$car_number', '$email', '$password')";

if(mysqli_query($conn, $sql)){
    echo "Account created successfully";
    header("Location: signin.html");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
?>