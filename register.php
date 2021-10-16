<?php
  
  session_start();
 
  // Check if the user is logged in, if not then redirect him to login page
  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
      header("location: login.php");
      exit;
}
 
// Include config file
require_once "inc/dbconn.inc.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = $role = "";
$username_err = $password_err = $confirm_password_err = $role_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM User WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later. 1";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    } 

    // Validate role
    if(empty(trim($_POST["role"]))){
        $role_err = "Please enter a role.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["role"]))){
        $role_err = "Roles can only contain letters, numbers, and underscores.";
    }else{
        $role = trim ($_POST["role"]);
    }
    
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($role_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO User (username, password, role) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($link); 
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $param_role );
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_role = $role;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later. - Login Page";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>


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
    
<div class="sidebar">
    <?php require_once "inc/menu.inc.php"; ?>
</div>

    <div class="wrapper">
        <div class ="container-logged">
            <h1> Add a new user </h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            
                <label>Username</label>
                <input type="text" name="username"  <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?> value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
                
                <label>Password</label>
                <input type="password" name="password"  <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?> value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            
                <label>Confirm Password</label>
                <input type="password" name="confirm_password"   <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?> value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
          
                
                <label>Role</label>
                
                <input type="text" name="role"  <?php echo (!empty($role_err)) ? 'is-invalid' : ''; ?> value="<?php echo $role; ?>">
                <span class="invalid-feedback"><?php echo $role_err; ?></span>
 
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
             
        </form>
        </div>
    </div>
</body>
</html>