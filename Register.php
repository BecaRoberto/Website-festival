<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register/Login</title>

    <link rel="stylesheet" href="styles.css">
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
                        <a href="Register.php">GIVEAWAY!</a>
                    </li>
                </ul>
        </div>
   
        <!-- Header END -->
        <?php
// Start a session to store error messages
session_start();

// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "webdatabase");

// Check for form submission
if (isset($_POST['submit'])) {
    // Initialize variables to store form input
    $email = $nume = $prenume = $telefon = "";

    // Validate and sanitize form input
    if (!empty($_POST['email'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
    } else {
        $_SESSION['error']['email'] = "Email is required";
    }

    if (!empty($_POST['nume'])) {
        $nume = mysqli_real_escape_string($conn, $_POST['nume']);
    } else {
        $_SESSION['error']['nume'] = "Last name is required";
    }

    if (!empty($_POST['prenume'])) {
        $prenume = mysqli_real_escape_string($conn, $_POST['prenume']);
    } else {
        $_SESSION['error']['prenume'] = "First name is required";
    }

    if (!empty($_POST['telefon'])) {
        $telefon = mysqli_real_escape_string($conn, $_POST['telefon']);
    } else {
        $_SESSION['error']['telefon'] = "Phone number is required";
    }

    // Check if any errors have been set
    if (!isset($_SESSION['error'])) {
        // Prepare and execute the SELECT statement
        $select = "SELECT * FROM users WHERE email = '$email' && nume='$nume' && prenume= '$prenume' && telefon = '$telefon'";
        $result = mysqli_query($conn, $select);

        // Check if the user already exists
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['error']['user'] = "User already exists";
        } else {
            // Prepare and execute the INSERT statement
            $insert = "INSERT INTO users (email, nume, prenume, telefon) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $insert);
            mysqli_stmt_bind_param($stmt, "ssss", $email, $nume, $prenume, $telefon);
            mysqli_stmt_execute($stmt);
        }
    }
}
?>


<!--RegisterForm START-->

<div class="Register-form">
<div class="form-container">
    <form action="" method="post">
        <h3 class="title">Register for our Giveaway</h3>
        <input type="email" name="email" placeholder="enter your email" class="box" required>
        <?php if (isset($_SESSION['error']['email'])) { echo $_SESSION['error']['email']; } ?>
        <input type="nume" name="nume" placeholder="enter your Last Name" class="box" required>
        <?php if (isset($_SESSION['error']['nume'])) { echo $_SESSION['error']['nume']; } ?>
        <input type="prenume" name="prenume" placeholder="enter your First Name" class="box" required>
        <?php if (isset($_SESSION['error']['prenume'])) { echo $_SESSION['error']['prenume']; } ?>
        <input type="telefon" name="telefon" placeholder="enter your Phone Number" class="box" required>
        <?php if (isset($_SESSION['error']['telefon'])) { echo $_SESSION['error']['telefon']; } ?>
        <input type="submit" value="Register now!" class="form-btn" name="submit">
    </form>
    <p>"Want to win the ultimate festival experience? Register on our website now for a chance to win 3 
        tickets for you and your friends! That's right, all you have to do is sign up and you'll be 
        entered to win 3 tickets to the XN Festival. Don't miss out on this once in a lifetime opportunity. 
        Register now and take your festival experience to the next level. The winner will be announced on 
        August 24th, so don't wait! Good luck!"</p>
</div>
</div>

<!--RegisterForm END-->

<!--Socials START-->
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
<!--Socials END-->
    </div>
</html>