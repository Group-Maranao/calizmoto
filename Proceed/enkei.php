<?php

$conn = new mysqli("localhost", "u936666569_Calizaya", "Calizaya123", "u936666569_db_Calizaya");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$availableQuantity = 1000;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $quantity = $_POST['quantity'];
    $payment = $_POST['payment'];
    $price = 2999.00; // Assuming the price of Mags is $1299.00

    // Check if the entered quantity exceeds the available quantity
    if ($quantity > $availableQuantity) {
        echo "Sorry, the quantity you entered exceeds the available quantity!";
    } else {
        $totalPrice = $quantity * $price;
        $insertSql = "INSERT INTO products (price, qty, productName, MOP) VALUES ($totalPrice, $quantity, 'Handle Bar', '$payment')";
        if ($conn->query($insertSql) === TRUE) {
            echo "Order placed successfully!";
          header("Location: ../Product.php");
        } else {
            echo "Error: " . $insertSql . "<br>" . $conn->error;
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Proceed|Calizaya Motor and Car Parts</title>
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Center vertically */
        }

        .col-4 {
            text-align: center;
        }

        .col-desc {
            text-align: center;
        }

        .col-4 img {
            width: 450px;
            height: auto;
            display: block;
            margin: 0 auto;
            max-width: 100%;
        }
    </style>
</head>
<body>
<div class="navbar">
        <div class="logo">
            <img src="../CRUD/Photo/CalizayaLogo.jpg" width="125px" alt="Calizaya"> 
            <h1>CALIZAYA</h1>
        </div>
        <nav>
            <ul>
               <b>
                <button class='btn'><li><a href="../../calizaya project/Home.php">HOME</a></li></button>
                <button class='btn'><li><a href="../../calizaya project/Product.php">PRODUCTS</a></li></button>
                <button class='btn'><li><a href="../../calizaya project/aboutus.php">ABOUT US</a></li></button>
                <button class='btn'><li><a href="../../calizaya project/Welcome.php">ACCOUNT</a></li></b></button>
                
            </ul>
        </nav>
        <img src="../CRUD/Photo/icons.png" width="30px" height="30px" alt="">
    </div>
    </div>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="col-4">
  
    <img src="../CRUD/Photo/enkeiss.png"  alt="Error">
            <div class="col-desc">
                <h4>Handle Bar</h4>
                <p>Available Quantity: <span id="currentQuantity"><?php echo $availableQuantity; ?></span></p>
                <p>Price: <span id="currentPrice">2,999.00</span></p> <br>
            </div>
            <label for="quantity">Enter Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="1" required>
            <br>
            <label for="payment">Mode of Payment:</label>
            <select id="payment" name="payment" required>
                <option value="cash_on_delivery">Cash on Delivery</option>
            </select>
            <br>
            <button type="submit">Submit Order</button>
    </div>
    </form>
</div>

