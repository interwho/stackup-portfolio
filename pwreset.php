<?php
require('core.php');

session_start();

if (isset($_SESSION['email'])) {
    header('Location: dashboard.php');
    exit();
}

mysqli_query($connection, "DELETE FROM `pw_reset` WHERE `date` NOT LIKE CURDATE()");

if (isset($_POST['hash']) && isset($_POST['password'])) {
    $hash = $_POST['hash'];
    $password = $_POST['password'];

    if (finishPasswordReset($connection, $hash, $password)) {
        header('Location: index.php');
    }

    $error = $ERRORS['INVALID_PWRESET_HASH'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>StackUp Portfolios</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<div class="container">
    <h1 style="text-align: center; margin: 50px;">StackUp Portfolios</h1>
    <?php if (isset($error)) { ?>
        <h3 style="text-align: center; margin: 50px; color: darkred;"><?php echo $error; ?></h3>
    <?php } ?>
    <section id="content">
        <form method="post" id="loginform">
            <h1>Recovery</h1>
            <div>
                <input name="hash" type="text" placeholder="Password Reset Token" required="" id="username" value="<?php if(isset($_GET['hash'])) { echo $_GET['hash']; } ?>"/>
            </div>
            <div>
                <input name="password" type="password" placeholder="Password" required="" id="password"/>
            </div>
            <div>
                <input type="submit" value="Reset"/>
                <a href="index.php">Found your password?</a>
            </div>
        </form>
        <div class="button">
            <a href="directory.php">View our talent directory</a>
        </div>
    </section>
</div>
</body>
</html>
