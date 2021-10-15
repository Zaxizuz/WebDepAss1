<!DOCTYPE html>
<html lang="en">
<head>
    <title>Practical 3: Edit</title>
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
    
        <?php
            
            require_once "inc/dbconn.inc.php";
            $id = isset($_GET['id']) ? $_GET['id'] : '';
            if (isset($_POST["product_name"]) 
                && isset($_POST["price"])
                && isset($_POST["amount"]))
         {
        $sql = "UPDATE Product SET product_name=?, price=?, amount=?, tag='edited', updated=now() where id=$id;";
        
        $statement = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($statement, $sql);

        $product_name = htmlspecialchars($_POST["product_name"]);
        $price = htmlspecialchars($_POST["price"]);
        $amount = htmlspecialchars($_POST["amount"]);


        mysqli_stmt_bind_param($statement, 'sss', $product_name, $price, $amount);

        if(mysqli_stmt_execute($statement)){
            header("location: manage-product.php");
        }
        else{
            mysqli_error($conn);
        };
        mysqli_close($conn);
    }
            ?>     
        <div class = container>
            <h1> Edit a product </h1>
            <form method="POST">
                <input name="product_name" type="text" placeholder="Enter the product name" required/>
                <input name="price" type="text" placeholder="Enter the price" required/>
                <input name="amount" type="text" placeholder="Enter the amount" required/>
                <input type="submit" value="Save"/>
            </form>
        </div>
    </div>
</body>
</html>
        
