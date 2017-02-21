<?php
// TODO: Convert this project from procedural to OO once it's clear that this will be used.

// Misc Configuration
$INVITE_CODE = 'stackup';

// Database Configuration
$DB_HOST = 'localhost';
$DB_USERNAME = 'root';
$DB_PASSWORD = 'password';
$DB_NAME = 'portfolios';

// Error Constants
$ERRORS = [
    'INVALID_CREDENTIALS' => 'Incorrect email or password!',
    'INVALID_INVITE_CODE' => 'Invalid invite code!',
    'INVALID_PWRESET_HASH' => 'Invalid password reset link!',
    'EMAIL_ALREADY_EXISTS' => 'An account already exists with that email address!',
    'EMPTY_FIELDS' => 'Please complete all fields accurately!',
    'PASSWORD_LINK_SENT' => 'Please check your email for a password reset link!',
    'ACCOUNT_NOT_FOUND' => 'This email address is not associated with an account!'
];

// Database Initialization
$connection = mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD);
if (!$connection) {
    die("Database Connection Failed - " . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, $DB_NAME);
if (!$select_db) {
    die("Database Selection Failed - " . mysqli_error($connection));
}

// User Functions
function hashPassword($password)
{
    return password_hash($password, PASSWORD_BCRYPT);
}

function checkHashedPassword($newPassword, $oldPassword)
{
    return password_verify($newPassword, $oldPassword);
}

function areUserCredentialsCorrect($connection, $email, $password)
{
    $email = mysqli_real_escape_string($connection, $email);

    $query = "SELECT * FROM `users` WHERE email='$email'";

    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $savedPassword = mysqli_fetch_array($result, MYSQLI_ASSOC)['password'];
        return checkHashedPassword($password, $savedPassword);
    }

    return false;
}

function doesUserExist($connection, $email)
{
    $email = mysqli_real_escape_string($connection, $email);

    $query = "SELECT * FROM `users` WHERE email='$email'";

    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);
    if ($count == 0) {
        return false;
    }

    return true;
}

function createUserAccount($connection, $email, $password)
{
    $email = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, hashPassword($password));

    if (!doesUserExist($connection, $email)) {
        $query = "INSERT INTO `users` (`id`, `email`, `password`, `name`, `subtitle`, `image`, `description`, `social`, `skills`, `links`, `style`, `account_created`, `last_login`, `notes`) VALUES (NULL, '$email', '$password', 'StackUp Student', 'Junior Developer', '../images/default_profile.png', NULL, NULL, NULL, NULL, NULL, CURRENT_TIMESTAMP, NULL, NULL);";
        mysqli_query($connection, $query) or die(mysqli_error($connection));

        return true;
    }

    return false;
}

function verifyLoginParams($password, $email = 'webmaster@stackup.sg')
{
    if (empty($password) || empty($email)) {
        return false;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }

    return true;
}

function startPasswordReset($connection, $email)
{
    $email = mysqli_real_escape_string($connection, $email);
    $hash = mysqli_real_escape_string($connection, uniqid(sha1(md5(uniqid('pwreset') . rand(1, 99999)))));

    if (doesUserExist($connection, $email)) {
        $query = "INSERT INTO `pw_reset` (`email`, `hash`, `date`) VALUES ('$email', SHA1('$hash'), CURRENT_DATE());";
        mysqli_query($connection, $query) or die(mysqli_error($connection));

        $hash = sha1($hash);

        $body = "Your verification code is $hash. It expires one day after requesting it. Please enter your verification code at http://stackup.sg/pwreset.php?hash=$hash to reset your password. If you did not request a password, please ignore this email, as it will expire tomorrow.";
        $subject = "StackUp Portfolio Password Reset Request";
        $headers = "From: noreply@stackup.sg\r\n" .
            "X-Mailer: php";
        mail($email, $subject, $body, $headers);

        return true;
    }

    return false;
}

function finishPasswordReset($connection, $hash, $password)
{
    $hash = mysqli_real_escape_string($connection, $hash);
    $password = mysqli_real_escape_string($connection, hashPassword($password));

    $query = "SELECT * FROM `pw_reset` WHERE hash='$hash'";

    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $email = mysqli_fetch_array($result, MYSQLI_ASSOC)['email'];
        $email = mysqli_real_escape_string($connection, $email);

        mysqli_query($connection, "DELETE FROM `pw_reset` WHERE `hash`='$hash'");
        mysqli_query($connection, "UPDATE `users` SET `password`='$password' WHERE `email`='$email'");

        return true;
    }

    return false;
}

// Portfolio Functions
function getUserPortfolio($connection, $email)
{
    $email = mysqli_real_escape_string($connection, $email);

    if (doesUserExist($connection, $email)) {
        $query = "SELECT * FROM `users` WHERE email='$email'";

        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        return mysqli_fetch_array($result, MYSQLI_ASSOC);
    }

    return false;
}

function updateUserPortfolio($connection, $email, $name, $subtitle, $image, $summary, $css, $skills, $social, $links)
{
    $email = mysqli_real_escape_string($connection, $email);
    $name = mysqli_real_escape_string($connection, $name);
    $subtitle = mysqli_real_escape_string($connection, $subtitle);
    $image = mysqli_real_escape_string($connection, $image);
    $summary = mysqli_real_escape_string($connection, $summary);
    $css = mysqli_real_escape_string($connection, $css);
    $skills = mysqli_real_escape_string($connection, $skills);
    $social = mysqli_real_escape_string($connection, $social);
    $links = mysqli_real_escape_string($connection, $links);

    $query = "UPDATE `users` SET `name` = '$name', `subtitle` = '$subtitle', `image` = '$image', `description` = '$summary', `social` = '$social', `skills` = '$skills', `links` = '$links', `style` = '$css', `last_login` = CURRENT_DATE() WHERE `users`.`email` = '$email'";
    mysqli_query($connection, $query) or die(mysqli_error($connection));
}

function getAllPortfolios($connection)
{
    // TODO: Add search and partial results - for now, this is handled on the frontend
    $query = "SELECT * FROM `users`";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));

    $rows = [];
    while ($row = $result->fetch_array()) {
        $rows[] = $row;
    }

    return $rows;
}

function getPossibleSkills($connection)
{
    $query = "SELECT * FROM `skills` LIMIT 0, 1000";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));

    $rows = [];
    while ($row = $result->fetch_array()) {
        $rows[] = $row['skill'];
    }

    return $rows;
}

function translateRelativeLinksUp($link)
{
    return ltrim($link, '\.\./');
}
