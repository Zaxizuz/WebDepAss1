<!DOCTYPE html>
<html lang="en">
<head>
    <title>Content Management System - Manage Users</title>
    <meta charset="UTF-8" />
    <meta name="author" content="Sen Lin" />
    <link rel="stylesheet" href="styles/style.css" />
    <script src="scripts/script.js" defer></script>
</head>
<body>


<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>


<div class="sidebar">
    <?php require_once "inc/menu.inc.php"; ?>
</div>

    <div class="wrapper">
        <div class ="container-logged">
            <h1>Manage Users</h1>
        <?php
            require_once "config.php";

            $sql= $sql = "SELECT username FROM User WHERE active=1";

            if($result=mysqli_query($conn,$sql)){
                if (mysqli_num_rows($result)>0){
                    echo "<ul>";
                    while($row=mysqli_fetch_assoc($result)){
                        echo "<li class=currentuser>".$row["username"]."</li>";
                    };
                    echo "</ul>";
                    mysqli_free_result($result);
                };
            };
            mysqli_close($conn);

            ?>

        </div>
    </div>
</body>
</html>
   
