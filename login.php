<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles-login.css">
    <link rel="shortcut icon" type="image/x-icon" href="png_materials/logo_shortcut.png" />
</head>
<body style="background-color:#F5F5F5;">
<?php
require_once('header.php')
?>
<?php
require_once('search-header.php')
?>
<?php
require_once('back-button.php')
?>


<div class="form-container">
    <form>
            <h6>Login</h6>
            <div class="row">
                <input type="text" placeholder="Username">
                </div>
                <div class="row">
                <input type="text" placeholder="Password">
            </div>
            <div class="row">
                <button class="login">Login</button>
            </div>
    </form>
    <p>New to FreshBounty? <a href="register.html">Register!</a></p>
</div>


<?php
require_once('footer.php')
?>

</body>
</html>