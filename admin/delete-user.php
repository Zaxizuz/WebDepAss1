<?php
    if (isset($_GET["id"])){
        require_once "inc/dbconn.inc.php";
        $sql = "UPDATE User SET active=0 WHERE id=?;";
        $statement = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($statement, $sql);
        mysqli_stmt_bind_param($statement, 'i', htmlspecialchars($_GET["id"]));
        if(mysqli_stmt_execute($statement)){
            header("location: view.php");
        }else{
            mysqli_error($conn);
        };
        mysqli_close($conn);
    }
?>
