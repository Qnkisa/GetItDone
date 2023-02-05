

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GetItDone | To-Do-App</title>
    <link rel="stylesheet" href="styles/app.css">
</head>
<body>
<?php 
    session_start();
?>

    
    <header>
        <div class="add-task">
            <div class="add-task-icon">
                <a href="#" id="add-task-icon" onclick="showAdd()"><ion-icon name="add-circle-outline" class="app-icon app-icon-add"></ion-icon></a>
                <p>Add Task</p>
            </div>
            <div class="add-task-helper" id="add-task-helper">
                <div class="form-blur" id="form-blur"></div>
                <div class="add-task-container">
                    <div class="add-task-container-top">
                        <p>Add Task</p>
                        <ion-icon name="close-circle-outline" class="task-close" id="task-close"></ion-icon>
                    </div>
                    <form action="includes/addtask.inc.php" method="post">
                        <input type="text" name="taskname" placeholder="Task Name...">
                        <input type="text" name="taskdescription" placeholder="Task Description...">
                        <label for="taskdate">Due Date:</label>
                        <input type="date" name="taskdate" id="task-date">
                        <?php
                        if(isset($_SESSION["userFullName"])){
                            echo '<input type="hidden" name="taskuseremail" value="' . $_SESSION["userEmail"] . '">';                            
                        }
                        ?>
                        <button type="submit" name="addtask">ADD</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="task-count">
            <ion-icon name="checkmark-circle-outline"  class="app-icon"></ion-icon>
            <span id="task-counts"></span>
            <span>tasks to complete</span>
        </div>
        <div class="profile">
            <div class="profile-main">
                <a href="#"><ion-icon name="person-circle-outline"  class="app-icon"></ion-icon></a>
            </div>
            <div class="profile-submain">
                <ul>
                    <li>
                        <p>Profile Information:</p>
                        <?php
                            if(isset($_SESSION["userFullName"])){
                                echo '<span>Full Name:<br> ' . $_SESSION["userFullName"] .  '</span>';
                                echo "<br>";
                                echo '<span>Email:<br> ' . $_SESSION["userEmail"] .  '</span>';
                            }
                        ?>
                    </li>
                    <li>
                        <a href="includes/logout.inc.php">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="app-heading">
        <?php
            if(isset($_SESSION["userFullName"])){
                echo '<h1>It&#39;s great to see you, ' . $_SESSION["userFullName"] . '</h1>';
            }
        ?>
    </div>

    <div class="app-container">
        <div class="app-container-top">
            <p>Today, </p>
            <span id="today-date-app"></span>
        </div>
        <div class="app-container-middle">
            <div class="app-container-middle-text">
                <h2>Tasks</h2>
                <div class="app-container-middle-text-helper">
                    <a href="#" id="add-task-icon1" onclick="showAdd()"><ion-icon name="add-circle-outline" class="app-icon app-icon-add"></ion-icon></a>
                    <p>Add Task</p>
                </div>
            </div>
        </div>
        <div class="app-container-big" id="app-container-big">
            <!--<div class="task">
                <div class="task-remove">
                    <form action="includes/removetask.inc.php" method="post">
                        <button type="submit" name="removetask"><ion-icon name="close-outline" class="remove-task-icon"></ion-icon></button>
                    </form>
                </div>
                <div class="task-text">
                    <p>Task Name: <span class="task-real-name"> Clean the dishes</span></p>
                    <p>Task Description: <span> Do it After Dinner</span></p>
                </div>
                <div class="task-date">
                    <p>Due Date: <span class="task-real-date"> 14.01.2023</span></p>
                </div>
            </div>-->
            <?php
                $serverName = "localhost";
                $dbUsername = "root";
                $dbPassword = "";
                $dbName = "getitdone";

                $conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

                $taskEmailHelper = $_SESSION["userEmail"];

                $sql = "SELECT * FROM tasks WHERE userEmail='$taskEmailHelper';";
                $results = $conn->query($sql);

                foreach($results as $item){
                    echo '<div class="task">';
                    echo '<div class="task-remove">';
                    echo '<form action="includes/removetask.inc.php" method="post">';
                    echo '<input type="hidden" name="taskremoveid" value="' . $item["taskId"] .  '">';
                    echo '<button type="submit" name="removetask"><ion-icon name="close-outline" class="remove-task-icon"></ion-icon></button>';
                    echo '</form>';
                    echo '</div>';
                    echo '<div class="task-text">';
                    echo '<p>Task Name: <span class="task-real-name">' . $item["taskName"] .  '</span></p>';
                    echo '<p>Task Description: <span>' . $item["taskDescription"] .  '</span></p>';
                    echo '</div>';
                    echo '<div class="task-date">';
                    echo '<p>Due Date: <span class="task-real-date">' . $item["taskDate"] .  '</span></p>';
                    echo '</div>';
                    echo '</div>';
                }         
            ?>
        </div>
    </div>



    <script src="scripts/pleasework.js"></script>
    <script src="scripts/app.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>


    
    

