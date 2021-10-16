<!DOCTYPE html>
<html lang="en">

<head>
    <title>product-history</title>
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
            <h1>Management Log</h1>

            <?php
            require_once "inc/dbconn.inc.php";


            $sql = "SELECT `id`, `product_name`, `price`, `amount`, `tag` FROM Product  ORDER BY updated DESC;";


           echo "<table border='1'>
                <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Price ($)</th>
                <th>Amount</th>
                <th>Status</th>
                </tr>";

              

            if($result=mysqli_query($link,$sql)){
                if (mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){
                        $id = $row['id'];

                        if($row['tag'] == 'deleted'){
                        echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['product_name'] . "</td>
                        <td>" . $row['price']. "</td>
                        <td>" . $row['amount'] . "</td>
                        <td>
                            Deleted                        
                        </td>
                         </tr>";
                        }

                        if($row['tag'] == 'added'){
                            echo "<tr>
                            <td>" . $row['id'] . "</td>
                            <td>" . $row['product_name'] . "</td>
                            <td>" . $row['price']. "</td>
                            <td>" . $row['amount'] . "</td>
                            <td>
                                Added                        
                            </td>
                             </tr>";
                            }

                            if($row['tag'] == 'edited'){
                                echo "<tr>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['product_name'] . "</td>
                                <td>" . $row['price']. "</td>
                                <td>" . $row['amount'] . "</td>
                                <td>
                                    Edited                       
                                </td>
                                 </tr>";
                                }    
                    };
                    echo "</table>";
                    mysqli_free_result($result);
                };
            };
            ?>


       

            
            
        </div>
    </div>


</body>
</html>
