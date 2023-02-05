<?php include 'header.php';?>

<div class="boring-page">
    <h1>Contact Us</h1>
    <h2>Important Note! Please visit our <a href="about.php">About Page</a> before reading this one!</h2>
    <p>If you have any questions regarding our website, feel free to inform us about them!</p>
    <form action="includes/contact.inc.php" method="post">
        <label for="fullname">Full Name:</label>
        <input type="text" name="fullnamecontact" placeholder="Full Name...">
        <label for="subject">Subject:</label>
        <input type="text" name="subjectcontact" placeholder="Subject...">
        <label for="message">Message</label>
        <textarea name="messagecontact" cols="30" rows="10" placeholder="Message..."></textarea>
        <button type="submit" name="sendemail">Send Message</button>
    </form>
    <?php
        if(isset($_GET["error"])){
            if($_GET["error"] == "none"){
                echo "<h5 style='color:#054A49;'>You have successfully sent your message! We will get back to you shortly!</h5>";
            }
            else if($_GET["error"] == "emptyfield"){
                echo "<h5 style='color:red;'>Please fill in all fields!</h5>";
            }
        }      
    ?>
</div>

<?php include 'footer.php';?>
