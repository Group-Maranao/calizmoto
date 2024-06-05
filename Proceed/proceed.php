<?php

$conn = new mysqli("localhost", "u936666569_Calizaya", "Calizaya123", "u936666569_db_Calizaya");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$availableQuantity = 1000;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $quantity = $_POST['quantity'];
    $payment = $_POST['payment'];
    $price = 1299.00; // Assuming the price of Mags is $1299.00

    // Check if the entered quantity exceeds the available quantity
    if ($quantity > $availableQuantity) {
        echo "Sorry, the quantity you entered exceeds the available quantity!";
    } else {
        $totalPrice = $quantity * $price;
        $insertSql = "INSERT INTO products (price, qty, productName, MOP) VALUES ($totalPrice, $quantity, 'Mags', '$payment')";
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
            <img src="../CRUD/Photo/mags 3.jpg" alt="Error">
            <div class="col-desc">
                <h4>Mags</h4>
                <p>Available Quantity: <span id="currentQuantity"><?php echo $availableQuantity; ?></span></p>
                <p>Price: <span id="currentPrice">1,299.00</span></p> <br>
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
<div class="offer">
            <div class="small-container">
                <div class="row">
                    <div class="Column-2">
                        <img src="../CRUD/Photo/enkeiss.png" alt="Error">
                    </div>
                    <div class="Column-2">
                        <p>Exclusive available on Calizaya</p>
                        <h1>Enkei|Limited Edition</h1>
                        <small>Elevate your Mini's presence on the road with the unmatched style and performance of limited edition Enkei mags. Crafted with precision engineering and innovative design, these exclusive wheels perfectly complement the iconic Mini aesthetic while enhancing its handling and agility. Make a statement with every drive as you turn heads and leave a lasting impression. Explore the ultimate fusion of form and function with Enkei – where cutting-edge technology meets timeless Mini charm</small> <br>
                        <a href="" class="btn">Buy Now &#8594;</a>
                    </div>
                </div>
            </div>
        </div>
<div class="categories">
    <div class="small-container">
        <div class="row">
                <div class="Col-3">
                    <img src="../CRUD/Photo/DisPho1.jpg" alt="Rusi Gala">
                </div>
                <div class="Col-3">
                    <img src="../CRUD/Photo/DisPho3.jpg " alt="Rusi Passion">
                </div>
                <div class="Col-3">
                    <img src="../CRUD/Photo/Dispho2.jpg" alt="Rusi Royal">
                </div>
        </div>
    </div>
</div>
<div class="small-container">
    <h2 class="title">Featured Products</h2>
    <div class="row">
        <div class="col-4">
            <img src="../CRUD/Photo/handlebar.jpg"  alt="Error">
            <h4>Bike Handle Bar</h4>
            <p>249.00php</p> 
            <a href="handlebar.php"> <button class = 'btn'>Buy now</button></a>
        </div>
        <div class="col-4">
            <img src="../CRUD/Photo/Mags1.jpg"  alt="Error">
            <h4>Mags</h4>
            <p>1249.00php</p> 
            <a href="mags2.php"> <button class = 'btn'>Buy now</button></a>
        </div>
        <div class="col-4">
            <img src="../CRUD/Photo//mags2.jpg" alt="Error">
            <h4>Mags</h4>
            <p>1249.00php</p> 
            <a href="mags3.php"> <button class = 'btn'>Buy now</button></a>
        </div>
        <div class="col-4">
            <img src="../CRUD/Photo/mags 3.jpg" alt="Error">
            <h4>Mags</h4>
            <p>1249.00php</p> 
           <a href="proceed.php"> <button class = 'btn'>Buy now</button></a>
        </div>


        <div class="col-4">
            <img src="../CRUD/Photo/rusiPassY.jpg"  alt="Error">
            <h4>Rusi Passion</h4>
            <p>14,999.00php</p> 
            <a href="rusiyellow.php"> <button class = 'btn'>Buy now</button></a>
        </div>
        <div class="col-4">
            <img src="../CRUD/Photo/RoyalRusi.jpg"  alt="Error">
            <h4>Rusi Royal</h4>
            <p>14,999.00php</p> 
            <a href="rusiRoyal.php"> <button class = 'btn'>Buy now</button></a>
        </div>
        <div class="col-4">
            <img src="../CRUD/Photo/mioPink.jpg"  alt="Error">
            <h4>Yamaha Mio</h4>
            <p>24,999.00php</p> 
            <a href="miopink.php"> <button class = 'btn'>Buy now</button></a>
        </div>
        <div class="col-4">
            <img src="../CRUD/Photo/Mio.jpg" alt="Error">
            <h4>Yamaha Mio</h4>
            <p>24,999.00php</p> 
            <a href="miowhite.php"> <button class = 'btn'>Buy now</button></a>
        </div>
        
    </div>
</div>
<div class="testimony">
    <div class="small-container">
        <div class="row">
            <div class="Col-3">
                <p>"I thought it was not legit because of its cheap price. But I didn't expect that it was real! The price is cheap and Good Quality secondhand"</p>
                <img src="../CRUD/Photo/Test.jpg" alt="Error">
                <h2>Eric Morales</h2>
            </div>
            <div class="Col-3">
                <p>"Thankyou Calizaya for your existence! I really amazed on what I've experienced. Cheap price, Affordable, and Good Quality Products"</p>
                <img src="../CRUD/Photo/test1.jpg" alt="Error">
                <h2>Marco Antonio Barrera</h2>
            </div>
            <div class="Col-3">
                <p>"Calizaya the best buy and sell! It is not only meet my expectation, Calizaya put a smile to their customers. Good price, affordable, and Quality Items"</p>
                <img src="../CRUD/Photo/test2.jpg" alt="Error">
                <h2>Antonio Margarito</h2>
            </div>

        </div>
    </div>
</div>
</body>
</html>