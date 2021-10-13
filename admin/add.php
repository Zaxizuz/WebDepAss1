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
<div class="container-menu">
    <?php require_once "inc/menu.inc.php"; ?>
</div>

    <div class="wrapper">

        <div class ="container">
            <h1> Add a new user </h1>
            <form action="add-user.php" method="POST">
                <input name="username" type="text" placeholder="Enter the username" required/>
                <input name="password" type="password" placeholder="Enter the password" required/>
                <select id="role" name="role" required>
                    <option value="administrator">Administrator</option>
                    <option value="manager">Manager</option>
                </select>
                <input type="submit" value="Add User"/>
            </form>
        </div>
    </div>
</body>
</html>
