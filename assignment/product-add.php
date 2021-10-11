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
        <?php require_once "inc/product-menu.inc.php"; ?>
        </div>
        <div class = container>
            <h1> Add a new product </h1>
            <form action="product-add-process.php" method="POST">
                <input name="product_name" type="text" placeholder="Enter the product name" required/>
                <input name="price" type="text" placeholder="Enter the price" required/>
                <input name="amount" type="text" placeholder="Enter the amount" required/>
                <input type="submit" value="Add product"/>
            </form>
        </div>
    </div>
</body>
</html>
