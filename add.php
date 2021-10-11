<!DOCTYPE html>
<html lang="en">
<head>
    <title>Practical 3: Add</title>
    <meta charset="UTF-8" />
    <meta name="author" content="Sen Lin" />
    <link rel="stylesheet" href="styles/style.css" />
    <script src="scripts/script.js" defer></script>
</head>
<body>
    <div class=wrapper>
        <div class = container>
            <?php require_once "inc/menu.inc.php"; ?>
        </div>
        <div class = container>
            <h1> Add a new user </h1>
            <form action="add-user.php" method="POST">
                <input name="username" type="text" placeholder="Enter the username" required/>
                <input name="password" type="text" placeholder="Enter the password" required/>
                <input name="role" type="text" placeholder="Administrator or Manager" required/>
                <input type="submit" value="Add User"/>
            </form>
        </div>
    </div>
</body>
</html>
