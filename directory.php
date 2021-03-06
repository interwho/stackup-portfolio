<?php
require('core.php');

$profiles = getAllPortfolios($connection);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="mobile-web-app-capable" content="yes">
    <title>StackUp Talent Directory</title>
    <script src="js/jquery.min.js"></script>
    <script src="css/semantic-ui/semantic.min.js"></script>
    <link rel="stylesheet" href="css/semantic-ui/semantic.min.css">

    <link rel="stylesheet" type="text/css" href="css/stylesheet-default.css">
    <link rel="stylesheet" type="text/css" href="css/print-default.css" media="print">

    <link rel="stylesheet" type="text/css" href="css/directory.css">
</head>
<body>
<!-- Website Header -->
<div>

    <ul class="topnav" id="myTopnav">
        <li><a href="index.php"> <img src="images/icon.png" style="width:39px;height:57px"> </a></li>
        <li><a class="title" href="index.php">StackUp: Tech Talent Directory</a></li>

    </ul>

</div>
<!--
<div align="center" style="margin-top: 50px; margin-left: 100px; margin-right: 100px">
    <div class="ui search fluid">
        <div class="ui icon input">

            <input style="width:800px; height: 70px;" class="prompt" type="text" placeholder="Find Your Tech Talent"
                   onchange="filter();">
            <i class="search icon"></i>
        </div>
        <div class="results"></div>
    </div>

</div>
-->

    <div id="content">
        <div class="ui grid">
    <?php
    foreach ($profiles as $profile) {
        $image = translateRelativeLinksUp($profile['image']);
        $name = $profile['name'];
        $subtitle = $profile['subtitle'];
        $description = $profile['description'];
        $social = json_decode($profile['social'], true);
        $skills = json_decode($profile['skills']);
        $links = json_decode($profile['links'], true);
        ?>

            <div class ="five wide column">
            <div style="position: relative; top: 75px; z-index: 1" class="ui fluid centered small circular image">
                <img src="<?php echo $image; ?>">
            </div>
            <div class="ui fluid centered card" style="margin-top: 20px; padding-top: 50px">
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
                                echo '<button class="ui basic button">' . $value . '</button>';
                            }
                        }
                        ?>
                    </div>
                    <div class="center aligned description" style="word-wrap: break-word;   ">
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

    <?php } ?>
        </div>
</div>
</body>
<AutoScroll></AutoScroll>
</html>
