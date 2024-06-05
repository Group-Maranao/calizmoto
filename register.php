<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register</title>
    <style>
       * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    background: #242222;
}

.background-image {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
}

.background-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.container {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

.box {
    background: #fdfdfdde;
    display: flex;
    flex-direction: column;
    padding: 25px 25px;
    border-radius: 20px;
    box-shadow: 0 0 128px 0 rgba(0, 0, 0, 0.1), 0 32px 64px -48px rgba(0, 0, 0, 0.5);
}

.form-box {
    width: 450px;
    margin: 0px 10px;
}

.form-box header {
    font-size: 25px;
    font-weight: 600;
    padding-bottom: 10px;
    border-bottom: 1px solid #e6e6e6;
    margin-bottom: 10px;
}

.form-box form .field {
    display: flex;
    margin-bottom: 10px;
    flex-direction: column;
}

.form-box form .input input {
    height: 40px;
    width: 100%;
    font-size: 16px;
    padding: 0 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    outline: none;
}

.btn {
    height: 35px;
    background: rgb(0, 0, 0);
    border: 0;
    border-radius: 5px;
    color: #fff;
    font-size: 15px;
    cursor: pointer;
    transition: all .3s;
    margin-top: 10px;
    padding: 0px 10px;
}

.btn:hover {
    opacity: 0.82;
}

.submit {
    width: 100%;
}

.links {
    margin-bottom: 15px;
}

.sign-in-link {
    color: #6b006e;
  }
  
    </style>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php 
            // Include the configuration file
            include("php/config.php");

            // Check if the form is submitted
            if(isset($_POST['submit']))
            {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $age = $_POST['age'];
                $password = $_POST['password'];

                // Check if the email already exists
                $verify_query = mysqli_query($con,"SELECT Email FROM info WHERE Email='$email'");

                if(mysqli_num_rows($verify_query) != 0){
                    echo "<div class='message'>
                              <p>This email is already in use. Please try another one.</p>
                          </div> <br>";
                    echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                } else {
                    // Insert the user data into the database
                    mysqli_query($con,"INSERT INTO info(Username, Email, Age, Password) VALUES('$username','$email','$age','$password')") or die("Error Occurred");
                    echo "<div class='message'>
                              <p>Registration successful!</p>
                          </div> <br>";
                    echo "<a href='index.php'><button class='btn'>Login Now</button>";
                }
            }
            ?>
            <header>Sign Up</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" autocomplete="off" required min="13" max="110">
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register">
                </div>
            </form>
            <div class="links">
                Already a member? <a href="index.php" >Sign In</a>
            </div>
        </div>
    </div>
</body>
</html>
