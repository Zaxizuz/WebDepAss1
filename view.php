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
            <?php require_once "inc/menu.inc.php"; ?>
        </div>
        <div class=container id="userlist">
            <h1>Current User</h1>
            <?php
            require_once "inc/dbconn.inc.php";

            $sql= $sql = "SELECT username FROM User WHERE active=1";

            if($result=mysqli_query($conn,$sql)){
                if (mysqli_num_rows($result)>0){
                    echo "<ul>";
                    while($row=mysqli_fetch_assoc($result)){
                        echo "<li class=currentuser>".$row["username"]."</li>";
                    };
                    echo "</ul>";
                    mysqli_free_result($result);
                };
            };
            mysqli_close($conn);

            ?>
        </div>
    </div>
</body>
</html>
