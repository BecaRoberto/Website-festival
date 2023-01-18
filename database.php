<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Color</th>
                <th>Size</th>
                <th>Price</th>
            </tr>
        </thead>
    
        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "products";

            $connection = new mysqli($servername, $username, $password, $database);

            $sql = "SELECT * FROM products";
            $result = $connection->query($sql); 
            
            while($row = $result->fetch_assoc()){
                <tr>
                    <td>" . $row["Product"]"</td>
                    <td>" . $row["Color"]"</td>
                    <td>" . $row["Size"]"</td>
                    <td>" . $row["Price"]"</td>

                </tr>
            }
            
            ?>
       
        </tbody>
    
    </table>

</body>
</html>