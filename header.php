<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GetItDone | To-Do-List</title>
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    
    <header>
        <nav>
            <div class="nav-logo">
                <a href="index.php"><img src="images/websitelogo.png" alt=""><p>GetItDone</p></a>                
            </div>
            <ul id="menu">
                <li><a href="about.php">About</a></li>
                <li><a href="privacypolicy.php">Privacy Policy</a></li>
                <li><a href="termsandconditions.php">Terms & Conditions</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <div class="hamburger" id="hamburger">
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </div>
        </nav>
    </header>