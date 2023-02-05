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
            <div class="get-in-logo">
                <img src="images/man2.jpg" alt="">
                <div class="get-in-logo-quote">
                    <p>"I'm so happy I discovered this to-do app! It's helped me stay organized and on top of all my tasks."</p>
                    <span>Robert Phillip, Childcare Worker</span>
                </div>
            </div>
            <div class="get-in-form">
                <h1>Sign Up</h1>
                <form action="includes/signup.inc.php" method="post">
                    <label for="fullname">Full Name:</label>
                    <input type="text" name="fullname" placeholder="Full Name...">
                    <label for="email">Email:</label>
                    <input type="text" name="email" placeholder="Email...">
                    <label for="password">Password:</label>
                    <input type="password" name="password" placeholder="Password...">
                    <label for="passwordrepeat">Repeat Password:</label>
                    <input type="password" name="passwordrepeat" placeholder="Password Repeat...">
                    <div class="terms">
                        <input type="checkbox" name="terms">
                        <p>I agree with the Terms & Conditions.</p>
                    </div>
                    <button type="submit" name="submit">Sign Up</button>
                </form>
                <?php
                    if(isset($_GET["error"]) && $_GET["error"] == "emptyinput"){
                        echo "<span>Please fill in all fields!</span>";
                    }
                    else if(isset($_GET["error"]) && $_GET["error"] == "termsnotmet"){
                        echo "<span>In order to register you have to agree to our Terms & Conditions!</span>";
                    }
                    else if(isset($_GET["error"]) && $_GET["error"] == "invalidname"){
                        echo "<span>Please provide a valid name!</span>";
                    }
                    else if(isset($_GET["error"]) && $_GET["error"] == "invalidemail"){
                        echo "<span>Please provide a valid email!</span>";
                    }
                    else if(isset($_GET["error"]) && $_GET["error"] == "passwordsnotmatching"){
                        echo "<span>Passwords are not matching!</span>";
                    }                    
                ?>
                <div class="other-form-link">
                    <a href="login.php">Already have an account? Log In!</a>
                </div>
            </div>
        </div>
    </div>








    <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
    <script src="scripts/script.js"></script>
</body>
</html>