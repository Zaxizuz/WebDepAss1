<!DOCTYPE html>
<html lang="en">
<head>
    <title>Practical 3: Current tasks</title>
    <meta charset="UTF-8" />
    <meta name="author" content="Sen Lin" />
    <script src="scripts/script.js" defer></script>
    <link rel="stylesheet" href="styles/style.css"/>
</head>
<body>
    <div class=wrapper>
        <div class = container>
        </div>
        <div class=container id="tasklist">
            <h1> Welcome to Content Management System</h1>
            <p> Please enter your username and password</p>
            <form action="log-in.php" method="POST">
              <input name="username" type="text" placeholder="Enter the username" required/>
              <input name="password" type="text" placeholder="Enter the password" required/>
              <input type="submit" value="Log in"/>
          </form>
        </div>
    </div>
</body>
</html>
