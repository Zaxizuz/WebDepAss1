<!DOCTYPE html>
<html lang="en">
<head>
    <title>Content Management System</title>
    <meta charset="UTF-8" />
    <meta name="author" content="Sen Lin" />
    <script src="scripts/script.js" defer></script>
    <link rel="stylesheet" href="styles/style.css"/>
    <link rel="shortcut icon" type="image/png" href="favicon-32x32.png"/>


</head>
<body>
    <div class="wrapper">
        <div class="container" id="tasklist">
            <div class="logo"><img src="img/logo.png"></div>

            <h1>Login</h1> 
            <div class="form">
            <form action="log-in.php" method="POST">
              <input name="username" type="text" placeholder="Enter the username" required/>
              <input name="password" type="password" placeholder="Enter the password" required/>
              <input type="submit" value="Log in"/>
          </form>
</div>

        </div>
    </div>
</body>
</html>
