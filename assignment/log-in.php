<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    session_start();
    if (isset($_POST["username"])){
        require_once "inc/dbconn.inc.php";
        $sql = "SELECT * from User WHERE username=? AND password=?;";
        $statement = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($statement, $sql);
        mysqli_stmt_bind_param($statement, 'ss', htmlspecialchars($_POST["username"]),htmlspecialchars($_POST["password"]));
        if(mysqli_stmt_execute($statement)){
            $result=mysqli_stmt_get_result($statement);
            if (mysqli_num_rows($result)===1){
                // $_SESSION['username'] = $_POST["username"];
                $user = mysqli_fetch_array($result);
                if($user[3]=="administrator"){
                  header("location: add.php");
                }

                else if($user[3] == "manager"){
                  header("location: product-view.php");
                }

                else if($user[3] == "customer"){
                  header("location: eCommerce.php");
                }

            }else{
              echo "<div class='form'>
                    <h3>Incorrect Username or password.</h3><br/>
                    <p class='link'>Click here to <a href='index.php'>Login</a> again.</p>
                    </div>";
              mysqli_error($conn);
            };
        }else{
          mysqli_error($conn);
        };
        mysqli_close($conn);
    }
?>
</body>
</html>
