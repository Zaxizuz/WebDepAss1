<?php
    if (isset($_POST["product_name"]) 
    && isset($_POST["price"])
    && isset($_POST["amount"])){
        require_once "inc/dbconn.inc.php";

        $sql = "INSERT INTO Product(product_name,price,amount, tag) VALUES(?,?,?, 'added');";
        $statement = mysqli_stmt_init($link);
        mysqli_stmt_prepare($statement, $sql);

        $product_name = htmlspecialchars($_POST["product_name"]);
        $price = htmlspecialchars($_POST["price"]);
        $amount = htmlspecialchars($_POST["amount"]);

        mysqli_stmt_bind_param($statement, 'sss',$product_name , $price, $amount );
        if(mysqli_stmt_execute($statement)){
            header("location: manage-product.php");
        }else{
            mysqli_error($link);
        };
        mysqli_close($link);
    }
?>
