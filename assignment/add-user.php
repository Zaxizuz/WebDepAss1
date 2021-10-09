<?php
    if (isset($_POST["username"])){
        require_once "inc/dbconn.inc.php";
        $sql = "INSERT INTO User(username,password,role) VALUES(?,?,?);";
        $statement = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($statement, $sql);
        mysqli_stmt_bind_param($statement, 'sss', htmlspecialchars($_POST["username"]),htmlspecialchars($_POST["password"]),htmlspecialchars($_POST["role"]));
        if(mysqli_stmt_execute($statement)){
            header("location: add.php");
        }else{
            mysqli_error($conn);
        };
        mysqli_close($conn);
    }
?>
