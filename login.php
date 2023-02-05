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
    <link rel="stylesheet" href="styles/get-in.css">
</head>
<body>

<header>
    <nav>
        <div class="nav-logo">
            <a href="index.php"><img src="images/websitelogo.png" alt=""><p>GetItDone</p></a>                
        </div>
    </nav>
</header>

    <div class="get-in">
        <div class="get-in-helper">
            <div class="get-in-logo get-in-logo-log-in">
                <div class="get-in-logo-text">It's good to have you back!</div>
                <div class="get-in-logo-quote1">Do<span>ubt</span></div>
            </div>
            <div class="get-in-form">
                <h1>Log In</h1>
                <form action="includes/login.inc.php" method="post">
                    <label for="email">Email:</label>
                    <input type="text" name="email" placeholder="Email...">
                    <label for="password">Password:</label>
                    <input type="password" name="password" placeholder="Password...">
                    <button type="submit" name="submit">Log In</button>
                </form>
                <?php
                    if(isset($_GET["error"]) && $_GET["error"] == "emptyinput"){
                        echo "<span>Please fill in all fields!</span>";
                    }
                ?>
                <div class="other-form-link">
                    <a href="signup.php">Don't have an account? Sign Up!</a>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
    <script src="scripts/script.js"></script>
</body>
</html>