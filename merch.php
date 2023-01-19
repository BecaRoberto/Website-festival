<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XN Festival-Store</title>

    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>

</head>
<body>
    <!--Header START-->
    <div class = "container">
        <div class = "Navigation">
            
                <img src="Img/Logo.png" alt="Festival Logo" width="200" height="125" class = "logo">
                <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="merch.php">Merch</a>
                    </li>
                    <li>
                        <a href="Partners&Sponsors.html">Partners & Sponsors</a>
                    </li>
                    <li>
                        <a href="Contact.html">Contact</a>
                    </li>
                    <li>
                        <a href="Register&Login.html">Register/Login</a>
                    </li>
                </ul>
        </div>
    
        <!-- Header END -->
        
        <!--Intro Store START-->
        <div class="Intro_Store">
            <div class="Title_Store">
            <h5>XN Festival</h5>
            <h1>Merch</h1>
            </div>
        </div>
        <!--Intro Store END-->

        <!--Products START-->
        <div class="Products">
        <!-- Slider main container -->
        <div class="swiper">
         <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
        <!-- Slides -->
                <div class="swiper-slide"><img src="Img/hanoracnegru.png"></div>
                <div class="swiper-slide"><img src="Img/hanoracgri.png"></div>
                <div class="swiper-slide"><img src="Img/pantaloninegru.png"></div>
                <div class="swiper-slide"><img src="Img/pantalonigri.png"></div>
            </div>
         <!-- If we need pagination -->
            <div class="swiper-pagination"></div>
  
         <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
  
        </div>
        </div>
        <!--Produscts END-->
        
        <!--Product_Details-->
        <div class="Product_Details">
            <div class="text_product">
            <p1>Limited-edition merch with a one-of-a-kind look, 
                inspired by XN Festival artwork.<br>
                100% cotton<br>
                Unisex fit
            </p1>
            </div>

            <table class="products_table">
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
            $database = "webdatabase";

            $connection = new mysqli($servername, $username, $password, $database);
            
            $sql = "SELECT * FROM products";
            $result = $connection->query($sql);
            
            while($row = $result->fetch_assoc()){
                echo "<tr>
                    <td>" . $row["Product"] . "</td>
                    <td>" . $row["Color"] . "</td>
                    <td>" . $row["Size"] . "</td>
                    <td>" . $row["Price"] . "</td>

                </tr>";
            }
            
            
            ?>
        </tbody>
    
    </table>
        </div>
        <!--Product_Details-->
        
        
        
        <!--Footer START-->
        <div class="Social">

            <ul>
                <li>
                    <a href="https://www.instagram.com/" target="_blank">Instagram</a>
                </li>
                <li>
                    <a href="https://www.facebook.com/" target="_blank">Facebook</a>
                </li>
                <li>
                    <a href="https://twitter.com/" target="_blank">Twitter</a>
                </li>
            </ul>
    
        </div>
        </div>
        <!--Footer END-->

        <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
        
        <script>
            const swiper = new Swiper('.swiper', {

    loop: true,

    pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },

     navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

});
        </script>
    </body>
</html>