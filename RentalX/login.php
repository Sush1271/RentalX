<?php
session_start();

$conn = mysqli_connect("localhost","root","","rentalx");

if(!$conn){
    die("Database connection failed");
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn,$sql);

$user = mysqli_fetch_assoc($result);

if($user && password_verify($password,$user['password'])){
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_email'] = $user['email'];

    header("Location: index.php"); // redirect to PHP homepage
    exit();
}else{
    echo "Invalid email or password";
}
?>