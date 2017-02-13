<?php
require('core.php');

session_start();

if (isset($_SESSION['email'])) {
    header('Location: dashboard.php');
    exit();
}

if (isset($_POST['action'])) {
    if (($_POST['action'] == 'LOGIN') && (isset($_POST['email']) && isset($_POST['password']))) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (areUserCredentialsCorrect($connection, $email, $password)) {
            $_SESSION['email'] = $email;

            header('Location: dashboard.php');
            exit();
        }

        $error = $ERRORS['INVALID_CREDENTIALS'];

    } elseif (($_POST['action'] == 'REGISTER') && (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['code']))) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $inviteCode = $_POST['code'];

        if (!verifyLoginParams($password, $email)) {
            $error = $ERRORS['EMPTY_FIELDS'];

        } elseif ($inviteCode == $INVITE_CODE) {
            if (createUserAccount($connection, $email, $password)) {
                $_SESSION['email'] = $email;

                header('Location: dashboard.php');
                exit();
            }

            $error = $ERRORS['EMAIL_ALREADY_EXISTS'];
        } else {
            $error = $ERRORS['INVALID_INVITE_CODE'];
        }

    } elseif (($_POST['action'] == 'PW_RESET') && (isset($_POST['email']))) {
        $email = $_POST['email'];

        if (!verifyLoginParams('valid', $email)) {
            $error = $ERRORS['EMPTY_FIELDS'];
        } elseif (startPasswordReset($connection, $email)) {
            $error = $ERRORS['PASSWORD_LINK_SENT'];
        } else {
            $error = $ERRORS['ACCOUNT_NOT_FOUND'];
        }
    }
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
            <h1>Login</h1>
            <div>
                <input name="email" type="text" placeholder="Email Address" required="" id="username"/>
            </div>
            <div>
                <input name="password" type="password" placeholder="Password" required="" id="password"/>
            </div>
            <div>
                <input type="hidden" name="action" value="LOGIN">
                <input type="submit" value="Log in"/>
                <a href="#" onclick="showPwreset();">Lost your password?</a>
                <a href="#" onclick="showRegister();">Register</a>
            </div>
        </form>
        <form method="post" id="registerform" style="display: none;">
            <h1>Register</h1>
            <div>
                <input name="email" type="text" placeholder="Email Address" required="" id="username"/>
            </div>
            <div>
                <input name="password" type="password" placeholder="Password" required="" id="password"/>
            </div>
            <div>
                <input name="code" type="text" placeholder="Invite Code" required="" id="invitecode"
                       style="background: none;"/>
            </div>
            <div>
                <input type="hidden" name="action" value="REGISTER">
                <input type="submit" value="Register"/>
                <a href="#" onclick="showPwreset();">Lost your password?</a>
                <a href="#" onclick="showLogin();">Login</a>
            </div>
        </form>
        <form method="post" id="pwresetform" style="display: none;">
            <h1>Recovery</h1>
            <div>
                <input name="email" type="text" placeholder="Email Address" required="" id="username"/>
            </div>
            <div>
                <input type="hidden" name="action" value="PW_RESET">
                <input type="submit" value="Reset"/>
                <a href="#" onclick="showLogin();">Login</a>
                <a href="#" onclick="showRegister();">Register</a>
            </div>
        </form>
        <div class="button">
            <a href="directory.php">View our talent directory</a>
        </div>
    </section>
</div>
<script src="js/index.js"></script>
</body>
</html>
