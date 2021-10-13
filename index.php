<!DOCTYPE html>
<html lang="en">
<head>
    <title>Content Management System - Add A New User</title>
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
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to your dashboard!</h1>
         Click on the links on the left side to navigate.
         <br /> <br /> 

        </div>
    </div>
</body>
</html>
   
