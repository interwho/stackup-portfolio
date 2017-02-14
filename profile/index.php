<?php
require('../core.php');

$profile = getUserPortfolio($connection, $_GET['email']);

if (!$profile) {
    header('Location: ../index.php');
    exit();
}

$pageTitle = $profile['name'] . "'s StackUp Profile";
$style = $profile['style'];
$image = $profile['image'];
$name = $profile['name'];
$subtitle = $profile['subtitle'];
$description = $profile['description'];
$social = json_decode($profile['social'], true);
$skills = json_decode($profile['skills']);
$links = json_decode($profile['links'], true);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="mobile-web-app-capable" content="yes">
    <title><?php echo $pageTitle; ?></title>
    <script src="../js/jquery.min.js"></script>
    <script src="../css/semantic-ui/semantic.min.js"></script>
    <link rel="stylesheet" href="../css/semantic-ui/semantic.min.css">

    <link rel="stylesheet" type="text/css" href="../css/stylesheet-default.css">
    <link rel="stylesheet" type="text/css" href="../css/print-default.css" media="print">

    <style type="text/css">
        <?php echo $style; ?>
    </style>
</head>
<body>
<div style="height: 100%; margin-top: -75px" class="ui middle aligned grid ">
    <div class="column">
        <div style="position: relative; top: 75px; z-index: 1" class="ui fluid centered small circular image">
            <img src="<?php echo $image; ?>">
        </div>
        <div style="max-width: 500px; padding-top: 75px; margin-top: 0px" class="ui fluid centered card">
            <div class="center aligned content">
                <span class="header"><?php echo $name; ?></span>
                <div class="meta">
                    <span class="date"><?php echo $subtitle; ?></span>
                </div>
                <div class="center aligned extra content social">
                    <?php
                    if (is_array($social)) {
                        foreach ($social as $key => $value) {
                            echo '<a href="' . $value . '"> <i class="big ' . $key . ' icon icon-color"></i> </a>';
                        }
                    }
                    ?>
                </div>
                <div class="center aligned content skills">
                    <?php
                    if (is_array($skills)) {
                        foreach ($skills as $value) {
                            echo '<button class="ui basic button">' . $value . '</button>';
                        }
                    }
                    ?>
                </div>
                <div class="left aligned description">
                    <?php echo $description; ?>
                </div>
                <div class="center aligned content links">
                    <?php
                    if (is_array($links)) {
                        foreach ($links as $key => $value) {
                            echo '<a href="' . $value . '"><button class="ui basic button">' . $key . '</button></a>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<AutoScroll></AutoScroll>
</html>
