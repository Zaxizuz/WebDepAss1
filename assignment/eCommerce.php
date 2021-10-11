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

    
        <div class=container id="productlist">
            <h1>Welcome our E-commerce web site</h1>

            <?php
            require_once "inc/dbconn.inc.php";

           $sql = "SELECT `id`, `product_name`, `price`, `amount` FROM `Product` WHERE `completed` = 0";


           echo "<table border='1'>
                <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Price ($)</th>
                <th>       </th>
                </tr>";

              
                
            if($result=mysqli_query($conn,$sql)){
                if (mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){
                        $id = $row['id'];

                        echo "<tr>
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['product_name'] . "</td>
                        <td>" . $row['price']. "</td>
    
                        <td>
                        <button>Buy</button> 
                        </td>
                         </tr>";
                    };
                    echo "</table>";
                    mysqli_free_result($result);
                };
            };
            mysqli_close($conn);

            ?>


            
            
        </div>
    </div>


</body>
</html>
