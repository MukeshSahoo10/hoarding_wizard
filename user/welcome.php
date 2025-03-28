<?php
// Initialize the session
include "..//include/config.php";
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font: 14px sans-serif;
            text-align: center;
        }
    </style>
</head>

<body>
    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>

    <div class="container">
        <form id="contact" action="" method="POST">
            <h3>Update Your Profile</h3>
            <fieldset>
                <input placeholder="Your name" type="text" tabindex="1" name="name" required autofocus>
            </fieldset>
            <fieldset class="form-inline">
                <div class="form-group" style="padding-right: 5px">
                    <input placeholder="Your Date Of Birth" type="date" tabindex="1" name="dob" required autofocus>
                </div>
                <div class="form-group" style="padding-left: 35px">
                    <label for="gender">Gender:</label>

                    <select name="gender" id="gender">
                        <option value="select">Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </fieldset>

            <fieldset>
                <input placeholder="Your Email Address" type="email" tabindex="2" name="email">
            </fieldset>
            <fieldset>
                <input placeholder="Your Phone Number" type="tel" tabindex="3" name="phone" required>
            </fieldset>
            <fieldset>
                <input placeholder="Your Address" type="text" tabindex="4" name="address" required>
            </fieldset>
            <fieldset>
                <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
            </fieldset>
            <div class="row">
                <div class="col-md-6">
                    <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
                </div>
                <div class="col-md-6">
                    <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
                </div>
            </div>
        </form>
    </div>
</body>
<?php
if(isset($_POST['submit']))
{
    mysqli_query($link,"INSERT INTO `user_data`(`id`, `uname`, `dob`, `gender`, `email`, `phone`, `uaddress`)
     VALUES (NULL,'$_POST[name]','$_POST[dob]','$_POST[gender]','$_POST[email]','$_POST[phone]','$_POST[address]')");
}
?>
</html>