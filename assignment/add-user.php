<?php
    if (isset($_POST["username"])){
        require_once "inc/dbconn.inc.php";
        $sql = "INSERT INTO User(username,role) VALUES(?,?);";
        $statement = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($statement, $sql);
        mysqli_stmt_bind_param($statement, 'ss', htmlspecialchars($_POST["username"]),htmlspecialchars($_POST["role"]));
        // mysqli_stmt_bind_param($statement, 's', htmlspecialchars($_POST["password"]));
        // mysqli_stmt_bind_param($statement, 's', htmlspecialchars($_POST["role"]));
        if(mysqli_stmt_execute($statement)){
            header("location: index.php");
        }else{
            mysqli_error($conn);
        };
        mysqli_close($conn);
    }
?>
