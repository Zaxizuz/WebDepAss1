<!DOCTYPE html>
<html lang="en">

<head>
    <title>Content Management System - Manage a product</title>
    <meta charset="UTF-8" />
    <meta name="author" content="Sen Lin" />
    <script src="scripts/script.js" defer></script>
    <link rel="stylesheet" href="styles/style.css"/>
</head>

<body>
    
<div class="sidebar">
    <?php require_once "inc/menu.inc.php"; ?>
</div>

    <div class=wrapper>

        <div class = container>
            <?php require_once "inc/product-menu.inc.php"; ?>
        </div>

        <div class=container id="productlist">
            <h1>Product List</h1>

            <?php
            require_once "inc/dbconn.inc.php";

           $sql = "SELECT `id`, `product_name`, `price`, `amount` FROM `Product` WHERE `completed` = 0";


           echo "<table border='1'>
                <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Price ($)</th>
                <th>Amount</th>
                <th>       </th>
                <th>       </th>
                </tr>";

              
                
            if($result=mysqli_query($link,$sql)){
                if (mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){
                        $id = $row['id'];

                        echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['product_name'] . "</td>
                        <td>" . $row['price']. "</td>
                        <td>" . $row['amount'] . "</td>
                        <td>
                        <a href = 'product-edit.php?id=$id'><button>Edit</button> </a> 
                        </td>
                        <td>
                        <a href = 'product-delete-process.php?id=$id'><button>Delete</button> </a> 
                        </td>
                         </tr>";
                    };
                    echo "</table>";

                    mysqli_free_result($result);
                };
            };
            mysqli_close($link);

            ?>
                    <input type="submit" value="save"/>


            
            
        </div>
    </div>


</body>
</html>
